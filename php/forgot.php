
<?php
$mysqli = new mysqli("localhost", "root", "", "guvi");

if ($mysqli->connect_error) {
    die("Connection failed: " .$mysqli->connect_error);
}

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the POST data
    $useremail = $_POST['useremail'];
    
    // Use prepared statements to prevent SQL injection
    $query = "SELECT password FROM users WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    // Check if a row was returned
    if ($row) {
        // Echo the password
        echo $row['password'];
    } else {
        // Handle the case where no matching user was found
        echo 0;
    }

    $stmt->close();
}

$mysqli->close();
?>
