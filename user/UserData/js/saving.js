console.log('hello');
$(document).ready(function () {


    $.ajax({
        type: "POST",
        url: "code.php",
        data: { BasicDetail: "BasicDetail" },
        dataType: "json",
        success: function (response) {
            let SavingBalance = response.SavingBalance;
            let Target = response.SavingTarget;
            $("#SavingDisplay").text("₹ " + response.SavingBalance);

            if (response.SavingTarget == "" || response.Target == 0) {
                $("#TargetDisplay").text("Target Not Set");
                Target = "0.0";
            }
            else {
                $("#TargetDisplay").text("₹ " + response.SavingTarget);
            }

            if (response.SavingTarget == 0 || response.Target == "") {
                Total = "0";
                perShow = "0";
            }
            else {

                Total = (SavingBalance / Target) * 100;

                perShow = Total;

                console.log(Total);

                if (Total == 100) {
                    Total = 1;
                }
                else if (Total > 0 && Total < 10) {
                    Total = "0.0" + parseInt(Total);
                }
                else {
                    Total = "0." + parseInt(Total);
                }

                console.log(Total);
            }




            // Circle Progress 


            $('#circle').circleProgress({
                startAngle: 4.7,
                value: Total,
                size: 200,
                emptyFill: "rgba(0, 0, 0, .2)",
                fill: {
                    gradient: ["#006CFA", "#D400FF"]
                },
                lineCap: "round",
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('strong').html(Math.round(perShow * progress) + '<i>%</i>');
            });



        }
    });

    $("#AddMoneyBtn").click(function () {
        Swal.fire({
            title: 'Enter Saving Amount',
            input: 'text',
            imageUrl: 'https://i.ibb.co/DCbJjC1/oie-29134450orhl-BWMO.gif',
            imageWidth: 200,
            imageHeight: 150,
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Done',
            showLoaderOnConfirm: true,
            preConfirm: (value) => {
                console.log(value);

                SavingAmount = value;

                if (/^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/.test(SavingAmount)) {

                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: { Amount: SavingAmount },
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Transaction Successful !',

                                })
                                setTimeout(function () {

                                    location.reload();

                                }, 2000);
                                console.log(response);
                            }
                            else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Transaction Fail!',
                                    text: response,
                                    showCancelButton: true,
                                    confirmButtonText: `Ok`,

                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })

                            }
                        }
                    });

                }
                else {
                    Swal.fire({
                        title: "Amount Error !",
                        text: "Please Enter Amount In Only Numbers",
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: `Ok`,
                        // value:true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }

            },
            allowOutsideClick: () => !Swal.isLoading()
        });



    });


    $("#SetTarget").click(function () {

        Swal.fire({
            title: 'Enter Your Target Saving Amount',
            input: 'text',
            imageUrl: 'https://i.ibb.co/c8ZvG7q/371906770-HITTING-TARGET-400x400.gif',
            imageWidth: 150,
            imageHeight: 150,
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Done',
            showLoaderOnConfirm: true,
            preConfirm: (value) => {

                console.log(value);

                TargetAmount = value;

                if (/^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/.test(TargetAmount)) {

                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: { SavingTarget: TargetAmount },
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Target Set Successfully !',

                                })
                                setTimeout(function () {

                                    location.reload();

                                }, 2000);
                                console.log(response);
                            }
                            else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Target Not Set!',
                                    text: response,
                                    showCancelButton: true,
                                    confirmButtonText: `Ok`,

                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })

                            }
                        }
                    });


                }
                else {
                    Swal.fire({
                        title: "Amount Error !",
                        text: "Please Enter Only Numbers",
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: `Ok`,
                        // value:true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }

            }

        });

    });


    $("#TransferBtn").click(function () {
        Swal.fire({
            title: 'Transfer Saving to Main Account',
            input: 'text',
            imageUrl: 'https://i.ibb.co/p1phnp8/oie-G0kpj-RPTFzl-F.gif',
            imageWidth: 200,
            imageHeight: 150,
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Done',
            showLoaderOnConfirm: true,
            preConfirm: (value) => {
                console.log(value);

                TransferAmount = value;

                if (/^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/.test(TransferAmount)) {

                    $.ajax({
                        type: "POST",
                        url: "code.php",
                        data: { TransferBalance: TransferAmount },
                        success: function (response) {
                            console.log(response);
                            if (response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Transaction Successful !',

                                })
                                setTimeout(function () {

                                    location.reload();

                                }, 2000);
                                console.log(response);
                            }
                            else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Transaction Fail!',
                                    text: response,
                                    showCancelButton: true,
                                    confirmButtonText: `Ok`,

                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })

                            }
                        }
                    });

                }
                else {
                    Swal.fire({
                        title: "Amount Error !",
                        text: "Please Enter Amount In Only Numbers",
                        icon: "error",
                        showCancelButton: true,
                        confirmButtonText: `Ok`,
                        // value:true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }

            },
            allowOutsideClick: () => !Swal.isLoading()
        });



    });






});