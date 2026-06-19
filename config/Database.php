<?php

class Database{
    private string $host = "localhost";
    private string $dbname = "crud_app";
    private string $username = "root";
    private string $password = "";
    
    public function connect(): PDO
    {
        return new PDO(
            "mysql:host={$this->host};dbname={$this->dbname}",
            $this->username,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}