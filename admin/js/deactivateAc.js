$(document).ready(function () {

    $("#search").click(function () {
        let AccountNo = $("#SearchText").val();

        if (AccountNo.lenght = 12) {
            $.ajax({
                type: "POST",
                url: "search2.php",
                data: {

                    Deactive_AccountNumber: AccountNo


                },
                dataType: 'json',
                success: function (response) {
                    if (response) {

                        if (AccountNo == "") {

                            $("#EditTable").attr('hidden', false);
                            $("#SearchTable").attr('hidden', true);
                        }
                        else {

                            $("#EditTable").attr('hidden', true);
                            $("#SearchTable").attr('hidden', false);

                            $("#id").text(response['id']);
                            $("#AccountNo").text(response['Ac']);
                            $("#Username").text(response['Username']);
                            $("#Status").text(response['Status']);

                            $("#deactivate_id").val(response['Ac']);

                            // document.cookie = "AccountNumber="+response['Ac'];

                        }

                    }
                    else {
                        alert("No such Account");
                        console.log("fail ajax");

                    }
                }
            });
        }

    });


});

function reload() {
    location.reload();
}