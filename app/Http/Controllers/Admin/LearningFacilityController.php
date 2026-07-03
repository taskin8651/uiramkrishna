<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningFacility;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class LearningFacilityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('learning_facility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = LearningFacility::ordered()->get();

        return view('admin.learning-facilities.index', compact('facilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('learning_facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.learning-facilities.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('learning_facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validated($request);

        $facility = LearningFacility::create(collect($data)->except('main_image')->toArray());

        if ($request->hasFile('main_image')) {
            $facility
                ->addMediaFromRequest('main_image')
                ->toMediaCollection('main_image');
        }

        return redirect()
            ->route('admin.learning-facilities.index')
            ->with('message', 'Learning facility created successfully.');
    }

    public function edit(LearningFacility $learningFacility)
    {
        abort_if(Gate::denies('learning_facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.learning-facilities.edit', compact('learningFacility'));
    }

    public function update(Request $request, LearningFacility $learningFacility)
    {
        abort_if(Gate::denies('learning_facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = $this->validated($request, $learningFacility->id);

        $learningFacility->update(collect($data)->except('main_image')->toArray());

        if ($request->hasFile('main_image')) {
            $learningFacility->clearMediaCollection('main_image');

            $learningFacility
                ->addMediaFromRequest('main_image')
                ->toMediaCollection('main_image');
        }

        return redirect()
            ->route('admin.learning-facilities.index')
            ->with('message', 'Learning facility updated successfully.');
    }

    public function destroy(LearningFacility $learningFacility)
    {
        abort_if(Gate::denies('learning_facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $learningFacility->delete();

        return back()->with('message', 'Learning facility deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('learning_facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        LearningFacility::whereIn('id', request('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function validated(Request $request, $id = null): array
    {
        $data = $request->validate([
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('learning_facilities', 'slug')->ignore($id),
            ],

            'css_prefix'       => 'nullable|string|max:50',

            'hero_icon'        => 'nullable|string|max:255',
            'hero_kicker'      => 'nullable|string|max:255',
            'hero_title'       => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',

            'image_badge'       => 'nullable|string|max:255',
            'image_alt'         => 'nullable|string|max:255',
            'image_title'       => 'nullable|string|max:255',
            'image_description' => 'nullable|string',

            'panel_subtitle'   => 'nullable|string|max:255',
            'panel_title'      => 'nullable|string|max:255',
            'lead_description' => 'nullable|string',

            'button_text'     => 'nullable|string|max:255',
            'button_url'      => 'nullable|string|max:500',
            'button_external' => 'nullable|boolean',

            'features'                 => 'nullable|array',
            'features.*.icon'          => 'nullable|string|max:255',
            'features.*.title'         => 'nullable|string|max:255',
            'features.*.description'   => 'nullable|string|max:500',

            'gallery_label'       => 'nullable|string|max:255',
            'gallery_title'       => 'nullable|string|max:255',
            'gallery_description' => 'nullable|string',

            'gallery_items'               => 'nullable|array',
            'gallery_items.*.image_url'   => 'nullable|string|max:1000',
            'gallery_items.*.image_alt'   => 'nullable|string|max:255',
            'gallery_items.*.title'       => 'nullable|string|max:255',
            'gallery_items.*.size_class'  => 'nullable|string|max:50',

            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'     => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');
        $data['button_external'] = $request->has('button_external');

        $data['features'] = collect($request->features ?? [])
            ->filter(function ($item) {
                return filled($item['title'] ?? null) || filled($item['description'] ?? null);
            })
            ->values()
            ->all();

        $data['gallery_items'] = collect($request->gallery_items ?? [])
            ->filter(function ($item) {
                return filled($item['image_url'] ?? null) || filled($item['title'] ?? null);
            })
            ->values()
            ->all();

        return $data;
    }
}