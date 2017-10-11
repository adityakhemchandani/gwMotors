<?php
include('config/config.php');
include('get_customers.php');
include('validation.php'); //validates post data 
include'config/dbConnection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  if ($_SERVER["REQUEST_METHOD"] == "POST" && !$isError) {//check if post data and no errors 
    include('update_customer.php'); //updates data
  }
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
                    <li class="active">Edit Customer</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Customer
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal" id="edit_customer" 
                            name="edit_customer" method="post" action="edit_customer.php?userid=<?php echo $result['userid']; ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Name <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter First name Last name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $result['name']; ?>" />
                                        <?php
                                        if(!empty($nameErr)) {
                                          echo "<label class='error' style='display: inline;'>$nameErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender" class="control-label col-lg-2">Gender <span class="required_field">*</span></label>
                                    <div class="radio">
                                        <label>
                                        <?php
                                            if( isset($_POST['gender']) ) {
                                                $gender = $_POST['gender'];
                                            } else {
                                                $gender = $result['gender'];
                                            }
                                        ?>

                                          <input type="radio" value="male" name="gender" <?php if( $gender == 'male' ) { echo "checked"; } ?>>
                                          Male
                                        </label>
                                        <label>
                                          <input type="radio" value="female" name="gender" <?php if( $gender == 'female' ) { echo "checked"; } ?>>
                                          Female
                                        </label>
                                        <?php
                                        if(!empty($genderErr)) {
                                          echo "<label class='error' style='display: inline;'>$genderErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label col-lg-2">Email <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $result['email']; ?>"/>
                                        <?php
                                        if(!empty($emailErr)) {
                                          echo "<label class='error' style='display: inline;'>$emailErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number" class="control-label col-lg-2">Mobile Number <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="<?php if(isset($_POST['mobile_number'])) echo $_POST['mobile_number']; else echo $result['mobile_number']; ?>"/>
                                        <?php
                                        if(!empty($numberErr)) {
                                          echo "<label class='error' style='display: inline;'>$numberErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label col-lg-2">Address <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"><?php if(isset($_POST['address'])) echo $_POST['address']; else echo $result['address']; ?></textarea>
                                        <?php
                                        if(!empty($addressErr)) {
                                          echo "<label class='error' style='display: inline;'>$addressErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label col-lg-2">City <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php if(isset($_POST['city'])) echo $_POST['city']; else echo $result['city']; ?>"/>
                                        <?php
                                        if(!empty($cityErr)) {
                                          echo "<label class='error' style='display: inline;'>$cityErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pincode" class="control-label col-lg-2">Pincode <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" value="<?php if(isset($_POST['pincode'])) echo $_POST['pincode']; else echo $result['pincode']; ?>"/>
                                        <?php
                                        if(!empty($pincodeErr)) {
                                          echo "<label class='error' style='display: inline;'>$pincodeErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="owned_vehicle" class="control-label col-lg-2">Owned Vehicle <span class="required_field">*</span></label>
                                    <div class="col-lg-2">
                                        <select class="form-control input-sm m-bot15" name="owned_vehicle">
                                            <option value="Yes" <?php if( (isset($_POST['owned_vehicle']) && $_POST['owned_vehicle'] == 'Yes') || $result['owned_vehicle'] == 'Yes') echo "selected"; ?>>Yes</option>
                                            <option value="No" <?php if( (isset($_POST['owned_vehicle']) && $_POST['owned_vehicle'] == 'No' ) || $result['owned_vehicle'] == 'No') echo "selected"; ?>>No</option>
                                        </select>
                                        <?php
                                        if(!empty($ownedVehicleErr)) {
                                          echo "<label class='error' style='display: inline;'>$ownedVehicleErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="details_given" class="control-label col-lg-2">Details Given</label>
                                    <?php
                                        $details_given_arr = array();
                                        if( $_SERVER["REQUEST_METHOD"] == "POST" ) {
                                            $details_given_arr = isset($_POST['details_given']) ? $_POST['details_given'] : array();
                                        } else {
                                            $details_given_arr = explode(',', $result['details_given']); 
                                        }
                                    ?>
                                    <div class="col-lg-10">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="details_given[]" value="Vehicle Details" <?php if(in_array('Vehicle Details', $details_given_arr)) echo "checked"; ?>>
                                            Vehicle Details
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="details_given[]" value="Payment Details" <?php if(in_array('Payment Details', $details_given_arr)) echo "checked"; ?>>
                                            Payment Details
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="details_given[]" value="Insurance Details" <?php if(in_array('Insurance Details', $details_given_arr)) echo "checked"; ?>>
                                            Insurance Details
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dob" class="control-label col-lg-2">DOB <span class="required_field">*</span></label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter DOB" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; else echo date('d-m-Y', strtotime($result['dob'])); ?>"/>
                                        <span class="help-inline">dd-mm-yyyy</span>
                                        <?php
                                        if(!empty($dobErr)) {
                                          echo "<label class='error' style='display: inline;'>$dobErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customer_photo" class="control-label col-lg-2">Customer Photo <span class="required_field">*</span></label>
                                    
                                    <div class="col-md-4">
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
                                    <label for="customer_photo" class="control-label col-lg-2"></label>
                                    <div class="col-md-4">
                                        <input class="default" type="file" name="customer_photo" />
                                        <span class="help-inline"> png, jpg, jpeg, gif, bmp only</span>
                                        <?php
                                        if(!empty($customerPhotoErr)) {
                                          echo "<label class='error' style='display: inline;'>$customerPhotoErr</label>";
                                        } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-danger" type="submit">Save</button>
                                        <a href="list_customers.php"><button class="btn btn-default" type="button">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
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