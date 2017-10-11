<?php
  include('config/config.php');
  include('config/dbConnection.php');
  include('validation.php'); //validates post data 

  if ($_SERVER["REQUEST_METHOD"] == "POST" && !$isError) {//check if post data and no errors 
    include('add_customer.php'); //saves data
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
                    <li class="active">Add Customer</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Customer
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal" id="add_customer" 
                            name="add_customer" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Name <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter First name Last name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>" />
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
                                          <input type="radio" value="male" name="gender" <?php if(!empty($_POST['gender']) && $_POST['gender'] == 'male') echo "checked"; ?>>
                                          Male
                                        </label>
                                        <label>
                                          <input type="radio" value="female" name="gender" <?php if(!empty($_POST['gender']) && $_POST['gender'] == 'female') echo "checked"; ?>>
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
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>"/>
                                        <?php
                                        if(!empty($emailErr)) {
                                          echo "<label class='error' style='display: inline;'>$emailErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number" class="control-label col-lg-2">Mobile Number <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="<?php if(!empty($_POST['mobile_number'])) echo $_POST['mobile_number']; ?>"/>
                                        <?php
                                        if(!empty($numberErr)) {
                                          echo "<label class='error' style='display: inline;'>$numberErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label col-lg-2">Address <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"><?php if(!empty($_POST['address'])) echo $_POST['address']; ?></textarea>
                                        <?php
                                        if(!empty($addressErr)) {
                                          echo "<label class='error' style='display: inline;'>$addressErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="control-label col-lg-2">City <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?php if(!empty($_POST['city'])) echo $_POST['city']; ?>"/>
                                        <?php
                                        if(!empty($cityErr)) {
                                          echo "<label class='error' style='display: inline;'>$cityErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pincode" class="control-label col-lg-2">Pincode <span class="required_field">*</span></label>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode" value="<?php if(!empty($_POST['pincode'])) echo $_POST['pincode']; ?>"/>
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
                                            <option value="Yes" <?php if(!empty($_POST['owned_vehicle']) && $_POST['owned_vehicle'] == 'Yes') echo "selected"; ?>>Yes</option>
                                            <option value="No" <?php if(!empty($_POST['owned_vehicle']) && $_POST['owned_vehicle'] == 'No') echo "selected"; ?>>No</option>
                                        </select>
                                        <?php
                                        if(!empty($ownedVehicleErr)) {
                                          echo "<label class='error' style='display: inline;'>$ownedVehicleErr</label>";
                                        } ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="details_given" class="control-label col-lg-2">Details Given</label>
                                    <div class="col-lg-10">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="details_given[]" value="Vehicle Details" <?php if(!empty($_POST['details_given']) && in_array('Vehicle Details', $_POST['details_given'])) echo "checked"; ?>>
                                            Vehicle Details
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="details_given[]" value="Payment Details" <?php if(!empty($_POST['details_given']) && in_array('Payment Details', $_POST['details_given'])) echo "checked"; ?>>
                                            Payment Details
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="details_given[]" value="Insurance Details" <?php if(!empty($_POST['details_given']) && in_array('Insurance Details', $_POST['details_given'])) echo "checked"; ?>>
                                            Insurance Details
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="dob" class="control-label col-lg-2">DOB <span class="required_field">*</span></label>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter DOB" value="<?php if(!empty($_POST['dob'])) echo $_POST['dob']; ?>"/>
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
                                        <a href="home.php"><button class="btn btn-default" type="button">Cancel</button></a>
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