<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

        // College About Page
    Route::get('college-about-page', 'CollegeAboutPageController@edit')->name('college-about-page.edit');
    Route::put('college-about-page', 'CollegeAboutPageController@update')->name('college-about-page.update');
    
    Route::get('college-principal-message', 'CollegePrincipalMessageController@edit')->name('college-principal-message.edit');
    Route::put('college-principal-message', 'CollegePrincipalMessageController@update')->name('college-principal-message.update');
    // Ex Principals
Route::delete('college-ex-principals/destroy', 'CollegeExPrincipalController@massDestroy')->name('college-ex-principals.massDestroy');
Route::resource('college-ex-principals', 'CollegeExPrincipalController');
// College Vision Mission Page
Route::get('college-vision-mission-page', 'CollegeVisionMissionPageController@edit')->name('college-vision-mission-page.edit');
Route::put('college-vision-mission-page', 'CollegeVisionMissionPageController@update')->name('college-vision-mission-page.update');

// Academic Course Pages
Route::delete('academic-course-pages/destroy', 'AcademicCoursePageController@massDestroy')->name('academic-course-pages.massDestroy');
Route::resource('academic-course-pages', 'AcademicCoursePageController');

// Academic Courses
Route::delete('academic-courses/destroy', 'AcademicCourseController@massDestroy')->name('academic-courses.massDestroy');
Route::resource('academic-courses', 'AcademicCourseController');

// Academic Help Cards
Route::delete('academic-help-cards/destroy', 'AcademicHelpCardController@massDestroy')->name('academic-help-cards.massDestroy');
Route::resource('academic-help-cards', 'AcademicHelpCardController');

// Department Streams
Route::delete('department-streams/destroy', 'DepartmentStreamController@massDestroy')->name('department-streams.massDestroy');
Route::resource('department-streams', 'DepartmentStreamController');

// Departments
Route::delete('departments/destroy', 'DepartmentController@massDestroy')->name('departments.massDestroy');
Route::resource('departments', 'DepartmentController');

// Staff Members
Route::delete('staff-members/destroy', 'StaffMemberController@massDestroy')->name('staff-members.massDestroy');
Route::resource('staff-members', 'StaffMemberController');

// Download Categories
Route::delete('download-categories/destroy', 'DownloadCategoryController@massDestroy')->name('download-categories.massDestroy');
Route::resource('download-categories', 'DownloadCategoryController');

// Download Items
Route::delete('download-items/destroy', 'DownloadItemController@massDestroy')->name('download-items.massDestroy');
Route::resource('download-items', 'DownloadItemController');
    });
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

// Frontend routes
Route::get('/about-us', 'Frontend\PageController@about')->name('frontend.about');
Route::get('/principal-message', 'Frontend\PageController@principalMessage')->name('frontend.principal-message');
Route::get('/ex-principals', 'Frontend\PageController@exPrincipals')->name('frontend.ex-principals');
Route::get('/vision-mission', 'Frontend\PageController@visionMission')->name('frontend.vision-mission');

// Academic Frontend Routes
Route::get('/senior-secondary-courses', 'Frontend\AcademicController@seniorSecondary')->name('frontend.senior-secondary-courses');
Route::get('/under-graduation-courses', 'Frontend\AcademicController@underGraduation')->name('frontend.under-graduation-courses');
Route::get('/post-graduate-courses', 'Frontend\AcademicController@postGraduate')->name('frontend.post-graduate-courses');
Route::get('/vocational-courses', 'Frontend\AcademicController@vocational')->name('frontend.vocational-courses');

Route::get('/departments', 'Frontend\AcademicController@departments')->name('frontend.departments');
Route::get('/staff', 'Frontend\AcademicController@staff')->name('frontend.staff');
Route::get('/downloads', 'Frontend\AcademicController@downloads')->name('frontend.downloads');

// Staff / Academic Staff Pages
Route::get('/faculty', 'Frontend\AcademicController@faculty')->name('frontend.faculty');
Route::get('/non-teaching-staff', 'Frontend\AcademicController@nonTeachingStaff')->name('frontend.non-teaching-staff');
Route::get('/po-pso', 'Frontend\AcademicController@poPso')->name('frontend.po-pso');
Route::get('/alumni', 'Frontend\AcademicController@alumni')->name('frontend.alumni');

// Download Detail Pages
Route::get('/academic-calendar', 'Frontend\AcademicController@academicCalendar')->name('frontend.academic-calendar');
Route::get('/syllabus', 'Frontend\AcademicController@syllabus')->name('frontend.syllabus');
Route::get('/prospectus', 'Frontend\AcademicController@prospectus')->name('frontend.prospectus');
Route::get('/fee-structure', 'Frontend\AcademicController@feeStructure')->name('frontend.fee-structure');
Route::get('/e-content', 'Frontend\AcademicController@eContent')->name('frontend.e-content');