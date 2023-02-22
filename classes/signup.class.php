<?php

//use LDAP\Result;

class Signup extends Dbh {

 protected function setUser($uid, $pwd, $emailadress) {
    $stmt = $this->connect()->query("INSERT INTO users(user_uid, user_pwd, user_email) VALUES(?, ?, ?);");

$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if (!$stmt->execute(array($uid, $hashedPwd, $emailadress))) {
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $stmt = null;

 }
 protected function checkUser($uid, $emailadress) {
    $stmt = $this->connect()->prepare('SELECT user_uid FROM users 
    WHERE user_uid= ? OR user_email= ?;');
    if (!$stmt->execute(array($uid, $emailadress))) {
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $resultCheck="";
    if ($stmt->rowCount() > 0) {
        $resultCheck = false;
    } else {
        $resultCheck = true;
    }
    return $resultCheck;
 }

}