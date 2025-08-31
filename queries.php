<?php
$subject = $_POST["subject"];
$name = $_POST["name"];
$phonenumber = $_POST["phonenumber"];
$email = $_POST["email"];
$message = $_POST["message"];

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'carecomdb');

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sendto = $connection->prepare("INSERT INTO contactus (subject, name, phonenumber, email, message) VALUES (?,?,?,?,?)");
$sendto->bind_param("sssss", $subject,  $name, $phonenumber, $email, $message);

if ($sendto->execute()) {
    echo "<script>
            
            window.location.href='query.html';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $sendto->error . "');
            window.location.href='index.html';
          </script>";
}

// Close the connection
$sendto->close();
$connection->close();
?>


