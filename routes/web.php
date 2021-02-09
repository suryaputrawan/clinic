<?php

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


Route::get('/', 'AuthController@showloginform')->name('login');
Route::post('postlogin', 'AuthController@postlogin')->name('postlogin');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('register', 'RegisterController@showRegisterForm')->name('register');
Route::post('postregister', 'RegisterController@postregister')->name('postregister');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('about', 'AboutController@index')->name('about');
    Route::get('arrival', 'ArrivalController@index')->name('arrival');

    Route::get('company', 'CompanyController@index')->name('company');
    Route::get('company/{company}/edit', 'CompanyController@edit')->name('company.edit');
    Route::post('company/{company}/update', 'CompanyController@update')->name('company.update');

    Route::get('patient', 'PatientController@index')->name('patient');
    Route::get('patient/create', 'PatientController@create')->name('patient.create');
    Route::post('patient/store', 'PatientController@store')->name('patient.store');
    Route::get('patient/{patient}/edit', 'PatientController@edit')->name('patient.edit');
    Route::post('patient/{patient}/update', 'PatientController@update')->name('patient.update');
    Route::get('patient/{patient}/delete', 'PatientController@delete')->name('patient.delete');
    Route::get('patient/{patient}/detail', 'PatientController@detail')->name('patient.detail');

    Route::get('dokter', 'DokterController@index')->name('dokter');
    Route::get('dokter/create', 'DokterController@create')->name('dokter.create');
    Route::post('dokter/store', 'DokterController@store')->name('dokter.store');
    Route::get('dokter/{dokter}/edit', 'DokterController@edit')->name('dokter.edit');
    Route::post('dokter/{dokter}/update', 'DokterController@update')->name('dokter.update');
    Route::get('dokter/{dokter}/delete', 'DokterController@delete')->name('dokter.delete');
    Route::get('dokter/{dokter}/detail', 'DokterController@detail')->name('dokter.detail');

    Route::get('search/swabtest', 'SearchController@swabtest')->name('search.swabtest');
    Route::get('search/rapidtest', 'SearchController@rapidtest')->name('search.rapidtest');
    Route::get('search/antigen', 'SearchController@antigen')->name('search.antigen');
    Route::get('search/serology', 'SearchController@serology')->name('search.serology');
    Route::get('search/serology/periode', 'SearchController@serologyPeriode')->name('search.serologyPeriode');
    Route::get('search/antigen/periode', 'SearchController@antigenPeriode')->name('search.antigenPeriode');
    Route::get('search/rapidtest/periode', 'SearchController@rapidPeriode')->name('search.rapidPeriode');
    Route::get('search/swabtest/periode', 'SearchController@swabPeriode')->name('search.swabPeriode');
    Route::get('search/arrivalicd/periode', 'SearchController@arrivalicdPeriode')->name('search.arrivalicdPeriode');

    Route::get('report', 'ReportController@index')->name('report');
    Route::get('report/swabtest/{tglawal?}/{tglakhir?}', 'ReportController@swabtest')->name('report.swabtest');
    Route::get('report/rapidtest/{tglawal?}/{tglakhir?}', 'ReportController@rapidtest')->name('report.rapidtest');
    Route::get('report/arrivalicd/{tglawal?}/{tglakhir?}', 'ReportController@arrivalicd')->name('report.arrivalicd');
    Route::get('report/antigen/{tglawal?}/{tglakhir?}', 'ReportController@antigen')->name('report.antigen');
    Route::get('report/serology/{tglawal?}/{tglakhir?}', 'ReportController@serology')->name('report.serology');

    Route::get('rapidtest', 'RapidController@index')->name('rapidtest');
    Route::get('rapidtest/create', 'RapidController@create')->name('rapidtest.create');
    Route::post('rapidtest/store', 'RapidController@store')->name('rapidtest.store');
    Route::get('rapidtest/{rapid}/edit', 'RapidController@edit')->name('rapidtest.edit');
    Route::post('rapidtest/{rapid}/update', 'RapidController@update')->name('rapidtest.update');
    Route::get('rapidtest/{rapid}/delete', 'RapidController@delete')->name('rapidtest.delete');
    Route::get('rapidtest/{rapid}/detail', 'RapidController@detail')->name('rapidtest.detail');
    Route::get('rapidtest/{rapid}/exportPdf', 'RapidController@exportPdf')->name('rapidtest.exportPdf');

    Route::get('plebotomis', 'PlebotomisController@index')->name('plebotomis');
    Route::get('plebotomis/create', 'PlebotomisController@create')->name('plebotomis.create');
    Route::post('plebotomis/store', 'PlebotomisController@store')->name('plebotomis.store');
    Route::get('plebotomis/{plebotomis}/edit', 'PlebotomisController@edit')->name('plebotomis.edit');
    Route::post('plebotomis/{plebotomis}/update', 'PlebotomisController@update')->name('plebotomis.update');

    Route::get('labstaff', 'LabstaffController@index')->name('labstaff');
    Route::get('labstaff/create', 'LabstaffController@create')->name('labstaff.create');
    Route::post('labstaff/store', 'LabstaffController@store')->name('labstaff.store');
    Route::get('labstaff/{labstaff}/edit', 'LabstaffController@edit')->name('labstaff.edit');
    Route::post('labstaff/{labstaff}/update', 'LabstaffController@update')->name('labstaff.update');

    Route::get('lab', 'LaboratoriumController@index')->name('lab');
    Route::get('lab/create', 'LaboratoriumController@create')->name('lab.create');
    Route::post('lab/store', 'LaboratoriumController@store')->name('lab.store');
    Route::get('lab/{laboratorium}/edit', 'LaboratoriumController@edit')->name('lab.edit');
    Route::post('lab/{laboratorium}/update', 'LaboratoriumController@update')->name('lab.update');

    Route::get('swabtest', 'SwabtestController@index')->name('swabtest');
    Route::get('swabtest/create', 'SwabtestController@create')->name('swabtest.create');
    Route::post('swabtest/store', 'SwabtestController@store')->name('swabtest.store');
    Route::get('swabtest/{swabtest}/edit', 'SwabtestController@edit')->name('swabtest.edit');
    Route::post('swabtest/{swabtest}/update', 'SwabtestController@update')->name('swabtest.update');
    Route::get('swabtest/{swabtest}/delete', 'SwabtestController@delete')->name('swabtest.delete');
    Route::get('swabtest/{swabtest}/detail', 'SwabtestController@detail')->name('swabtest.detail');
    Route::get('swabtest/{swabtest}/exportPdf', 'SwabtestController@exportPdf')->name('swabtest.exportPdf');

    Route::get('antigen', 'AntigenController@index')->name('antigen');
    Route::get('antigen/create', 'AntigenController@create')->name('antigen.create');
    Route::post('antigen/store', 'AntigenController@store')->name('antigen.store');
    Route::get('antigen/{antigen}/edit', 'AntigenController@edit')->name('antigen.edit');
    Route::post('antigen/{antigen}/update', 'AntigenController@update')->name('antigen.update');
    Route::get('antigen/{antigen}/detail', 'AntigenController@detail')->name('antigen.detail');
    Route::get('antigen/{antigen}/exportPdf', 'AntigenController@exportPdf')->name('antigen.exportPdf');

    Route::get('serology', 'SerologyController@index')->name('serology');
    Route::get('serology/create', 'SerologyController@create')->name('serology.create');
    Route::post('serology/store', 'SerologyController@store')->name('serology.store');
    Route::get('serology/{serology}/edit', 'SerologyController@edit')->name('serology.edit');
    Route::post('serology/{serology}/update', 'SerologyController@update')->name('serology.update');
    Route::get('serology/{serology}/detail', 'SerologyController@detail')->name('serology.detail');
    Route::get('serology/{serology}/exportPdf', 'SerologyController@exportPdf')->name('serology.exportPdf');
});
