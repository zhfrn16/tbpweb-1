<?php

Route::group(['namespace' => 'Intern'], function () {
    // K06 - ADM
    Route::post('intern-proposals/filter', 'InternshipProposalController@filter')->name('intern-proposals.filter');
    Route::get('intern-proposals/{id}/surattugas', 'InternshipProposalController@surattugas')->name('intern-proposals.surattugas');
    Route::get('intern-proposals/{id}/suratpermohonan', 'InternshipProposalController@surattugas')->name('intern-proposals.suratpermohonan');
    Route::resource('intern-proposals', 'InternshipProposalController')->only(['index', 'show']);
    Route::resource('intern-acceptance', 'InternshipAcceptanceController')->only(['edit', 'update']);
    Route::get('intern-supervisors/mass-edit', 'InternshipSupervisorController@mass_edit')->name('intern-supervisors.mass_edit');
    Route::put('intern-supervisors/mass_update', 'InternshipSupervisorController@mass_update')->name('intern-supervisors.mass_update');
    Route::resource('intern-supervisors', 'InternshipSupervisorController')->only(['index']);

    //K07 - ADM
    Route::post('interns/filter', 'InternshipController@filter')->name('interns.filter');
    Route::resource('interns', 'InternshipController')->except(['destroy','create', 'store']);
    Route::resource('intern-seminars', 'InternshipSeminarController')->only(['show', 'edit', 'update']);
    Route::resource('intern-seminars.audiences', 'InternshipSeminarAudienceController')->only(['create', 'store']);

});

Route::group(['namespace' => 'Publication'], function () {
    //K08 - ADM
    Route::resource('publications', 'PublicationController')->only(['index']);
    Route::resource('pub-proceedings', 'PubProceedingController')->except(['index', 'destroy', 'show']);
    Route::resource('pub-journals', 'PubJournalController')->except(['index', 'destroy', 'show']);
    Route::resource('publications.authors', 'PublicationAuthorController')->only(['create', 'store', 'destroy']);
});

Route::group(['namespace' => 'Academic'], function () {
    //K09 - ADM
    Route::resource('courses', 'CourseController');
    Route::resource('curricula', 'CurriculumController')->except(['show']);

    //K10 - ADM
    Route::get('classrooms/{id}/print', 'ClassroomController@print')->name('classrooms.print');
    Route::resource('classrooms', 'ClassroomController');
    Route::resource('classrooms.students', 'ClassroomStudentController')->only(['create', 'store', 'destroy']);

    //K11 - ADM
    Route::post('semesters', 'SemesterController@activate')->name('semesters.activate');
    Route::resource('semesters', 'SemesterController')->except(['show', 'destroy']);
    Route::resource('schedules', 'ScheduleController')->except(['show']);


});

