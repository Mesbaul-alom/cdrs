@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>CRM</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="text-right">
                        <button class="btn btn-info " type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">CRM</button>
                    </div>
                
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-dark">
                            <h5 class="modal-title text-light" id="exampleModalLabel">CRM</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{route('admin.create.crm')}}" method="post">
                            @csrf
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
                                    <div class="col-md-12 pb-3">
                                        <div class="form-group" id="admin_helper_role_div">
                                            <label for="admin_helper_role">Select a Role</label>
                                            <select class="form-control" id="admin_helper_role" name="admin_helper_role">
                                                <option value="">-- Select One --</option>
                                                @foreach($roles as $admin_role)
                                                    
                                                        <option value="{{$admin_role->id}}">{{str_replace(Auth::user()->shop_id."#","", $admin_role->name)}}</option>
                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit">Add</button>
                          </div>
                        </div>
                    </form>
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
                                            <th>CRM Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php( $i = 1 )
                                        @foreach($crms as $crm)
                                        @php( $role_name = DB::table('roles')->where('id', $crm->role_id)->first() )
                                        <tr>
                                            <td>{{$i}}</em></td>
                                            <td>{{$crm->name}}</td>
                                            <td>{{$crm->email}}</td>
                                            <td>{{$role_name->name}}</td>
                                            <td width="25%">
                                                <a type="button" href="{{url('/admin/edit-crm/'.$crm->id)}}" class="btn btn-sm btn-info"><i class="fa fa-fw fa-pencil-alt"></i></a>
                                                @if($crm->is_active == 1)
                                                    <a type="button" href="{{url('/admin/deactive-crm/'.$crm->id)}}" class="btn btn-sm btn-success">Active</a>
                                                @else
                                                    <a type="button" href="{{url('/admin/active-crm/'.$crm->id)}}" class="btn btn-sm btn-warning">Deactive</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        @php( $i += 1 )
                                        @endforeach
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
