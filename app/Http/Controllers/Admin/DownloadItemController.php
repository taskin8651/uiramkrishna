<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use App\Models\DownloadItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DownloadItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('download_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $downloadItems = DownloadItem::with('category')
            ->orderBy('download_category_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.download-items.index', compact('downloadItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('download_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = DownloadCategory::orderBy('sort_order')->orderBy('id')->pluck('name', 'id');

        return view('admin.download-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('download_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'download_category_id' => 'nullable|exists:download_categories,id',
            'sort_order'          => 'nullable|integer|min:0',
            'title'               => 'required|string|max:255',
            'slug'                => 'nullable|string|max:255',
            'description'         => 'nullable|string',
            'kicker_text'         => 'nullable|string|max:255',
            'hero_title'          => 'nullable|string|max:255',
            'hero_description'    => 'nullable|string',
            'year'                => 'nullable|string|max:50',
            'document_code'       => 'nullable|string|max:255',
            'authority'           => 'nullable|string|max:255',
            'document_date'       => 'nullable|string|max:255',
            'session_reference'   => 'nullable|string|max:255',
            'class_start'         => 'nullable|string|max:255',
            'summary_items'       => 'nullable|array',
            'summary_items.*.label' => 'nullable|string|max:255',
            'summary_items.*.value' => 'nullable|string|max:255',
            'info_cards'          => 'nullable|array',
            'info_cards.*.icon'   => 'nullable|string|max:255',
            'info_cards.*.title'  => 'nullable|string|max:255',
            'info_cards.*.description' => 'nullable|string',
            'table_rows'          => 'nullable|array',
            'table_rows.*.title'  => 'nullable|string|max:255',
            'table_rows.*.details' => 'nullable|string',
            'table_rows.*.button' => 'nullable|string|max:255',
            'external_url'        => 'nullable|url|max:2048',
            'is_featured'         => 'nullable|boolean',
            'download_file'       => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,webp,zip|max:10240',
            'status'              => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['status'] = $request->has('status');
        $data = $this->cleanRepeaterData($data);

        $downloadItem = DownloadItem::create(collect($data)->except('download_file')->toArray());

        if ($request->hasFile('download_file')) {
            $downloadItem
                ->addMediaFromRequest('download_file')
                ->toMediaCollection('download_file');
        }

        return redirect()
            ->route('admin.download-items.index')
            ->with('message', 'Download item created successfully.');
    }

    public function show(DownloadItem $downloadItem)
    {
        abort_if(Gate::denies('download_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $downloadItem->load('category');

        return view('admin.download-items.show', compact('downloadItem'));
    }

    public function edit(DownloadItem $downloadItem)
    {
        abort_if(Gate::denies('download_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = DownloadCategory::orderBy('sort_order')->orderBy('id')->pluck('name', 'id');

        return view('admin.download-items.edit', compact('downloadItem', 'categories'));
    }

    public function update(Request $request, DownloadItem $downloadItem)
    {
        abort_if(Gate::denies('download_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'download_category_id' => 'nullable|exists:download_categories,id',
            'sort_order'          => 'nullable|integer|min:0',
            'title'               => 'required|string|max:255',
            'slug'                => 'nullable|string|max:255',
            'description'         => 'nullable|string',
            'kicker_text'         => 'nullable|string|max:255',
            'hero_title'          => 'nullable|string|max:255',
            'hero_description'    => 'nullable|string',
            'year'                => 'nullable|string|max:50',
            'document_code'       => 'nullable|string|max:255',
            'authority'           => 'nullable|string|max:255',
            'document_date'       => 'nullable|string|max:255',
            'session_reference'   => 'nullable|string|max:255',
            'class_start'         => 'nullable|string|max:255',
            'summary_items'       => 'nullable|array',
            'summary_items.*.label' => 'nullable|string|max:255',
            'summary_items.*.value' => 'nullable|string|max:255',
            'info_cards'          => 'nullable|array',
            'info_cards.*.icon'   => 'nullable|string|max:255',
            'info_cards.*.title'  => 'nullable|string|max:255',
            'info_cards.*.description' => 'nullable|string',
            'table_rows'          => 'nullable|array',
            'table_rows.*.title'  => 'nullable|string|max:255',
            'table_rows.*.details' => 'nullable|string',
            'table_rows.*.button' => 'nullable|string|max:255',
            'external_url'        => 'nullable|url|max:2048',
            'is_featured'         => 'nullable|boolean',
            'download_file'       => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,webp,zip|max:10240',
            'status'              => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['status'] = $request->has('status');
        $data = $this->cleanRepeaterData($data);

        $downloadItem->update(collect($data)->except('download_file')->toArray());

        if ($request->hasFile('download_file')) {
            $downloadItem->clearMediaCollection('download_file');

            $downloadItem
                ->addMediaFromRequest('download_file')
                ->toMediaCollection('download_file');
        }

        return redirect()
            ->route('admin.download-items.index')
            ->with('message', 'Download item updated successfully.');
    }

    public function destroy(DownloadItem $downloadItem)
    {
        abort_if(Gate::denies('download_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $downloadItem->delete();

        return back()->with('message', 'Download item deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('download_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DownloadItem::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function cleanRepeaterData(array $data): array
    {
        foreach (['summary_items', 'info_cards', 'table_rows'] as $field) {
            $data[$field] = collect($data[$field] ?? [])
                ->filter(function ($row) {
                    return collect($row)->filter(fn ($value) => filled($value))->isNotEmpty();
                })
                ->values()
                ->all();
        }

        return $data;
    }
}
