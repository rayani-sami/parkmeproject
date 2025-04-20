@extends('admin.layout.layout')
@section('content')
<div class="container-fluid">
	<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">liste des reservation </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850"  class="datatable">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Parking</th>
                                <th>Place</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>{{ $reservation->place->parking->name }}</td>
                                        <td>{{ $reservation->place->number }}</td>
                                        <td>{{ $reservation->start_time }}</td>
                                        <td>{{ $reservation->end_time }}</td>
                                        <td>{{ $reservation->status }}</td>
                                        <td>

                                            <!-- Bouton Supprimer -->
                                            <a href="javascript:void(0)"
                                            module="reservation"
                                            moduleid="{{ $reservation['id'] }}"
                                            title="reservation"
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
