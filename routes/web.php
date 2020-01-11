<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'], function(){
    Route::resource('congregacoes', 'CongregacaoController');
    Route::post('congregacoes/inativar/{id}','CongregacaoController@inativar')->name('congregacoes.inativar');
});

Route::group(['prefix'], function(){
    Route::resource('irmas', 'PessoaController');
    Route::post('irmas/inativar/{id}','PessoaController@inativar')->name('irmas.inativar');
    Route::get('exportirmas', 'PessoaController@export')->name('irmas.export');
    Route::post('RelatorioIrmasPDF', 'PessoaController@pdf')->name('irmas.pdf');
    Route::get('CadastroIrmaPDF/{id}', 'PessoaController@cadastropdf')->name('cadastroirmas.pdf');
});

Route::group(['prefix'], function(){
    Route::get('profile', 'UserController@profile')->name('profile.index');
    Route::post('profile', 'UserController@profileupdate')->name('profile.update');
    Route::resource('usuarios', 'UserController');
    Route::post('usuarios/inativar/{id}','UserController@inativar')->name('usuarios.inativar');
});

Route::group(['prefix'], function(){
    Route::resource('eventos', 'EventoController');
    Route::post('eventos/inativar/{id}','EventoController@inativar')->name('eventos.inativar');
    Route::post('eventos/pagar/{id}','EventoController@pagar')->name('eventos.pagar');
    Route::post('eventos/lancar','EventoController@lancar')->name('eventos.lancar');
    Route::post('eventos/inativarLance/{id}','EventoController@inativarLance')->name('eventos.inativarlance');

});

