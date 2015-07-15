<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Authentication routes
 */
Route::group(['prefix' => 'auth'], function() {
    $controller = 'Auth\AuthController';

    Route::get('login', ['as' => 'auth.login', 'uses' => $controller . '@getLogin']);

    Route::post('login', $controller . '@postLogin');

    Route::get('logout', ['as' => 'auth.logout', 'uses' => $controller . '@getLogout']);

    Route::get('register', ['as' => 'auth.register', 'uses' => $controller . '@getRegister']);

    Route::post('register', $controller . '@postRegister');

    Route::get('check-email-available', $controller . '@checkEmailAvailable');
});

Route::get('/', function () {
    return redirect('/main');
});

Route::get('main', ['middleware' => 'visit', function () {
    return view('pages.main');
}]);

Route::get('about-me', ['middleware' => 'visit', function () {
    return view('pages.about-me');
}]);

Route::get('my-interests', ['middleware' => 'visit', function() {
    return view('pages.my-interests');
}]);

Route::get('gallery', ['middleware' => 'visit', function() {
    return view('pages.gallery');
}]);

Route::get('browse-history', ['middleware' => 'visit', function() {
    return view('pages.browse-history');
}]);

/**
 * Education.
 */
Route::group(['prefix' => 'education'], function() {

    Route::get('/', ['middleware' => 'visit', function() {
        return view('education.education');
    }]);

    Route::get('test', [
        'middleware' => 'visit',
        'as' => 'education.test',
        'uses' => 'EducationTestsController@create'
    ]);

    Route::post('test', ['uses' => 'EducationTestsController@store']);

    Route::get('test/results', [
        'middleware' => ['visit', 'auth'],
        'as' => 'education.test-results',
        'uses' => 'EducationTestsController@index'
    ]);
});

/**
 * Contacts.
 */
Route::group(['prefix' => 'contacts'], function() {

    Route::get('/', ['middleware' => 'visit', function() {
        return view('pages.contacts');
    }]);

    Route::post('/', ['uses' => 'ContactsController@submit']);
});

/**
 * Guest book.
 */
Route::group(['prefix' => 'guest-book'], function() {

    Route::get('/', ['middleware' => 'visit', 'uses' => 'GuestBookRecordsController@index']);

    Route::post('/', ['uses' => 'GuestBookRecordsController@store']);
});

/**
 * Admin
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin']], function() {

    Route::get('/',  ['middleware' => 'visit', 'as' => 'admin', function() {
        return view('admin.admin');
    }]);

    Route::get('visits', ['middleware' => 'visit', 'as' => 'admin.visits', function() {
        return view('admin.visits', ['visits' => App\Visit::paginate(10)]);
    }]);

    Route::get('guest-book-load-records', ['middleware' => 'visit',
        'as' => 'admin.guest-book-editor', function() {
        return view('admin.guest-book-editor');
    }]);

    Route::post('guest-book-load-records', [
        'as' => 'admin.guest-book-load-records',
        'uses' => 'GuestBookRecordsController@loadRecords'
    ]);
});

/**
 * My blog.
 */
Route::group(['prefix' => 'my-blog'], function() {

    $controller = 'BlogRecordsController';

    Route::get('/', ['middleware' => 'visit', 'uses' => $controller . '@index']);

    Route::post('/', [
        'as' => 'my-blog.set-records-per-page',
        'uses' => $controller . '@setRecordsPerPage'
    ]);

    Route::get('create', [
        'middleware' => 'visit',
        'as' => 'my-blog.create-record',
        'uses' => $controller . '@create'
    ]);

    Route::post('store', ['uses' => $controller . '@store']);

    Route::get('load-from-file', ['middleware' => 'visit',
        'as' => 'my-blog.load-from-file', function() {
        return view('admin.blog.load-from-file');
    }]);

    Route::post('load-from-file', ['uses' => $controller . '@loadFromFile']);

    Route::get('fetch-image/{blogId}', ['uses' => $controller . '@fetchImage']);

    Route::get('edit-record', $controller . '@edit');

    Route::patch('update-record', $controller . '@update');


    $commentsController = 'BlogRecordCommentsController';

    Route::get('/get-comments', $commentsController . '@index');

    Route::get('/create-comment', $commentsController . '@create');

    Route::post('/store-comment', $commentsController . '@store');
});
