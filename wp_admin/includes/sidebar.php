<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary <?=$sidebar_bg;?> elevation-0" style="background:#">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <?php
        if($SYS_LOGO==""){
        ?>
          <img src="../dist/img/Logo.png" class="brand-image img-circle" alt="SLP">
        <?php }else{ ?>
          <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" class="brand-image img-circle">
        <?php }?>
      <span class="brand-text font-weight-light"><b><?=$SYS_SHORTNAME;?></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="image">
          <?php
          if($user['PROFILE']==""){
          ?>
           <img src="../dist/img/profile.jpg" class="img-circle elevation-0" alt="User Image">
          <?php }else{ ?>
            <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($user['PROFILE']); ?>" width="60" height="60" class="img-circle elevation-2">
          <?php }?>

        </div>
        <div class="info">
          <a href="#" class="d-block text-white"><?=$user['LASTNAME'].', '.$user['FIRSTNAME']; ?> <i class="fa fa-circle text-green right"></i></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p class="text-white">DASHBOARD</p>
            </a>
          </li>
		    <li class="nav-item">
            <a href="home.php?home=dashboard" class="nav-link">
              <i class="nav-icon fa fa-desktop"></i>
              <p class="text-white">HOME</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="notes.php?home=notes" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p class="text-white">REMINDERS</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="contact_us.php?home=contactus" class="nav-link">
              <i class="nav-icon fas fa-sharp fa-regular fa-envelope"></i>
              <p class="text-white">INQUIRIES</p> 
            </a>
          </li>
          <li class="nav-item">
            <a href="reviews.php?home=reviews" class="nav-link">
              <i class="nav-icon fas fa-sharp fa-regular fa-star"></i>
              <p class="text-white">FEEDBACK</p> 
            </a>
          </li>
        <li class="nav-item">
            <a href="requirements.php?home=requirements" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p class="text-white">REQUIREMENTS</p>
            </a>
          </li>
          <li class="nav-header text-white">MAINTENANCE</li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>RESERVATION <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="appointment_pending.php?home=appointment_pending" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i>
                  <p class="">Pending</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="appointment_rejected.php?home=appointment_rejected" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i> 
                  <p class="">Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="appointment.php?home=appointment_approved" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i>
                  <p class="">Approved</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="appointment_completed.php?home=appointment_completed" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i>
                  <p class="">Completed</p>
                </a>
              </li>
          </ul>
      </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>MAINTENANCE<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="holiday.php?home=manage_holiday" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i>
                  <p class="">Holiday</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="cottage.php?home=cottage" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i> 
                  <p class="">Cottage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cottage_comments.php?home=cottage_comments" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i> 
                  <p class="">Comments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="services.php?home=services" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i> 
                  <p class="">Service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="gallery.php?home=gallery" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i> 
                  <p class="">Gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="attractions.php?home=attractions" class="nav-link">
                <i class="nav-icon fas fa-sharp fa-solid fa-bezier-curve"></i> 
                  <p class="">Attractions</p>
                </a>
              </li>
          </ul>
      </li>

          <!-- <li class="nav-item">
            <a href="advisories.php?home=advisories" class="nav-link">
              <i class="nav-icon fas fa-sharp fa-regular fa-flag"></i>
              <p class="text-white">ADVISORIES</p> 
            </a>
          </li> -->
          <?php
          if($user['ROLE']=="ADMIN"):
          ?>
          <!-- <li class="nav-item">
            <a href="sms.php?home=sms" class="nav-link">
              <i class="nav-icon fas fa-sms"></i>
              <p class="text-white">SMS SETTING</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="setting.php?home=settings" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p class="text-white">APP SETTING</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="members.php?home=members" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p class="text-white">USERS</p>
            </a>
          </li>
          
          <li class="nav-header">DATABASE</li>
          <li class="nav-item">
            <a href="backup/backup.php?home=backupdatabase" class="nav-link">
              <i class="nav-icon fas fa-database text-white"></i>
              <p class="text-white">
                BACKUP
              </p>
            </a>
          </li>
          <?php endif;?>
        </ul>
      </nav>
 
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  