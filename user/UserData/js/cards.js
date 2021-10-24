console.log("Hello")
$(document).ready(function () {

    $("#SendAppBtn").click(function (e) {


        $.ajax({
            type: "POST",
            url: "code.php",
            data: { DebitCardApp: "FirstApply" },
            // dataType: "dataType",
            success: function (response) {
                console.log(response);
                if (response == 1) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Application Send Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(function () {

                        location.reload();

                    }, 2000);
                }
                else {

                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please Call to your bank',
                        timer: 1500
                    })
                }

            }
        });



        e.preventDefault();

    });

    // Adding Space in card number after every 4 charater

    let cardNo = $("#DebitcardNo").text();
    cardNo = cardNo.match(/.{1,4}/g);
    cardNo = cardNo.join('   ');
    $("#NewDebitNo").text(cardNo);


});
