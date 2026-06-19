<?php
require_once "../config/Database.php";

class Auth{
    private PDO $db;
    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function register($name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(name,email,password)
                VALUES(:name,:email,:password)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $hash
        ]);
    }
    public function login($email, $password)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = :email"
        );

        $stmt->execute([
            'email' => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        print_r($user);
        
        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            return true;
        }

        return false;
    }

}