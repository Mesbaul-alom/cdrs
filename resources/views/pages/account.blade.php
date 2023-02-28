@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
<div class="page-title">
    <div class="row">
    <div class="col-12 col-sm-6">
        <h3>ব্যবহারকারীর তথ্য/User Info</h3>
    </div>
    <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
        <li class="breadcrumb-item">ব্যবহারকারীর তথ্য<li>
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
       
            <form class="row g-3 needs-validation" method="POST" action="{{route('user.info.update')}}" enctype="multipart/form-data">
           @csrf
                <div class="col-md-12 position-relative">
            <label class="form-label" for="validationTooltip01"> <span class="text-danger">* </span> নাম / Name</label>
            <input class="form-control" id="validationTooltip01" type="text" name="name" value="{{optional($user)->name}}" required="">
            <div class="valid-tooltip"></div>
            </div>

            <div class="col-md-6 position-relative">
            <label class="form-label" for="validationTooltip02"> <span class="text-danger">* </span> ইমেইল / Email</label>
            <input class="form-control" id="validationTooltip02" name="email" type="email" value="{{optional($user)->email}}" required="">
             <h5 style="color: red">{{session('msg')}}</h5>
            <div class="valid-tooltip"></div>
            </div>
            <div class="col-md-6 position-relative">
            <label class="form-label" for="validationTooltip02">ফোন / Phone </label>
            <input class="form-control image" value="{{optional($user)->phone}}" type="number" name="phone" value="Otto" ="">
            </div>
            <div class="col-md-12 text-right">
            <button class="btn btn-primary" type="submit">Update</button>
            </div>
                               <input type="hidden" name="wing" value="{{$wing}}">
        </form>
        </div>
    </div>
    </div>
</div>
</div>
<div class="container-fluid">
   
<div class="row">
    <div class="col-sm-12">
    
    <div class="card">
        
        <div class="card-body">
        <center><h3>Password Change</h3></center>
        <br>
            <form class="row g-3 needs-validation" method="POST" action="{{route('user.password.update')}}" enctype="multipart/form-data">
           @csrf
                
            <div class="col-md-6 position-relative">
            <label class="form-label" for="validationTooltip02"> <span class="text-danger">* </span>Current Password</label>
            <input class="form-control"  name="cpassword" type="password" required="">
             <h5 style="color: red">{{session('msg1')}}</h5>
            <div class="valid-tooltip"></div>
            </div>
            <div class="col-md-6 position-relative">
            <label class="form-label" for="validationTooltip02">New Password</label>
            <input class="form-control "  type="password" name="newpassword" required>
            </div>
            <div class="col-md-12 text-right">
            <button class="btn btn-primary" type="submit">Update</button>
            </div>
                               <input type="hidden" name="wing" value="{{$wing}}">
        </form>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
