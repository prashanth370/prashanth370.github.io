
// Use noConflict to release the $ variable
var j = jQuery.noConflict();

// Use a self-invoking function to create a local scope with the $ variable
(function($) {
    // Your jQuery code here
    $(document).ready(function() {
        $('#forgotPasswordForm').submit(function(e) {
            e.preventDefault();

            var useremail = $('#fgemail').val();

            console.log("Received");
            $.ajax({
                url: "./php/forgot.php",
                type: "POST",
                data: {
                    useremail: useremail,
                },
                success: function(response) {
                    if(response!=0){
                        alert("your password is"+response);
                    }
                    else{
                        alert("user not found");
                    }
                },
                error: function() {
                    console.log("Error");
                },
            });
        });
    });
})(j); // Pass the jQuery reference as an argument
