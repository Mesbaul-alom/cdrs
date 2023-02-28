@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-12">
                  <h3>Refund Distributed Products / রিফান্ড</h3>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <form action="/technical-store/refund/product/store" method="Post">
              @csrf
            <div class="row">
              <div class="col-sm-8">
                <div class="card">
                  <div class="card-body">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th width="5%" scope="col">IMAGE</th>
                                  <th scope="col">PRODUCT NAME</th>
                                  <th  scope="col">QUANTITY</th>
                                  <th  scope="col">REFUND QUANTITY</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($products as $product)
                                <tr>
                                  <td><img width="100%"  src="{{asset('./public/images/'.$product->product->image)}}" alt=""></td>
                                  <td>{{$product->product->product_title}}</td>
                                  @php
                                  $qty=\App\Models\Technical_store_refund_products::where('invoice_number',$product->invoice_number)->sum('qty');
                                @endphp
                               
                                  <td>{{$product->qty - $qty}}</td>
                               
                                @if ($product->qty - $qty <= 0)
                                <td>Done</td>
                                  @else
                                  <td><input type="number" max="{{$product->qty - $qty}}" name="refund[]" class="form-control" required ></td>
                                @endif
                                  <input type="hidden" value="{{$product->invoice_number}}" name="d_invoice">
                                  <input type="hidden" value="{{$product->product->id}}" name="p_id[]">
                                  <input type="hidden" value="{{$distribute->distributor->id}}" name="d_id">
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card recent-activity">
                    <div class="card-header card-no-border">
                    <div class="media media-dashboard border-bottom">
                        <div class="media-body"> 
                        <h5>Distributor Info</h5>
                        </div>
                    </div>
                    </div>
                    <div class="card-body pt-0">                  
                        <b>Name:</b> {{$distribute->distributor->distributor_name}}<br>
                        <b>Phone:</b> {{$distribute->distributor->phone}}<br>
                        <b>Address:</b> {{$distribute->distributor->address}}<br>
                    </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="card-block">
                        
                          <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-check-label"><b>Date</b></label>
                                    <input class="form-control" type="date" name="date" id="InvDate" value="{{date('Y-m-d')}}" required="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label" for="validationTooltip03">নোট / Note</label>
                                    <textarea class="form-control" name="note" id="" cols="30" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right mt-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>

@endsection
