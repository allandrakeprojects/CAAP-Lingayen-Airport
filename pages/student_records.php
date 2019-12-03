<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <a class="mb-3" href="index.php" style="color: #38ce3c; display: block">< HOME</a>
        <div class="row">
          <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between" style="align-items: center">
              <h4 class="m-0 font-weight-bold" style="color: #38ce3c"><i class="icon-briefcase menu-icon"></i> Student Records</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTableStudentRecords" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Total Flight Hours</th>
                      <th>Hours Left</th>
                      <th>Payment</th>
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
                        <button type="button" class="btn btn-primary btn-rounded btn-sm dt-edit" style="margin-right:5px;" data-toggle="modal" data-target="#exampleModalUpdateStudentRecords" data-whatever="@fat">
                            <span class="icon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger btn-rounded btn-sm" data-toggle="modal"  data-target="#exampleModalDeleteStudentRecords" data-whatever="@fat">
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
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>