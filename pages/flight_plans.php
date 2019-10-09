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
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
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
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;" data-toggle="modal" data-target="#exampleModalUpdateFlight" data-whatever="@fat">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  data-target="#exampleModalDeleteFlight" data-whatever="@fat">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">CX7112</td>
                      <td>Philippines</td>
                      <td>Black Hole</td>
                      <td><label class="badge badge-info">Scheduled</label></td>
                      <td>A-12</td>
                      <td>03:40</td>
                      <td>22:36</td>
                      <td>John Smith</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">CX7154</td>
                      <td>Philippines</td>
                      <td>Diyan lang</td>
                      <td><label class="badge badge-warning">Departed</label></td>
                      <td>A-13</td>
                      <td>02:40</td>
                      <td>05:16</td>
                      <td>Janny Smith</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">CX7123</td>
                      <td>Philippines</td>
                      <td>Kahit saan</td>
                      <td><label class="badge badge-warning">In Air</label></td>
                      <td>A-14</td>
                      <td>23:22</td>
                      <td>06:41</td>
                      <td>Janny Doe</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">CX7152</td>
                      <td>Philippines</td>
                      <td>Antartic</td>
                      <td><label class="badge badge-success">Landed</label></td>
                      <td>A-15</td>
                      <td>04:30</td>
                      <td>18:53</td>
                      <td>Foe</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">CX7135</td>
                      <td>Philippines</td>
                      <td>Ocean</td>
                      <td><label class="badge badge-success">Arrived</label></td>
                      <td>A-16</td>
                      <td>15:50</td>
                      <td>22:12</td>
                      <td>Doe</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">CX7125</td>
                      <td>Philippines</td>
                      <td>Deep web</td>
                      <td><label class="badge badge-danger">Cancelled</label></td>
                      <td>A-17</td>
                      <td>12:40</td>
                      <td>04:25</td>
                      <td>Smith</td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm">
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
                    <label for="flight-name" class="col-form-label" style="padding-bottom: 0">Flight:</label>
                    <input type="text" class="form-control" id="flight-name">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="from-location" class="col-form-label" style="padding-bottom: 0">From:</label>
                    <input type="text" class="form-control" id="from-location">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="to-location" class="col-form-label" style="padding-bottom: 0">To:</label>
                    <input type="text" class="form-control" id="to-location">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="status" class="col-form-label" style="padding-bottom: 0">Status:</label>
                    <select class="form-control" id="exampleStatus">
                      <option>Select</option>
                      <option>Scheduled</option>
                      <option>Delayed</option>
                      <option>Departed</option>
                      <option>In Air</option>
                      <option>Landed</option>
                      <option>Arrived</option>
                      <option>Cancelled</option>
                    </select>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gate" class="col-form-label" style="padding-bottom: 0">Gate:</label>
                    <input type="text" class="form-control" id="gate">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gate" class="col-form-label" style="padding-bottom: 0">Departure-Arrival:</label>
                    <input type="text" class="form-control" id="gate">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="pilot" class="col-form-label" style="padding-bottom: 0">Pilot:</label>
                    <input type="text" class="form-control" id="pilot">
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
        <!-- Modal Ends -->

        <!-- Update Modal starts -->
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
                    <label for="flight-name" class="col-form-label" style="padding-bottom: 0">Flight:</label>
                    <input type="text" class="form-control" id="flight-name">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="from-location" class="col-form-label" style="padding-bottom: 0">From:</label>
                    <input type="text" class="form-control" id="from-location">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="to-location" class="col-form-label" style="padding-bottom: 0">To:</label>
                    <input type="text" class="form-control" id="to-location">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="status" class="col-form-label" style="padding-bottom: 0">Status:</label>
                    <select class="form-control" id="exampleStatus">
                      <option>Select</option>
                      <option>Scheduled</option>
                      <option>Delayed</option>
                      <option>Departed</option>
                      <option>In Air</option>
                      <option>Landed</option>
                      <option>Arrived</option>
                      <option>Cancelled</option>
                    </select>
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gate" class="col-form-label" style="padding-bottom: 0">Gate:</label>
                    <input type="text" class="form-control" id="gate">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gate" class="col-form-label" style="padding-bottom: 0">Departure-Arrival:</label>
                    <input type="text" class="form-control" id="gate">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="pilot" class="col-form-label" style="padding-bottom: 0">Pilot:</label>
                    <input type="text" class="form-control" id="pilot">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

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