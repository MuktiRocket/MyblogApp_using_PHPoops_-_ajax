<?php
require_once("pdo_connect.php");
class user extends Connect
{
    public function insertUser($username, $email, $password)
    {
        $sql = "INSERT INTO blogs(username, email, password) VALUES (:username, :email, :password)";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
        return true;
    }
}
