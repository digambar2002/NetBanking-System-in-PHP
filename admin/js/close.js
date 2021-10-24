// console.log("Welcome");

$(document).ready(function () {
    $("#SearchBtn").click(function () {
        let AccountNo = $("#SearchTerm").val();
        // console.log(AccountNo);
        if (AccountNo.length == 12) {

            $.ajax({
                type: "POST",
                url: "search2.php",
                data: { CloseAccountNo: AccountNo },
                dataType: "json",
                success: function (response) {
                    if (response) {

                        if (response['message'] == null) {
                            $("#SearchImg").attr("hidden", true);
                            $("#SearchTabel").attr("hidden", false);

                            $("#id").text(response['id']);
                            $("#Fname").text(response['fname']);
                            $("#Lname").text(response['lname']);
                            $("#AcNo").text(response['Ac']);
                            $("#Balance").text(response['Balance']);
                            $("#AcType").text(response['AcType']);

                            $("#CloseAccount").val(response['Ac']);
                        }
                        else {
                            $("#heading").text(response['message']);
                        }
                    }
                    else {
                        $("#heading").text("Account Not Found");
                    }
                }
            });

        } else {
            $('#IconImg').removeClass('bx-search-alt-2').addClass('bx-search-error');
            $("#heading").text("Invalid Account Number");
        }
    });


    $("#CloseBtn").click(function (e) {
        e.preventDefault();
        let AccountNo = $("#CloseAccount").val();
        // console.log(AccountNo);
        var form = $(this).parents('form');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Account",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {


                $.ajax({
                    type: "POST",
                    url: "search2.php",
                    data: { CloseAc: AccountNo },
                    // dataType: "dataType",
                    success: function (response) {
                        if (response == "Success") {
                            swal("Account Deleted Sucessfully!", {
                                icon: "success",
                                buttons: [false]
                            });
                            setTimeout(function () {

                                form.submit();
    
                            }, 1000);
                            console.log(response);
                        }
                        else {
                            swal({
                                title: "Account Not Deleted !", 
                                text: "Please First Withdraw Money From Account!",
                                icon: "error",
                                buttons: true,
                                // value:true
                            }).then((value) => {
                                location.reload();
                              });
                       
                        }
                        
                    }
                });


            } else {
                swal("Account is Safe!");
            }
        });

    });






});