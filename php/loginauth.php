<?php
$mysqli = new mysqli("localhost", "root", "", "guvi");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the POST data
    $username = $_POST['your_name'];
    $password = $_POST['your_pass'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Get the number of rows fetched
    $numRows = $result->num_rows;

    // Validate the user credentials against the database
    if ($numRows > 0) {
        echo "<script>
        localStorage.setItem('Log',true);
            localStorage.setItem('Loggedin', '$username');
            alert('Login successful!');
            window.location.href = '../home.html'; // Redirect to the home page
        </script>";
    } else {
        echo "<script>
            alert('Login failed. Please check your credentials.');
            window.location.href = '../login.html'; // Redirect back to the login page
        </script>";
    }

    $stmt->close();
}

$mysqli->close();
?>
