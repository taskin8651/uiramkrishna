<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\StaffMember;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffMemberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffMembers = StaffMember::with('department.stream')
            ->orderBy('department_id')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.staff-members.index', compact('staffMembers'));
    }

    public function create()
    {
        abort_if(Gate::denies('staff_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::with('stream')
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($department) {
                $label = $department->name;

                if ($department->stream) {
                    $label .= ' (' . $department->stream->name . ')';
                }

                return [$department->id => $label];
            });

        return view('admin.staff-members.create', compact('departments'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('staff_member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'nullable|exists:departments,id',
            'sort_order'   => 'nullable|integer|min:0',
            'name'         => 'required|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'qualification'=> 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'nullable|string|max:50',
            'bio'          => 'nullable|string',
            'staff_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'       => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $staffMember = StaffMember::create(collect($data)->except('staff_image')->toArray());

        if ($request->hasFile('staff_image')) {
            $staffMember
                ->addMediaFromRequest('staff_image')
                ->toMediaCollection('staff_image');
        }

        return redirect()
            ->route('admin.staff-members.index')
            ->with('message', 'Staff member created successfully.');
    }

    public function show(StaffMember $staffMember)
    {
        abort_if(Gate::denies('staff_member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffMember->load('department.stream');

        return view('admin.staff-members.show', compact('staffMember'));
    }

    public function edit(StaffMember $staffMember)
    {
        abort_if(Gate::denies('staff_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $departments = Department::with('stream')
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($department) {
                $label = $department->name;

                if ($department->stream) {
                    $label .= ' (' . $department->stream->name . ')';
                }

                return [$department->id => $label];
            });

        return view('admin.staff-members.edit', compact('staffMember', 'departments'));
    }

    public function update(Request $request, StaffMember $staffMember)
    {
        abort_if(Gate::denies('staff_member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'department_id' => 'nullable|exists:departments,id',
            'sort_order'   => 'nullable|integer|min:0',
            'name'         => 'required|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'qualification'=> 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'phone'        => 'nullable|string|max:50',
            'bio'          => 'nullable|string',
            'staff_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'       => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $staffMember->update(collect($data)->except('staff_image')->toArray());

        if ($request->hasFile('staff_image')) {
            $staffMember->clearMediaCollection('staff_image');

            $staffMember
                ->addMediaFromRequest('staff_image')
                ->toMediaCollection('staff_image');
        }

        return redirect()
            ->route('admin.staff-members.index')
            ->with('message', 'Staff member updated successfully.');
    }

    public function destroy(StaffMember $staffMember)
    {
        abort_if(Gate::denies('staff_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffMember->delete();

        return back()->with('message', 'Staff member deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('staff_member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        StaffMember::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}