<?php 
include_once 'header.php';
include_once 'connection.php';
session_start();

// return to login page if email is empty
if($_SESSION['useremail'] == ""){
  header('location:index.php');
}



if(isset($_POST['btn_update'])) {
    // get info from form
    $oldPassword = $_POST['txt_old_password'];
    $newPassword = $_POST['txt_new_password'];
    $confirmPassword = $_POST['txt_confirm_password'];

    // query
    $email = $_SESSION['useremail'];
    $sql = $pdo->prepare("SELECT * FROM tbl_user WHERE useremail='$email'");
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    // check if old password is correct
    $password_db = $row['password'];
    if($oldPassword == $password_db) {
        if($newPassword == $confirmPassword) {
            $sql = $pdo->prepare("UPDATE tbl_user SET password=:pass WHERE useremail=:email");
            $sql->bindParam(':pass', $confirmPassword);
            $sql->bindParam(':email',$email);
            if($sql->execute()){
                echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                    title: "Password change successful",
                    text: "Password has been updated",
                    icon: "success",
                    button: "Ok",  
                    });
                });
            </script>';
            } else {
                // error updating password to the data base
                echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                    title: "Error Update",
                    text: "Unable to update password at this time",
                    icon: "error",
                    button: "Ok",  
                    });
                });
            </script>';
            }
        } else {
            // confirm password and new password not match
            echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                    title: "Password not match",
                    text: "New and confirm passwords not match",
                    icon: "warning",
                    button: "Ok",  
                    });
                });
            </script>';
        }
    } else {
        // old password doesn't match the data base record
        echo '<script type="text/javascript">
                jQuery(function validation() {
                    swal({
                    title: "Password not found",
                    text: "Old password not in record",
                    icon: "warning",
                    button: "Ok",  
                    });
                });
            </script>';
    }

} 


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change your password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="oldPassword"> Old Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txt_old_password" required>
                </div>

                <div class="form-group">
                  <label for="newPassword"> New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txt_new_password" required>
                </div>

                <div class="form-group">
                  <label for="confirmPassword">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name="txt_confirm_password" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btn_update">Submit</button>
              </div>
            </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php 
 include_once 'footer.php';
 ?>
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>