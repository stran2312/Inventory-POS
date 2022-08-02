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
       Create Order
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-warning">
            <form action="" method="post" name="">
                <div class="box-header with-border">
                    <h3 class="box-title">New Order</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" placeholder="Enter customer name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Date</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                </div>
                <div class="box-body">
                  <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Search Product</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Description </th>
                            <th><td><button type="button" class="btn btn-success btn-sm btnadd" role="button"><span class="glyphicon glyphicon-plus" name="add"></span></button> </td> </th>
                            
                          </tr>
                        </thead>
                      </table>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-md-6">
                      <div class="form-group">
                                    <label>Subtotal</label>
                                    <input type="text" class="form-control" name="subtotal" required>
                      </div>
                      <div class="form-group">
                                    <label>Tax (8.25%)</label>
                                    <input type="text" class="form-control" name="tax" required>
                      </div>
                      <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" class="form-control" name="discount" required>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                                    <label>Total</label>
                                    <input type="text" class="form-control" name="total" required>
                      </div>
                      <div class="form-group">
                                    <label>Paid</label>
                                    <input type="text" class="form-control" name="paid" required>
                      </div>
                      <div class="form-group">
                                    <label>Due</label>
                                    <input type="text" class="form-control" name="due" required>
                      </div>

                  </div>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $('#datepicker').datepicker({
      autoclose:true
    })
  </script>

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