<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>

            <p class="user-role">
                {{ auth()->user()->roles->pluck('title')->first() ?? 'Administrator' }}
            </p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>


        {{-- USER MANAGEMENT GROUP --}}
        @can('user_management_access')
            @php
                $umActive = request()->is('admin/permissions*')
                    || request()->is('admin/roles*')
                    || request()->is('admin/users*')
                    || request()->is('admin/audit-logs*');
            @endphp

            <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Users"
                        class="nav-link nav-group-btn {{ $umActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('permission_access')
                        <a href="{{ route('admin.permissions.index') }}"
                           class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-key"></i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    @endcan

                    @can('role_access')
                        <a href="{{ route('admin.roles.index') }}"
                           class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-shield-alt"></i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    @endcan

                    @can('user_access')
                        <a href="{{ route('admin.users.index') }}"
                           class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-user-circle"></i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    @endcan

                    @can('audit_log_access')
                        <a href="{{ route('admin.audit-logs.index') }}"
                           class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    @endcan

                </div>
            </div>

            <div class="nav-divider"></div>
        @endcan


        {{-- WEBSITE CONTENT GROUP --}}
        @php
            $contentActive = request()->is('admin/college-about-page*')
                || request()->is('admin/college-principal-message*')
                || request()->is('admin/college-ex-principals*')
                || request()->is('admin/college-vision-mission-page*');

            $canContentMenu =
                Gate::allows('college_about_page_access') ||
                Gate::allows('college_principal_message_access') ||
                Gate::allows('college_ex_principal_access') ||
                Gate::allows('college_vision_mission_page_access');
        @endphp

        @if($canContentMenu)
            <div x-data="{ open: {{ $contentActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Website Content"
                        class="nav-link nav-group-btn {{ $contentActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-globe nav-icon"></i>
                        <span class="nav-label">Website Content</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('college_about_page_access')
                        <a href="{{ route('admin.college-about-page.edit') }}"
                           class="sub-link {{ request()->is('admin/college-about-page*') ? 'active' : '' }}">
                            <i class="fas fa-university"></i>
                            College About Page
                        </a>
                    @endcan

                    @can('college_principal_message_access')
                        <a href="{{ route('admin.college-principal-message.edit') }}"
                           class="sub-link {{ request()->is('admin/college-principal-message*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie"></i>
                            Principal Message
                        </a>
                    @endcan

                    @can('college_ex_principal_access')
                        <a href="{{ route('admin.college-ex-principals.index') }}"
                           class="sub-link {{ request()->is('admin/college-ex-principals*') ? 'active' : '' }}">
                            <i class="fas fa-list-ol"></i>
                            Ex Principals
                        </a>
                    @endcan

                    @can('college_vision_mission_page_access')
                        <a href="{{ route('admin.college-vision-mission-page.edit') }}"
                           class="sub-link {{ request()->is('admin/college-vision-mission-page*') ? 'active' : '' }}">
                            <i class="fas fa-bullseye"></i>
                            Vision & Mission
                        </a>
                    @endcan

                </div>
            </div>

            <div class="nav-divider"></div>
        @endif


        {{-- ACADEMIC MANAGEMENT GROUP --}}
        @php
            $academicActive = request()->is('admin/academic-course-pages*')
                || request()->is('admin/academic-courses*')
                || request()->is('admin/academic-help-cards*')
                || request()->is('admin/department-streams*')
                || request()->is('admin/departments*')
                || request()->is('admin/staff-members*')
                || request()->is('admin/download-categories*')
                || request()->is('admin/download-items*')
                || request()->is('admin/academic-info-pages*')
                || request()->is('admin/campus-facilities*')
                || request()->is('admin/learning-facilities*')
                || request()->is('admin/quality-document-pages*')
                || request()->is('admin/feedback-documents*');

            $canAcademicMenu =
                Gate::allows('academic_course_page_access') ||
                Gate::allows('academic_course_access') ||
                Gate::allows('academic_help_card_access') ||
                Gate::allows('department_stream_access') ||
                Gate::allows('department_access') ||
                Gate::allows('staff_member_access') ||
                Gate::allows('download_category_access') ||
                Gate::allows('download_item_access') ||
                Gate::allows('academic_info_page_access') ||
                Gate::allows('campus_facility_access') ||
                Gate::allows('learning_facility_access') ||
                Gate::allows('quality_document_page_access') ||
                Gate::allows('feedback_document_access');
        @endphp

        @if($canAcademicMenu)
            <div x-data="{ open: {{ $academicActive ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        data-tooltip="Academics"
                        class="nav-link nav-group-btn {{ $academicActive ? 'active' : '' }}">

                    <div class="nav-group-left">
                        <i class="fas fa-graduation-cap nav-icon"></i>
                        <span class="nav-label">Academics</span>
                    </div>

                    <i class="fas fa-chevron-right chevron"
                       :style="open ? 'transform:rotate(90deg)' : ''"></i>
                </button>

                <div class="submenu"
                     x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-1">

                    @can('academic_course_page_access')
                        <a href="{{ route('admin.academic-course-pages.index') }}"
                           class="sub-link {{ request()->is('admin/academic-course-pages*') ? 'active' : '' }}">
                            <i class="fas fa-book-open"></i>
                            Course Pages
                        </a>
                    @endcan

                    @can('academic_course_access')
                        <a href="{{ route('admin.academic-courses.index') }}"
                           class="sub-link {{ request()->is('admin/academic-courses*') ? 'active' : '' }}">
                            <i class="fas fa-list-check"></i>
                            Courses
                        </a>
                    @endcan

                    @can('academic_help_card_access')
                        <a href="{{ route('admin.academic-help-cards.index') }}"
                           class="sub-link {{ request()->is('admin/academic-help-cards*') ? 'active' : '' }}">
                            <i class="fas fa-info-circle"></i>
                            Help Cards
                        </a>
                    @endcan

                    @can('department_stream_access')
                        <a href="{{ route('admin.department-streams.index') }}"
                           class="sub-link {{ request()->is('admin/department-streams*') ? 'active' : '' }}">
                            <i class="fas fa-layer-group"></i>
                            Department Streams
                        </a>
                    @endcan

                    @can('department_access')
                        <a href="{{ route('admin.departments.index') }}"
                           class="sub-link {{ request()->is('admin/departments*') ? 'active' : '' }}">
                            <i class="fas fa-columns"></i>
                            Departments
                        </a>
                    @endcan

                    @can('staff_member_access')
                        <a href="{{ route('admin.staff-members.index') }}"
                           class="sub-link {{ request()->is('admin/staff-members*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie"></i>
                            Staff / Faculty
                        </a>
                    @endcan

                    @can('download_category_access')
                        <a href="{{ route('admin.download-categories.index') }}"
                           class="sub-link {{ request()->is('admin/download-categories*') ? 'active' : '' }}">
                            <i class="fas fa-folder-open"></i>
                            Download Categories
                        </a>
                    @endcan

                    @can('download_item_access')
                        <a href="{{ route('admin.download-items.index') }}"
                           class="sub-link {{ request()->is('admin/download-items*') ? 'active' : '' }}">
                            <i class="fas fa-download"></i>
                            Downloads
                        </a>
                    @endcan

                    @can('academic_info_page_access')
                        <a href="{{ route('admin.academic-info-pages.index') }}"
                           class="sub-link {{ request()->is('admin/academic-info-pages*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt"></i>
                            Info Pages
                        </a>
                    @endcan

                    @can('campus_facility_access')
                        <a href="{{ route('admin.campus-facilities.index') }}"
                           class="sub-link {{ request()->is('admin/campus-facilities*') ? 'active' : '' }}">
                            <i class="fas fa-building"></i>
                            Campus Facilities
                        </a>
                    @endcan

                    @can('learning_facility_access')
                        <a href="{{ route('admin.learning-facilities.index') }}"
                           class="sub-link {{ request()->is('admin/learning-facilities*') ? 'active' : '' }}">
                            <i class="fas fa-laptop-code"></i>
                            Learning Facilities
                        </a>
                    @endcan

                    @can('quality_document_page_access')
    <a href="{{ route('admin.quality-document-pages.index') }}"
       class="sub-link {{ request()->is('admin/quality-document-pages*') ? 'active' : '' }}">
        <i class="fas fa-file-pdf"></i>
        Quality Documents
    </a>
