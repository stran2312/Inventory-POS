<?php 
include_once 'connection.php';
include_once 'header.php';


if($_SESSION['useremail'] == "" OR $_SESSION['role'] != "admin") {
  header('location:index.php');
}

// delete button

$id=$_GET['id'];
$sql = $pdo->prepare("DELETE FROM tbl_user WHERE userid='$id'");
if($sql->execute()){
  echo '<script type="text/javascript">
      jQuery(function validation() {
          swal({
          title: "Successful",
          text: "User has been deleted.",
          icon: "success",
          button: "ok",
          });
      });
    </script>';
  
} else {
  echo '<script type="text/javascript">
      jQuery(function validation() {
          swal({
          title: "Unsuccessful",
          text: "Error deleting user.",
          icon: "error",
          button: "Ok",  
          });
      });
    </script>';
}

if(isset($_POST['btn_submit'])) {
  // get inserted data
  $username = $_POST['txt_name'];
  $useremail = $_POST['txt_email'];
  $password = $_POST['txt_password'];
  $role = $_POST['txt_role'];

  // check if email exists
  $sql = $pdo->prepare("SELECT useremail FROM tbl_user WHERE useremail='$useremail'");
  $sql->execute();
  if($sql->rowCount() > 0) {
    echo '<script type="text/javascript">
    jQuery(function validation() {
        swal({
        title: "Warning",
        text: "Email already exists.",
        icon: "warning",
        button: "Ok",  
        });
    });
  </script>';
  } else {
    $sql = $pdo->prepare("INSERT INTO tbl_user(username,useremail,password,role) VALUES(:name,:email,:pass,:role)");

    $sql->bindParam(':name',$username);
    $sql->bindParam(':email',$useremail);
    $sql->bindParam(':pass',$password);
    $sql->bindParam(':role',$role);
    if($sql->execute()) {
      echo '<script type="text/javascript">
      jQuery(function validation() {
          swal({
          title: "Successful",
          text: "User has been created.",
          icon: "success",
          });
      });
    </script>';
    header('location:registration.php');
    } else {
      echo '<script type="text/javascript">
      jQuery(function validation() {
          swal({
          title: "Error",
          text: "Error creating user",
          icon: "error",
          button: "Ok",  
          });
      });
    </script>';
    }

  } //end submit
  



  
  
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registration Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <form role="form" method="post">
                <div class="box-body">
                  <!-- registration form -->
                    <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="txt_name">
                          </div>
                          <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control"  placeholder="Enter Email" name="txt_email">
                          </div>
                          <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control"  placeholder="Enter Password" name="txt_password">
                          </div>
                          <div class="form-group">
                            <label>Select Role</label>
                            <select class="form-control" name="txt_role">
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                            </select>
                          </div>
                          <div class="box-footer">
                        <button type="submit" class="btn btn-info" name="btn_submit">Submit</button>
                      </div>
                      </div>
                    <!-- /.box-body -->
                  
                  <!-- user table -->
                    <div class="col-md-8">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $select=$pdo->prepare("SELECT * FROM tbl_user");
                            $select->execute();
                            while($row = $select->fetch(PDO::FETCH_OBJ)) {
                              echo '
                              <tr>
                                <td>'.$row->userid.'</td>
                                <td>'.$row->username.'</td>
                                <td>'.$row->useremail.'</td>
                                <td>'.$row->password.'</td>
                                <td>'.$row->role.' </td>
                                ';
                              if($_SESSION['userid'] == $row->userid) {
                                echo '<td> </td>';
                              } else {
                                echo ' 
                                  <td><a href="registration.php?id='.$row->userid.'" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"> Delete</span></a> </td>
                                </tr>';
                              }
                            } //end while
                          ?>

                        </tbody>
                      </table>
                      </div>
                 </div>
              </form>
           
      </div>

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