<?php

require_once("pdo_connect.php");
class user extends Connect
{
    public function insertUser($username, $email, $password)
    {
        $sql = "INSERT INTO user(username, email, password) VALUES (:username, :email, :password)";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password
        ]);
        return true;
    }

    public function loginUser($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password LIMIT 1";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'username' => $username,
            'password' => $password
        ]);
        $result = $stmnt->fetch();
        $_SESSION['id'] = $result['id'];
        return $result;
    }
}
