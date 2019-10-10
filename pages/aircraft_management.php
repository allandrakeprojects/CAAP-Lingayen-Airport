<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between" style="align-items: center">
              <h4 class="m-0 font-weight-bold" style="color: #38ce3c">Aircraft Management</h4>
              <span class="float-sm-right"><button type="button" class="btn btn-rounded btn-dark btn-fw" style="color: #38ce3c" data-toggle="modal" data-target="#exampleModalAddAircraft">Add Aircraft</button></span>
            </div>
            <div class="card-body">
              <!-- <div class="mb-4">
                <label for="sort_aircraft_code">Aircraft Code:</label>

                <select id="sort_aircraft_code" name="sort_aircraft_code">
                </select>
                <br/>
                <label for="sort_aircraft_name">Aircraft Name: <strong id="sort_aircraft_name">Omni Aviation</strong></label>
              </div> -->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableAircraft" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Registration No.</th>
                      <th>Model</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>

        <!-- Add Modal starts -->
        <div class="modal fade" id="exampleModalAddAircraft" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add Aircraft</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="aircraft-code" class="col-form-label" style="padding-bottom: 0">Aircraft Code:</label>
                    <input type="text" class="form-control" id="aircraft-code">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="aircraft-name" class="col-form-label" style="padding-bottom: 0">Aircraft Name:</label>
                    <input type="text" class="form-control" id="aircraft-name">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="reg-no" class="col-form-label" style="padding-bottom: 0">Registration No.:</label>
                    <input type="text" class="form-control" id="reg-no">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="model" class="col-form-label" style="padding-bottom: 0">Model:</label>
                    <input type="text" class="form-control" id="model">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-add-aircraft" style="color: #38ce3c">Add</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <!-- Update Modal starts -->
        <div class="modal fade" id="exampleModalUpdateAircraft" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update Aircraft</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="aircraft-code-update" class="col-form-label" style="padding-bottom: 0">Aircraft Code:</label>
                    <input type="text" class="form-control" id="aircraft-code-update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="aircraft-name-update" class="col-form-label" style="padding-bottom: 0">Aircraft Name:</label>
                    <input type="text" class="form-control" id="aircraft-name-update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="reg-no-update" class="col-form-label" style="padding-bottom: 0">Registration No.:</label>
                    <input type="text" class="form-control" id="reg-no-update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="model-update" class="col-form-label" style="padding-bottom: 0">Model:</label>
                    <input type="text" class="form-control" id="model-update">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-update-aircraft-modal">Update</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <!-- Delete Modal starts -->
        <div class="modal fade" id="exampleModalDeleteAircraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Delete Aircraft</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body modal-body-delete" style="padding: 15px 30px">
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-delete-aircraft-modal">Delete</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>