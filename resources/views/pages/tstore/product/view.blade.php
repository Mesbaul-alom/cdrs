@extends('layouts.app')
@section('body_content')

<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3> প্রোডাক্ট / Product View</h3>
                </div>
                <div class="col-12 col-sm-6">

                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">

                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        Product Name :{{$product->product_title}}<br>
                        Unit Name :{{$product->unit_name}}<br>
                        Quentity :{{$product->stock_unit}}<br>
                        Description:{{$product->description}}
                    </div>
                    <div class="col-md-4 ">
                        
                    </div>
                    <div class="col-md-4 "><img id="preview-image-before-upload" src="{{asset('/images')}}{{"/".$product->image}}"
                        alt="preview image" style="max-height: 250px;"></div>
                </div>
         
                  </div>
                </div>

          </div>

@endsection
