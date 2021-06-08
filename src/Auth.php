<?php

// Auth checks if input username and password exit it the database using the Users active record(Users.php)

class Auth
{
    function checkLogin($username, $password)
    {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $userObj = new User($dbc);
        $userObj->findBy('username', $username);

        if (property_exists($userObj, 'id')) {
            // if ($userObj->password == md5($password . ENCRYPTION_SALT . $userObj->password_hash)) {
            if (password_verify($password,  $userObj->password)) {
                // all is good
                return true;
            }
        }
    }

    function changeUserPassword($userObj, $newPassword)
    {
        // create hash 
        // $tmp = date('YmdHis') . 'secret_string12344657';
        // $hash = md5($tmp);
        // $hashedPassword = md5($newPassword . ENCRYPTION_SALT . $hash);




        $userObj->password = password_hash($newPassword, PASSWORD_DEFAULT);
        return $userObj;
    }
}
