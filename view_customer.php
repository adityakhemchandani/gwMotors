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
                    <li><a href="list_customers.php">List Customers</a></li>
                    <li class="active">View Customer</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <section class="panel">
                  <header class="panel-heading">
                      View Customer
                  </header>
                  <div class="panel-body">
                    <form class="form-horizontal">
                      <div class="form-group">
                      <div class="col-lg-12">
                      <?php
                        if( !empty($result['customer_photo']) && file_exists('uploads/customer_photo/'.$result['customer_photo']) ) {
                            $customer_photo = 'uploads/customer_photo/'.$result['customer_photo'];
                        } else {
                            $customer_photo = 'img/photo.jpg';
                        }
                      ?>
                        <img alt="Customer Photo" width="140px" height="140px" src="<?php echo $customer_photo; ?>">
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Name : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['name']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Gender : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['gender']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Email : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['email']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Mobile Number : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['mobile_number']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Address : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['address']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">City : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['city']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Pincode : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['pincode']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Owned Vehicle : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo $result['owned_vehicle']; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">Details Given : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static">
                          <?php 
                            if(!empty($result['details_given'])) {
                                echo $result['details_given'];
                              } else {
                                echo "None";
                              }
                          ?>
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2 control-label">DOB : </label>
                        <div class="col-lg-10">
                          <p class="form-control-static"><?php echo date('d-m-Y', strtotime($result['dob'])); ?></p>
                        </div>
                      </div>
                    </form>
                  </div>
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
