<?php
  include('config/config.php');
  include('config/dbConnection.php');
  include('get_customers.php');
  include('header.php');
?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
      <!-- page start-->
      <div class="row">
          <div class="col-lg-12">
              <!--breadcrumbs start -->
              <ul class="breadcrumb">
                  <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
                  <li class="active">List Customers</li>
              </ul>
              <!--breadcrumbs end -->
          </div>
      </div>
    <div class="clear"></div>
      <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    List Customers

                    <?php if (!empty($_GET['msg'])) { ?>
                    <div class="has-success">
                        <p class="help-block"><?php echo $_GET['msg']; ?>
                    </div>
                    <?php } ?>
                </header>
                <form name="delete_cust" method="post" action="delete_customer.php">
                <div class="span6">
                    <div class="btn-group pull-left">
                        <button class="btn btn-danger" type="submit">Delete Multiple Records</button>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>
                              <th><input type="checkbox" id="check_all"></th>
                              <th>Name</th>
                              <th>Gender</th>
                              <th>Email</th>
                              <th>Mobile Number</th>
                              <th>City</th>
                              <th>Pincode</th>
                              <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($result as $row) {
                        ?>
                            <tr>
                              <td><input type="checkbox" name="userid[]" value="<?php echo $row['userid']; ?>"></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['gender']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['mobile_number']; ?></td>
                              <td><?php echo $row['city']; ?></td>
                              <td><?php echo $row['pincode']; ?></td>
                              <td>
                                <a href="view_customer.php?userid=<?php echo $row['userid']; ?>"><span class="label label-primary label-mini">View</span></a>&nbsp;&nbsp;
                                <a href="edit_customer.php?userid=<?php echo $row['userid']; ?>"><span class="label label-info label-mini">Edit</span></a>&nbsp;&nbsp;
                                <a href="delete_customer.php?userid=<?php echo $row['userid']; ?>"><span class="label label-danger label-mini">Delete</span></a>&nbsp;&nbsp;
                              </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <!-- <div class="row-fluid">
                        <div class="span6">
                            <div class="dataTables_info">Showing 1 to 10 of 15 entries</div>
                        </div>
                        <div class="span6">
                            <div class="dataTables_paginate paging_bootstrap pagination">
                                <ul>
                                    <li class="prev disabled"><a href="#">Previous</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                </form>
            </section>
        </div>
    </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
<?php
  include('footer.php');
?>
