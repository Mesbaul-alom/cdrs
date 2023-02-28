@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <h3>বিতরণ ইনভয়েস</h3>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
              <div class="card" style="width: 100%;">
                  
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="">
                              <div class="">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <h6 class="text-success"><b>Distributor Info,</b></h6>
                                            <p class="card-text"><b>Name:</b>{{$data->distributor->distributor_name}}<br><b>Phone:</b> {{$data->distributor->phone}}<br><b>Address:</b> {{$data->distributor->address}}</p>
                                      </div>
                                      <div class="col-md-6">
                                          <p class="card-text" style="color: #fe8800; text-align:right;"><b>Invoice # </b> {{$data->invoice_number}}<br><b>Date:</b> {{date('d-m-Y', strtotime($data->date))}}</p>
                                      </div>
                                  </div>
                                
                                
                              </div>
                            </div>
                         </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered">
                              <thead>
                                <tr>
                                  <th width="5%" scope="col">SN</th>
                                  <th scope="col">Product Name</th>
                                  <th scope="col">Quantity</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $sl=1;
                              @endphp
                              @foreach ($products  as $product )
                              <tr>
                                <th scope="row">{{$sl++}}</th>
                                @php
                                  $produc=\App\Models\Technical_store_products::Find($product->product_id);
                                $product_name=  $produc->product_title;
                                @endphp
                                <td>{{ $product_name}}</td>
                                <td>{{$product->qty}} pcs</td>
                              </tr>
                              @endforeach
                             
                             
                                                            
                             </tbody>
                            </table>
                         </div>
                    </div>
                    
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p><b>*নোট / Note:</b><br>
                              {{$data->note}}
                            </p>
                        </div>
                        <div class="col-md-12">
                                 
                    </div>
                  </div>
                    
                </div>
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
                </div>
                <div class="col-md-3">
                    <div class="card">
                      <div class="card-body text-center">
                        <a href="/technical-store/refund/invoice/print/{{$id}}" target="_blank" class="btn btn-primary btn-rounded">Print Invoice</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>

@endsection
