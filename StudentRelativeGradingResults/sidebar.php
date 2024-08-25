  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #818589; color: white;">
    <div class="dropdown">
      <a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="background: #e0e0e0; color: black; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-weight: 500;">
        <?php if (empty($_SESSION['login_avatar'])) : ?>
          <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center text-white font-weight-500" style="width: 35px;height:55px; background-color: black;"><?php echo strtoupper(substr($_SESSION['login_firstname'], 0, 1) . substr($_SESSION['login_lastname'], 0, 1)) ?></span>
        <?php else : ?>
          <span class="image">
            <img src="../assets/uploads/<?php echo $_SESSION['login_avatar'] ?>" style="width: 38px;height:38px" class="img-circle elevation-2" alt="User Image">
          </span>
        <?php endif; ?>
        <span class="brand-text font-weight-light"><?php echo ucwords($_SESSION['login_firstname'] . ' ' . $_SESSION['login_lastname']) ?></span>
      </a>

      <div class="dropdown-menu">
        <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_id'] ?>">Manage Account</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
      </div>
    </div>
    <div class="sidebar" style="background: #e0e0e0; color: black; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown" style="color: white;">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt" style="color: black;"></i>
              <p style="color: black;">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index2.php?page=classes" class="nav-link nav-classes">
              <i class="nav-icon fas fa-th-list" style="color: black;"></i>
              <p style="color: black;">
                Classes
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index2.php?page=subjects" class="nav-link nav-subjects">
              <i class="nav-icon fas fa-book" style="color: black;"></i>
              <p style="color: black;">
                Subjects
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_student">
              <i class="nav-icon fas fa-users" style="color: black;"></i>
              <p style="color: black;">
                Students
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index2.php?page=new_student" class="nav-link nav-new_student tree-item">
                  <i class="fas fa-angle-right nav-icon" style="color: black;"></i>
                  <p style="color: black;">Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.php?page=student_list" class="nav-link nav-student_list tree-item">
                  <i class="fas fa-angle-right nav-icon" style="color: black;"></i>
                  <p style="color: black;">List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="./index2.php?page=results" class="nav-link nav-results nav-new_result nav-edit_result">
              <i class="nav-icon fas fa-file-alt" style="color: black;"></i>
              <p style="color: black;">
                Results
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <style>
    .nav-link.active {
      background-color: black !important;
      color: white !important;
    }

    .nav-link.active .nav-icon {
      color: white !important;
    }

    .nav-link.active p {
      color: white !important;
    }
  </style>
  <script>
    $(document).ready(function() {
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      if ($('.nav-link.nav-' + page).length > 0) {
        $('.nav-link.nav-' + page).addClass('active')
        console.log($('.nav-link.nav-' + page).hasClass('tree-item'))
        if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
          $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
          $('.nav-link.nav-' + page).parent().addClass('menu-open')
        }

      }
      $('.manage_account').click(function() {
        uni_modal('Manage Account', 'manage_user.php?id=' + $(this).attr('data-id'))
      })
    })
  </script>