<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollegeAboutPage;
use Illuminate\Http\Request;

class CollegeAboutPageController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('college_about_page_access'), 403);
        $about = CollegeAboutPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        return view('admin.college-about-page.edit', compact('about'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('college_about_page_edit'), 403);
        $about = CollegeAboutPage::firstOrCreate(
            ['id' => 1],
            $this->defaultData()
        );

        $request->validate([
            'about_title'       => 'nullable|string|max:255',
            'about_highlight'   => 'nullable|string|max:255',
            'about_lead'        => 'nullable|string',
            'about_description' => 'nullable|string',
            'info_title'        => 'nullable|string|max:255',
            'info_description'  => 'nullable|string',

            'points'            => 'nullable|array',
            'points.*'          => 'nullable|string|max:255',

            'media_title'       => 'nullable|string|max:255',
            'stats'             => 'nullable|array',
            'stats.*.value'     => 'nullable|string|max:100',
            'stats.*.label'     => 'nullable|string|max:100',

            'history_title'       => 'nullable|string|max:255',
            'history_description' => 'nullable|string',
            'history_items'       => 'nullable|array',
            'history_items.*.year' => 'nullable|string|max:100',
            'history_items.*.text' => 'nullable|string|max:255',

            'profile_title'       => 'nullable|string|max:255',
            'profile_description' => 'nullable|string',
            'profile_tags'        => 'nullable|array',
            'profile_tags.*'      => 'nullable|string|max:100',

            'vm_title'            => 'nullable|string|max:255',
            'vm_description'      => 'nullable|string',
            'vision_title'        => 'nullable|string|max:255',
            'vision_description'  => 'nullable|string',

            'missions'              => 'nullable|array',
            'missions.*.title'      => 'nullable|string|max:255',
            'missions.*.description'=> 'nullable|string|max:255',

            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status'      => 'nullable|boolean',
        ]);

        $data = $request->except([
            '_token',
            '_method',
            'about_image',
        ]);

        $data['status'] = $request->has('status');

        $data['points'] = array_values(array_filter($request->points ?? []));

        $data['stats'] = collect($request->stats ?? [])
            ->filter(fn ($item) => filled($item['value'] ?? null) || filled($item['label'] ?? null))
            ->values()
            ->all();

        $data['history_items'] = collect($request->history_items ?? [])
            ->filter(fn ($item) => filled($item['year'] ?? null) || filled($item['text'] ?? null))
            ->values()
            ->all();

        $data['profile_tags'] = array_values(array_filter($request->profile_tags ?? []));

        $data['missions'] = collect($request->missions ?? [])
            ->filter(fn ($item) => filled($item['title'] ?? null) || filled($item['description'] ?? null))
            ->values()
            ->all();

        $about->update($data);

        if ($request->hasFile('about_image')) {
            $about->clearMediaCollection('about_image');
            $about->addMediaFromRequest('about_image')->toMediaCollection('about_image');
        }

        return redirect()
            ->route('admin.college-about-page.edit')
            ->with('message', 'About page content updated successfully.');
    }

    private function defaultData(): array
    {
        return [
            'about_title' => 'A respected academic institution',
            'about_highlight' => 'serving Patna since 1975.',
            'about_lead' => 'Ram Krishna Dwarika College was established in 1975 with the magnanimity of Late Dwarika Mahto. After initial legal challenges, the institution shifted to its present location with the generous donation of land by Late Sri Shiv Narayan Rai.',
            'about_description' => 'The foundation of the college was laid by Late Rao Birendra Singh, the then Chief Minister of Haryana, on 7th March 1975 at Punaichak. The college later moved to its present campus at Lohia Nagar, Kankarbagh, Patna.',
            'info_title' => 'Constituent Unit of Patliputra University',
            'info_description' => 'The college became a constituent unit of Magadh University, Bodh Gaya in 1986. Presently, it is a constituent unit of Patliputra University, Patna.',
            'points' => [
                'Established in 1975',
                'PPU Constituent Unit',
                'Humanities, Science & Commerce',
                'UG, PG & Vocational Courses',
            ],
            'media_title' => 'Focused on student-centric learning and institutional growth.',
            'stats' => [
                ['value' => '1975', 'label' => 'Established'],
                ['value' => '20+', 'label' => 'UG Departments'],
                ['value' => '5', 'label' => 'PG Departments'],
                ['value' => '7000+', 'label' => 'Students'],
            ],
            'history_title' => 'College History',
            'history_description' => 'From its foundation in 1975 to its present academic presence, the institution has continuously worked to provide accessible higher education to students from urban and sub-urban backgrounds.',
            'history_items' => [
                ['year' => '1975', 'text' => 'College established with a vision for higher education.'],
                ['year' => '1986', 'text' => 'Became constituent unit of Magadh University, Bodh Gaya.'],
                ['year' => 'Present', 'text' => 'Constituent unit of Patliputra University, Patna.'],
            ],
            'profile_title' => 'Teaching, Learning & Development',
            'profile_description' => 'The college has distinguished faculty members in Humanities, Social Science, Science and Commerce. It is known for academic results, student support and balanced development through academic and co-curricular activities.',
            'profile_tags' => [
                'Humanities',
                'Science',
                'Commerce',
                'Vocational',
                'NCC / NSS',
                'Sports & Culture',
            ],
            'vm_title' => 'Academic Vision and Institutional Mission',
            'vm_description' => 'RKD College is committed to academic excellence, holistic development, technology-enabled learning and student progression.',
            'vision_title' => 'Aligned with NEP-2020',
            'vision_description' => 'To integrate the college both in theory and practice with the National Education Policy - 2020, promoting innovative teaching, experiential learning, advanced evaluation and technology-enabled education.',
            'missions' => [
                ['title' => 'Innovative Pedagogy', 'description' => 'Inclusion of innovative and technology-based teaching methods.'],
                ['title' => 'Experiential Learning', 'description' => 'Focus on activity-based learning and practical academic exposure.'],
                ['title' => 'Entrepreneurship Skills', 'description' => 'Building entrepreneurship skills among students and faculty.'],
                ['title' => 'Research Culture', 'description' => 'Development of research facilities and academic research culture.'],
                ['title' => 'Holistic Development', 'description' => 'Encouraging all-round development of students.'],
                ['title' => 'Mentorship & Networking', 'description' => 'Mentorship, competitive exam support and academic networking.'],
            ],
            'status' => true,
        ];
    }
}