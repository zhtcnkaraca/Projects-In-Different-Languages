<?php
class User {
    
    public $table = "uyeler";

    public function userData($username) {
        global $conn;
        
        $query = $conn->prepare("SELECT * FROM " .$this->table. " WHERE eposta = :username");
        $query->bindValue(":username", $username);
        $query->execute();
            $r = $query->fetch();

        return $r;
    }

    public function isLoggedIn() {
        if ( isset($_SESSION["isloggedin"]) ) {
            return true;
        } else {
            return false;
        }
    }
}