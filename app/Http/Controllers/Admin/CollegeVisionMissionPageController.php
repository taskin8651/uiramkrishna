<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeVisionMissionPage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CollegeVisionMissionPageController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('college_vision_mission_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visionMission = $this->getVisionMissionPage();

        return view('admin.college-vision-mission-page.edit', compact('visionMission'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('college_vision_mission_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visionMission = $this->getVisionMissionPage();

        $request->validate([
            'vision_title'       => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',
            'vision_highlight'   => 'nullable|string',
            'vision_points'      => 'nullable|array',
            'vision_points.*'    => 'nullable|string|max:255',

            'mission_title'       => 'nullable|string|max:255',
            'mission_description' => 'nullable|string',
            'mission_highlight'   => 'nullable|string',
            'mission_points'      => 'nullable|array',
            'mission_points.*'    => 'nullable|string|max:255',

            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['_token', '_method']);

        $data['status'] = $request->has('status');
        $data['vision_points'] = array_values(array_filter($request->vision_points ?? []));
        $data['mission_points'] = array_values(array_filter($request->mission_points ?? []));

        $visionMission->update($data);

        return redirect()
            ->route('admin.college-vision-mission-page.edit')
            ->with('message', 'Vision & Mission content updated successfully.');
    }

    private function getVisionMissionPage()
    {
        $page = CollegeVisionMissionPage::first();

        if (!$page) {
            $page = CollegeVisionMissionPage::create($this->defaultData());
        }

        return $page;
    }

    private function defaultData(): array
    {
        return [
            'vision_title' => 'NEP-2020 aligned academic development.',
            'vision_description' => 'To integrate the college both in theory and practice with the National Education Policy - 2020 and promote a modern academic environment for students.',
            'vision_highlight' => 'NEP-2020 emphasizes experiential learning, innovative teaching, advanced evaluation techniques, teacher training and technology-enabled education.',
            'vision_points' => [
                'Experiential learning',
                'Innovative teaching',
                'Advanced evaluation',
                'Technology-enabled education',
            ],

            'mission_title' => 'Quality education with meaningful exposure.',
            'mission_description' => 'Our mission is to make R.K.D. College, Patna better in terms of quality education and exposure to students, and to equip them to cope with the latest requirements of the present world scenario.',
            'mission_highlight' => 'The college is committed to meaningful education through innovative techniques and practices with values of integrity, respect and service.',
            'mission_points' => [
                'Quality education',
                'Student exposure',
                'Innovative practices',
                'Integrity, respect & service',
            ],

            'status' => true,
        ];
    }
}