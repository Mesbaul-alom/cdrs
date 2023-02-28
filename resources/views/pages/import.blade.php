@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="card bg-light mt-3">

            <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6" style="color: black;font-size: larger;font-style: normal;font-weight: bolder;">
                            <label for="">My Cdrs Data</label>
                            <input type="file" class="form-control" name="mycsv" id="mycsv">
                        </div>
                        <div class="col-md-6"
                            style="color: black;font-size: larger;font-style: normal;font-weight: bolder;">
                            <label for="">Client Cdrs Data</label>
                            <input type="file" class="form-control" name="mycsv" id="mycsv">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success">Compair</button>

                </form>
            </div>
        </div>
    </div>
@endsection
