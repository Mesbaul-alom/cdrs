<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CRMController;
use App\Http\Controllers\AdminDataController;
use App\Http\Controllers\BusinessSettingController;


  Route::get('/registration', [Admincontroller::class, 'registration'])->name('registration');



Route::group(['middleware' => 'auth'], function () {

    Route::get('/user/account/{wing}', [Admincontroller::class, 'account'])->name('user.account');
    Route::post('/user/info/update', [Admincontroller::class, 'userupdate'])->name('user.info.update');
    Route::post('/user/password/update', [Admincontroller::class, 'passwordupdate'])->name('user.password.update');
    Route::get('/', [Admincontroller::class, 'dashboard'])->name('/');
    Route::get('/dashboard', [Admincontroller::class, 'dashboard'])->name('dashboard');

   //Begin:: Agent

    Route::get('/settings', [Admincontroller::class, 'setting'])->name('setting');
    Route::get('/role', [Admincontroller::class, 'role'])->name('role');
    Route::get('/permissions', [Admincontroller::class, 'permissions'])->name('permissions');
    Route::get('/crm', [Admincontroller::class, 'crm'])->name('crm');
    Route::get('/importView', [AdminDataController::class, 'importView'])->name('importView');
    Route::post('/import', [AdminDataController::class, 'import'])->name('import');
    Route::get('/compairlist', [AdminDataController::class, 'compairlist'])->name('compairlist');
Route::get('/batch', [AdminDataController::class, 'batch']);
Route::get('/batch/in-progress', [AdminDataController::class, 'batchInProgress']);

     Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
 






  //Begin::Admin  roll permison
    Route::post('/admin/store-settings', [BusinessSettingController::class, 'store'])->name('admin.store.update.setting');
    Route::get('/admin/role', [AdminController::class, 'role'])->name('admin.role');
    Route::post('/admin/store-role', [AdminController::class, 'create_role'])->name('admin.create.roll');
    Route::get('/admin/edit-role/{id}', [AdminController::class, 'Edit_Admin_helper_role'])->name('admin.edit.roll');
    Route::post('/admin/update-admin-role/{id}', [AdminController::class, 'update_Admin_helper_role']);
    Route::get('/admin/role-permissions/{id}', [AdminController::class, 'admin_helper_permission']);
    Route::get('/admin/set-permission-to-admin-helper-role', [AdminController::class, 'set_permission_to_admin_helper_role']);
    Route::get('/admin/delete-permission-from-role', [AdminController::class, 'delete_permission_from_role']);
// end role permission
    

  //Begin::Admin  CRM
  Route::get('/admin/all-crm', [CRMController::class, 'index'])->name('admin.crm');
  Route::post('/admin/create-crm', [CRMController::class, 'store'])->name('admin.create.crm');
  Route::get('/admin/edit-crm/{id}', [CRMController::class, 'edit']);
  Route::post('/admin/update-crm/{id}', [CRMController::class, 'update']);
  Route::get('/admin/deactive-crm/{id}', [CRMController::class, 'DeactiveCRM']);
  Route::get('/admin/active-crm/{id}', [CRMController::class, 'ActiveCRM']);
  //End::Admin  CRM



    // supplier route start
    Route::post('/admin/supplier/add', [SupplierController::class, 'supplieadd']);
    Route::post('/supplier/update', [SupplierController::class, 'supplierupdate'])->name('supplier.update');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'supplieredit']);
    Route::get('/supplier/deactive/{id}', [SupplierController::class, 'supplierdeactive']);
    Route::get('/supplier/active/{id}', [SupplierController::class, 'supplieractive']);

    // supplier route end

    // Buyer route start
    Route::post('/buyer/add', [BuyerController::class, 'buyeradd']);
    Route::post('/buyer/update', [BuyerController::class, 'buyerupdate'])->name('buyer.update');
    Route::get('/buyer/edit/{id}', [BuyerController::class, 'buyeredit']);
    Route::get('/buyer/deactive/{id}', [BuyerController::class, 'buyerdeactive']);
    Route::get('/buyer/active/{id}', [BuyerController::class, 'buyeractive']);
    Route::get('/buyers', [BuyerController::class, 'buyers'])->name('buyers');
    // Buyer route end

    // Buyer route start
    Route::post('/currency/add', [CurrencyController::class, 'currencyadd']);
    Route::post('/currency/update', [CurrencyController::class, 'currencyupdate'])->name('currency.update');
    Route::get('/currency/edit/{id}', [CurrencyController::class, 'currencyedit']);
    Route::get('/currency/deactive/{id}', [CurrencyController::class, 'currencydeactive']);
    Route::get('/currency/active/{id}', [CurrencyController::class, 'currencyactive']);
    Route::get('/currency', [CurrencyController::class, 'currency'])->name('currency');
    // Buyer route end
    // Branch route start
    Route::post('/branch/add', [BranchController::class, 'branchadd']);
    Route::post('/branch/update', [BranchController::class, 'branchupdate'])->name('branch.update');
    Route::get('/branch/edit/{id}', [BranchController::class, 'branchedit']);
    Route::get('/branch/deactive/{id}', [BranchController::class, 'branchdeactive']);
    Route::get('/branch/active/{id}', [BranchController::class, 'branchactive']);
    Route::get('/branch', [BranchController::class, 'index'])->name('branch');
    // Branch route end

    // item route start
    Route::post('/item/product/add', [ProductItemController::class, 'productadd']);
    Route::post('/item/product/update', [ProductItemController::class, 'productupdate'])->name('item.product.update');
    Route::get('/item/product/edit/{id}', [ProductItemController::class, 'productedit']);
    Route::get('/item/product/deactive/{id}', [ProductItemController::class, 'productdeactive']);
    Route::get('/item/product/active/{id}', [ProductItemController::class, 'productactive']);
    Route::get('/item/product', [ProductItemController::class, 'index'])->name('item.product');
    // item route end

    // item route start
     Route::get('/work_order/list', [ImportLcController::class, 'index'])->name('work_order');
     Route::get('/work_order/import', [ImportLcController::class, 'work_order_import'])->name('work_order.import');
     Route::post('/work_order/import/submit', [ImportLcController::class, 'work_order_importstore'])->name('work_order.import.submit');
     Route::get('/products/search', [ImportLcController::class, 'product_search']);
    // item route end


  
});