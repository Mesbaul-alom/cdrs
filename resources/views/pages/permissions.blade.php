@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>রোল পারমিশন / Role Permission</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="rounded shadow">
                                <form class="p-3" action="" method="post">
                                    <input type="hidden" name="_token" value="DHj6fjgAfx8HQLUDzDXOBaxmJ4um39Usc43wOY56">                                <div class="form-group">
                                            <input type="hidden" name="" value="5" id="role_ID">
                                            <h3>Permission of Manager</h3>
                                            <hr>
                                                                                <div class="form-check mb-3">
                                                <label class="form-check-label text-info"></label>
                                            </div>
                                                                                <div class="row  ml-3">
                                                                                        <div class="col-md-6 " id="unSelectedPermission_37">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '37', '.customers')" class="form-check-input" type="checkbox" id="permissionCheckbox37" name="permissions[]" value=".customers">
                                                        <label class="form-check-label" for="permissionCheckbox37">.customers</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6" id="unSelectedPermission_44">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '44', '.damage.product')" class="form-check-input" type="checkbox" id="permissionCheckbox44" name="permissions[]" value=".damage.product">
                                                        <label class="form-check-label" for="permissionCheckbox44">.damage.product</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6  d-none " id="unSelectedPermission_7">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '7', '.dashboard')" class="form-check-input" type="checkbox" id="permissionCheckbox7" name="permissions[]" value=".dashboard">
                                                        <label class="form-check-label" for="permissionCheckbox7">.dashboard</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="unSelectedPermission_41">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '41', '.deliveryman')" class="form-check-input" type="checkbox" id="permissionCheckbox41" name="permissions[]" value=".deliveryman">
                                                        <label class="form-check-label" for="permissionCheckbox41">.deliveryman</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6  d-none " id="unSelectedPermission_38">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '38', '.product.stock')" class="form-check-input" type="checkbox" id="permissionCheckbox38" name="permissions[]" value=".product.stock">
                                                        <label class="form-check-label" for="permissionCheckbox38">.product.stock</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6" id="unSelectedPermission_42">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '42', '.received.customer.due')" class="form-check-input" type="checkbox" id="permissionCheckbox42" name="permissions[]" value=".received.customer.due">
                                                        <label class="form-check-label" for="permissionCheckbox42">.received.customer.due</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6" id="unSelectedPermission_43">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '43', '.reports')" class="form-check-input" type="checkbox" id="permissionCheckbox43" name="permissions[]" value=".reports">
                                                        <label class="form-check-label" for="permissionCheckbox43">.reports</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6" id="unSelectedPermission_40">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '40', '.return.product')" class="form-check-input" type="checkbox" id="permissionCheckbox40" name="permissions[]" value=".return.product">
                                                        <label class="form-check-label" for="permissionCheckbox40">.return.product</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6" id="unSelectedPermission_39">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '39', '.sell')" class="form-check-input" type="checkbox" id="permissionCheckbox39" name="permissions[]" value=".sell">
                                                        <label class="form-check-label" for="permissionCheckbox39">.sell</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6 " id="unSelectedPermission_60">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '60', '.sell.discount')" class="form-check-input" type="checkbox" id="permissionCheckbox60" name="permissions[]" value=".sell.discount">
                                                        <label class="form-check-label" for="permissionCheckbox60">.sell.discount</label>
                                                    </div>
                                                </div>
                                                                                        <div class="col-md-6  d-none " id="unSelectedPermission_45">
                                                    <div class="form-check form-check-inline">
                                                        <input onclick="checkPermission('', '45', '.setting')" class="form-check-input" type="checkbox" id="permissionCheckbox45" name="permissions[]" value=".setting">
                                                        <label class="form-check-label" for="permissionCheckbox45">.setting</label>
                                                    </div>
                                                </div>
                                                                                    </div>
                                            <hr>
                                                                                
                                        </div>
                                    </form>
                            </div>
                        </div> 
                        
                        <div class="col-md-5">
                            <div class="shadow rounded p-2" id="provided_permission_parent">
                            <h3>Provided Permissions</h3><hr>
                                                        <div id="provided_permission_group_">
                                        <h5 class="text-success"><b></b></h5>
                                                                                                                                                                                                        
                                                                                                                                        <div class="form-check form-check-inline ml-4" id="provided_permission_7">
                                            <input class="form-check-input" checked="" onclick="delete_permission(7)" type="checkbox" id="checked_7" value="">
                                            <label class="form-check-label" for="checked_7">.dashboard</label>
                                        </div><br \="" id="provided_br_7">
                                                                                                                                        
                                                                                                                                        <div class="form-check form-check-inline ml-4" id="provided_permission_38">
                                            <input class="form-check-input" checked="" onclick="delete_permission(38)" type="checkbox" id="checked_38" value="">
                                            <label class="form-check-label" for="checked_38">.product.stock</label>
                                        </div><br \="" id="provided_br_38">
                                                                                                                                        
                                                                                                                                        
                                                                                                                                        
                                                                                                                                        
                                                                                                                                                                                                        <div class="form-check form-check-inline ml-4" id="provided_permission_45">
                                            <input class="form-check-input" checked="" onclick="delete_permission(45)" type="checkbox" id="checked_45" value="">
                                            <label class="form-check-label" for="checked_45">.setting</label>
                                        </div><br \="" id="provided_br_45">
                                                                                                    </div>
                                                            </div>
                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
