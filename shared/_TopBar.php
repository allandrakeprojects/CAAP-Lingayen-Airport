      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" style="color: #38ce3c" href="#">
            <i class="icon-plane menu-icon"></i> CAAP Airport
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="../images/logo-mini.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Aboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="font-weight-normal"> 
                  <?php
                    echo $_SESSION["full_name"];
                  ?>
                 </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3">
                    <?php
                      echo $_SESSION["full_name"];
                    ?>
                  </p>
                  <p class="font-weight-light text-muted mb-0">
                    <?php
                      echo $_SESSION["email"];
                    ?>
                  </p>
                  <input type="hidden" id="pilot_id" value="<?php echo $_SESSION["id"] ?>">
                </div>
                <!-- <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a> -->
                <button class="dropdown-item change-password"><i class="dropdown-item-icon icon-lock text-primary"></i>Change Password</button>
                <a href="logout.php" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>

      
        <!-- Add Modal starts -->
        <div class="modal fade" id="exampleModalChangePassword" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding: 15px 30px">
                <form>
                  <div class="form-group" style="margin-bottom: 10px;">
                    <label for="new_password" class="col-form-label" style="padding-bottom: 0">New Password:</label>
                    <input type="password" class="form-control" id="new_password">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-change-password" style="color: #38ce3c">Change</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Ends -->

