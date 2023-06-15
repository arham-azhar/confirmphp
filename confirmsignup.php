<?php
require 'dbconn.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists in the database
    $sql = "SELECT * FROM register WHERE token = '$token'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Update the user's status as confirmed
        $sql = "UPDATE register SET confirmed = 1 WHERE token = '$token'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Email confirmed successfully!";
        } else {
            echo "Error confirming email.";
        }
    } else {
        echo "Invalid confirmation token.";
    }
} else {
    echo "No token provided.";
}
?>
