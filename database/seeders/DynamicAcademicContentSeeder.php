<?php

namespace Database\Seeders;

use App\Models\AcademicInfoPage;
use App\Models\DownloadCategory;
use App\Models\DownloadItem;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DynamicAcademicContentSeeder extends Seeder
{
    public function run()
    {
        $this->seedPermissions();
        $this->seedAcademicInfoPages();
        $this->seedDownloads();
    }

    private function seedPermissions(): void
    {
        $permissions = [
            'academic_info_page_access',
            'academic_info_page_create',
            'academic_info_page_edit',
            'academic_info_page_delete',
            'academic_course_page_access',
            'academic_course_page_create',
            'academic_course_page_edit',
            'academic_course_page_delete',
            'academic_course_access',
            'academic_course_create',
            'academic_course_edit',
            'academic_course_delete',
            'academic_help_card_access',
            'academic_help_card_create',
            'academic_help_card_edit',
            'academic_help_card_delete',
            'department_stream_access',
            'department_stream_create',
            'department_stream_edit',
            'department_stream_delete',
            'department_access',
            'department_create',
            'department_edit',
            'department_delete',
            'staff_member_access',
            'staff_member_create',
            'staff_member_edit',
            'staff_member_delete',
            'download_category_access',
            'download_category_create',
            'download_category_edit',
            'download_category_delete',
            'download_item_access',
            'download_item_create',
            'download_item_edit',
            'download_item_delete',
        ];

        $permissionIds = collect($permissions)
            ->map(fn ($title) => Permission::firstOrCreate(['title' => $title])->id)
            ->all();

        $adminRole = Role::find(1);

        if ($adminRole) {
            $adminRole->permissions()->syncWithoutDetaching($permissionIds);
        }
    }

    private function seedAcademicInfoPages(): void
    {
        AcademicInfoPage::updateOrCreate(
            ['slug' => 'po-pso'],
            [
                'kicker_text' => 'Academic Outcomes',
                'hero_title' => 'PO & PSO',
                'hero_description' => 'Programme Outcomes and Programme Specific Outcomes of Ram Krishna Dwarika College.',
                'section_label' => 'Outcome Framework',
                'section_title' => 'Programme Outcomes and Specific Outcomes',
                'section_description' => 'Outcome details can be updated from the admin panel.',
                'cards' => [
                    [
                        'icon' => 'bi bi-bullseye',
                        'title' => 'Programme Outcomes',
                        'description' => 'Broad learning outcomes expected from students after completing a programme.',
                    ],
                    [
                        'icon' => 'bi bi-journal-check',
                        'title' => 'Programme Specific Outcomes',
                        'description' => 'Subject-specific learning outcomes for departments and programmes.',
                    ],
                    [
                        'icon' => 'bi bi-mortarboard-fill',
                        'title' => 'Academic Growth',
                        'description' => 'Outcome-oriented learning supports student progression and employability.',
                    ],
                ],
                'table_rows' => [],
                'status' => true,
            ]
        );

        AcademicInfoPage::updateOrCreate(
            ['slug' => 'alumni'],
            [
                'kicker_text' => 'Alumni',
                'hero_title' => 'Alumni',
                'hero_description' => 'Alumni information and engagement details of Ram Krishna Dwarika College.',
                'section_label' => 'Alumni Network',
                'section_title' => 'College Alumni',
                'section_description' => 'Alumni content can be updated from the admin panel.',
                'cards' => [
                    [
                        'icon' => 'bi bi-people-fill',
                        'title' => 'Alumni Community',
                        'description' => 'Connecting former students with the institution and current learners.',
                    ],
                    [
                        'icon' => 'bi bi-award-fill',
                        'title' => 'Achievements',
                        'description' => 'Showcase achievements and contributions of college alumni.',
                    ],
                    [
                        'icon' => 'bi bi-chat-square-heart-fill',
                        'title' => 'Engagement',
                        'description' => 'Support institutional development through alumni participation.',
                    ],
                ],
                'table_rows' => [],
                'status' => true,
            ]
        );
    }

    private function seedDownloads(): void
    {
        $categories = [
            'academic-calendar' => 'Academic Calendar',
            'syllabus' => 'Syllabus',
            'prospectus' => 'Prospectus',
            'fee-structure' => 'Fee Structure',
            'e-content' => 'E-Content',
        ];

        $categoryIds = [];

        foreach ($categories as $slug => $name) {
            $category = DownloadCategory::updateOrCreate(
                ['slug' => $slug],
                ['name' => $name, 'status' => true]
            );

            $categoryIds[$slug] = $category->id;
        }

        DownloadItem::updateOrCreate(
            ['slug' => 'academic-calendar'],
            [
                'download_category_id' => $categoryIds['academic-calendar'],
                'title' => 'Academic Calendar',
                'kicker_text' => 'Academic Calendar',
                'hero_title' => 'Academic Calendar',
                'hero_description' => 'Official academic calendar and class commencement notice.',
                'external_url' => 'https://rkdcollegepatna.org/Downloads/DSW.17.PPU.2022.pdf',
                'document_code' => 'DSW.17.PPU.2022',
                'authority' => 'Patliputra University, Patna',
                'document_date' => '20 Jan 2022',
                'session_reference' => 'UG Regular & Vocational courses session 2022-25',
                'class_start' => 'Start of classes from 15/07/2022',
                'summary_items' => [
                    ['label' => 'Document Code', 'value' => 'DSW.17.PPU.2022'],
                    ['label' => 'Authority', 'value' => 'Patliputra University, Patna'],
                    ['label' => 'Class Start', 'value' => 'Start of classes from 15/07/2022'],
                ],
                'info_cards' => [
                    ['icon' => 'bi bi-bank2', 'title' => 'Authority', 'description' => 'Patliputra University, Patna'],
                    ['icon' => 'bi bi-calendar-check-fill', 'title' => 'Document Date', 'description' => '20 Jan 2022'],
                    ['icon' => 'bi bi-mortarboard-fill', 'title' => 'Session', 'description' => 'UG Regular & Vocational courses session 2022-25'],
                    ['icon' => 'bi bi-clock-fill', 'title' => 'Class Start', 'description' => 'Start of classes from 15/07/2022'],
                ],
                'table_rows' => [
                    ['title' => 'Academic Calendar', 'details' => 'Official academic calendar notice issued by Patliputra University, Patna.', 'button' => 'Download PDF'],
                    ['title' => 'Session Reference', 'details' => 'UG Regular & Vocational courses session 2022-25.', 'button' => 'View Notice'],
                    ['title' => 'Class Commencement', 'details' => 'Start of classes from 15/07/2022.', 'button' => 'Open Document'],
                ],
                'is_featured' => true,
                'status' => true,
            ]
        );

        foreach (['syllabus', 'prospectus', 'fee-structure', 'e-content'] as $slug) {
            DownloadItem::updateOrCreate(
                ['slug' => $slug],
                [
                    'download_category_id' => $categoryIds[$slug],
                    'title' => $categories[$slug],
                    'kicker_text' => $categories[$slug],
                    'hero_title' => $categories[$slug],
                    'hero_description' => $categories[$slug] . ' document will be updated soon.',
                    'summary_items' => [],
                    'info_cards' => [],
                    'table_rows' => [],
                    'is_featured' => false,
                    'status' => true,
                ]
            );
        }
    }
}
