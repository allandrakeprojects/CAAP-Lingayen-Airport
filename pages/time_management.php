<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <a class="mb-3" href="index.php" style="color: #38ce3c; display: block">< HOME</a>
        <!-- <div class="mb-4">
          <label for="sort_aircraft_regno">Aircraft Name:</label>
          <select id="sort_aircraft_regno" name="sort_aircraft_regno"></select>
        </div> -->

        <div class="row" id="fill_time">
        
        </div>

        <!-- Add Modal starts -->
        <div class="modal fade" id="exampleModalAddFlightTime" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                    <label for="aircraft_flighttime" class="col-form-label" style="padding-bottom: 0">Aircraft:</label>
                    <input type="text" class="form-control" id="aircraft_flighttime">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="regno_flighttime" class="col-form-label" style="padding-bottom: 0">Reg. No.:</label>
                    <input type="text" class="form-control" id="regno_flighttime">
                  </div>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="pilot_flighttime" class="col-form-label" style="padding-bottom: 0">Pilot:</label>
                    <input type="text" class="form-control" id="pilot_flighttime">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-add-flight-time" style="color: #38ce3c">Add</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>