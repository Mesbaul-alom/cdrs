@extends('layouts.app')
@section('body_content')
<div class="container-fluid">
<div class="page-title">
    <div class="row">
    <div class="col-12 col-sm-6">
        <h3>ইউসার রোল / User Roll</h3>
    </div>
    <div class="col-12 col-sm-6">
        <div class="text-right">
            <button class="btn btn-info " type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">অ্যাড নিউ রোল</button>
        </div>
    
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">অ্যাড নিউ রোল</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.create.roll')}}" method="post">
                    @csrf
                <div class="modal-body">
                <div class="position-relative">
                    <label class="form-label" for="validationTooltip02"> <span class="text-danger">* </span> Role Name</label>
                    <input class="form-control" id="validationTooltip02" type="text" name="name" value="" required="">
                </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit">Add</button>
                </div>
                </form>
            </div>
            </div>
        </div>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" width="10%">SI</th>
                        <th scope="col" width="60%">Role Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php( $i = 1 )
                        @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{str_replace(Auth::user()->shop_id."#","", $role->name)}}</td>
                        <td>
                            <a href="{{url('/admin/edit-role/'.$role->id)}}" class="btn btn-primary">এডিট</a> 
                            <a href="{{url('/admin/role-permissions/'.$role->id)}}" class="btn btn-success">পারমিশন</a> 
                            {{-- <a href="{{route('g.store.permissions')}}" class="btn btn-success">পারমিশন</a>  --}}
                        </td>
                        </tr>
                        @php( $i += 1 )
                            @endforeach
                      
                            
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
@endsection
