@extends('layouts.app')
@section('body_content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <h3>বিতরণকারী / Distributor</h3>
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
                                <table width="100%" class="table data-table">
                                    <thead>
                                        <tr>
                                            
                                            <th width="25%"> Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                         <tr>
                                            <td>1</td>
                                            <td>sohel</td>
                                            <td>sohel@gmail.com</td>
                                            <td>95858588558</td>
                                            <td width="30%">
                                                
                                                <a type="button" href="#" class="btn btn-sm btn-warning">View Report</a>
                                            </td>
                                        </tr>     
                                          </tbody> --}}
                                </table>
                            </div>
                          
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="productForm" method="post" action="{{route('t.store.update.distributor')}}" name="productForm" class="form-horizontal">
                          @csrf
                           <input type="hidden" name="d_id" id="product_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Name" value="" maxlength="50" required="">
                                    <h5 style="color: red">{{session('msg')}}</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-12">
                                  <textarea  class="form-control" name="address" id="address" cols="10" rows="3"></textarea>
                                </div>
                            </div>
             
                           <br>
              
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Updated
                             </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

          <script type="text/javascript">
            $(function () {
              var table = $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('t.store.distributor.index') }}",
                  columns: [
                     
                      
                  
                      {data: 'name', name: 'name'},
                      {data: 'phone', name: 'phone'},
                      {data: 'address', name: 'address'},
                      {data: 'action', name: 'action'},
                  ],
                  "scrollY": "300px",
                  "pageLength": 50,
                  "ordering": false,
              });
              
            });


            $('body').on('click', '.editProduct', function () {
      var product_id = $(this).data('id');
      $.get("{{ url('/technical-store/cusstomer/edit/') }}" +'/' + product_id, function (data) {
        console.log(data);
          $('#modelHeading').html("Edit Distributor");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#product_id').val(data.id);
          $('#name').val(data.distributor_name);
          $('#phone').val(data.phone);
          $('#address').val(data.address);
          
      })
   });
          
          </script>
@endsection
