console.log('Hello');

// This is the best methd to perfrom crud operation multiple varibles
$(document).ready(function () {

    $(document).on('click', '.view_data', function () {

        let AccountNo = $(this).attr("id");
        // console.log(AccountNo);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: {

                CAccountNo: AccountNo
            },
            dataType: 'json',
            success: function (response) {

                // console.log(response['Fname']);
                $("#Fname").text(response['Fname']);
                $("#Lname").text(response['Lname']);
                // console.log(response['Lname']);
                $("#Faname").text(response['Faname']);
                $("#Maname").text(response['Maname']);
                $("#Bdate").text(response['Bdate']);
                $("#AdharNo").text(response['AdharNo']);
                $("#PanNo").text(response['PanNo']);
                $("#MobileNo").text(response['MobileNo']);
                $("#Pincode").text(response['Pincode']);
                $("#Email").text(response['Email']);

                $("#Email").text(response['Email']);
                let AdharimgLocation = response['AdharDoc'];
                let PanimgLocation = response['PanDoc'];
                console.log(PanimgLocation);
                $("#AdharImg").attr("src", "../user/" + AdharimgLocation);
                $("#PanImg").attr("src", "../user/" + PanimgLocation);
            

            }
        });
    });

    $(document).on('click', '.verify_data', function () {
        let AccountNo = $(this).attr("id");
        console.log(AccountNo);

        swal({
            title: "Are you sure?",
            text: "Once Verified, This Account Should Be Activated ",
            icon: "info",
            buttons: true,
            dangerMode: false,
        }).then((value) => {
            if (value) {

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { VerifyAc: AccountNo },
                    success: function (response) {

                        if (response == "Success") {
                            swal("Account Activated Sucessfully!", {
                                icon: "success",
                                buttons: [false]
                            });
                            setTimeout(function () {

                                location.reload();

                            }, 1000);
                            console.log(response);
                        }
                        else {
                            swal({
                                title: "Account Not Activated !",
                                text: "Please Check Connection or after some time!",
                                icon: "error",
                                buttons: true,
                                // value:true
                            }).then((value) => {
                                location.reload();
                            });

                        }
                    }
                });
            }
            else {
                swal("The Account is not Activated !");
            }

        });

    });
    $(document).on('click', '.reject_data', function () {
        let AccountNo = $(this).attr("id");
        console.log(AccountNo);

        swal({
            title: "Are you sure?",
            text: "Once Rejected, This Account Should Not Be Recover ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { RejectAc: AccountNo },
                    success: function (response) {

                        if (response == "Success") {
                            swal("Account Activated Sucessfully!", {
                                icon: "success",
                                buttons: [false]
                            });

                            $.ajax({
                                type: "POST",
                                url: "code.php",
                                data: {done: "done"},
                                success: function (response) {
                                    
                                }
                            });
                            setTimeout(function () {

                                location.reload();

                            }, 1000);
                            console.log(response);
                        }
                        else {
                            swal({
                                title: "Account Not Activated !",
                                text: "Please Check Connection or after some time!",
                                icon: "error",
                                buttons: true,
                                // value:true
                            }).then((value) => {
                                location.reload();
                            });

                        }
                    }
                });
            }
            else {
                swal("The Account is not Activated !");
            }

        });

    });
});