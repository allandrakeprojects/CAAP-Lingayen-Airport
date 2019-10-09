<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between" style="align-items: center">
              <h4 class="m-0 font-weight-bold" style="color: #38ce3c">Flight Plans </h4>
              <span class="float-sm-right"><button type="button" class="btn btn-rounded btn-dark btn-fw" style="color: #38ce3c" data-toggle="modal" data-target="#exampleModalAddFlight">Add Flight</button></span>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <div class="row income-expense-summary-chart-text">
                  <div class="col-md-6 col-xl-4 d-flex align-items-center">
                    <div class="input-group" id="income-expense-summary-chart-daterange">
                      <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                      <input type="text" class="form-control">
                      <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center">
                  <thead>
                    <tr>
                        <th style="vertical-align: middle" rowspan="3">Date</th>
                        <th colspan="3">Time of Operation</th>
                        <th colspan="4">Flight Particulars</th>
                        <th colspan="3">Aircraft Particulars</th>
                        <th colspan="4">Passenger Traffic</th>
                        <th colspan="4">Freight Traffic</th>
                        <th style="vertical-align: middle" rowspan="3">Action</th>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle" rowspan="2">Landing</th>
                        <th style="vertical-align: middle" rowspan="2">Take-Off</th>
                        <th style="vertical-align: middle" rowspan="2">Parking</th>
                        <th style="vertical-align: middle" rowspan="2">Nature</th>
                        <th style="vertical-align: middle" rowspan="2">Flight No.</th>
                        <th style="vertical-align: middle" rowspan="2">Origin</th>
                        <th style="vertical-align: middle" rowspan="2">Destination</th>
                        <th style="vertical-align: middle" rowspan="2">Type</th>
                        <th style="vertical-align: middle" rowspan="2">Reg. No</th>
                        <th style="vertical-align: middle" rowspan="2">Owner</th>
                        <th style="vertical-align: middle" rowspan="2">Arrival</th>
                        <th style="vertical-align: middle" colspan="3">Depature</th>
                        <th style="vertical-align: middle" colspan="2">General Cargo</th>
                        <th style="vertical-align: middle; border-right-width: 1px;" colspan="2">Air Mail</th>
                    </tr>
                    <tr>
                        <th>Non-Revenue</th>
                        <th>Dead head</th>
                        <th>Transit</th>
                        <th>Unloaded</th>
                        <th>Loaded</th>
                        <th>Unloaded</th>
                        <th style="border-right-width: 1px;">Loaded</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>Flight</th>
                      <th>To</th>
                      <th>From</th>
                      <th>Status</th>
                      <th>Gate</th>
                      <th>Departure</th>
                      <th>Arrival</th>
                      <th>Pilot</th>
                      <th>Action</th>
                    </tr>
                  </tfoot> -->
                  <tbody>
                    <tr>
                      <td style="font-weight:bold">CX7183</td>
                      <td >Philippines</td>
                      <td>Bermuda Triangle</td>
                      <td><label class="badge badge-danger">Delayed</label></td>
                      <td>A-11</td>
                      <td>07:40</td>
                      <td>23:35</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>John Doe</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;" data-toggle="modal" data-target="#exampleModalUpdateFlight" data-whatever="@fat">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  data-target="#exampleModalDeleteFlight">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>

        <!-- Add Modal starts -->
        <div class="modal fade" id="exampleModalAddFlight" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add Flight</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="flight-name" class="col-form-label" style="padding-bottom: 0">Landing and Take-Off:</label>
                    <div class="row income-expense-summary-chart-text" style="margin-left: 2px;">
                      <div class="d-flex align-items-center">
                        <div class="input-group" id="income-expense-summary-chart-daterange-modal">
                          <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                          <input type="text" class="form-control">
                          <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="parking" class="col-form-label" style="padding-bottom: 0">Parking:</label>
                    <input type="text" class="form-control" id="parking">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="nature" class="col-form-label" style="padding-bottom: 0">Nature:</label>
                    <input type="text" class="form-control" id="nature">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="flight-no" class="col-form-label" style="padding-bottom: 0">Flight No.:</label>
                    <input type="text" class="form-control" id="flight-no">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="origin" class="col-form-label" style="padding-bottom: 0">Origin:</label>
                    <input type="text" class="form-control" id="origin">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="destination" class="col-form-label" style="padding-bottom: 0">Destination:</label>
                    <input type="text" class="form-control" id="destination">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="type" class="col-form-label" style="padding-bottom: 0">Type:</label>
                    <input type="text" class="form-control" id="type">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="reg-no" class="col-form-label" style="padding-bottom: 0">Reg. No.:</label>
                    <input type="text" class="form-control" id="reg-no">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="owner" class="col-form-label" style="padding-bottom: 0">Owner:</label>
                    <input type="text" class="form-control" id="owner">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="arrival" class="col-form-label" style="padding-bottom: 0">Arrival:</label>
                    <input type="text" class="form-control" id="arrival">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="non-revenue" class="col-form-label" style="padding-bottom: 0">Non-Revenue:</label>
                    <input type="text" class="form-control" id="non-revenue">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="dead-head" class="col-form-label" style="padding-bottom: 0">Dead head:</label>
                    <input type="text" class="form-control" id="dead-head">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="transit" class="col-form-label" style="padding-bottom: 0">Transit:</label>
                    <input type="text" class="form-control" id="transit">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gc-unloaded" class="col-form-label" style="padding-bottom: 0">GC Unloaded:</label>
                    <input type="text" class="form-control" id="gc-unloaded">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gc-loaded" class="col-form-label" style="padding-bottom: 0">GC Loaded:</label>
                    <input type="text" class="form-control" id="gc-loaded">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="am-unloaded" class="col-form-label" style="padding-bottom: 0">AM Unloaded:</label>
                    <input type="text" class="form-control" id="am-unloaded">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="am-loaded" class="col-form-label" style="padding-bottom: 0">AM Loaded:</label>
                    <input type="text" class="form-control" id="am-loaded">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="license-no" class="col-form-label" style="padding-bottom: 0">License No.:</label>
                    <input type="text" class="form-control" id="license-no">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" style="color: #38ce3c">Add</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- Modal Ends -->

        <div class="modal fade" id="exampleModalUpdateFlight" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update Flight</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="flight-name" class="col-form-label" style="padding-bottom: 0">Landing and Take-Off:</label>
                    <div class="row income-expense-summary-chart-text" style="margin-left: 2px;">
                      <div class="d-flex align-items-center">
                        <div class="input-group" id="income-expense-summary-chart-daterange-modal">
                          <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                          <input type="text" class="form-control">
                          <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="parking" class="col-form-label" style="padding-bottom: 0">Parking:</label>
                    <input type="text" class="form-control" id="parking">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="nature" class="col-form-label" style="padding-bottom: 0">Nature:</label>
                    <input type="text" class="form-control" id="nature">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="flight-no" class="col-form-label" style="padding-bottom: 0">Flight No.:</label>
                    <input type="text" class="form-control" id="flight-no">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="origin" class="col-form-label" style="padding-bottom: 0">Origin:</label>
                    <input type="text" class="form-control" id="origin">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="destination" class="col-form-label" style="padding-bottom: 0">Destination:</label>
                    <input type="text" class="form-control" id="destination">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="type" class="col-form-label" style="padding-bottom: 0">Type:</label>
                    <input type="text" class="form-control" id="type">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="reg-no" class="col-form-label" style="padding-bottom: 0">Reg. No.:</label>
                    <input type="text" class="form-control" id="reg-no">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="owner" class="col-form-label" style="padding-bottom: 0">Owner:</label>
                    <input type="text" class="form-control" id="owner">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="arrival" class="col-form-label" style="padding-bottom: 0">Arrival:</label>
                    <input type="text" class="form-control" id="arrival">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="non-revenue" class="col-form-label" style="padding-bottom: 0">Non-Revenue:</label>
                    <input type="text" class="form-control" id="non-revenue">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="dead-head" class="col-form-label" style="padding-bottom: 0">Dead head:</label>
                    <input type="text" class="form-control" id="dead-head">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="transit" class="col-form-label" style="padding-bottom: 0">Transit:</label>
                    <input type="text" class="form-control" id="transit">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gc-unloaded" class="col-form-label" style="padding-bottom: 0">GC Unloaded:</label>
                    <input type="text" class="form-control" id="gc-unloaded">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gc-loaded" class="col-form-label" style="padding-bottom: 0">GC Loaded:</label>
                    <input type="text" class="form-control" id="gc-loaded">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="am-unloaded" class="col-form-label" style="padding-bottom: 0">AM Unloaded:</label>
                    <input type="text" class="form-control" id="am-unloaded">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="am-loaded" class="col-form-label" style="padding-bottom: 0">AM Loaded:</label>
                    <input type="text" class="form-control" id="am-loaded">
                  </div>
                  <hr>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="license-no" class="col-form-label" style="padding-bottom: 0">License No.:</label>
                    <input type="text" class="form-control" id="license-no">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark" style="color: #38ce3c">Add</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>

        <!-- Delete Modal starts -->
        <div class="modal fade" id="exampleModalDeleteFlight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Delete Flight</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <p>Are you sure you want to delete this flight?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>