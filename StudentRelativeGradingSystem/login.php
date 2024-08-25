<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();

$system = $conn->query("SELECT * FROM system_settings")->fetch_array();
foreach ($system as $k => $v) {
  $_SESSION['system'][$k] = $v;
}
// }
ob_end_flush();
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | <?php echo $_SESSION['system']['name'] ?></title>

  <?php include('./header.php'); ?>
  <?php
  if (isset($_SESSION['login_id']))
    header("location:index2.php?page=home");
  ?>
</head>
<style>
  body {
    width: 100%;
    height: calc(100%);
    position: fixed;
    top: 0;
    left: 0;
    align-items: center !important;
  }

  main#main {
    width: 100%;
    height: calc(100%);
    display: flex;
  }

  #LgBtn {
    color: #090909;
    padding: 5px 10px;
    font-size: 18px;
    border-radius: 0.5em;
    background: #e8e8e8;
    cursor: pointer;
    border: 1px solid #e8e8e8;
    transition: all 0.3s;
    box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
  }
  #LgBtn:hover{
    border: 1px solid white;
  }
  #LgBtn:active{
    box-shadow: 4px 4px 12px #c5c5c5, -4px -4px 12px #ffffff;
  }
</style>

<body class="Lgnbg" style="background: #e8e8e8;">
  <main id="main">
    <div class="align-self-center w-100" id="Lgnbx">
      <h4 class="text-black text-center" style="margin-bottom: 30px;"><b><?php echo $_SESSION['system']['name'] ?> - Admin Login</b></h4>
      <div id="login-center" class="row justify-content-center">
        <div class="card col-md-4" style="background: #e0e0e0; box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff; border-radius: 30px;">
          <div class="card-body">
            <form id="login-form">
              <div class="form-group" id="Frml">
                <label for="username" class="control-label text-dark">Username</label>
                <input type="text" id="username" name="username" class="form-control form-control-sm" placeholder="Enter User Name" style="border-radius: 10px; padding: 10px;">
              </div>
              <div class="form-group">
                <label for="password" class="control-label text-dark">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-sm" placeholder="Enter Password" style="border-radius: 10px; padding: 10px;">
              </div>
              <div class="w-100 d-flex justify-content-center align-items-center" style="margin-top: 10px;">
                <button class="btn-sm btn-block btn-wave col-md-4 btn-primary m-0 mr-1" id="LgBtn" style="margin-top: 10px;">Login</button>
                <!-- <a href="view_result.php" class="btn-sm btn-block btn-wave col-md-4 btn-success m-0">View Result</a> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>

<?php include 'footer.php' ?>

<script>
  $('#login-form').submit(function(e) {
    e.preventDefault()
    $('#login-form button[type="submit"]').attr('disabled', true).html('Logging in...');
    if ($(this).find('.alert-danger').length > 0)
      $(this).find('.alert-danger').remove();
    $.ajax({
      url: 'ajax.php?action=login',
      method: 'POST',
      data: $(this).serialize(),
      error: err => {
        console.log(err)
        $('#login-form button[type="submit"]').removeAttr('disabled').html('Login');
      },
      success: function(resp) {
        if (resp == 1) {
          location.href = 'index2.php?page=home';
        } else {
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          $('#login-form button[type="submit"]').removeAttr('disabled').html('Login');
        }
      }
    })
  })
</script>

</html>