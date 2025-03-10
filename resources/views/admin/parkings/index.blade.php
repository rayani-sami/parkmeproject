@extends('admin.layout.layout')
@section('content')
<div class="container-fluid">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des parkings</h4>

                @if (session()->has('success'))
                <script>
                  toastr.success("{{Session::get('success');}}")
                </script>

                 @endif



                <a style="max-width: 150px; float: right; display: inline-block;"
                   href="javascript:void(0)"
                   class="btn btn-outline-success"
                   data-bs-toggle="modal"
                   data-bs-target="#addParkingModal">
                   Add parking
                </a>
                <br><br><br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Total Space</th>
                                <th>Available Space</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parkings as $parking)
                                <tr>
                                    <td>{{ $parking['id'] }}</td>
                                    <td>{{ $parking['name'] }}</td>
                                    <td>{{ $parking['address'] }}</td>
                                    <td>{{ $parking['total_spaces'] }}</td>
                                    <td>{{ $parking['available_spaces'] }}</td>
                                    <td>
                                        <!-- Bouton Modifier -->
                                        <button class="btn btn-outline-primary editParkingBtn"
                                        data-id="{{ $parking['id'] }}"
                                        data-name="{{ $parking['name'] }}"
                                        data-address="{{ $parking['address'] }}"
                                        data-total_spaces="{{ $parking['total_spaces'] }}"
                                        data-available_spaces="{{ $parking['available_spaces'] }}"
                                        data-latitude="{{ $parking['latitude'] }}"
                                        data-longitude="{{ $parking['longitude'] }}"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editParkingModal">
                                    Edit
                                </button>


                                        <!-- Bouton Supprimer -->
                                        <a href="javascript:void(0)"
                                           module="parking"
                                           moduleid="{{ $parking['id'] }}"
                                           title="parking"
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

            <div id="map" style="height: 500px;"></div>
        </div>
    </div>
</div>

<!-- Modal d'ajout de parking -->
<div class="modal fade" id="addParkingModal" tabindex="-1" role="dialog" inert>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Parking</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.parkings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Parking Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Spaces</label>
                        <input type="number" class="form-control" name="total_spaces" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Available Spaces</label>
                        <input type="number" class="form-control" name="available_spaces" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" name="latitude" id="add_latitude" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" name="longitude" id="add_longitude" required>
                    </div>

                    <!-- Bouton pour choisir un emplacement sur la carte -->
                    <button type="button" class="btn btn-info" id="setLocationBtn">Sélectionner sur la carte</button>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Parking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de modification -->
<div class="modal fade" id="editParkingModal" tabindex="-1" role="dialog" inert>

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Parking</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="editParkingForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-3">
                        <label class="form-label">Parking Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" id="edit_address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Total Spaces</label>
                        <input type="number" class="form-control" id="edit_total_spaces" name="total_spaces" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Available Spaces</label>
                        <input type="number" class="form-control" id="edit_available_spaces" name="available_spaces" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="edit_latitude" name="latitude" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="edit_longitude" name="longitude" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Parking</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".editParkingBtn").forEach(button => {
        button.addEventListener("click", function () {
            let id = this.getAttribute("data-id");
            let name = this.getAttribute("data-name");
            let address = this.getAttribute("data-address");
            let total_spaces = this.getAttribute("data-total_spaces");
            let available_spaces = this.getAttribute("data-available_spaces");
            let latitude = this.getAttribute("data-latitude");
            let longitude = this.getAttribute("data-longitude");

            document.getElementById("edit_id").value = id;
            document.getElementById("edit_name").value = name;
            document.getElementById("edit_address").value = address;
            document.getElementById("edit_total_spaces").value = total_spaces;
            document.getElementById("edit_available_spaces").value = available_spaces;
            document.getElementById("edit_latitude").value = latitude;
            document.getElementById("edit_longitude").value = longitude;

            let updateUrl = "{{ route('admin.parkings.update', ':id') }}".replace(':id', id);
            document.getElementById("editParkingForm").setAttribute("action", updateUrl);
        });
    });
});


</script>



<script>
 var map = L.map('map').setView([36.8065, 10.1815], 7); // Coordonnées de la Tunisie

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var parkings = @json($parkings); // Récupération des parkings

    parkings.forEach(function(parking) {
        if (parking.latitude && parking.longitude) {
            L.marker([parking.latitude, parking.longitude])
                .addTo(map)
                .bindPopup(`<b>name :${parking.name}</b>
                <br>address : ${parking.address}
                 <br>available_spaces : ${parking.available_spaces}`);
        }
    });
</script>


<script>
    var selectedMarker;

    function onMapClick(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // Supprime l'ancien marqueur s'il existe
        if (selectedMarker) {
            map.removeLayer(selectedMarker);
        }

        // Ajoute un nouveau marqueur
        selectedMarker = L.marker([lat, lng]).addTo(map)
            .bindPopup("Emplacement sélectionné")
            .openPopup();

        // Mettre à jour les champs des formulaires d'ajout et de modification
        document.getElementById("add_latitude")?.value = lat;
        document.getElementById("add_longitude")?.value = lng;
        document.getElementById("edit_latitude")?.value = lat;
        document.getElementById("edit_longitude")?.value = lng;
    }

    map.on('click', onMapClick);

    document.getElementById("setLocationBtn")?.addEventListener("click", function() {
        alert("Cliquez sur la carte pour choisir l'emplacement du parking !");
        map.on('click', onMapClick);
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
      const modals = document.querySelectorAll('.modal');

      modals.forEach(function (modal) {
          modal.addEventListener('shown.bs.modal', function () {
              // Quand le modal est affiché, on enlève 'inert' et on met le focus sur le premier champ du formulaire
              modal.removeAttribute('aria-hidden');
              modal.removeAttribute('inert');

              // Placer le focus sur le premier champ de formulaire (si disponible)
              let firstInput = modal.querySelector('input, button');
              if (firstInput) {
                  firstInput.focus();
              }
          });

          modal.addEventListener('hidden.bs.modal', function () {
              // Quand le modal est caché, on réapplique 'inert' pour empêcher l'interaction
              modal.setAttribute('aria-hidden', 'true');
              modal.setAttribute('inert', 'true');
          });
      });
  });


 </script>

@endsection


