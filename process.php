<?php

$servername = "localhost"; 
$username = "root";      
$password = "";         
$dbname = "gym_membership"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $membership_type = $_POST['membership_type'];
    $gym_location = $_POST['gym_location'];

  
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);
    $membership_type = $conn->real_escape_string($membership_type);
    $gym_location = $conn->real_escape_string($gym_location);

   
    $sql = "INSERT INTO members (name, email, phone, membership_type, gym_location) 
            VALUES ('$name', '$email', '$phone', '$membership_type', '$gym_location')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Thank you for registering!</h2>";
        echo "<p>Your gym membership has been successfully created.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
