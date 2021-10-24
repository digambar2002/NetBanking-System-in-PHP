console.log("Hello");

$(document).ready(function () {


    // $('.modal').modal('show');
    var popFlag;

    $("#SenderAc").keyup(function () {
        let SenderAc = $(this).val();

        if (SenderAc.length == 12) {

            let ReceiverAc = $('#ReceiverAc').val();

            if (ReceiverAc == SenderAc) {
                $("#ReciverAcError").text("You Cannot transfer money in same account");
            }
            else {
                $("#ReciverAcError").text("");
                console.log(SenderAc);
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { SenderAcNo: SenderAc },
                    dataType: "json",
                    success: function (response) {

                        if (response["Flag"] != "fail") {
                            popFlag = 1;

                            $("#SenderAcError").text("");
                            let Fname = response["Fname"];
                            let Lname = response["Lname"];
                            let AdharNo = response["AdharNo"];
                            let PanNo = response["PanNo"];
                            let MobileNo = response["MobileNo"];
                            let Balance = response["Balance"];
                            let Status = response["Status"];

                            $('#SenderAc').popover({

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
                            $('#SenderAc').popover('hide');
                            popFlag = 0;
                            $("#SenderAcError").text("Account Number Not Found. Note: Refresh The Page for next account no");

                        }
                    }
                });
            }

        }
    });

    $("#ReceiverAc").on({
        click: function () {
            if (popFlag == 1)
                $('#SenderAc').popover('toggle');
            else
                $('#SenderAc').popover('hide');
        },

        keyup: function () {
            let ReceiverAc = $(this).val();

            if (ReceiverAc.length == 12) {

                let SenderAc = $('#SenderAc').val();

                if (ReceiverAc == SenderAc) {
                    $("#ReciverAcError").text("You Cannot transfer money in same account");
                }
                else {

                    console.log(ReceiverAc);

                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: { ReceiverAcNo: ReceiverAc },
                        dataType: "json",
                        success: function (response) {

                            if (response["Flag"] != "fail") {
                                popFlag = 1;

                                $("#ReciverAcError").text("");
                                let Fname = response["Fname"];
                                let Lname = response["Lname"];
                                let AdharNo = response["AdharNo"];
                                let PanNo = response["PanNo"];
                                let MobileNo = response["MobileNo"];
                                let Balance = response["Balance"];
                                let Status = response["Status"];

                                $('#ReceiverAc').popover({

                                    title: 'Receiver Details',
                                    html: true,
                                    container: "body",
                                    placement: 'left',
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
                                $(this).popover('hide');
                                popFlag = 0;
                                $("#ReciverAcError").text("Account Number Not Found. Note: Refresh The Page for next account no");

                            }
                        }
                    });
                }
            }
        }

    });

    $("#Amount").on({
        click: function () {
            $('#ReceiverAc').popover('toggle')
            $('#SenderAc').popover('hide')
        },

        keyup: function () {
            $('#ReceiverAc').popover('hide')
            let Amount = $(this).val();

            if (Amount >= 100) {


                $("#AmountError").text("");

                let SenderAc = $("#SenderAc").val();
                let ReceiverAc = $("#ReceiverAc").val();

                if (SenderAc != "") {

                    if (ReceiverAc != "") {

                        // $.ajax({
                        //     type: "POST",
                        //     url: "code.php",
                        //     data: { BalanceCheck: SenderAc },
                        //     success: function (response) {

                        //         let Balance = response;
                        //         console.log(Balance)
                        //         console.log(Amount);

                        //         if (Balance > Amount) {
                        //             $("#AmountError").text("");
                        //         }
                        //         else {
                        //             $("#AmountError").text("insufficient account balance ");
                        //         }
                        //     }
                        // });
                    }
                    else {
                        $("#ReciverAcError").text("Please Enter Account No");

                    }
                }
                else {
                    $("#SenderAcError").text("Please Enter Account No");
                }

            }
            else {
                $("#AmountError").text("Please Enter Minimum 100 rupees");
            }
        }

    });



    $("#TransactionBtn").click(function () {

        let Amount = $("#Amount").val();
        let SenderAc = $("#SenderAc").val();
        let ReceiverAc = $("#ReceiverAc").val();

        if (SenderAc != "") {

            if (ReceiverAc != "") {

                if (Amount >= 100) {
                    $("#AmountError").text("");
                    swal({
                        title: "Are you sure to transfer of Amount" + "   " + "₹" + Amount,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {

                        if (willDelete) {

                            let SenderAc = $("#SenderAc").val();
                            let ReceiverAc = $("#ReceiverAc").val();

                            $.ajax({
                                type: "POST",
                                url: "code.php",
                                data: {
                                    TSenderAc: SenderAc,
                                    TReceiverAc: ReceiverAc,
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

                    });
                }
                else {
                    $("#AmountError").text("Please Enter Minimum 100 rupees");
                }
            }

            else {
                $("#ReciverAcError").text("Please Enter Account No");

            }

        }
        else {
            $("#SenderAcError").text("Please Enter Account No");
        }



    });


});
