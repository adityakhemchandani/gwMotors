<?php
	// define variables and set to empty values
     $nameErr = $emailErr = $genderErr = $numberErr = $addressErr = $cityErr = $pincodeErr = $ownedVehicleErr = $dobErr = $customerPhotoErr = ""; 
     $name = $email = $gender = $number = $address = $city = $pincode = $ownedVehicle = $detailsGiven = $dob = $customerPhoto = "";

     $isError = 0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//print_r($_POST);
		if (empty($_POST["name"])) {
           $nameErr = "Name is required";
           $isError = 1;
        } else {
           $name = $_POST["name"];
        }
        
        if (empty($_POST["email"])) {
           $emailErr = "Email is required";
           $isError = 1;
        } else {
           $email = $_POST["email"];
		}

        if (empty($_POST["gender"])) {
           $genderErr = "Gender is required";
           $isError = 1;
        } else {
           $gender = $_POST["gender"];
        }

        if (empty($_POST["mobile_number"])) {
           $numberErr = "Mobile number is required";
           $isError = 1;
        } else {
           $number = $_POST["mobile_number"];
        }

        if (empty($_POST["address"])) {
           $addressErr = "Address is required";
           $isError = 1;
        } else {
           $address = $_POST["address"];
        }

        if (empty($_POST["city"])) {
           $cityErr = "City is required";
           $isError = 1;
        } else {
           $city = $_POST["city"];
        }

        if (empty($_POST["pincode"])) {
           $pincodeErr = "Pincode is required";
           $isError = 1;
        } else {
           $pincode = $_POST["pincode"];
        }

        if (empty($_POST["owned_vehicle"])) {
           $ownedVehicleErr = "Owned vehicle is required";
           $isError = 1;
        } else {
           $ownedVehicle = $_POST["owned_vehicle"];
        }

        if (!empty($_POST["details_given"])) {
         	$detailsGiven = implode(',', $_POST["details_given"]);
        }

        if (empty($_POST["dob"])) {
           $dobErr = "DOB is required";
           $isError = 1;
        } else {
           $dob = $_POST["dob"];
        }

        if ( empty($_FILES['customer_photo']['name']) ) {
        	if( strstr($_SERVER['REQUEST_URI'], 'new_customer.php') ) {
	        	$customerPhotoErr = "Customer photo is required";
	        	$isError = 1;
        	}
        } else {
             $customer_photo = $_FILES['customer_photo']['name'];

        	$img_type = $_FILES['customer_photo']['type'];
        	$ext = strtolower(substr(strrchr($_FILES['customer_photo']['name'], "."), 1));
           	
        }
	}


    function validateDate($date) {
	    $d = DateTime::createFromFormat('d-m-Y', $date);
	    return $d && $d->format('d-m-Y') === $date;
	}

	function validateImage($type, $ext) {
		$mime = array(
				  'image/gif' => 'gif',
                  'image/jpeg' => 'jpeg',
                  'image/png' => 'png',
                  //'application/x-shockwave-flash' => 'swf',
                  //'image/psd' => 'psd',
                  'image/bmp' => 'bmp',
                  //'image/tiff' => 'tiff',
                  //'image/tiff' => 'tiff',
                  //'image/jp2' => 'jp2',
                  //'image/iff' => 'iff',
                  //'image/vnd.wap.wbmp' => 'bmp',
                  //'image/xbm' => 'xbm',
                  //'image/vnd.microsoft.icon' => 'ico'
                  );
		$image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif','bmp');
		if( !key_exists($type, $mime) || !in_array($ext, $image_extensions_allowed) ) {
			return false;
		} else {
			return true;
		}
	}
?>