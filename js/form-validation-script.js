var FormValidation = function () {
        // validate add_customer form on keyup and submit        
        $('#add_customer').validate({
           rules: {
               name: {
                   required: true
               },
               gender: {
                   required: true
               },
               email: {
                   required: true,
                   email: true
               },
               mobile_number: {
                   required: true,
                   digits: true,
                   maxlength: 10,
                   minlength: 10
               },
               address: {
                   required: true
               },
               city: {
                   required: true
               },
               pincode: {
                   required: true,
                   digits: true
               },
               owned_vehicle: {
                   required: true
               },
               dob: {
                  required: true
               },
               customer_photo: {
                  required: true,
                  accept: "image/*"
               }
           },
           messages: {
              name: {
                  required: 'Please enter name'
              },
              gender: {
                  required: 'Please select gender'
              },
              email: {
                  required: 'Please enter email'
              },
              mobile_number: {
                  required: "Please enter mobile number",
                  maxlength: "Please enter 10 digit mobile number",
                  minlength: "Please enter 10 digit mobile number"
              },
              address: {
                  required: "Please enter address"
              },
              city: {
                  required: "Please enter city"
              },
              pincode: {
                  required: "Please enter pincode"
              },
              dob: {
                  required: "Please enter dob"
              },
              customer_photo: {
                  required: "Please select customer photo",
                  accept: "Please select valid image format"
              }
           }
        });

        // validate edit_customer form on keyup and submit        
        $('#edit_customer').validate({
           rules: {
               name: {
                   required: true
               },
               gender: {
                   required: true
               },
               email: {
                   required: true,
                   email: true
               },
               mobile_number: {
                   required: true,
                   digits: true,
                   maxlength: 10,
                   minlength: 10
               },
               address: {
                   required: true
               },
               city: {
                   required: true
               },
               pincode: {
                   required: true,
                   digits: true
               },
               owned_vehicle: {
                   required: true
               },
               dob: {
                  required: true
               },
               customer_photo: {
                  accept: "image/*"
               }
           },
           messages: {
              name: {
                  required: 'Please enter name'
              },
              gender: {
                  required: 'Please select gender'
              },
              email: {
                  required: 'Please enter email'
              },
              mobile_number: {
                  required: "Please enter mobile number",
                  maxlength: "Please enter 10 digit mobile number",
                  minlength: "Please enter 10 digit mobile number"
              },
              address: {
                  required: "Please enter address"
              },
              city: {
                  required: "Please enter city"
              },
              pincode: {
                  required: "Please enter pincode"
              },
              dob: {
                  required: "Please enter dob"
              },
              customer_photo: {
                  accept: "Please select valid image format"
              }
           }
        });
}();