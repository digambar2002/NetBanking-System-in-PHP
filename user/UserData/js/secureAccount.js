$(document).ready(function () {


    $.ajax({
        type: "POSt",
        url: "code.php",
        data: { Switch: "State" },
        success: function (response) {

            if (response == "Active") {
                $("#SwitchBtn").attr("checked", true);
                $("#Status").text(response);
                $("#Status").css("color", "green");
            }
            else {
                $("#Status").text(response);
                $("#Status").css("color", "red");
                $("#Status").css("font-size", "11px");
            }

        }
    });

    $("#NewUsername").blur(function (e) {
        New_Username = $(this).val();
        let flag = false;

        if (/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/.test(New_Username)) {
            flag = true;
        }
        else {
            flag = false;
        }


        if (flag == true) {

            $.ajax({
                type: "POST",
                url: "code.php",
                data: { NewUsernameCheck: New_Username },
                success: function (response) {

                    if (response == "pass") {
                        $("#NewUserError").text("Username Not Availabe");
                        $("#NewUserError").css("color", "red");
                    }
                    else {
                        $("#NewUserError").text("Username Availabe");
                        $("#NewUserError").css("color", "green");
                    }

                }

            });
        } else {
            $("#NewUserError").text("Invalid Username Format ! Username can't start with number and sysmbol");
            $("#NewUserError").css("color", "red");
            return false
        }
        e.preventDefault();

    });

    $("#UsernameBtn").click(function (e) {

        New_Username = $("#NewUsername").val();
        Old_Username = $("#OldUsername").val();
        Password = $("#UserPassword").val();
        console.log("Hello");

        if (Old_Username == "") {
            $("#OldUserError").text("Username is Empty");

        }
        else {
            $("#OldUserError").text("");



            if (New_Username == "") {
                $("#NewUserError").text("New Username is Empty");
            }
            else {
                $("#NewUserError").text("");

                if (/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/.test(New_Username)) {

                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: { NewUsernameCheck: New_Username },
                        success: function (response) {

                            if (response == "pass") {
                                $("#NewUserError").text("Username Not Availabe");
                                $("#NewUserError").css("color", "red");

                            }
                            else {
                                $("#NewUserError").text("Username Availabe");
                                $("#NewUserError").css("color", "green");

                                if (Password == "") {
                                    $("#UserPassError").text("Password is Empty");
                                }
                                else {
                                    $("#UserPassError").text("");
                                    $.ajax({
                                        type: "POST",
                                        url: "code.php",
                                        data: {

                                            UpdateNewUsername: New_Username,
                                            OldUsername: Old_Username,
                                            UserPassword: Password
                                        },
                                        success: function (response) {
                                            if (response == "success") {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Username Changed Successfully',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })

                                                window.location.replace("../logout.php");

                                            }
                                            else {

                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oopps... Fail',
                                                    text: response,
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })

                                            }
                                        }
                                    });
                                }
                            }

                        }

                    });




                } else {
                    $("#NewUserError").text("Invalid Username Format ! Username can't start with number and sysmbol");
                    $("#NewUserError").css("color", "red");
                    return false
                }


            }





        }

        e.preventDefault();

    });

});



// --------------------------------------------- Change Password ------------------------------------------------

$("#PasswordBtn").click(function (e) {

    let OldPass = $("#OldPassword").val();
    let NewPass = $("#NewPassword").val();
    let ConfirmPass = $("#ConfirmPassword").val();

    if (OldPass == "") {
        $("#OldPassError").text("Password is empty");
        $("#OldPassError").css("color", "red");
    }
    else {
        $("#OldPassError").text("");
        if (NewPass == "") {
            $("#NewPassError").text("Password is empty");
            $("#NewPassError").css("color", "red");
        }
        else {
            $("#NewPassError").text("");
            if (ConfirmPass == "") {
                $("#ConfirmPassError").text("Confirm Password is empty");
                $("#ConfirmPassError").css("color", "red");
            }
            else {
                $("#ConfirmPassError").text("");
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { PasswordCheck: OldPass },
                    success: function (response) {

                        if (response == "success") {
                            if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m.test(NewPass)) {

                                if (ConfirmPass == NewPass) {

                                    $.ajax({
                                        type: "POST",
                                        url: "code.php",
                                        data: { UpdatePass: NewPass },
                                        success: function (response) {
                                            if (response == 'success') {

                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Password Changed Successfully',
                                                    showConfirmButton: false,
                                                    timer: 2500
                                                })

                                                window.location.replace("../logout.php");
                                            }
                                            else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oopps... Fail',
                                                    text: response,
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })
                                            }
                                        }
                                    });
                                }
                                else {
                                    $("#ConfirmPassError").text("Password Not Match !");
                                }
                            }
                            else {
                                $("#NewPassError").text("Invalid Password ! Your password must be 8-12 characters long, contain letters and numbers, and must not contain spaces, special characters");
                                $("#NewPassError").css("color", "red");
                            }
                        }
                        else {
                            $("#OldPassError").text("Invalid Password!");
                        }

                    }
                });

            }
        }
    }

    e.preventDefault();

});

// ----------------------------------------- Switch Click --------------------------------------------------

// $("#SwitchBtn").click(function (e) { 

console.log($("#SwitchBtn").val());
// e.preventDefault();

// });

$('#SwitchBtn').change(function () {
    if ($(this).is(':checked')) {
        console.log($(this).val() + ' is now checked');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You Want to Activate Account!",
            icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonText: 'Yes, Activate!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { UpdateStatus: "Active" },
                    success: function (response) {

                        if (response == "success") {
                            swalWithBootstrapButtons.fire(
                                'Activated!',
                                'Your Account successfully Activated.',
                                'success'
                            )
                            $("#SwitchBtn").attr("checked", false);
                            $("#Status").text("Active");
                            $("#Status").css("color", "green");
                            $("#Status").css("font-size", "14px");
                        }

                    }
                });


            }
            else if (result.dismiss === Swal.DismissReason.cancel) {

               
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Account Not Activated :)',
                    'error'
                )

                setTimeout(function () {

                   
                }, 2000);
                 location.reload();
                
            }
        })


        

    } else {
        console.log($(this).val() + ' is now unchecked');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "After Log out You Can't Login And Account is Activated by just Bank!",
            icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            confirmButtonText: 'Yes, Deactivate!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { UpdateStatus: "Deactivated" },
                    success: function (response) {

                        if (response == "success") {
                            swalWithBootstrapButtons.fire(
                                'Deactivated!',
                                'Your Account successfully deactivated.',
                                'success'
                            )
                            $("#SwitchBtn").attr("checked", false);
                            $("#Status").text("Deactivated");
                            $("#Status").css("color", "red");
                            $("#Status").css("font-size", "11px");
                        }

                    }
                });


            }
            else if (result.dismiss === Swal.DismissReason.cancel) {

               
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Account Not Deactivated :)',
                    'error'
                )

                setTimeout(function () {

                   
                }, 2000);
                 location.reload();
                
            }
        })
    }
});