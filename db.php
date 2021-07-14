<?php
require_once('pdo_connect.php');
class Database extends Connect
{
    public function insert($blogsubject, $blogcontent)
    {
        $sql = "INSERT INTO blogs(blogsubject, blogcontent) VALUES (:blogsubject, :blogcontent)";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'blogsubject' => $blogsubject,
            'blogcontent' => $blogcontent
        ]);
        return true;
    }



    //fetching all the data from database


    public function read()
    {
        $sql = "SELECT * FROM blogs WHERE deleted_at IS NULL ORDER BY id DESC";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute();
        $result = $stmnt->fetchAll();
        return $result;
    }



    // fetching single user from database

    public function readOne($id)
    {
        $sql = "SELECT * FROM blogs WHERE id = :id";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute(['id' => $id]);
        $result = $stmnt->fetch();
        return $result;
    }



    //update single user in database

    public function update($id, $blogsubject, $blogcontent)
    {
        $sql = "UPDATE blogs SET blogsubject = :blogsubject, blogcontent = :blogcontent WHERE id = :id";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'blogsubject' => $blogsubject,
            'blogcontent' => $blogcontent,
            'id' => $id
        ]);
        return true;
    }


    //soft delete user in database


    public function delete($id)
    {
        $deleted_at = date('Y-m-d H-i-s');
        $sql = "UPDATE blogs SET deleted_at = :deleted_at WHERE id = :id";
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute([
            'id' => $id,
            'deleted_at' => $deleted_at
        ]);

        return true;
    }
}
