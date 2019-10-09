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
              <div class="mb-4">
                <label for="business">Aircraft Code:</label>

                <select id="business" name="business">
                  <option value="First Choice">OMNI (RPLC)</option>
                  <option value="Second Choice">AAAA (RPUI)</option>
                  <option value="Third Choice">LEIA (RPUS)</option>
                  <option value="Fourth Choice">WCC (BINA)</option>
                </select>
                <br/>
                <label for="business">Aircraft Name: <strong>Omni Aviation</strong></label>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Registration No.</th>
                      <th>Model</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>CX7183</td>
                      <td>Philippines</td>
                    </tr>
                    <tr>
                      <td>CX7112</td>
                      <td>Philippines</td>
                    </tr>
                    <tr>
                      <td>CX7154</td>
                      <td>Philippines</td>
                    </tr>
                    <tr>
                      <td>CX7123</td>
                      <td>Philippines</td>
                    </tr>
                    <tr>
                      <td>CX7152</td>
                      <td>Philippines</td>
                    </tr>
                    <tr>
                      <td>CX7135</td>
                      <td>Philippines</td>
                    </tr>
                    <tr>
                      <td>CX7125</td>
                      <td>Philippines</td>
                    </tr>
                  </tbody>
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
                    <label for="flight-name" class="col-form-label" style="padding-bottom: 0">Aircraft Code:</label>
                    <input type="text" class="form-control" id="flight-name">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="from-location" class="col-form-label" style="padding-bottom: 0">Aircraft Name:</label>
                    <input type="text" class="form-control" id="from-location">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="to-location" class="col-form-label" style="padding-bottom: 0">Registration No.:</label>
                    <input type="text" class="form-control" id="to-location">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="gate" class="col-form-label" style="padding-bottom: 0">Model:</label>
                    <input type="text" class="form-control" id="gate">
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
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>