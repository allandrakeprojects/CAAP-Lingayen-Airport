        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link" style="cursor: default;">
                <div class="text-wrapper">
                  <p class="profile-name">
                    <?php
                      echo $_SESSION["full_name"];
                    ?>
                  </p>
                  <p class="designation" id="user_type">
                    <?php
                      if($_SESSION["type"] == 0) {
                        echo 'Administrator';
                      } else {
                        echo 'Pilot';
                      }
                    ?>
                  </p>
                </div>
              </a>
            </li>
            <?php if($_SESSION["type"] == 0) { ?>
              <li class="nav-item">
                <a class="nav-link" href="flight_plans.php">
                  <span class="menu-title">Flights</span>
                  <i class="icon-notebook menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="aircraft_management.php">
                  <span class="menu-title">Aircraft Management</span>
                  <i class="icon-plane menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="user_management.php">
                  <span class="menu-title">User Management</span>
                  <i class="icon-user menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="time_management.php">
                  <span class="menu-title">Time Management</span>
                  <i class="icon-hourglass menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="schedule.php">
                  <span class="menu-title">Schedule</span>
                  <i class="icon-book-open menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="student_records.php">
                  <span class="menu-title">Student Records</span>
                  <i class="icon-briefcase menu-icon"></i>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="flight_plans.php">
                  <span class="menu-title">Flight Plans</span>
                  <i class="icon-user menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="record.php">
                  <span class="menu-title">Record</span>
                  <i class="icon-briefcase menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="schedule_pilot.php">
                  <span class="menu-title">Schedule</span>
                  <i class="icon-book-open menu-icon"></i>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>