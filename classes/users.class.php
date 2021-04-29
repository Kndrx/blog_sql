<?php 
Class Users extends Database {

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $password;

}

    // public function read($table) {

    //     $sql = "SELECT * FROM $table";
    //     $stmt = $this->connect()->query($sql) or die("failed to get data");
    //     while($row = $stmt->fetchAll()){
    //         $data[]=$row;

    //     }
    //     return $data;
    // }


        // public function getById($id, $table){

    //     $sql="SELECT * FROM $table WHERE id = :id";
    //     $q = $this->conn->prepare($sql);
    //     $q->execute(array(':id'=>$id));
    //     $data = $q->fetch(PDO::FETCH_ASSOC);
    //     return $data;
    // }


?>