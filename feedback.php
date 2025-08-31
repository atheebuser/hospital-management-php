<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];
$message = $_POST["message"];

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'carecomdb');

if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sendto = $connection->prepare("INSERT INTO feedbacks (name, email, phonenumber, message) VALUES (?,?,?,?)");
$sendto->bind_param("ssss", $name,  $email, $phonenumber, $message);

if ($sendto->execute()) {
    echo "<script>
            alert('Feedback submitted successfully!');
            window.location.href='index.html';
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
