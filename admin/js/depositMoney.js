$(document).ready(function () {

    $("#AccountNo").keyup(function () {
        let AccountNo = $(this).val();

        if (AccountNo.length == 12) {

            console.log(AccountNo);
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {AcNo: AccountNo },
                dataType: "json",
                success: function (response) {

                    if (response["Flag"] != "fail") {
                        popFlag = 1;

                        $("#AcError").text("");
                        let Fname = response["Fname"];
                        let Lname = response["Lname"];
                        let AdharNo = response["AdharNo"];
                        let PanNo = response["PanNo"];
                        let MobileNo = response["MobileNo"];
                        let Balance = response["Balance"];
                        let Status = response["Status"];

                        $("#info").attr("hidden", false);
                        $('#AccountNo').addClass("border-right-0");

                        $('#AccountNo').popover({

                            title: 'Sender Details',
                            html: true,
                            container: "body",
                            placement: 'right',
                            content: `<p><strong>First Name: </strong> ${Fname}</p> 
                                <p><strong>Last Name: </strong>${Lname}</p> 
                                <p><strong>Adhar Number: </strong>${AdharNo}</p> 
                                <p><strong>Pan Number: </strong>${PanNo}</p>
                                <p><strong>Mobile Number: </strong>${MobileNo}</p>
                                <p><strong>Account Balance: </strong>${Balance}</p>
                                <p><strong>Account Status: </strong>${Status}</p>`

                        })
                    }
                    else {
                        $('#AccountNo').popover('hide');
                        $("#AcError").text("Account Number Not Found. Note: Refresh The Page for next account no");

                    }
                }
            });


        }
    });

    $("#info").click(function () { 
        $('#AccountNo').popover('toggle')
        
    });

    
    $("#Amount").on({
        click: function () {
            $('#AccountNo').popover('hide')
            // $('#AccountNo').popover('toggle')
        },

        keyup: function () {
            let Amount = $(this).val();

            if (Amount >= 100) {
                $("#AmountError").text("");

                let AccountNo = $("#AccountNo").val();
            }
            else {
                $("#AmountError").text("Please Enter Minimum 100 rupees");
            }
        }

    });

    $("#Deposit").click(function () {

        let Amount = $("#Amount").val();
        let AccountNo = $("#AccountNo").val();
        if(AccountNo != ""){
            $("#AcError").text("");

            if (Amount >= 100) {
                $("#AmountError").text("");
                swal({
                    title: "Are you sure to Deposit of Amount" + "   " + "₹" + Amount,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
    
                    if (willDelete) {
                            
                        $.ajax({
                            type: "POST",
                            url: "code.php",
                            data: { AcState: AccountNo },
                            success: function (response) {
    
                                let Status = response;
                                console.log(Status)
    
                                if (Status == "Active") {
                                    $("#AcError").text("");
    
                                    $.ajax({
                                        type: "POST",
                                        url: "code.php",
                                        data: {
                                            DepositAc: AccountNo,
                                            MainAmount: Amount
                                        },
                                        cache: false,
                                        beforeSend: function () {
                                            $('.modal').modal('show');
                                        },
                                        complete: function () {
                                            $('.modal').modal('hide');
                                        },
                                        success: function (response) {
                                            console.log(response);
                                            if (response == "Success") {
                                                swal("Transaction Sucessfully!", {
                                                    icon: "success",
                                                    buttons: [false]
                                                });
                                                setTimeout(function () {
    
                                                    location.reload();
    
                                                }, 2000);
                                                console.log(response);
                                            }
                                            else {
                                                swal({
                                                    title: "Transaction Fail !",
                                                    text: response,
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
                                    $("#AcError").text("");
                                }
                            }
                        });
    
                    }
    
                });
            }
            else {
                $("#AmountError").text("Please Enter Minimum 100 rupees");
            }
        }
        else{
            $("#AcError").text("Account Number Cannot Empty");

        }

    });

});