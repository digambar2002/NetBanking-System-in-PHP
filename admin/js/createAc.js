// JQuery Start from Here


let FnameError = 0;
let LnameError = 0;
let FAnameError = 0;
let MAnameError = 0;
let AgeError = 0;
let MobileNoError = 0;
let PanError = 0;
let AdharError = 0;
let pincodeError = 0;
let EmailError = 0;
let AdharUpError = 0;
let PanUPError = 0;
let UsernameError = 0;
let PasswordError = 0;
let ConfirmPass = 0;






//************************************** Adhar Validdation *************************************************


$(document).ready(function () {

    // Fuction or event when we enter into adhar filed and then click outside we use blur event here
    $('#AdharNo').blur(function () {

        // storing adhar number in variable
        var AdharNo = $(this).val();

        // checking adhar number data
        if (AdharNo == "" || AdharNo.length > 12 || AdharNo.length < 12) {
            $('#AdharError').text('Invalid Adhar Number');
            $("#nextBtn").attr('disabled', true);
            AdharError = 1;
        }
        else {

            $('#AdharError').text('');
            $("#nextBtn").attr('disabled', false);
            AdharError = 0;
            // Fire Ajax query here to check whether the adhar number is aready in database or not
            $.ajax({
                type: "POST",
                url: "AccountValidation.php",
                data: { AdharNumber: AdharNo },
                success: function (response) {
                    if (response != "0") {
                        $("#AdharError").text("Adhar Number Already Exist!");
                        $("#nextBtn").attr('disabled', true);
                        AdharError = 1;
                    }
                    else {
                        $("#AdharError").text("");
                        $("#nextBtn").attr('disabled', false);
                        AdharError = 0;
                    }
                }
            });

        }

    });


    // *******************************************  PAN NUMBER VALIDATION  *************************************



    // Same Event use in adhar
    $('#PanNo').blur(function () {

        //  Storing Pan Number vaiable 
        var PanNo = $(this).val();

        //   Checking Pan data is valid or not 
        if (PanNo == "" || PanNo.length > 10 || PanNo.length < 10) {

            $('#PanError').text('Invalid Pan Number');
            $("#nextBtn").attr('disabled', true);
            PanError = 1;
        }
        else {


            var regex = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;

            if (!regex.test(PanNo)) {

                $('#PanError').text('Invalid Pan Number Format');
                $("#nextBtn").attr('disabled', true);
                PanError = 1;
            }
            else {

                // Fire Ajax query here to check whether the Pan number is aready in database or not
                $.ajax({
                    type: "POST",
                    url: "AccountValidation.php",
                    data: { PanNumber: PanNo },
                    success: function (response) {
                        if (response != "0") {
                            $("#PanError").text("Pan Number Already Exist");
                            $("#nextBtn").attr('disabled', true);
                            PanError = 1;
                        }
                        else {
                            $("#PanError").text("");
                            $("#nextBtn").attr('disabled', false);
                            PanError = 0;
                        }
                    }
                });
            }

        }

    });


    // ************************************ Email Validation ******************************************

    $("#email").blur(function () {
        let email = $(this).val();

        if (email == "") {

            $("#EmailError").text("Please Enter Your Email");
            $("#nextBtn").attr('disabled', true);
            // $(this).attr('required', true);
            EmailError = 1;
        }
        else {
            let match = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

            if (!match.test(email)) {

                $('#EmailError').text('Invalid Email Format');
                $("#nextBtn").attr('disabled', true);
                EmailError = 1;
            }
            else {

                // Fire Ajax query here to check whether the Pan number is aready in database or not
                $.ajax({
                    type: "POST",
                    url: "AccountValidation.php",
                    data: { EmailAddress: email },
                    success: function (response) {
                        if (response != "0") {
                            $("#EmailError").text("Email Address Already Exist");
                            $("#nextBtn").attr('disabled', true);
                            EmailError = 1;
                        }
                        else {
                            $("#EmailError").text("");
                            $("#nextBtn").attr('disabled', false);
                            EmailError = 0;
                        }
                    }
                });
            }
        }

    });




    $("#pincode").blur(function () {
        let pincode = $(this).val();

        if (pincode == "") {

            $("#PincodeError").text("Please Enter Your Area Pincode");
            $("#nextBtn").attr('disabled', true);
            pincodeError = 1;
        }
        else {

            let match = /^[1-9][0-9]{5}$/;

            if (!match.test(pincode)) {

                $('#PincodeError').text('Invalid Pincode Format');
                $("#nextBtn").attr('disabled', true);
                PincodeError = 1;
            }
            else {
                $("#PincodeError").text("");
                $("#nextBtn").attr('disabled', false);

            }

        }

    });



    // ***********************************  Birthdate Validation  **************************************

    $("#BirthDate").blur(function () {
        // storing date into variable
        let Bdate = new Date($("#BirthDate").val());

        // extracting day from date
        let day = Bdate.getDay();

        // Extracting Month from date
        let month = Bdate.getMonth();

        // Extracting Year from Date
        let year = Bdate.getFullYear();

        // required age
        let age = 18;

        // Fromula to calulate date 
        let setDate = new Date(year + age, month - 1, day);

        // Storing Current date in variable
        let today = new Date();

        // checking the user is 18 or 18+ or not 
        if (today >= setDate) {
            $("#AgeError").text("");
            $("#nextBtn").attr('disabled', false);
        }
        else {
            $("#AgeError").text("You are not Eligible for net Baniking");
            $("#nextBtn").attr('disabled', true);

        }


    });

    // ********************************************************** Mobile Number Validation *************************************

    $("#MobileNo").blur(function () {
        let MobileNo = $(this).val();

        if (MobileNo == "") {

            $("#MobileNoError").text("Please Enter Your Mobile Number");
            $("#nextBtn").attr('disabled', true);
            MobileNoError = 1;
        }
        else if (MobileNo.length > 10 || MobileNo.length < 10) {

            $("#MobileNoError").text("Invalid Mobile Number");
            $("#nextBtn").attr('disabled', true);
            MobileNoError = 1;

        }
        else {
            $("#MobileNoError").text("");
            $("#nextBtn").attr('disabled', false);
        }

    });





    // ***************************************************** First Name Validation *******************************************
    $("#FirstName").blur(function () {
        let Fname = $(this).val();
        let Expression = /^[a-zA-Z\s]+$/;
        if (Fname == "") {
            $("#FnameError").text("Please Enter your Name");
            $("#nextBtn").attr('disabled', true);
            FnameError = 1;
        }
        else {
            $("#FnameError").text("");
            $("#nextBtn").prop('disabled', false);
            if (!Expression.test(Fname)) {
                $("#FnameError").text("Name doesn't contain Numbers");
                $("#nextBtn").attr('disabled', true);
                FnameError = 1;
            }
            else {
                $("#FnameError").text("");
                $("#nextBtn").attr('disabled', false);
                FnameError = 0;

            }

        }

    });

    // ************************************************** Last Name Validation ****************************************
    $("#Lname").blur(function () {
        let Lname = $(this).val();
        let Expression1 = /^[a-zA-Z\s]+$/;
        if (Lname == "") {
            $("#LnameError").text("Please Enter your Last Name");
            $("#nextBtn").attr('disabled', true);
            LnameError = 1;
        }
        else {
            $("#LnameError").text("");
            $("#nextBtn").prop('disabled', false);
            LnameError = 0;
            if (!Expression1.test(Lname)) {
                $("#LnameError").text("Last Name doesn't contain Numbers");
                $("#nextBtn").attr('disabled', true);
                LnameError = 1;
            }
            else {
                $("#LnameError").text("");
                $("#nextBtn").prop('disabled', false);
                LnameError = 0;

            }

        }

    });
    // ******************************************** Father Name Validation ********************************************
    $("#FAname").blur(function () {
        let FAname = $(this).val();
        let Expression2 = /^[a-zA-Z\s]+$/;
        if (FAname == "") {
            $("#FAnameError").text("Please Enter your Father's Full Name");
            $("#nextBtn").attr('disabled', true);
            FAnameError = 1;
        }
        else {
            $("#FAnameError").text("");
            $("#nextBtn").prop('disabled', false);
            FAnameError = 0;
            if (!Expression2.test(FAname)) {
                $("#FAnameError").text("Name doesn't contain Numbers");
                $("#nextBtn").attr('disabled', true);
                FAnameError = 1;
            }
            else {
                $("#FAnameError").text("");
                $("#nextBtn").prop('disabled', false);
                FAnameError = 0;

            }

        }

    });

    // ***************************************** Mother Name Validation *********************************************
    $("#MAname").blur(function () {
        let MAname = $(this).val();
        let Expression3 = /^[a-zA-Z\s]+$/;
        if (MAname == "") {
            $("#MAnameError").text("Please Enter your Mother's Full Name");
            $("#nextBtn").attr('disabled', true);
            MAnameError = 1;
        }
        else {
            $("#MAnameError").text("");
            $("#nextBtn").prop('disabled', false);
            MAnameError = 0;
            if (!Expression3.test(MAname)) {
                $("#MAnameError").text("Name doesn't contain Numbers");
                $("#nextBtn").attr('disabled', true);
                MAnameError = 1;
            }
            else {
                $("#MAnameError").text("");
                $("#nextBtn").prop('disabled', false);
                MAnameError = 0;

            }

        }

    });


    // ****************************************************** Document Validation *************************************

    $("#PANCardUp").change(function () {

        // Taking Pancard file size in varible
        let PanSize = $(this)[0].files[0].size;
        console.log(PanSize);

        // Storing Pan card file name string in varible
        let PanfileStr = $(this).val();

        // divideing filename and extention in two parts i.e name and extention 
        let test = PanfileStr.match(/(.+)\.(.+)/);

        // Storing file name
        let Panfilename = test[1];

        // Storing Extention 
        let PanfileExtention = test[2];
        console.log(PanfileExtention)
        // Validating file Size
        if (PanSize <= 2000000) {
            if (PanfileExtention == 'jpg' || PanfileExtention == 'png' || PanfileExtention == 'jpeg') {
                $("#PanUPError").text("");
                $("#nextBtn").prop('disabled', false);
                console.log("Sucess");
            }
            else {
                $("#PanUPError").text("Invalid File Extention");
                $("#nextBtn").prop('disabled', true);
                console.log("fail");
                PanUPError = 1;
            }
        }
        else {
            $("#PanUPError").text("File Size is large, upload size maximum 2 MB");
            $("#nextBtn").prop('disabled', true);
            console.log("fail size");
            PanUPError = 1;
        }



    });


    $("#AdharCardUp").change(function () {

        // Taking adhar file size in varible
        let AdharSize = $(this)[0].files[0].size;


        // Storing adhar card file name string in varible
        let AdharfileStr = $(this).val();

        // divideing filename and extention in two parts i.e name and extention 
        let test = AdharfileStr.match(/(.+)\.(.+)/);

        // Storing file name
        let Adharfilename = test[1];

        // Storing Extention 
        let AdharfileExtention = test[2];
        console.log(AdharfileExtention)
        // Validating file Size
        if (AdharSize <= 2000000) {
            if (AdharfileExtention == 'jpg' || AdharfileExtention == 'png' || AdharfileExtention == 'jpeg') {
                $("#AdharUpError").text("");
                $("#nextBtn").prop('disabled', false);
                console.log("Sucess");



                //******************************* Sending otp on Email to validate account *******************************




                // Soring email in variabel
                let email = $("#email").val();

                // Storing Firstname in varible
                let name = $("#FirstName").val();
                $.ajax({
                    type: "POST",
                    url: "AccountValidation.php",
                    data: {

                        MailSend: email,
                        Name: name

                    },
                    success: function (response) {
                        if (response) {
                            $("#nextBtn").attr('disabled', false);
                            $("#mailsendError").text("");
                        }
                        else {
                            $("#mailsendError").text("Mail Not Send Please Try Again");
                            $("#nextBtn").attr('disabled', true);

                        }
                    }
                });


            }
            else {
                $("#AdharUpError").text("Invalid File Extention");
                $("#nextBtn").prop('disabled', true);
                console.log("fail");
                AdharUpError = 1;
            }
        }
        else {
            $("#AdharUpError").text("File Size is large, upload size maximum 2 MB");
            $("#nextBtn").prop('disabled', true);
            console.log("fail size");
            AdharUpError = 1;
        }



    });

    // ***************************************** Validating OTP ******************************************

    $("#Otp").change(function () {
        let otp = $(this).val();

        if (!otp == "") {

            $("#nextBtn").attr('disabled', false);
            $("#OtpError").text("");
            if (otp.length == 6) {

                $("#nextBtn").attr('disabled', false);
                $("#OtpError").text("");

                $.ajax({
                    type: "POST",
                    url: "AccountValidation.php",
                    data: { OTP: otp },
                    success: function (response) {
                        if (response == "Valid") {
                            $("#nextBtn").attr('disabled', false);
                            $("#OtpError").text("");
                        }
                        if (response == "Invalid") {
                            $("#OtpError").text("Please Enter Valid Otp");
                            $("#nextBtn").attr('disabled', true);

                        }
                    }
                });
            }
            else {
                $("#OtpError").text("Please Enter 6 digit Valid Otp");
                $("#nextBtn").attr('disabled', true);
            }
        } else {
            $("#OtpError").text("Please Enter Otp");
            $("#nextBtn").attr('disabled', true);
        }


    });

    // ************************************* Validating Username and Password *******************************

    // username Validation
    $("#Username").change(function () {
        let Username = $(this).val();

        if (!Username == "") {
            let regex = /^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/;
            if (!regex.test(Username)) {
                $("#UsernameError").text("Please Enter Valid Username conatining letters and number");
                $("#submitBtn").attr('disabled', true);
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "AccountValidation.php",
                    data: { Username: Username },
                    success: function (response) {
                        if (response != "0") {
                            $("#UsernameError").text("Username Not Availabel");
                            $("#submitBtn").attr('disabled', true);
                            UsernameError = 1;
                        }
                        else {
                            $("#UsernameError").text("");
                            $("#submitBtn").attr('disabled', false);
                            UsernameError = 0;
                        }
                    }
                });
            }
        }
        else {
            $("#UsernameError").text("Username Can not Empty");
            $("#submitBtn").attr('disabled', true);
        }

    });

    // password Validation
    $("#Password").change(function () {
        let Password = $(this).val();

        if (!Password == "") {

            let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m;
            if (!regex.test(Password)) {
                $("#PasswordError").text("Password must contain Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character");
                $("#submitBtn").attr('disabled', true);
            }
            else {
                $("#PasswordError").text("");
                $("#submitBtn").attr('disabled', false);
            }
        }
        else {
            $("#PasswordError").text("Password Can not Empty");
            $("#submitBtn").attr('disabled', true);
        }

    });

// Confirm Password
    $("#ConfirmPass").change(function () {
        let ConfirmPassword = $(this).val();
        let Password = $("#Password").val();

        if (!ConfirmPassword == "") {

            if (Password == ConfirmPassword) {
                $("#ConfirmPassError").text("");
                $("#submitBtn").attr('disabled', false);
            }
            else {

                $("#ConfirmPassError").text("Please Enter Same Password");
                $("#submitBtn").attr('disabled', true);
            }
        }
        else {
            $("#ConfirmPassError").text("Please Confirm Password");
            $("#submitBtn").attr('disabled', true);
        }

    });




});


