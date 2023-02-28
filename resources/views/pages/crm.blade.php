@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>হেল্পার / CRM</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="text-right">
                        <button class="btn btn-info " type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">অ্যাড নিউ হেল্পার / CRM</button>
                    </div>
                
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title text-light" id="exampleModalLabel">অ্যাড নিউ হেল্পার / CRM</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label for="example-text-input">CRM Name</label>
                                            <input type="text" class="form-control" id="" required="" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="example-text-input">CRM Email</label>
                                            <input type="text" class="form-control" id="" required="" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="example-text-input">CRM Phone Number</label>
                                            <input type="text" class="form-control" maxlength="11" minlength="11" required="" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="example-text-input">Password (min: 8)</label>
                                            <input type="password" class="form-control" id="password" required="" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="example-text-input">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" required="" name="password_confirmation">
                                            <span class="text-danger d-none" id="password_not_matched">Password Not Matched</span>
                                            <span class="text-success d-none" id="password_matched">Password Matched</span>
                                        </div>
                                    </div>
                                    
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="button">Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
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
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table width="100%" class="table table-bordered table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>SI</th>
                                            <th width="25%">CRM Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                                                                                                                <tr>
                                            <td>1</td>
                                            <td>sohel</td>
                                            <td>sohel@gmail.com</td>
                                            <td>95858588558</td>
                                            <td>Accountant</td>
                                            <td width="30%">
                                                <a type="button" href="#" class="btn btn-sm btn-info js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-pencil-alt"></i> Edit</a>
                                                                                                    <a type="button" href="#" class="btn btn-sm btn-success js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="CRM is active now, click to deactive">Active</a>

                                                
                                            </td>
                                        </tr>
                                                                                                                                                                <tr>
                                            <td>2</td>
                                            <td>Fahad</td>
                                            <td>sohel@gmail.com</td>
                                            <td>54722222222</td>
                                            <td>Branch Manager</td>
                                            <td width="30%">
                                                <a type="button" href="#" class="btn btn-sm btn-info js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-pencil-alt"></i> Edit</a>
                                                                                                    <a type="button" href="#" class="btn btn-sm btn-success js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="CRM is active now, click to deactive">Active</a>

                                                
                                            </td>
                                        </tr>
                                                                                                                                                                <tr>
                                            <td>3</td>
                                            <td>Abul Kashem</td>
                                            <td>sohel@gmail.com</td>
                                            <td>01236447886</td>
                                            <td>Branch Manager</td>
                                            <td width="30%">
                                                <a type="button" href="#" class="btn btn-sm btn-info js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-fw fa-pencil-alt"></i> Edit</a>
                                                                                                    <a type="button" href="#" class="btn btn-sm btn-warning js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="CRM is deactive now, click to active">Deactive</a>

                                                
                                            </td>
                                        </tr>
                                                                                                                    </tbody>
                                </table>
                            </div>
                          
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
