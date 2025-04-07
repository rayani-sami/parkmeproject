@extends('admin.layout.layout')
@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">


        </div>
        <div class="col-xl-9 col-lg-8">
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>success: </strong> {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                   </button>
                        </div>
           @endif
            <div class="card  card-bx m-b30">
                <div class="card-header">
                    <h6 class="title">Account setup</h6>

                </div>
                <form class="profile-form" action="{{url('admin/update-admin-details')}}"  method="POST"  enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-6 m-b30">
                                <label class="form-label">email</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}"  readonly>
                            </div>

                            <div class="col-sm-6 m-b30">
                                <label class="form-label">firstname</label>
                                <input type="text" class="form-control"id="admin_name" name="admin_name" placeholder=" firstName Here" value="{{Auth::guard('admin')->user()->firstname}}">
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">lastname</label>
                                <input type="text" class="form-control"id="admin_lastname" name="admin_lastname" placeholder=" lastname Here" value="{{Auth::guard('admin')->user()->lastname}}">
                            </div>
                             <div class="card-footer">
                                <button class="btn btn-primary"  type="submit">UPDATE</button>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
