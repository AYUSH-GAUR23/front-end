<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'ayush');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);
    
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL query
    $sql = "INSERT INTO Forms (Name, Email, password) VALUES ('$Name', '$Email', '$hashed_password')";
    
    // Execute query and check for success
    if (!mysqli_query($con, $sql)) {
        echo "Error inserting record: " . mysqli_error($con);
    } else {
        echo "Inserted successfully!";
    }
}

// Close the connection
mysqli_close($con);
?>
