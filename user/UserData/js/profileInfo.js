$(document).ready(function () {


    $.ajax({
        type: "POST",
        url: "code.php",
        data: { ProfileData: "MyData" },
        success: function (response) {
            if (response != "") {

                $("#HeaderProfile").attr("hidden", false);
                $("#HeaderProfile").attr("src", response);
                $("#HeaderProfileTag").attr("hidden", true);


            }
        }
    });



    $("#HeaderProfile").popover({

        title: 'Profile Detail',
        html: true,
        container: "body",
        placement: 'bottom',
        content: ` 
        <a href="profile.php" class=" nav-link btn btn-primary mb-2 mt2" >View Profile</a>
        <a href="../../admin/logout.php" role="button" class="btn btn-danger nav-link mb-2">Logout</a>`

    })

    $("#HeaderProfileTag").popover({

        title: 'Profile Detail',
        html: true,
        container: "body",
        placement: 'bottom',
        content: ` 
        <a href="profile.php" class=" nav-link btn btn-primary mb-2 mt2" >View Profile</a>
        <a href="../../admin/logout.php" role="button" class="btn btn-danger nav-link mb-2">Logout</a>`

    })


    // Credit Stack over flow
    $('body').on('click', function (e) {
        $('#HeaderProfile').each(function () {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

  


});