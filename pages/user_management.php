<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between" style="align-items: center">
              <h4 class="m-0 font-weight-bold" style="color: #38ce3c">User Management</h4>
              <span class="float-sm-right"><button type="button" class="btn btn-rounded btn-dark btn-fw" style="color: #38ce3c" data-toggle="modal" data-target="#exampleModalAddUser">Add User</button></span>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Full name</th>
                      <th>Contact Number</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- <tfoot>
                    <tr>
                      <th>User</th>
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
                      <td style="font-weight:bold">John Doe</td>
                      <td >Philippines</td>
                      <td>Bermuda Triangle</td>
                      <td>Bermuda Triangle</td>
                      <td>Passenger</td>
                      <td><label class="badge badge-danger">Inactive</label></td>
                      <td>
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;" data-toggle="modal" data-target="#exampleModalUpdateUser" data-whatever="@fat">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  data-target="#exampleModalDeleteUser" data-whatever="@fat">
                            <span class="icon-trash" aria-hidden="true"></span>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold">Janny</td>
                      <td>Philippines</td>
                      <td>Black Hole</td>
                      <td>Black Hole</td>
                      <td>Pilot</td>
                      <td><label class="badge badge-success">Active</label></td>
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
                      <td style="font-weight:bold">Foe</td>
                      <td>Philippines</td>
                      <td>Bermuda Triangle</td>
                      <td>Diyan lang</td>
                      <td>Pilot</td>
                      <td><label class="badge badge-success">Active</label></td>
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
                      <td style="font-weight:bold">Smith</td>
                      <td>Philippines</td>
                      <td>Kahit saan</td>
                      <td>Bermuda Triangle</td>
                      <td>Passenger</td>
                      <td><label class="badge badge-danger">Inactive</label></td>
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
                      <td style="font-weight:bold">John Smith</td>
                      <td>Philippines</td>
                      <td>Antartic</td>
                      <td>Bermuda Triangle</td>
                      <td>Passenger</td>
                      <td><label class="badge badge-danger">Inactive</label></td>
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
                      <td style="font-weight:bold">Janny Smith</td>
                      <td>Philippines</td>
                      <td>Ocean</td>
                      <td>Bermuda Triangle</td>
                      <td>Pilot</td>
                      <td><label class="badge badge-success">Arrived</label></td>
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
                      <td style="font-weight:bold">Janny Doe</td>
                      <td>Philippines</td>
                      <td>Deep web</td>
                      <td>Bermuda Triangle</td>
                      <td>Pilot</td>
                      <td><label class="badge badge-danger">Inactive</label></td>
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
        <div class="modal fade" id="exampleModalAddUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="full-name" class="col-form-label" style="padding-bottom: 0">Full name:</label>
                    <input type="text" class="form-control" id="full-name">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="contact-number" class="col-form-label" style="padding-bottom: 0">Contact Number:</label>
                    <input type="text" class="form-control" id="contact-number">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="address" class="col-form-label" style="padding-bottom: 0">Address:</label>
                    <input type="text" class="form-control" id="address">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="type" class="col-form-label" style="padding-bottom: 0">Type:</label>
                    <input type="text" class="form-control" id="type">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="status" class="col-form-label" style="padding-bottom: 0">Status:</label>
                    <select class="form-control" id="exampleStatus">
                      <option>Select</option>
                      <option>Active</option>
                      <option>Inactive</option>
                    </select>
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
        <div class="modal fade" id="exampleModalUpdateUser" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="full-name" class="col-form-label" style="padding-bottom: 0">Full name:</label>
                    <input type="text" class="form-control" id="full-name">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="contact-number" class="col-form-label" style="padding-bottom: 0">Contact Number:</label>
                    <input type="text" class="form-control" id="contact-number">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="address" class="col-form-label" style="padding-bottom: 0">Address:</label>
                    <input type="text" class="form-control" id="address">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="type" class="col-form-label" style="padding-bottom: 0">Type:</label>
                    <input type="text" class="form-control" id="type">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="status" class="col-form-label" style="padding-bottom: 0">Status:</label>
                    <select class="form-control" id="exampleStatus">
                      <option>Select</option>
                      <option>Active</option>
                      <option>Inactive</option>
                    </select>
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
        <div class="modal fade" id="exampleModalDeleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <p>Are you sure you want to delete this user?</p>
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