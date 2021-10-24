$(document).ready(function () {
    console.log("hi");

    $.ajax({
        type: "POST",
        url: "code.php",
        data: { profileDetail: "Profile" },
        dataType: "json",
        success: function (response) {
            console.log(response.FName);


                if(response.Gender == "Male"){
                    $("#Male").attr("checked", true);
                    $("#GenderPlate").addClass("male-color");
                }
                else if(response.Gender == "Female"){
                    $("#Female").attr("checked", true);
                    $("#GenderPlate").addClass("female-color");
                }

                $("#NamePlate").text(response.FName + " " + response.LName);
                $("#NameTag").text(response.TagName);
                $("#ProfileTag").css("background-color", response.ProfileColor);
                $("#BalanceDisplay").text(response.Balance + " ₹");
                $("#SavingDisplay").text(response.SavingBalance + " ₹");
                $("#AcNo").text(response.AccountNo);
                $("#AcType").text(response.AccountType);
                $("#Adhar").text(response.AdharNo);
                $("#Pan").text(response.PanNo);
                $("#Status").text(response.Status);
                $("#MobileNo").text(response.MobileNo);
                $("#Email").text(response.Email);
                $("#GenderPlate").text(response.Gender);

                
                
                

                // Modal Profile
                if(response.ProfileImage != ""){
                    $("#ModalProfileImg").attr("hidden", false);
                    $("#ModalProfileImg").attr("src", response.ProfileImage);
                    $("#ProfileIcon").attr("hidden", true);
                }
            

                // Page Profile
                if(response.ProfileImage != ""){
                    $("#ProfilePic").attr("hidden", false);
                    $("#ProfilePic").attr("src", response.ProfileImage);
                    $("#ProfileTag").attr("hidden", true);
                }
               
                
                if(response.Bio == ""){
                    $("#AboutBio").text("The purpose of our lives is to be happy");
                    $("#bio").val("The purpose of our lives is to be happy");

                }
                else{
                    $("#AboutBio").text(response.Bio);
                    $("#bio").val(response.Bio);
                }
        }
    });


    $("#upload").change(function (e) { 

        let profilePath = URL.createObjectURL(e.target.files[0]);


        $("#ProfileIcon").attr("hidden", true);
        $("#ModalProfileImg").attr("hidden", false);
        $("#ModalProfileImg").attr("src", profilePath);

        console.log(profilePath);
        e.preventDefault();
        
    });



});