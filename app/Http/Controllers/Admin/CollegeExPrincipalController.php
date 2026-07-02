<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeExPrincipal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CollegeExPrincipalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('college_ex_principal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principals = CollegeExPrincipal::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.college-ex-principals.index', compact('principals'));
    }

    public function create()
    {
        abort_if(Gate::denies('college_ex_principal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-ex-principals.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('college_ex_principal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'sort_order' => 'nullable|integer|min:0',
            'name'       => 'required|string|max:255',
            'post_type'  => 'required|in:principal,incharge',
            'period'     => 'required|string|max:255',
            'is_current' => 'nullable|boolean',
            'status'     => 'nullable|boolean',
        ]);

        $data['is_current'] = $request->has('is_current');
        $data['status'] = $request->has('status');

        if ($data['is_current']) {
            CollegeExPrincipal::where('is_current', true)->update(['is_current' => false]);
        }

        CollegeExPrincipal::create($data);

        return redirect()
            ->route('admin.college-ex-principals.index')
            ->with('message', 'Principal record created successfully.');
    }

    public function edit(CollegeExPrincipal $collegeExPrincipal)
    {
        abort_if(Gate::denies('college_ex_principal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.college-ex-principals.edit', compact('collegeExPrincipal'));
    }

    public function update(Request $request, CollegeExPrincipal $collegeExPrincipal)
    {
        abort_if(Gate::denies('college_ex_principal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'sort_order' => 'nullable|integer|min:0',
            'name'       => 'required|string|max:255',
            'post_type'  => 'required|in:principal,incharge',
            'period'     => 'required|string|max:255',
            'is_current' => 'nullable|boolean',
            'status'     => 'nullable|boolean',
        ]);

        $data['is_current'] = $request->has('is_current');
        $data['status'] = $request->has('status');

        if ($data['is_current']) {
            CollegeExPrincipal::where('id', '!=', $collegeExPrincipal->id)
                ->where('is_current', true)
                ->update(['is_current' => false]);
        }

        $collegeExPrincipal->update($data);

        return redirect()
            ->route('admin.college-ex-principals.index')
            ->with('message', 'Principal record updated successfully.');
    }

    public function destroy(CollegeExPrincipal $collegeExPrincipal)
    {
        abort_if(Gate::denies('college_ex_principal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $collegeExPrincipal->delete();

        return back()->with('message', 'Principal record deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('college_ex_principal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        CollegeExPrincipal::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}