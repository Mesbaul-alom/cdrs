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
                  <h3>বিতরণ  ইনভয়েস / Distribution Invoice</h3>
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
                            <table class="table data-table">
                              <thead>
                                <tr>
                                  <th scope="col">Date</th>
                                  <th scope="col">Distributor Name</th>
                                  <th width="20%" scope="col">Phone</th>
                                  <th width="20%" scope="col">Address</th>
                                  <th scope="col">Invoice Number</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              {{-- <tbody>
                                @php
                                $sl=1;
                              @endphp
                              @foreach ($distributors as $distributor)
                              <tr>
                                <th scope="row">{{$sl++}}</th>
                                <th scope="row">{{$distributor->date}}</th>
                                <td>{{$distributor->distributor->distributor_name}}</td>
                                <td>{{$distributor->distributor->phone}}</td>
                                <td>{{$distributor->distributor->address}}</td>
                                <td>{{$distributor->invoice_number}}</td>
                                <td>
                                  <a href="{{route('g.store.purchase.invoices.view'). "/" .$distributor->id}}" class="btn btn-success">View Invoice</a> 
                                </td>
                              </tr>
                              @endforeach
                                {{-- <tr>
                                    <th scope="row">31-05-2-22</th>
                                    <td>Sohel Mia</td>
                                    <td>01627382866</td>
                                    <td>Mirpur-10, Dhaka-1216</td>
                                    <td>S/232</td>
                                    <td>
                                      <a href="{{route('g.store.sold.invoices.view')}}" class="btn btn-primary">View Invoice</a> 
                                    </td>
                                  </tr> --}}
                            
                                
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



            
          <script type="text/javascript">
            $(function () {
              var table = $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('t.store.distributor.invoice.index') }}",
                  columns: [
                     
                      
                      {data: 'day', name: 'day'},
                      {data: 'customerName', name: 'customerName'},
                      {data: 'phone', name: 'phone'},
                      {data: 'address', name: 'address'},
                      {data: 'invoicenumber', name: 'invoicenumber'},
                      {data: 'action', name: 'action'},
                  ],
                  "scrollY": "300px",
                  "pageLength": 50,
                  "ordering": false,
              });
              
            });
          
          </script>

@endsection
