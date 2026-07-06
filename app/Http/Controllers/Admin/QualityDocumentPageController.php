<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QualityDocumentPage;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

        QualityDocumentPage::create($data);

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

        $qualityDocumentPage->update($data);

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

            'css_prefix'    => 'nullable|string|max:50',
            'template_type' => 'required|in:grid,single_pdf',

            'subtitle_icon' => 'nullable|string|max:255',
            'subtitle_text' => 'nullable|string|max:255',
            'card_title'    => 'nullable|string|max:255',

            'official_button_text' => 'nullable|string|max:255',
            'official_button_url'  => 'nullable|string|max:1000',

            'pdf_items'                => 'nullable|array',
            'pdf_items.*.title'        => 'nullable|string|max:255',
            'pdf_items.*.description'  => 'nullable|string|max:500',
            'pdf_items.*.url'          => 'nullable|string|max:1000',
            'pdf_items.*.button_text'  => 'nullable|string|max:255',
            'pdf_items.*.icon'         => 'nullable|string|max:255',

            'meta_items'              => 'nullable|array',
            'meta_items.*.icon'       => 'nullable|string|max:255',
            'meta_items.*.label'      => 'nullable|string|max:255',
            'meta_items.*.value'      => 'nullable|string|max:255',

            'preview_enabled'       => 'nullable|boolean',
            'preview_subtitle_icon' => 'nullable|string|max:255',
            'preview_subtitle_text' => 'nullable|string|max:255',
            'preview_title'         => 'nullable|string|max:255',
            'preview_button_text'   => 'nullable|string|max:255',
            'preview_pdf_url'       => 'nullable|string|max:1000',
            'preview_iframe_title'  => 'nullable|string|max:255',

            'download_button_text'  => 'nullable|string|max:255',

            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');
        $data['preview_enabled'] = $request->has('preview_enabled');

        $data['pdf_items'] = collect($request->pdf_items ?? [])
            ->filter(function ($item) {
                return filled($item['title'] ?? null)
                    || filled($item['description'] ?? null)
                    || filled($item['url'] ?? null);
            })
            ->values()
            ->all();

        $data['meta_items'] = collect($request->meta_items ?? [])
            ->filter(function ($item) {
                return filled($item['label'] ?? null)
                    || filled($item['value'] ?? null);
            })
            ->values()
            ->all();

        return $data;
    }
}