@endcan

                    @can('feedback_document_access')
                        <a href="{{ route('admin.feedback-documents.index') }}"
                           class="sub-link {{ request()->is('admin/feedback-documents*') ? 'active' : '' }}">
                            <i class="fas fa-comments"></i>
                            Feedback Documents
                        </a>
                    @endcan

                </div>
            </div>

            <div class="nav-divider"></div>
        @endif

        {{-- QUALITY DOCUMENTS GROUP --}}
@php
    $qualityActive = request()->is('admin/quality-document-pages*');

    $canQualityMenu = Gate::allows('quality_document_page_access');
@endphp

@if($canQualityMenu)
    <div x-data="{ open: {{ $qualityActive ? 'true' : 'false' }} }">

        <button type="button"
                @click="open = !open"
                data-tooltip="Quality Docs"
                class="nav-link nav-group-btn {{ $qualityActive ? 'active' : '' }}">

            <div class="nav-group-left">
                <i class="fas fa-file-pdf nav-icon"></i>
                <span class="nav-label">Quality Documents</span>
            </div>

            <i class="fas fa-chevron-right chevron"
               :style="open ? 'transform:rotate(90deg)' : ''"></i>
        </button>

        <div class="submenu"
             x-show="open"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1">

            <a href="{{ route('admin.quality-document-pages.index') }}"
               class="sub-link {{ request()->routeIs('admin.quality-document-pages.index') ? 'active' : '' }}">
                <i class="fas fa-list"></i>
                All Documents
            </a>

            @can('quality_document_page_edit')
                <a href="{{ route('admin.quality-document-pages.edit', 'aqar') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/aqar*') ? 'active' : '' }}">
                    <i class="fas fa-file-pdf"></i>
                    AQAR
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'naac') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/naac*') ? 'active' : '' }}">
                    <i class="fas fa-award"></i>
                    NAAC
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'iqac') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/iqac*') ? 'active' : '' }}">
                    <i class="fas fa-university"></i>
                    IQAC
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'ict') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/ict*') ? 'active' : '' }}">
                    <i class="fas fa-laptop"></i>
                    ICT
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'ssr') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/ssr*') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i>
                    SSR
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'ncc') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/ncc*') ? 'active' : '' }}">
                    <i class="fas fa-medal"></i>
                    NCC
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'nss') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/nss*') ? 'active' : '' }}">
                    <i class="fas fa-hands-helping"></i>
                    NSS
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'sports') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/sports*') ? 'active' : '' }}">
                    <i class="fas fa-running"></i>
                    Sports
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'cultural') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/cultural*') ? 'active' : '' }}">
                    <i class="fas fa-music"></i>
                    Cultural
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'icc') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/icc*') ? 'active' : '' }}">
                    <i class="fas fa-balance-scale"></i>
                    ICC
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'gender-sensitization') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/gender-sensitization*') ? 'active' : '' }}">
                    <i class="fas fa-venus-mars"></i>
                    Gender Sensitization
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'placement-cell') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/placement-cell*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i>
                    Placement Cell
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'counselling-cell') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/counselling-cell*') ? 'active' : '' }}">
                    <i class="fas fa-comments"></i>
                    Counselling Cell
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'skill-development-entrepreneurship-cell') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/skill-development-entrepreneurship-cell*') ? 'active' : '' }}">
                    <i class="fas fa-lightbulb"></i>
                    Skill Development
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'departmental-activities') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/departmental-activities*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i>
                    Departmental Activities
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'webinar') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/webinar*') ? 'active' : '' }}">
                    <i class="fas fa-video"></i>
                    Webinar
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'workshop-activities') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/workshop-activities*') ? 'active' : '' }}">
                    <i class="fas fa-tools"></i>
                    Workshop Activities
                </a>

                <a href="{{ route('admin.quality-document-pages.edit', 'college-events') }}"
                   class="sub-link {{ request()->is('admin/quality-document-pages/college-events*') ? 'active' : '' }}">
                    <i class="fas fa-images"></i>
                    College Events
                </a>
            @endcan

        </div>
    </div>

    <div class="nav-divider"></div>
@endif


        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- CHANGE PASSWORD --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- SETTINGS --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>
