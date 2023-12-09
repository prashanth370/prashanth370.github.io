<?php
$mysqli = new mysqli("localhost", "root", "", "guvi");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["vtname"];
    $addr = $_POST["vtaddr"];
    $cont= $_POST["vtcon"];

    $stmt = $mysqli->prepare("INSERT INTO voters(username,addr,contact) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $addr,$cont);

    if ($stmt->execute()) {
        header('Location:../home.html');
        exit();
        
    } else {
        header('Location:../vtregister.html');
        exit();
    }
    $stmt->close();
}


$mysqli->close();
?>
