

var j = jQuery.noConflict();

// Use a self-invoking function to create a local scope with the $ variable
(function($) {
    // Your jQuery code here
    $(document).ready(function() {
        $('#hmlogout').submit(function(e) {
            e.preventDefault();

            localStorage.setItem('Loggedin','nouser');
            localStorage.setItem('log',false)
            location.href='../html/login.html';
        });
    });
})(j); // Pass the jQuery reference as an argument
