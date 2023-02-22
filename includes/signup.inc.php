<?php

if (isset($_POST['submit'])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $email = $_POST['email'];

    //instantiate Signupcontr class
include "../classes/dbh.class.php";
include "../classes/signup.class.php";
include "../classes/signup-contr.class.php";

$signup = new  SignupContr($uid, $pwd, $pwdRepeat, $email);
    //Running error hundlers and user signup
$signup->signupUser();
    //Going back to front page
    header("location: ../index.php?error=none");
} else {
    echo "Sign up process is falied!";
}