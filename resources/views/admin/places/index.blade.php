@extends('admin.layout.layout')
@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des places </h4>

    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addPlaceModal">Add Place</button>
                <br><br><br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>parking Name</th>
                                <th>place number</th>
                                <th>is_available</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($places as $place)
                                <tr>
                                    <td>{{ $place->id }}</td>
                                    <td>{{ $place->parking->name }}</td>
                                    <td>{{ $place->number }}</td>
                                    <td>{{ $place->is_available ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary editPlaceBtn"
                                            data-id="{{ $place->id }}"
                                            data-parking_id="{{ $place->parking_id }}"
                                            data-number="{{ $place->number }}"
                                            data-is_available="{{ $place->is_available }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editPlaceModal">Edit
                                        </button>


                                       <!-- Bouton Supprimer -->
                                       <a href="javascript:void(0)"
                                       module="place"
                                       moduleid="{{ $place['id'] }}"
                                       title="place"
                                       class="confirmDelete">
                                        <i style="font-size: 15px;" class="btn btn-outline-danger">Delete</i>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'ajout de parking -->
<div class="modal fade" id="addPlaceModal" tabindex="-1" role="dialog" aria-labelledby="addPlaceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlaceModalLabel">Add Place</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="addPlaceForm" method="POST" action="{{ route('admin.places.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Parking</label>
                        <select class="form-control" name="parking_id" required>
                            @foreach($parkings as $parking)
                                <option value="{{ $parking->id }}">{{ $parking->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Number</label>
                        <input type="number" class="form-control" name="number" required>
                    </div>
                    <div class="mb-3">
                        <label>Available</label>
                        <select class="form-control" name="is_available">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Place</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal de modification -->
<div class="modal fade" id="editPlaceModal" tabindex="-1" role="dialog" aria-labelledby="editPlaceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlaceModalLabel">Edit Place</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="editPlaceForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-3">
                        <label>Parking</label>
                        <select class="form-control" id="edit_parking_id" name="parking_id" required>
                            @foreach($parkings as $parking)
                                <option value="{{ $parking->id }}">{{ $parking->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Number</label>
                        <input type="number" class="form-control" id="edit_number" name="number" required>
                    </div>
                    <div class="mb-3">
                        <label>Available</label>
                        <select class="form-control" id="edit_is_available" name="is_available">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Place</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".editPlaceBtn").forEach(button => {
        button.addEventListener("click", function () {
            let id = this.getAttribute("data-id");
            let parking_id = this.getAttribute("data-parking_id");
            let number = this.getAttribute("data-number");
            let is_available = this.getAttribute("data-is_available");

            document.getElementById("edit_id").value = id;
            document.getElementById("edit_parking_id").value = parking_id;
            document.getElementById("edit_number").value = number;
            document.getElementById("edit_is_available").value = is_available;

            let updateUrl = "{{ route('admin.places.update', ':id') }}".replace(':id', id);
            document.getElementById("editPlaceForm").setAttribute("action", updateUrl);
        });
    });
});


</script>

@endsection
