<?php

function loginAccount($email, $password)
{
    $sql = "SELECT * FROM examinees WHERE email_examinee ='" . $email . "' AND pass_examinee ='" . $password . "'";
    $user = pdo_query_one($sql);
    return $user;
}
