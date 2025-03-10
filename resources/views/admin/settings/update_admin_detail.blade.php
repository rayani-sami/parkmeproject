@extends('admin.layout.layout')
@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>success: </strong> {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                   </button>
                        </div>
           @endif
            <div class="clearfix">

                <div class="card card-bx author-profile m-b30">
                    <div class="card-body">

                        <div class="p-5">
                            <div class="author-profile">
                                <div class="author-media">
                                    <img src="{{url(Auth::guard('admin')->user()->image)}}" alt="">
                                    <div class="upload-link" title="" data-bs-toggle="tooltip" data-placement="right" data-original-title="update">
                                        <input type="" class="update-flie">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                <div class="author-info">
                                    <h6 class="title">{{Auth::guard('admin')->user()->name}}</h6>
                                    <span>Developer</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="card  card-bx m-b30">
                <div class="card-header">
                    <h6 class="title">Account setup</h6>
                </div>
                <form class="profile-form" action="{{url('/update-admin-details')}}"  method="POST"  enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-6 m-b30">
                                <label class="form-label">email</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}"  readonly>
                            </div>

                            <div class="col-sm-6 m-b30">
                                <label class="form-label">name</label>
                                <input type="text" class="form-control"id="admin_name" name="admin_name" placeholder=" Name Here" value="{{Auth::guard('admin')->user()->name}}">
                            </div>

                            <div class="col-sm-6 m-b30">
                                <label class="form-label">mobile</label>
                                <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" placeholder="mobile Here"   value="{{Auth::guard('admin')->user()->mobile}}">
                            </div>


                            <div class="form-group">
                                <label for="inputPhoto" class="col-form-label">Photo <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{old('photo')}}">
                              </div>
                              <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                @error('photo')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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
