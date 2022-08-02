<?php 
include_once 'header.php';
include_once 'connection.php';
session_start();
if($_SESSION['useremail'] == ""){
  header('location:index.php');
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Product List
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
            </div>
            <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Purchase Price</th>
                            <th>Sale Price</th>
                            <th>Description</th>
                            <th>Image </th>
                            <th> </th>
                            <th> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $select=$pdo->prepare("SELECT * FROM tbl_product");
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