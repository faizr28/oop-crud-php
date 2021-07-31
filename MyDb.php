<?php

class MyDb
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "crud_oop";
        $username = "root";
        $password = "";
        // metode PDO
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
}
