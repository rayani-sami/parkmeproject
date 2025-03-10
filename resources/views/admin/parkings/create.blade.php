@extends('admin.layout.layout')
@section('content')

      <!-- Large modal -->
      <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Large modal</button>
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Modal title</h5>
                      <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">Modal body text goes here.
                    <form action="{{ route('admin.parkings.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Parking Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_spaces" class="form-label">Total Spaces</label>
                            <input type="number" class="form-control" id="total_spaces" name="total_spaces" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Parking</button>
                        <a href="{{ route('admin.parkings.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>


                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
              </div>
          </div>
      </div>




@endsection
