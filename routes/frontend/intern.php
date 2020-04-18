<?php

Route::group(['namespace' => 'Intern'], function () {

    // K01 - MHS
    Route::resource('myintern-proposals', 'MyInternProposalController');
    Route::resource('myintern-proposals.members', 'MyInternProposalMemberController')->only(['create', 'store', 'destroy']);
    Route::resource('myintern-acceptances', 'MyInternAcceptanceController')->only(['edit', 'update']);

    //K02 - MHS
    Route::resource('myinterns', 'MyInternController')->only(['index', 'show']);
    Route::resource('myintern-seminars', 'MyInternSeminarController')->except(['index', 'destroy']);
    Route::resource('myintern-seminars.audiences', 'MyInternSeminarAudience')->only(['create', 'store', 'destroy']);

    //K03 - MHS
    Route::resource('myinterns', 'MyInternController')->except(['destroy', 'create', 'store']);
    Route::resource('myinterns.logbooks', 'MyInternLogbookController');

    //K04 - KAPRODI
    Route::resource('internship-submission', 'InternshipSubmissionController')->only(['index', 'edit', 'update']);
    Route::resource('internships', 'InternshipController')->only(['index', 'show']);
    Route::resource('internship-supervisors', 'InternshipSupervisorController')->only(['create', 'store', 'destroy']);
    Route::resource('internship-cancellation', 'InternshipCancellationController')->only(['edit', 'update']);

    //K05 - DSN
    Route::resource('interns', 'InternController')->only(['index', 'show']);
    Route::get('intern-grades/{id}/print', 'InternGradeController@print')->name('intern-grades.print');
    Route::resource('intern-grades', 'InternGradeController')->only(['edit', 'update']);
    Route::resource('interns.logbooks', 'InternLogbookController')->except(['destroy', 'create', 'store']);

});
