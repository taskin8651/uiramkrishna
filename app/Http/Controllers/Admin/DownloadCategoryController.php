<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class DownloadCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('download_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = DownloadCategory::withCount('downloads')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.download-categories.index', compact('categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('download_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.download-categories.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('download_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'sort_order' => 'nullable|integer|min:0',
            'name'       => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255|unique:download_categories,slug',
            'status'     => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        DownloadCategory::create($data);

        return redirect()
            ->route('admin.download-categories.index')
            ->with('message', 'Download category created successfully.');
    }

    public function show(DownloadCategory $downloadCategory)
    {
        abort_if(Gate::denies('download_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $downloadCategory->load('downloads');

        return view('admin.download-categories.show', compact('downloadCategory'));
    }

    public function edit(DownloadCategory $downloadCategory)
    {
        abort_if(Gate::denies('download_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.download-categories.edit', compact('downloadCategory'));
    }

    public function update(Request $request, DownloadCategory $downloadCategory)
    {
        abort_if(Gate::denies('download_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'sort_order' => 'nullable|integer|min:0',
            'name'       => 'required|string|max:255',
            'slug'       => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('download_categories', 'slug')->ignore($downloadCategory->id),
            ],
            'status'     => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $downloadCategory->update($data);

        return redirect()
            ->route('admin.download-categories.index')
            ->with('message', 'Download category updated successfully.');
    }

    public function destroy(DownloadCategory $downloadCategory)
    {
        abort_if(Gate::denies('download_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $downloadCategory->delete();

        return back()->with('message', 'Download category deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('download_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DownloadCategory::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}