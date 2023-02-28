@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
<div class="page-title">
    <div class="row">
    <div class="col-12 col-sm-6">
        <h3>Genarel Setting</h3>
    </div>
    <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
        <li class="breadcrumb-item">Genarel Setting</li>
        </ol>
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
       
            <form class="row g-3 needs-validation" method="POST" action="{{route('admin.store.update.setting')}}" enctype="multipart/form-data">
           @csrf
                <div class="col-md-12 position-relative">
            <label class="form-label" for="validationTooltip01"> <span class="text-danger">* </span>  Name</label>
            <input class="form-control" id="validationTooltip01" type="text" name="company_name" value="{{optional($setting)->company_name}}" required="">
            <div class="valid-tooltip"></div>
            </div>

            <div class="col-md-6 position-relative">
            <label class="form-label" for="validationTooltip02"> <span class="text-danger">* </span>  Email</label>
            <input class="form-control" id="validationTooltip02" name="email" type="email" value="{{optional($setting)->email}}" required="">
            <div class="valid-tooltip"></div>
            </div>
            <div class="col-md-3 position-relative">
            <label class="form-label" for="validationTooltip02">Logo </label>
            <input class="form-control image" id="image" type="file" name="logo" value="Otto" ="">
            @error('logo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        {{-- <img class="shadow rounded" src="{{asset(optional($setting)->logo)}}" alt="" width="260px"> --}}
            <div class="valid-tooltip">Looks good!</div>
            </div>
            <div class="col-md-3 position-relative">
            <img id="preview-image-before-upload" width="100%" src="{{asset('./public/'.optional($setting)->logo)}}">
            </div>
            
            <div class="col-md-12 position-relative">
            <label class="form-label" for="validationTooltip02"> <span class="text-danger">* </span>  Website</label>
            <input class="form-control" id="validationTooltip02" name="website" value="{{optional($setting)->website}}" type="text" value="" required="">
            <div class="valid-tooltip"></div>
            </div>
            
            <div class="col-md-12 text-right">
            <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
