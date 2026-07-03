<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentStream;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class DepartmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::with('stream')
            ->orderBy('department_stream_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $streams = DepartmentStream::orderBy('sort_order')->orderBy('id')->pluck('name', 'id');

        return view('admin.departments.create', compact('streams'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_stream_id' => 'required|exists:department_streams,id',
            'sort_order'          => 'nullable|integer|min:0',
            'name'                => 'required|string|max:255',
            'slug'                => 'nullable|string|max:255|unique:departments,slug',
            'link_url'            => 'nullable|string|max:255',
            'status'              => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        Department::create($data);

        return redirect()
            ->route('admin.departments.index')
            ->with('message', 'Department created successfully.');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->load(['stream', 'staffMembers']);

        return view('admin.departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $streams = DepartmentStream::orderBy('sort_order')->orderBy('id')->pluck('name', 'id');

        return view('admin.departments.edit', compact('department', 'streams'));
    }

    public function update(Request $request, Department $department)
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_stream_id' => 'required|exists:department_streams,id',
            'sort_order'          => 'nullable|integer|min:0',
            'name'                => 'required|string|max:255',
            'slug'                => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('departments', 'slug')->ignore($department->id),
            ],
            'link_url'            => 'nullable|string|max:255',
            'status'              => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $department->update($data);

        return redirect()
            ->route('admin.departments.index')
            ->with('message', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $department->delete();

        return back()->with('message', 'Department deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('department_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Department::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}