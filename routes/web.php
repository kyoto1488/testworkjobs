<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController')->name('home');

Route::prefix('companies')
    ->name('companies')
    ->where(['company' => '[0-9]+'])
    ->group(function (Router $router) {
        $router->get('/', 'CompanyController@index')->name('.list');
        $router->get('create', 'CompanyController@create')->name('.create');
        $router->post('create', 'CompanyController@store');
        $router->get('{company}', 'CompanyController@show')->name('.show');
        $router->get('update/{company}', 'CompanyController@edit')->name('.update');
        $router->patch('update/{company}', 'CompanyController@update');
        $router->delete('{company}', 'CompanyController@destroy')->name('.delete');
    });

Route::prefix('vacancies')
    ->name('vacancies')
    ->where(['vacancy' => '[0-9]+'])
    ->group(function (Router $router) {
        $router->get('/', 'VacancyController@index')->name('.list');

        $router->get('{vacancy}', 'VacancyController@show')->name('.show');

        $router->get('update/{vacancy}', 'VacancyController@edit')->name('.update');
        $router->patch('update/{vacancy}', 'VacancyController@update');

        $router->delete('{vacancy}', 'VacancyController@destroy')->name('.delete');

        $router->get('create', 'VacancyController@create')->name('.create');
        $router->post('create', 'VacancyController@store');
    });

Route::prefix('resumes')
    ->name('resumes')
    ->where(['resume' => '[0-9]+'])
    ->group(function (Router $router) {
        $router->get('/', 'ResumeController@index')->name('.list');

        $router->get('create', 'ResumeController@create')->name('.create');
        $router->post('create', 'ResumeController@store');

        $router->get('update/{resume}', 'ResumeController@edit')->name('.update');
        $router->patch('update/{resume}', 'ResumeController@update');

        $router->delete('{resume}', 'ResumeController@destroy')->name('.delete');

        $router->get('{resume}', 'ResumeController@show')->name('.show');
});

Route::prefix('feedbacks')
    ->name('feedbacks')
    ->where(['feedback' => '[0-9]+'])
    ->group(function (Router $router) {
        $router->get('/', 'FeedbackController@index')->name('.list');

        $router->post('create', 'FeedbackController@store')->name('.create');

        $router->get('update/{feedback}', 'FeedbackController@edit')->name('.update');
        $router->patch('update/{feedback}', 'FeedbackController@update');
    });

Route::prefix('profile')->name('profile')->group(function (Router $router) {
    $router->get('/', 'ProfileController@edit')->name('.edit');
    $router->patch('/', 'ProfileController@update')->name('.update');
    $router->delete('/', 'ProfileController@destroy')->name('.destroy');
});

require __DIR__.'/auth.php';
