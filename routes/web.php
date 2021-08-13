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

Route::get('/', function() {
    return view('welcome');
});
// register through  social network
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');



/*****************
** Workspaces Routes Section 
*****************/

//show all workspaces recently 

Route::get('/workspaces',[
	'uses' => 'WorkspacesController@index',
	'as' => 'workspace.index'

]);


//endpint to search workspaces 

Route::get('/workspaces/search','WorkspacesSearchController@show');

//Create Workspace 
Route::get('/workspaces/create',[

	'uses' => 'WorkspacesController@create',
	'as' => 'workspace.create'


]);


//filter workspaces by user  

Route::get('/workspaces/{user}','WorkspacesController@index');



Route::post('/workspaces/store',[


	'uses' => 'WorkspacesController@store',
	'as' => 'workspace.store'

]);

/*Show Workspace */ 
Route::get('workspaces/{user}/{workspace}',[

	'uses' => 'WorkspacesController@show',
	'as' => 'workspace.show']);

  //
  //show workspace testing 
  Route::get('history/{user}/{workspace}',[

    'uses' => 'WorkspacesController@show_history',
    'as' => 'workspace.history']);



//Show change of workspace 
Route::get('/workspaces/{user}/{workspace}/changes','ChangesController@show');

//Show changes
Route::get('/history/{user}/{workspace}/changes','ChangesController@showchanges')->name('showchanges');


/** fetch the workspace tags */ 
Route::get('workspaces/{user}/{workspace}/tags','WorkspacesTagsController@index');

/* Update Workspace */ 
Route::put('workspaces/{user}/{workspace}',[
	'uses' => 'WorkspacesController@update',
	'as' => 'workspace.update'

]);


/* Delete Workspace */ 

Route::delete('/workspaces/{user}/{workspace}',[

	'uses' => 'WorkspacesController@destroy',
	'as' => 'workspace.delete'
]);


/** Add Comment to Workspace */ 

Route::post('/workspaces/{user}/{workspace}/comments','CommentsWorkspaceController@store');



/** Add Reply to a comment of Workspace */ 

Route::post('/workspaces/{user}/{workspace}/comments/{comment}/replies','CommentsWorkspaceController@reply');


/** fetch participants of project */

Route::get('/workspaces/{user}/{workspace}/participants','ParticipantsController@index');

/** Add participants to Workspace */ 
Route::post('/workspaces/{workspace}/participants','ParticipantsController@store');

/** Remove Participants from workspace */ 
Route::delete('/workspaces/{workspace}/participants/{user}','ParticipantsController@destroy');



//******************************************************************
Auth::routes();

Route::get('/api/users','Api\UsersController@index');

Route::get('/profiles/{user}','ProfilesController@show')->name('profile');

Route::post('/api/users/{user}/avatar','Api\UserAvatarController@store')->middleware('auth')->name('avatar');

//get the notifications for user 

Route::get('/profiles/{user}/notifications','NotificationsController@index');

//mark notification as read
Route::delete('/profiles/{user}/notifications/{notification}','NotificationsController@destroy');	

Route::get('/home', 'HomeController@index')->name('home');



/********** Manage Tags Section */ 


//admin manage users 

route::get('/users',[
    'uses'=>'AdminUsersController@index',
    'as' => 'users'
  ]);
 
  ////user_admin
  route::get('user/admin/{user}',[
    'uses'=>'AdminUsersController@admin',
    'as'=>'user.admin'
  ]);
  route::get('user/not-admin/{user}',[
    'uses'=>'AdminUsersController@not_admin',
    'as'=>'user.not.admin'
  ]);

  route::get('user/delete/{user}',[
    'uses'=> 'AdminUsersController@destroy',
    'as'=>'user.delete'
  ]);