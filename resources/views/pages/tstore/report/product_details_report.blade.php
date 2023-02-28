@extends('layouts.app')
@section('body_content')
<style>
    .my-custom-scrollbar {
position: relative;
height: 400px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>  প্রোডাক্ট /  Product Details</h3>
                </div>
                <div class="col-12 col-sm-6">

                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="row">
             
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-center"><h3>	প্রোডাক্ট যোগ </h3></div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                          <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table" >
                              <thead>
                                <tr>
                                 
                                  <th scope="col">sl</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Distribute Qty</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                  $sl=1;
                                @endphp
                                @foreach ($stocks as $product)
                                  
                               
                                <tr>
                                  <th scope="row">{{$sl++}}</th>
                               
                                  <td>{{date('d-m-Y', strtotime(optional($product)->date))}}</td>
                                  <td>{{$product->qty}} {{$unit_name}}</td>
                                  
                                </tr>
                                @endforeach
                              
                              </tbody>
                            </table>
                            
                          </div>
                          <div class="d-flex justify-content-left" style="padding-top: 10px">
                            {{ $stocks->links() }}
                        </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-center"><h3>	প্রোডাক্ট বিতরণ</h3></div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                          <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table" >
                              <thead>
                                <tr>
                                 
                                  <th scope="col">sl</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Distribute Qty</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                  $sl=1;
                                @endphp
                                @foreach ($d_products as $product)
                                  
                               
                                <tr>
                                  <th scope="row">{{$sl++}}</th>
                               
                                  <td>{{date('d-m-Y', strtotime(optional($product)->date))}}</td>
                                  <td>{{$product->qty}} {{$unit_name}}</td>
                                  
                                </tr>
                                @endforeach
                              
                              </tbody>
                            </table>
                            
                          </div>
                          <div class="d-flex justify-content-left" style="padding-top: 10px">
                            {{ $d_products->links() }}
                        </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" value="{{$id}}" id="p_id">
          </div>
         
@endsection