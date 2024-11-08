<?php

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_pass = $_POST['c_pass'];

    $connection = mysqli_connect('localhost', 'root', '', 'signup_db');
    
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Check duplicated email
    $check_email = "SELECT * FROM `signup_info` WHERE email = '$email'";
    $check_query = mysqli_query($connection, $check_email);
    $email_row = mysqli_num_rows($check_query);
    
    if ($email_row) {
        $email_msg = "Email already exists, please try with another email";
        echo $email_msg;
    } 
    
    else {

        // Check specialChar
        $specialChar = preg_match('@[^\w]@', $password);
        if (!$specialChar || strlen($password) < 8) {
            $error_msg = "Please include at least one special character and ensure the password is at least 8 characters long";
            echo $error_msg;
        } 
        
        else if ($password != $c_pass) {
            echo "Passwords do not match.";
        } 
        
        else {
            
            // Insert data
            $query = "INSERT INTO signup_info (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                header("location: index.php?inserted");

            } else {
                echo "Insert failed: " . mysqli_error($connection);
            }
        }
    }
}

?>

<form action="" method="post">
    <input type="text" name='first_name' placeholder='First Name' required>
    <input type="text" name='last_name' placeholder='Last Name' required>
    <input type="email" name='email' placeholder='Email' required>
    <input type="password" name='password' placeholder='Password' required>
    <input type="password" name='c_pass' placeholder='Confirm Password' required>
    <input type="submit" name='submit' value='Submit'>
    <h5>Have an account? <a href="login.php">Login</a></h5>
</form>