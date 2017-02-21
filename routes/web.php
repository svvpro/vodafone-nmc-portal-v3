<?php

//Роуты страниц сайта
Route::get('/', ['uses' => 'IndexController@index', 'as' => 'site.index']);
Route::get('service-codes', ['uses'=>'ServiceCodeController@index', 'as' => 'site.service-codes']);
Route::get('phonebook', ['uses'=>'EngineerController@index', 'as' => 'site.phonebook']);

//Роуты выгрузки json данных для angular
Route::get('api/service-codes',  ['uses'=>'ServiceCodeController@data', 'as' => 'data.service-code']);
Route::get('api/service-code-types',  ['uses'=>'ServiceCodeTypeController@data', 'as' => 'data.service-code-type']);
Route::get('api/engineers',  ['uses'=>'EngineerController@data', 'as' => 'data.engineer']);
Route::get('api/departaments',  ['uses'=>'DepartamentController@data', 'as' => 'data.departament']);

//Роуты админки
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'Admin\IndexController@index', 'as' => 'admin.index']);
    Route::resource('permissions', 'Admin\PermissionController', [
        'only' => [
            'index',
            'store'
        ],
        'names' => [
            'index' => 'admin.permission.index',
            'store' => 'admin.permission.store'
        ]
    ]);
    Route::resource('users', 'Admin\UserController', [
        'names'=>[
            'index'=>'admin.user.index',
            'create'=>'admin.user.create',
            'store'=>'admin.user.store',
            'edit'=>'admin.user.edit',
            'update'=>'admin.user.update',
            'destroy'=>'admin.user.destroy',
        ]
    ]);
    Route::resource('service-code-types', 'Admin\ServiceCodeTypeController', [
        'names'=>[
            'index'=>'admin.service-code-type.index',
            'create'=>'admin.service-code-type.create',
            'store'=>'admin.service-code-type.store',
            'edit'=>'admin.service-code-type.edit',
            'update'=>'admin.service-code-type.update',
            'destroy'=>'admin.service-code-type.destroy',
        ]
    ]);

    Route::resource('service-codes', 'Admin\ServiceCodeController', [
        'names'=>[
            'index'=>'admin.service-code.index',
            'create'=>'admin.service-code.create',
            'store'=>'admin.service-code.store',
            'edit'=>'admin.service-code.edit',
            'update'=>'admin.service-code.update',
            'destroy'=>'admin.service-code.destroy',
        ]
    ]);

    Route::resource('departaments', 'Admin\DepartamentController', [
        'names'=>[
            'index'=>'admin.departament.index',
            'create'=>'admin.departament.create',
            'store'=>'admin.departament.store',
            'edit'=>'admin.departament.edit',
            'update'=>'admin.departament.update',
            'destroy'=>'admin.departament.destroy',
        ]
    ]);

    Route::resource('engineers', 'Admin\EngineerController', [
        'names'=>[
            'index'=>'admin.engineer.index',
            'create'=>'admin.engineer.create',
            'store'=>'admin.engineer.store',
            'edit'=>'admin.engineer.edit',
            'update'=>'admin.engineer.update',
            'destroy'=>'admin.engineer.destroy',
        ]
    ]);

    Route::resource('systems', 'Admin\SystemController', [
        'names'=>[
            'index'=>'admin.system.index',
            'create'=>'admin.system.create',
            'store'=>'admin.system.store',
            'edit'=>'admin.system.edit',
            'update'=>'admin.system.update',
            'destroy'=>'admin.system.destroy',
        ]
    ]);

    Route::resource('categories', 'Admin\CategoryController', [
        'names'=>[
            'index'=>'admin.category.index',
            'create'=>'admin.category.create',
            'store'=>'admin.category.store',
            'edit'=>'admin.category.edit',
            'update'=>'admin.category.update',
            'destroy'=>'admin.category.destroy',
        ]
    ]);

    Route::resource('alarm-template-types', 'Admin\AlarmTemplateTypeController', [
        'names'=>[
            'index'=>'admin.alarm-template-type.index',
            'create'=>'admin.alarm-template-type.create',
            'store'=>'admin.alarm-template-type.store',
            'edit'=>'admin.alarm-template-type.edit',
            'update'=>'admin.alarm-template-type.update',
            'destroy'=>'admin.alarm-template-type.destroy',
        ]
    ]);

    Route::resource('alarm-agreement-types', 'Admin\AlarmTypeAgreementController', [
        'names'=>[
            'index'=>'admin.alarm-agreement-type.index',
            'create'=>'admin.alarm-agreement-type.create',
            'store'=>'admin.alarm-agreement-type.store',
            'edit'=>'admin.alarm-agreement-type.edit',
            'update'=>'admin.alarm-agreement-type.update',
            'destroy'=>'admin.alarm-agreement-type.destroy',
        ]
    ]);

    Route::resource('alarm-templates', 'Admin\AlarmTemplateController', [
        'names'=>[
            'index'=>'admin.alarm-template.index',
            'create'=>'admin.alarm-template.create',
            'store'=>'admin.alarm-template.store',
            'edit'=>'admin.alarm-template.edit',
            'update'=>'admin.alarm-template.update',
            'destroy'=>'admin.alarm-template.destroy',
        ]
    ]);

    Route::resource('alarm-informing-types', 'Admin\AlarmTypeInformingController', [
        'names'=>[
            'index'=>'admin.alarm-informing-type.index',
            'create'=>'admin.alarm-informing-type.create',
            'store'=>'admin.alarm-informing-type.store',
            'edit'=>'admin.alarm-informing-type.edit',
            'update'=>'admin.alarm-informing-type.update',
            'destroy'=>'admin.alarm-informing-type.destroy',
        ]
    ]);


});

Auth::routes();

