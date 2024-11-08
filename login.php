<?php

$connection = mysqli_connect('localhost', 'root', '', 'signup_db');

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT `email`, `password` FROM `signup_info` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connection, $query);
        $check = mysqli_fetch_array($result);

            if($check){
                header("location: index.php?logined");
            }
            else{
                echo"Email and Password does not matched";
            }
    }

    else {
        echo "Insert failed: " . mysqli_error($connection);
    }

    ?>

<form action="" method="post">
<input type="email" name='email' placeholder='email'>
<input type="password" name='password'placeholder='password'>
<input type="submit" name='submit'value='Submit'>
<h5>Not have an account <a href="signup.php">Register</a></h5>
</form>