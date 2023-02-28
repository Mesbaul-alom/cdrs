@extends('layouts.app')
@section('body_content')

<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3> প্রোডাক্ট / Update  Product</h3>
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
                    <form class="row g-3 needs-validation" action="{{route('t.store.products.update')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{$product->id}}">
                      <div class="col-md-12 position-relative mb-4">
                        <label class="form-label" for="validationTooltip01"> <span style="color: red">* </span> প্রোডাক্ট নাম</label>
                        <input class="form-control" id="validationTooltip01" type="text" name="name" value="{{$product->product_title}}" required="">
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                      <div class="col-md-4 position-relative mb-4">
                        <label class="form-label" for="validationTooltip02">ইউনিট নেম / Unit Name</label>
                        <input class="form-control image" id="image" type="text" value="{{$product->unit_name}}" name="unit" placeholder="Ex: pcs" required>
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                  
                      <div class="col-md-4 position-relative mb-4">
                        <div class="form-group">
                          <label class="form-label" for="validationTooltip02">ছবি(optional)</label>
                            <input type="file" name="image" placeholder="Choose image" id="image">
                              @error('image')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                        </div>
                    </div>
       
                    <div class="col-md-4 position-relative mb-4 text-center">
                        <img id="preview-image-before-upload" src="{{asset('./public/images')}}{{"/".$product->image}}"
                            alt="preview image" style="max-height: 250px;">
                    </div>
                     
                     
                      {{-- <div class="col-md-4 position-relative mb-4">
                        <label class="form-label" for="validationTooltip03">পরিমান   / Qty</label>
                        <input class="form-control image"  type="number" value="{{$product->stock_unit}}" name="qty" readable required>
                      </div> --}}
                      <div class="col-md-4 position-relative mb-4">
                        <label class="form-label" for="validationTooltip03">কারেন্ট স্টক</label>
                        <input type="number" name="stock_unit" class="form-control" value="{{$product->stock_unit}}">
                        <div class="invalid-tooltip">Please provide a valid city.</div>
                      </div>
                      <div class="col-md-4 position-relative mb-4">
                        <label class="form-label" for="validationTooltip03">পণ্য যোগ করুন(optioanl)</label>
                        <input type="number" name="new_stock_unit" class="form-control"">
                        <div class="invalid-tooltip">Please provide a valid city.</div>
                      </div>
                      <div class="col-md-8 position-relative mb-4">
                        <label class="form-label" for="validationTooltip03">বিস্তারিত / Description</label>
                        <textarea class="form-control" id="validationTooltip03"  name="description" type="text">{{$product->description}}</textarea>
                        <div class="invalid-tooltip">Please provide a valid city.</div>
                      </div>
                     
                      <div class="col-12 text-right">
                        <button class="btn btn-primary" type="submit">আপডেট </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
 
          <script type="text/javascript">
                
          $(document).ready(function (e) {
           
             
             $('#image').change(function(){
                      
              let reader = new FileReader();
           
              reader.onload = (e) => { 
           
                $('#preview-image-before-upload').attr('src', e.target.result); 
              }
           
              reader.readAsDataURL(this.files[0]); 
             
             });
             
          });
           
          </script>
          
@endsection
