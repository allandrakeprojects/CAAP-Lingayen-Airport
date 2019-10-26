<?php include '../shared/_Header.php';?>
    <!-- Begin Page Content -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <?php if($_SESSION["type"] == 0) { ?>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="flight_plans.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-notebook menu-icon"></i>
                    <span class="menu-title">Flights</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="aircraft_management.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-plane menu-icon"></i>
                    <span class="menu-title">Aircraft Management</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="user_management.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-user menu-icon"></i>
                    <span class="menu-title">User Management</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="time_management.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-hourglass menu-icon"></i>
                    <span class="menu-title">Time Management</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="schedule.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-book-open menu-icon"></i>
                    <span class="menu-title">Schedule</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="student_records.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-briefcase menu-icon"></i>
                    <span class="menu-title">Student Records</span>
                  </div>
                </a>
              </div>
            </div>
          <?php } else { ?>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="flight_plans.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-notebook menu-icon"></i>
                    <span class="menu-title">Flights</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="record.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-briefcase menu-icon"></i>
                    <span class="menu-title">Record</span>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card shadow mb-4">
                <a class="nav-link" href="schedule_pilot.php">
                  <div class="card-body" style="text-align: center; font-size: 20px; color: #38ce3c">
                    <i class="icon-book-open menu-icon"></i>
                    <span class="menu-title">Schedule</span>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- End of Page Content -->
<?php include '../shared/_Footer.php';?>