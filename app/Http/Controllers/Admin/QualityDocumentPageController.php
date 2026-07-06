<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityDocumentPage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class QualityDocumentPageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quality_document_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = QualityDocumentPage::ordered()->get();

        return view('admin.quality-document-pages.index', compact('pages'));
    }

    public function create()
    {
        abort_if(Gate::denies('quality_document_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quality-document-pages.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('quality_document_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validated($request);

        $qualityDocumentPage = QualityDocumentPage::create(collect($data)->except('pdf_items')->toArray());

        $qualityDocumentPage->update([
            'pdf_items' => $this->syncPdfItems($request, $qualityDocumentPage),
        ]);

        return redirect()
            ->route('admin.quality-document-pages.index')
            ->with('message', 'Quality document page created successfully.');
    }

    public function edit(QualityDocumentPage $qualityDocumentPage)
    {
        abort_if(Gate::denies('quality_document_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quality-document-pages.edit', compact('qualityDocumentPage'));
    }

    public function update(Request $request, QualityDocumentPage $qualityDocumentPage)
    {
        abort_if(Gate::denies('quality_document_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validated($request, $qualityDocumentPage->id);

        $qualityDocumentPage->update(collect($data)->except('pdf_items')->toArray());
        $qualityDocumentPage->update([
            'pdf_items' => $this->syncPdfItems($request, $qualityDocumentPage),
        ]);

        return redirect()
            ->route('admin.quality-document-pages.index')
            ->with('message', 'Quality document page updated successfully.');
    }

    public function destroy(QualityDocumentPage $qualityDocumentPage)
    {
        abort_if(Gate::denies('quality_document_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualityDocumentPage->delete();

        return back()->with('message', 'Quality document page deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('quality_document_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        QualityDocumentPage::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function validated(Request $request, $id = null): array
    {
        $data = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('quality_document_pages', 'slug')->ignore($id),
            ],

            'card_title' => 'nullable|string|max:255',

            'pdf_items'                => 'nullable|array',
            'pdf_items.*.title'        => 'nullable|string|max:255',
            'pdf_items.*.description'  => 'nullable|string|max:500',
            'pdf_items.*.media_id'     => 'nullable|integer|exists:media,id',
            'pdf_items.*.file'         => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:10240',
            'pdf_items.*.button_text'  => 'nullable|string|max:255',
            'pdf_items.*.icon'         => 'nullable|string|max:255',

            'status' => 'nullable|boolean',
        ]);

        $defaults = $this->pageDefaults($data['slug']);

        $data['status'] = $request->has('status');
        $data['card_title'] = ($data['card_title'] ?? null) ?: $defaults['card_title'];

        $data['pdf_items'] = $request->pdf_items ?? [];

        return $data;
    }

    private function pageDefaults(string $slug): array
    {
        return [
            'aqar' => [
                'css_prefix' => 'aqar',
                'card_title' => 'AQAR Reports',
                'official_button_text' => 'Official Page',
                'official_button_url' => 'https://rkdcollegepatna.org/AQAR.aspx',
            ],
            'naac' => [
                'css_prefix' => 'naacn',
                'card_title' => 'NAAC Documents',
                'official_button_text' => 'Official Page',
                'official_button_url' => '#',
            ],
            'iqac' => [
                'css_prefix' => 'iqac',
                'card_title' => 'IQAC Documents',
                'official_button_text' => 'Official Page',
                'official_button_url' => '#',
            ],
            'ict' => [
                'css_prefix' => 'ictdoc',
                'card_title' => 'ICT Documents',
                'official_button_text' => 'Official Page',
                'official_button_url' => '#',
            ],
            'ssr' => [
                'css_prefix' => 'ssr',
                'card_title' => 'SSR Documents',
                'official_button_text' => 'Official Page',
                'official_button_url' => '#',
            ],
        ][$slug] ?? [
            'css_prefix' => $slug,
            'card_title' => strtoupper($slug) . ' Documents',
            'official_button_text' => 'Official Page',
            'official_button_url' => '#',
        ];
    }

    private function syncPdfItems(Request $request, QualityDocumentPage $page): array
    {
        $items = [];
        $keptMediaIds = [];

        foreach ($request->pdf_items ?? [] as $index => $item) {
            $mediaId = $item['media_id'] ?? null;

            if ($mediaId && ! $this->mediaBelongsToPage((int) $mediaId, $page)) {
                $mediaId = null;
            }

            if ($request->hasFile("pdf_items.$index.file")) {
                if ($mediaId) {
                    Media::where('id', $mediaId)
                        ->where('model_type', QualityDocumentPage::class)
                        ->where('model_id', $page->id)
                        ->delete();
                }

                $media = $page
                    ->addMedia($request->file("pdf_items.$index.file"))
                    ->toMediaCollection('quality_documents');

                $mediaId = $media->id;
            }

            if (! filled($item['title'] ?? null) && ! filled($item['description'] ?? null) && ! $mediaId) {
                continue;
            }

            if ($mediaId) {
                $keptMediaIds[] = (int) $mediaId;
            }

            $items[] = [
                'title'       => $item['title'] ?? null,
                'description' => $item['description'] ?? null,
                'media_id'    => $mediaId ? (int) $mediaId : null,
                'button_text' => 'View PDF',
                'icon'        => 'bi bi-file-earmark-pdf-fill',
            ];
        }

        Media::where('model_type', QualityDocumentPage::class)
            ->where('model_id', $page->id)
            ->where('collection_name', 'quality_documents')
            ->when(
                count($keptMediaIds),
                fn ($query) => $query->whereNotIn('id', $keptMediaIds)
            )
            ->get()
            ->each
            ->delete();

        return $items;
    }

    private function mediaBelongsToPage(int $mediaId, QualityDocumentPage $page): bool
    {
        return Media::where('id', $mediaId)
            ->where('model_type', QualityDocumentPage::class)
            ->where('model_id', $page->id)
            ->where('collection_name', 'quality_documents')
            ->exists();
    }
}
