<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentStream;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepartmentStreamController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_stream_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $streams = DepartmentStream::withCount('departments')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.department-streams.index', compact('streams'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_stream_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-streams.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_stream_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'sort_order'   => 'nullable|integer|min:0',
            'faculty_label'=> 'nullable|string|max:255',
            'name'         => 'required|string|max:255',
            'icon_class'   => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'type_label'   => 'nullable|string|max:255',
            'status'       => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        DepartmentStream::create($data);

        return redirect()
            ->route('admin.department-streams.index')
            ->with('message', 'Department stream created successfully.');
    }

    public function show(DepartmentStream $departmentStream)
    {
        abort_if(Gate::denies('department_stream_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentStream->load('departments');

        return view('admin.department-streams.show', compact('departmentStream'));
    }

    public function edit(DepartmentStream $departmentStream)
    {
        abort_if(Gate::denies('department_stream_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.department-streams.edit', compact('departmentStream'));
    }

    public function update(Request $request, DepartmentStream $departmentStream)
    {
        abort_if(Gate::denies('department_stream_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'sort_order'   => 'nullable|integer|min:0',
            'faculty_label'=> 'nullable|string|max:255',
            'name'         => 'required|string|max:255',
            'icon_class'   => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'type_label'   => 'nullable|string|max:255',
            'status'       => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $departmentStream->update($data);

        return redirect()
            ->route('admin.department-streams.index')
            ->with('message', 'Department stream updated successfully.');
    }

    public function destroy(DepartmentStream $departmentStream)
    {
        abort_if(Gate::denies('department_stream_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departmentStream->delete();

        return back()->with('message', 'Department stream deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_stream_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DepartmentStream::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}