<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampusFacility;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class CampusFacilityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('campus_facility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = CampusFacility::ordered()->get();

        return view('admin.campus-facilities.index', compact('facilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('campus_facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.campus-facilities.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('campus_facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'slug'                         => 'required|string|max:255|unique:campus_facilities,slug',
            'css_prefix'                   => 'nullable|string|max:50',

            'image_alt'                    => 'nullable|string|max:255',
            'image_title'                  => 'nullable|string|max:255',
            'image_description'            => 'nullable|string',

            'panel_title'                  => 'nullable|string|max:255',
            'lead_description'             => 'nullable|string',

            'features'                     => 'nullable|array',
            'features.*.icon'              => 'nullable|string|max:255',
            'features.*.title'             => 'nullable|string|max:255',
            'features.*.description'       => 'nullable|string|max:500',

            'facility_image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'                       => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $data['features'] = collect($request->features ?? [])
            ->filter(function ($item) {
                return filled($item['title'] ?? null) || filled($item['description'] ?? null);
            })
            ->values()
            ->all();

        $facility = CampusFacility::create(collect($data)->except('facility_image')->toArray());

        if ($request->hasFile('facility_image')) {
            $facility
                ->addMediaFromRequest('facility_image')
                ->toMediaCollection('facility_image');
        }

        return redirect()
            ->route('admin.campus-facilities.index')
            ->with('message', 'Campus facility created successfully.');
    }

    public function edit(CampusFacility $campusFacility)
    {
        abort_if(Gate::denies('campus_facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.campus-facilities.edit', compact('campusFacility'));
    }

    public function update(Request $request, CampusFacility $campusFacility)
    {
        abort_if(Gate::denies('campus_facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $request->validate([
            'slug'                         => [
                'required',
                'string',
                'max:255',
                Rule::unique('campus_facilities', 'slug')->ignore($campusFacility->id),
            ],
            'css_prefix'                   => 'nullable|string|max:50',

            'image_alt'                    => 'nullable|string|max:255',
            'image_title'                  => 'nullable|string|max:255',
            'image_description'            => 'nullable|string',

            'panel_title'                  => 'nullable|string|max:255',
            'lead_description'             => 'nullable|string',

            'features'                     => 'nullable|array',
            'features.*.icon'              => 'nullable|string|max:255',
            'features.*.title'             => 'nullable|string|max:255',
            'features.*.description'       => 'nullable|string|max:500',

            'facility_image'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'                       => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $data['features'] = collect($request->features ?? [])
            ->filter(function ($item) {
                return filled($item['title'] ?? null) || filled($item['description'] ?? null);
            })
            ->values()
            ->all();

        $campusFacility->update(collect($data)->except('facility_image')->toArray());

        if ($request->hasFile('facility_image')) {
            $campusFacility->clearMediaCollection('facility_image');

            $campusFacility
                ->addMediaFromRequest('facility_image')
                ->toMediaCollection('facility_image');
        }

        return redirect()
            ->route('admin.campus-facilities.index')
            ->with('message', 'Campus facility updated successfully.');
    }

    public function destroy(CampusFacility $campusFacility)
    {
        abort_if(Gate::denies('campus_facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campusFacility->delete();

        return back()->with('message', 'Campus facility deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('campus_facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        CampusFacility::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}