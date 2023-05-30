<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PortalsController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    /** Admin Login Routes */
    Route::get('/login', [AdminAuthController::class, 'login'])->name('adminLogin');
    Route::post('/login', [AdminController::class, 'admin_postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {

        Route::get('logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');

        Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('adminDashboard');

        //project
        Route::get('/project-list', [ProjectsController::class, 'project_list'])->name('projectlist');
        Route::get('/project/add', [ProjectsController::class, 'add_project'])->name('addproject');
        Route::post('/project/add', [ProjectsController::class, 'postadd_project'])->name('create.project');
        Route::get('/project/edit/{id}', [ProjectsController::class, 'edit_project'])->name('editproject');
        Route::post('/project/update/{id}', [ProjectsController::class, 'update_project'])->name('update.project');
        Route::get('/project/delete/{id}', [ProjectsController::class, 'delete_project'])->name('delete.project');

        //customer
        Route::get('/user-list', [CustomersController::class, 'customer_list'])->name('customerlist');
        Route::get('/user/add', [CustomersController::class, 'add_customer'])->name('addcustomer');
        Route::post('/user/add', [CustomersController::class, 'postadd_customer'])->name('create.customer');
        Route::get('/user/edit/{id}', [CustomersController::class, 'edit_customer'])->name('editcustomer');
        Route::post('/user/update/{id}', [CustomersController::class, 'update_customer'])->name('update.customer');
        Route::get('/user/delete/{id}', [CustomersController::class, 'delete_customer'])->name('delete.customer');

        // portal
        Route::get('/portal-list', [PortalsController::class, 'portal_list'])->name('portallist');
        Route::get('/portal/add', [PortalsController::class, 'add_portal'])->name('addportal');
        Route::post('/portal/add', [PortalsController::class, 'postadd_portal'])->name('create.portal');
        Route::get('/portal/edit/{id}', [PortalsController::class, 'edit_portal'])->name('editportal');
        Route::post('/portal/update/{id}', [PortalsController::class, 'update_portal'])->name('update.portal');
        Route::get('/portal/delete/{id}', [PortalsController::class, 'delete_portal'])->name('delete.portal');

        // module
        Route::get('/module-list', [ModulesController::class, 'module_list'])->name('modulelist');
        Route::get('/module/add', [ModulesController::class, 'add_module'])->name('addmodule');
        Route::post('/module/add', [ModulesController::class, 'postadd_module'])->name('create.module');
        Route::get('/module/edit/{id}', [ModulesController::class, 'edit_module'])->name('editmodule');
        Route::post('/module/update/{id}', [ModulesController::class, 'update_module'])->name('update.module');
        Route::get('/module/delete/{id}', [ModulesController::class, 'delete_module'])->name('delete.module');

        // sub module
        Route::get('/sub-module/add', [ModulesController::class, 'add_submodule'])->name('addsubmodule');
        Route::post('/sub-module/add', [ModulesController::class, 'postadd_submodule'])->name('create.submodule');

         // role
         Route::get('/role-list', [RolesController::class, 'role_list'])->name('rolelist');
         Route::get('/role/add', [RolesController::class, 'add_role'])->name('addrole');
         Route::post('/role/add', [RolesController::class, 'postadd_role'])->name('create.role');
         Route::get('/role/edit/{id}', [RolesController::class, 'edit_role'])->name('editrole');
         Route::post('role/update/{id}', [RolesController::class, 'update_role'])->name('update.role');
         Route::get('/role/delete/{id}', [RolesController::class, 'delete_role'])->name('delete.role');

         // permission
         Route::get('/permission-list', [PermissionsController::class, 'permission_list'])->name('permissionlist');
         Route::get('/permission/add', [PermissionsController::class, 'add_permission'])->name('addpermission');
         Route::post('/permission/add', [PermissionsController::class, 'postadd_permission'])->name('create.permission');
         Route::get('/permission/edit/{id}', [PermissionsController::class, 'edit_permission'])->name('editpermission');
         Route::post('permission/update/{id}', [PermissionsController::class, 'update_permission'])->name('update.permission');
         Route::get('/permission/delete/{id}', [PermissionsController::class, 'delete_permission'])->name('delete.permission');
    });

});