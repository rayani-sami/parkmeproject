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
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                         <strong>success: </strong> {{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                       </button>
                            </div>
               @endif

               @if(Session::has('error_message'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>error: </strong> {{Session::get('error_message')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              @endif
                <div class="card-header">
                    <h6 class="title">edit password</h6>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                       <ul>
                        @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                  @endif



                </div>
                <form class="profile-form" action="{{url('admin/update-admin-password')}}" method="post">@csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">email</label>
                                <input type="text" class="form-control" value="{{Auth::guard('admin')->user()->email}}"  readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">name</label>
                                <input type="text" class="form-control"id="admin_name" name="admin_name" placeholder=" Name Here" value="{{Auth::guard('admin')->user()->name}}" readonly>
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">current password</label>
                                <input type="text" class="form-control" id="current_password" name="current_password" placeholder="current_password Here" >
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">new password</label>
                                <input type="text" class="form-control" id="new_password" name="new_password" placeholder="new_password Here"   >
                            </div>
                            <div class="col-sm-6 m-b30">
                                <label class="form-label">confirm password</label>
                                <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm_password Here"   >
                            </div>


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
