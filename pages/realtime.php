<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold" style="color: #38ce3c">Realtime</h4>
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
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>CX7183</td>
                      <td>Philippines</td>
                      <td>Bermuda Triangle</td>
                      <td><label class="badge badge-danger">Delayed</label></td>
                      <td>A-11</td>
                      <td>07:40</td>
                      <td>23:35</td>
                    </tr>
                    <tr>
                      <td>CX7112</td>
                      <td>Philippines</td>
                      <td>Black Hole</td>
                      <td><label class="badge badge-info">Scheduled</label></td>
                      <td>A-12</td>
                      <td>03:40</td>
                      <td>22:36</td>
                    </tr>
                    <tr>
                      <td>CX7154</td>
                      <td>Philippines</td>
                      <td>Diyan lang</td>
                      <td><label class="badge badge-warning">Departed</label></td>
                      <td>A-13</td>
                      <td>02:40</td>
                      <td>05:16</td>
                    </tr>
                    <tr>
                      <td>CX7123</td>
                      <td>Philippines</td>
                      <td>Kahit saan</td>
                      <td><label class="badge badge-warning">In Air</label></td>
                      <td>A-14</td>
                      <td>23:22</td>
                      <td>06:41</td>
                    </tr>
                    <tr>
                      <td>CX7152</td>
                      <td>Philippines</td>
                      <td>Antartic</td>
                      <td><label class="badge badge-success">Landed</label></td>
                      <td>A-15</td>
                      <td>04:30</td>
                      <td>18:53</td>
                    </tr>
                    <tr>
                      <td>CX7135</td>
                      <td>Philippines</td>
                      <td>Ocean</td>
                      <td><label class="badge badge-success">Arrived</label></td>
                      <td>A-16</td>
                      <td>15:50</td>
                      <td>22:12</td>
                    </tr>
                    <tr>
                      <td>CX7125</td>
                      <td>Philippines</td>
                      <td>Deep web</td>
                      <td><label class="badge badge-danger">Cancelled</label></td>
                      <td>A-17</td>
                      <td>12:40</td>
                      <td>04:25</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>