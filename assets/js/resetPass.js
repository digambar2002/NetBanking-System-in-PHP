$(document).ready(function () {
    $("#Password").change(function () {
        let Password = $(this).val();

        if (!Password == "") {

            let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m;
            if (!regex.test(Password)) {
                $("#PasswordError").text("Password must be 8 charaters long with 1 uppercase 1 lowercase and 1 letter and 1 special charater");
                $("#done").attr('disabled', true);
            }
            else {
                $("#PasswordError").text("");
                $("#done").attr('disabled', false);
            }
        }
        else {
            $("#PasswordError").text("Password Can not Empty");
            $("#done").attr('disabled', true);
        }

    });

    $("#ConfirmPass").change(function () {
        let ConfirmPassword = $(this).val();
        let Password = $("#Password").val();

        if (!ConfirmPassword == "") {

            if (Password == ConfirmPassword) {
                $("#PasswordError").text("");
                $("#done").attr('disabled', false);
            }
            else {

                $("#PasswordError").text("Please Enter Same Password");
                $("#done").attr('disabled', true);
            }
        }
        else {
            $("#PasswordError").text("Please Confirm Password");
            $("#done").attr('disabled', true);
        }

    });

});