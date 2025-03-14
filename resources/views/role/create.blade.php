@extends('layout.main')

@section('content')

@include('include.message')
@include('include.sidebar')
@include('include.BG2')


<div class="container-fluid p-0" style="margin-left: 80px; padding-top: 20px;">
    <form action="/role/store" method="post">
    <div class="card" style="position: relative; margin-top: 5px; margin-right: 10px; background-color: rgba(229, 225, 225, 0.8); color: #303030">
        <div class="card-header d-flex justify-content-between align-items-center" style="background-color: rgba(243, 243, 243, 0.6); color: rgb(32, 34, 35); border-bottom: none;">
            <h5 class="card-title" style="font-family: 'Bell MT'; font-size: 46px; margin-bottom: 0;">Add Role</h5>
            <!--- VISIBLE BACK BUTTON--->
            <a href="{{ url('/roles') }}" class="btn btn-outline btn-sm py-1 py-md-2 px-2 px-md-3" style="color: rgb(2, 1, 1); font-size: 14px;">
                <span class="d-none d-sm-inline"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16"> 
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                    </svg> Back
                </span>
                <span class="d-inline d-sm-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                    </svg>
                </span>
            </a>
        </div>
        <div class="card-body">
            @csrf
            <div class="row h-100">
                <div class="col-md-12 mt-3 mb-5">
                    <label for="role" style="font-family: 'Bell MT'; font-size: 30px;"> Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="{{ old('role') }}">
                    </div>
                    <!-- Other form fields... -->
                    <div class="d-flex justify-content-center mb-5 mt-5">
                        <button type="submit" class="btn btn-success col-sm-2 float-end" style="font-family: 'Montserrat'; font-size: 20px;">SAVE</button>
                    </div> 
                </div>
            </div>
        </div>
    </form>
</div>



@endsection
