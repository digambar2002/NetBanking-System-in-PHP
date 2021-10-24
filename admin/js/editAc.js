$(document).ready(function () {
    
    $("#search").click(function () { 
        let AccountNo = $("#SearchText").val();

        if(AccountNo.lenght = 12){
            $.ajax({
                type: "POST",
                url: "search.php",
                data: {

                    AccountNumber: AccountNo
                    

                },
                dataType : 'json',
                success: function (response) {
                    if (response) {

                       
                        
                        if(AccountNo == ""){
                        
                            $("#EditTable").attr('hidden', false);
                            $("#SearchTable").attr('hidden', true);
                        }
                        else{
                 
                            $("#EditTable").attr('hidden', true);
                            $("#SearchTable").attr('hidden', false);

                            $("#id").text(response['id']);
                            $("#AccountNo").text(response['Ac']);
                            $("#Fname").text(response['Fname']);
                            $("#Lname").text(response['Lname']);

                            $("#edit_id").val(response['Ac']);
                            $("#delete_id").val(response['Ac']);

                            // document.cookie = "AccountNumber="+response['Ac'];

                        }
                     
                    }
                    else {
                        console.log("fail ajax");

                    }
                }
            });
        }
        
    });



});

function reload(){
    location.reload();
}