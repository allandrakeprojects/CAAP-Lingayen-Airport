<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <a class="mb-3" href="index.php" style="color: #38ce3c; display: block">< HOME</a>
        <div class="row">
          <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between" style="align-items: center">
              <h4 class="m-0 font-weight-bold" style="color: #38ce3c">Schedule</h4>
              <span class="float-sm-right"><button type="button" class="btn btn-rounded btn-dark btn-fw" style="color: #38ce3c" data-toggle="modal" data-target="#exampleModalAddSchedule">Add Schedule</button></span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableSchedule" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Aircraft Ident</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Name of Student</th>
                      <th>Nationality</th>
                      <th>Flight Instructor</th>
                      <th>Route</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- <tbody>
                    <tr>
                      <td style="font-weight:bold">John Doe</td>
                      <td >Philippines</td>
                      <td>Bermuda Triangle</td>
                      <td>Passenger</td>
                      <td><label class="badge badge-danger">Inactive</label></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;" data-toggle="modal" data-target="#exampleModalUpdateSchedule" data-whatever="@fat">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  data-target="#exampleModalDeleteSchedule" data-whatever="@fat">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                  </tbody> -->
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>

        <!-- Add Modal starts -->
        <div class="modal fade" id="exampleModalAddSchedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="aircraft_ident" class="col-form-label" style="padding-bottom: 0">Aircraft Ident:</label>
                    <input type="text" class="form-control" id="aircraft_ident">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="time" class="col-form-label" style="padding-bottom: 0">Time:</label>
                    <div class="row income-expense-summary-chart-text" style="margin-left: 2px;">
                        <div class="d-flex align-items-center">
                            <div class="input-group" id="daterange-schedule-modal">
                                <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                                <input type="text" class="form-control" style="width: 320px;" id="time">
                                <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="name_student" class="col-form-label" style="padding-bottom: 0">Name of Student:</label>
                    <input type="text" class="form-control" id="name_student">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="nationality" class="col-form-label" style="padding-bottom: 0">Nationality:</label>
                    <input type="text" class="form-control" id="nationality">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="flight_instructor" class="col-form-label" style="padding-bottom: 0">Flight Instructor:</label>
                    <input type="text" class="form-control" id="flight_instructor">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="route" class="col-form-label" style="padding-bottom: 0">Route:</label>
                    <input type="text" class="form-control" id="route">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-add-schedule" style="color: #38ce3c">Add</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <!-- Update Modal starts -->
        <div class="modal fade" id="exampleModalUpdateSchedule" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="aircraft_ident_update" class="col-form-label" style="padding-bottom: 0">Aircraft Ident:</label>
                    <input type="text" class="form-control" id="aircraft_ident_update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="time_update" class="col-form-label" style="padding-bottom: 0">Time:</label>
                    <div class="row income-expense-summary-chart-text" style="margin-left: 2px;">
                        <div class="d-flex align-items-center">
                            <div class="input-group" id="daterange-schedule-update-modal">
                                <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                                <input type="text" class="form-control" style="width: 320px;" id="time_update">
                                <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="name_student_update" class="col-form-label" style="padding-bottom: 0">Name of Student:</label>
                    <input type="text" class="form-control" id="name_student_update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="nationality_update" class="col-form-label" style="padding-bottom: 0">Nationality:</label>
                    <input type="text" class="form-control" id="nationality_update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="flight_instructor_update" class="col-form-label" style="padding-bottom: 0">Flight Instructor:</label>
                    <input type="text" class="form-control" id="flight_instructor_update">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="route_update" class="col-form-label" style="padding-bottom: 0">Route:</label>
                    <input type="text" class="form-control" id="route_update">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-update-schedule-modal">Update</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

        <!-- Delete Modal starts -->
        <div class="modal fade" id="exampleModalDeleteSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Delete Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body modal-body-delete" style="padding: 15px 30px">
                <p></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-delete-schedule-modal">Delete</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>