<!-- start container-scroller -->
<div class="container-scroller auth theme-one">
  <!-- start auto-form-wrapper -->
  <div class="auto-form-wrapper">
    <!-- start top-bar -->
    <div class="navbar fixed-top">
      <div class="navbar-menu-wrapper d-flex align-items-center w-100">
        <ul class="nav">
          <div class="nav-item ml-1">
            <div class="form-group" style="width: 72vw; margin-bottom: 0px;">
              <div class="input-group">
                <input type="text" name="data_search" onmouseover="this.focus();" id="top-search" class="form-control" placeholder="Search Member">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="mdi mdi-magnify-plus mdi-18px"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </ul>
        <ul class="nav navbar-nav-right ml-auto">
          <li class="nav-item dropdown circle-grid">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-bell-outline"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
              <a class="dropdown-item dropdown-header">
                <div class="wrapper">
                  <h4 class="mb-1 font-weight-medium">Notification</h4>
                  <p class="mb-0 font-weight-medium float-left font-weight-light">You have 7 unread mails </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?php echo base_url(); ?>nyo-uploads/avatar.jpg" alt="image" class="img-sm profile-pic"> </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown circle-grid">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-tune"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item dropdown-header">
                <div class="wrapper">
                  <h4 class="mb-1 font-weight-medium">Activity Controller</h4>
                  <p class="mb-0 font-weight-medium float-left font-weight-light">You have 4 new notifications</p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-alert m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                  <p class="font-weight-light small-text mb-0"> Just now </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown circle-grid">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-help"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
              <a class="dropdown-item dropdown-header">
                <div class="wrapper">
                  <h4 class="mb-1 font-weight-medium">Contact Info</h4>
                  <p class="mb-0 font-weight-medium float-left font-weight-light">System administrator contact info</p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-phone m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">+639108973533</h6>
                  <p class="font-weight-light small-text mb-0"> Phone Number </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-email m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">junry.s.solloso@gmail.com</h6>
                  <p class="font-weight-light small-text mb-0"> Email Address </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?php echo base_url(); ?>nyo-uploads/avatar.jpg" alt="Profile image">
              <span class="profile-text">Allen Moreno</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item mt-2 active"> Manage Accounts </a>
              <a class="dropdown-item"> Change Password </a>
              <a class="dropdown-item"> Check Inbox </a>
              <a class="dropdown-item"> Sign Out </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center pr-0" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </div>
    <!-- end top-bar -->