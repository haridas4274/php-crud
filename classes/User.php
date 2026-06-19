<?php

require_once "../config/Database.php";

class User
{
    private PDO $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function all()
    {
        $stmt = $this->db->query(
            "SELECT * FROM users ORDER BY id DESC"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE id=:id"
        );

        $stmt->execute(['id'=>$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$name,$email)
    {
        $stmt = $this->db->prepare(
            "UPDATE users
             SET name=:name,email=:email
             WHERE id=:id"
        );

        return $stmt->execute([
            'id'=>$id,
            'name'=>$name,
            'email'=>$email
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM users WHERE id=:id"
        );

        return $stmt->execute([
            'id'=>$id
        ]);
    }
}