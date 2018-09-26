/* MENU */
Route::get('/admin/menus/list', 'Admin\AdminMenuController@getList')
->name('admin.menu.list')
->middleware();
Route::get('/admin/menus/edit/{id}', 'Admin\AdminMenuController@edit')
->name('admin.menu.edit')
->middleware();
Route::post('/admin/menus/process', 'Admin\AdminMenuController@process')
->name('admin.menu.process')
->middleware();
Route::get('/admin/menus/delete/{id}', 'Admin\AdminMenuController@delete')
->name('admin.menu.delete')
->middleware();
Route::get('/admin/menus/activation/{id}', 'Admin\AdminMenuController@activation')
->name('admin.menu.activation')
->middleware();
