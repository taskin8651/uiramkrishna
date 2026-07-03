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
            'description'         => 'nullable|string',
            'year'                => 'nullable|string|max:50',
            'is_featured'         => 'nullable|boolean',
            'download_file'       => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,webp,zip|max:10240',
            'status'              => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['status'] = $request->has('status');

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
            'description'         => 'nullable|string',
            'year'                => 'nullable|string|max:50',
            'is_featured'         => 'nullable|boolean',
            'download_file'       => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpg,jpeg,png,webp,zip|max:10240',
            'status'              => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->has('is_featured');
        $data['status'] = $request->has('status');

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
}