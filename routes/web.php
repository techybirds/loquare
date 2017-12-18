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
Route::middleware(['auth'])->group(function () {


	Route::get('/', 'HomeController@list_rent')->name('home');
	Route::get('/list/rent', 'HomeController@list_rent')->name('list-rent');
	Route::get('/rent/property/{id?}', 'HomeController@property')->name('property');
	Route::get('/page/{page?}', 'HomeController@page')->name('page');
	Route::any('/image/delete', 'CI_ModelController@delete_image')->name('delete-image');

	Route::any('/retailer/properties', array('as' => 'rent-properties', 'uses' => 'HomeController@properties'));
	Route::any('/search/category', 'Yelp_helperController@search')->name('token');
	Route::any('/search_add_collection', 'CollectionsController@search_add_collection')->name('search_add_collection');
	Route::any('/savein/collection', 'CollectionsController@savein_collection')->name('savein_collection');
	Route::any('/searchresult', 'HomeController@searchresult')->name('searchresult');

	Route::any('/searchin', 'HomeController@searchin')->name('searchin');

	Route::any('property/add', 'PropertyController@add')->name('add_property');
	Route::post('property/submit', 'PropertyController@submit')->name('submit_property');
	Route::any('property/publish', 'PropertyController@publish')->name('publish-property');
	Route::any('property/get/{type?}/{id?}', 'PropertyController@get_property')->name('get-property');
	Route::any('property/delete', 'PropertyController@delete')->name('delete-property');
	Route::any('property/edit/{id}', 'PropertyController@edit')->name('edit-property');
	Route::any('property/update', 'PropertyController@update')->name('update-property');

	Route::any('collection/rename', 'CollectionsController@rename')->name('collection-rename');
	Route::any('collection/delete', 'CollectionsController@delete')->name('collection-delete');
	Route::any('collection/remove_from_collection', 'CollectionsController@remove_from_collection')->name('collection-remove_from_collection');
	Route::any('collection/update_collection_comment', 'CollectionsController@update_collection_comment')->name('collection-update_collection_comment');


	Route::any('collections/{name}/{id?}', 'CollectionsController@collection')->name('my-collection');
	Route::any('get_collection_property', 'CollectionsController@get_collection_property')->name('get-collection');

	Route::any('my/properties/{name}', 'User\UserController@my_property')->name('my-property');
	Route::any('/get-my-properties', 'User\UserController@get_my_property')->name('get_my_property');
});