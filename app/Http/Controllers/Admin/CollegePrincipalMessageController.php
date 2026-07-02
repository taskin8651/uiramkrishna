<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegePrincipalMessage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CollegePrincipalMessageController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('college_principal_message_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principal = $this->getPrincipalMessage();

        return view('admin.college-principal-message.edit', compact('principal'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('college_principal_message_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principal = $this->getPrincipalMessage();

        $request->validate([
            'principal_name'          => 'nullable|string|max:255',
            'principal_label'         => 'nullable|string|max:255',
            'principal_designation'   => 'nullable|string',

            'profile_points'          => 'nullable|array',
            'profile_points.*.title'  => 'nullable|string|max:255',

            'desk_label'              => 'nullable|string|max:255',
            'greeting_title'          => 'nullable|string|max:255',

            'message_paragraphs'      => 'nullable|array',
            'message_paragraphs.*'    => 'nullable|string',

            'highlight_title'         => 'nullable|string|max:255',
            'highlight_description'   => 'nullable|string',

            'signature_name'          => 'nullable|string|max:255',
            'signature_designation'   => 'nullable|string|max:255',
            'button_text'             => 'nullable|string|max:255',
            'button_url'              => 'nullable|string|max:255',

            'principal_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'                  => 'nullable|boolean',
        ]);

        $data = $request->except([
            '_token',
            '_method',
            'principal_image',
        ]);

        $data['status'] = $request->has('status');

        $data['profile_points'] = collect($request->profile_points ?? [])
            ->filter(fn ($item) => filled($item['title'] ?? null))
            ->values()
            ->all();

        $data['message_paragraphs'] = array_values(array_filter($request->message_paragraphs ?? []));

        $principal->update($data);

        if ($request->hasFile('principal_image')) {
            $principal->clearMediaCollection('principal_image');
            $principal->addMediaFromRequest('principal_image')->toMediaCollection('principal_image');
        }

        return redirect()
            ->route('admin.college-principal-message.edit')
            ->with('message', 'Principal message updated successfully.');
    }

    private function getPrincipalMessage()
    {
        $principal = CollegePrincipalMessage::first();

        if (!$principal) {
            $principal = CollegePrincipalMessage::create($this->defaultData());
        }

        return $principal;
    }

    private function defaultData(): array
    {
        return [
            'principal_name' => 'Prof. (Dr.) Diwakar Prasad',
            'principal_label' => 'Principal',
            'principal_designation' => 'Principal, Ram Krishna Dwarika College,<br>Lohia Nagar, Patna - 20',

            'profile_points' => [
                ['title' => 'Academic Leadership'],
                ['title' => 'Student Empowerment'],
            ],

            'desk_label' => 'Principal Desk',
            'greeting_title' => 'Dear Students,',

            'message_paragraphs' => [
                'Welcome to Ramkrishna Dwarika Mahavidyalaya. Our institution is driven by a quest for excellence articulated in the vision, mission, goals and core values.',
                'Our institution caters to a large urban and sub-urban population belonging to different socio-economic backgrounds to get enrolled and pursue their dreams of a successful career.',
                'We aim to empower you to reach your full potential. Embrace opportunities for personal and professional growth, and be proactive in seeking out new challenges.',
                'Together, let us strive to achieve our collective goals, uphold the values of our college, and create an enriching and fulfilling educational experience. Wishing you all a successful and inspiring academic year ahead.',
            ],

            'highlight_title' => 'Committed to NEP-2020',
            'highlight_description' => 'For holistic development of students, the college is committed to implement National Education Policy - 2020 in letter and spirit.',

            'signature_name' => 'Prof. (Dr.) Diwakar Prasad',
            'signature_designation' => 'Principal, R.K.D College, Lohia Nagar Patna-20',

            'button_text' => 'Contact Office',
            'button_url' => 'contact.html',

            'status' => true,
        ];
    }
}