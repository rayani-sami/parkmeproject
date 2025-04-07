@extends('admin.layout.layout')
@section('content')
<div class="container-fluid">
	<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">liste des utilisateurs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850"  class="datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )


                            <tr>
                                <td>{{$user['id']}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>
                                @if($user ['status']==1)
                                <a   class="updateUserStatus"    id=" user-{{ $user ['id']}}" user_id="{{ $user ['id']}}"
                               href="javascript:void(0)">
                               <i style="font-size: 20px;" class="btn btn-success" id="status-{{$user ['id']}}"  status="Active">activer</i></a>
                                @else
                                <a   class="updateUserStatus"    id="user-{{$user ['id']}}" user_id="{{$user ['id']}}"
                               href="javascript:void(0)">
                                 <i style="font-size: 20px;" class="btn btn-danger" id="status-{{$user ['id']}}" status="Inactive">Inactive</i></a>
                                @endif

                            </td>


                                <td>

                                      <!-- Bouton Supprimer -->
                                      <a href="javascript:void(0)"
                                      module="users"
                                      moduleid="{{ $user['id'] }}"
                                      title="users"
                                      class="confirmDelete">
                                       <i style="font-size: 15px;" class="btn btn-outline-danger">Delete</i>
                                   </a>
                                </td>
                            </tr>
                            @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
