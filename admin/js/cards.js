console.log('Hello');

// This is the best methd to perfrom crud operation multiple varibles
$(document).ready(function () {



    $(document).on('click', '.verify_data', function () {
        let AccountNo = $(this).attr("id");
        console.log(AccountNo);

        swal({
            title: "Are you sure?",
            text: "Once Verified, This Debit Card Should Be Activated ",
            icon: "info",
            buttons: true,
            dangerMode: false,
        }).then((value) => {
            if (value) {

                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { DebitCardCheck: AccountNo },
                    success: function (response) {

                        if (response == "Success") {
                            swal("Debit Card Activated Sucessfully!", {
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
                                title: "Debit Card Not Activated !",
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
                swal("The Debit Card is not Activated !");
            }

        });

    });


    $(document).on('click', '.reject_data', function () {
        let AccountNo = $(this).attr("id");
        console.log(AccountNo);

        swal({
            title: "Are you sure?",
            text: "Once Rejected, This Debitcard Should Not Be Recover ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: { DebitCardReject: AccountNo },
                    success: function (response) {

                        if (response == "Success") {
                            swal("Debit Card Request Rejected Sucessfully!", {
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
                                title: "Debitcard Not Rejected !",
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