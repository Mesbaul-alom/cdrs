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
                <div class="col-12 col-sm-6">
                  <h3>অল  প্রোডাক্ট / All Product</h3>
                </div>
                <div class="col-12 col-sm-6">

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
                            <table class="table data-table" >
                              <thead>
                                <tr>
                                  {{-- <th scope="col">SI.</th> --}}
                                  <th width="" scope="col">ছবি</th>
                                  <th  scope="col">প্রোডাক্ট নাম</th>
                                  <th scope="col">কারেন্ট স্টক</th>
                              
                                </tr>
                              </thead>
                              {{-- <tbody>
                                @php
                                  $sl=1;
                                @endphp
                                @foreach ($products as $product)
                                  
                               
                                <tr>
                                  <th scope="row">{{$sl++}}</th>
                                  <td><img width="80%" src="{{asset('/images')}}{{"/".$product->image}}" alt=""></td>
                                  <td>{{$product->product_title}}</td>
                                  <td>{{$product->opening_qty}} pcs</td>
                                  <td>{{$product->stock_unit}} pcs</td>
                                   <td>
                                     <a href="/general-store/product/edit/{{$product->id}}" class="btn btn-primary">এডিট</a> 
                                     <a href="/general-store/product/view/{{$product->id}}" class="btn btn-info">ভিউ</a> 
                                    
                                   </td>
                                </tr>
                                @endforeach
                              
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
          <script type="text/javascript">
            $(function () {
              var table = $('.data-table').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('t.store.product.index') }}",
                  columns: [
                     
                      
                     
                    {data: 'image', name: 'image'},
                      {data: 'name', name: 'name'},
                      {data: 'currentstock', name: 'currentstock'},
                     
                  ],
                  "scrollY": "300px",
                  "pageLength": 50,
                  "ordering": false,
              });
              
            });
          
          </script>
@endsection