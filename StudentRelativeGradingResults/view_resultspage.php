<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
$_SESSION['system']['name'] = "Results";
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>View | 
  <?php 
    if(isset($_SESSION['system']) && isset($_SESSION['system']['name'])) {
      echo $_SESSION['system']['name']; 
    } else {
      echo "System Name"; 
    }
  ?>
  </title>
  <?php include('./header.php'); ?>
  <style>
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

    #LgBtn:hover {
      border: 1px solid white;
    }

    #LgBtn:active {
      box-shadow: 4px 4px 12px #c5c5c5, -4px -4px 12px #ffffff;
    }
  </style>
</head>

<body class="Lgnbg" style="background: #e8e8e8;">
  <main id="main">
    <div class="align-self-center w-100" id="Lgnbx">
      <h4 class="text-black text-center" style="margin-bottom: 30px;"><b>
      <?php 
        if(isset($_SESSION['system']) && isset($_SESSION['system']['name'])) {
          echo $_SESSION['system']['name']; 
        } else {
          echo "System Name"; // Default value or handle the missing session key
        }
      ?>
      - View Student Results</b></h4>
      <div id="login-center" class="row justify-content-center">
        <div class="card col-md-4" style="background: #e0e0e0; box-shadow: 15px 15px 30px #bebebe,-15px -15px 30px #ffffff; border-radius: 30px;">
          <div class="card-body">
            <form id="vsr-frm">
              <div class="form-group">
                <label for="student_code" class="control-label text-dark">Student ID:</label>
                <input type="text" id="student_code" name="student_code" class="form-control form-control-sm" placeholder="Enter Student ID Ex: 1657" style="border-radius: 10px; padding: 10px;">
              </div>
              <div class="w-100 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn-sm btn-block btn-wave col-md-4 btn-primary m-0" id="LgBtn">View</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

<?php include 'footer.php' ?>

<script>
  $('#vsr-frm').submit(function(e) {
    e.preventDefault()
    if ($(this).find('.alert-danger').length > 0)
      $(this).find('.alert-danger').remove();
    $.ajax({
      url: 'ajax.php?action=login2',
      method: 'POST',
      data: $(this).serialize(),
      error: err => {
        console.log(err)
      },
      success: function(resp) {
        if (resp == 1) {
          location.href = 'student_results.php';
        } else {
          $('#vsr-frm').prepend('<div class="alert alert-danger">Student ID # is incorrect.</div>')
        }
      }
    })
  })
</script>

</html>
