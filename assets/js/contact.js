$(document).ready(function () {
    $("#submit").click(function (e) {
        console.log("Hello");
        let name = $("#name").val();
        let email = $("#email").val();
        let subject = $("#subject").val();
        let message = $("#message").val();

        if (name == "") {
            $("#name").attr('required', true);
            console.log("Name r");
        }
        else {
            if (email == "") {
                $("#email").attr("required", true);
                console.log("email r");
            }
            else {
                if (/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(email)) {

                    if (subject == "") {
                        $("#subject").attr("required", true);
                    }
                    else {

                        if (message == "") {
                            $("#message").attr("required", true);
                        }
                        else {

                            $.ajax({
                                type: "POST",
                                url: "contact.php",
                                data: {

                                    name: name,
                                    email: email,
                                    subject: subject,
                                    message: message
                                },
                                beforeSend: function() {
                                    // setting a timeout
                                    $("#status").text('Message Sending ... ');
                                    $("#status").attr('hidden', false);
           
                                },
                                success: function (response) {

                                    $("#status").attr('hidden', true);

                                    if (response == "success") {
                                        $("#name").val("");
                                        $("#email").val("");
                                        $("#subject").val("");
                                        $("#message").val("");
                                        $("#success-message").attr("hidden", false);
                                        $("#success-message").text("Message send successfully");
                                        setTimeout(function () {
                                            $('#success-message').attr("hidden", true);
                                        }, 3000)
                                    }
                                    else {
                                        
                                        $("#name").val("");
                                        $("#email").val("");
                                        $("#subject").val("");
                                        $("#message").val("");
                                        $("#error-message").attr("hidden", false);
                                        $("#error-message").text("Message not send");
                                        setTimeout(function () {
                                            $('#error-message').attr("hidden", true);
                                        }, 3000)
                                    }
                                }
                            });
                        }
                    }

                }
                else {
                    console.log("fail");
                    $('#error-message').attr("hidden", false);
                    $('#error-message').text("Enter Valid Email");
                    setTimeout(function () {
                        $('#error-message').attr("hidden", true);
                    }, 3000)
                }
            }
        }

        e.preventDefault();


    });
});