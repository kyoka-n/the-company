<?php
class Database{
    // Define properties for the database connection details
    private $server_name = "localhost";
    private $username = "root";
    private $password = "root";
    private $db_name = "the_company";
    protected $conn; 

    // Protect connection property to be used by classes that extend Database
    public function __construct(){
        // Establish a new connection to the MySQL database
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);  // create instance

        // Check for connection errors and display an error message if the connection fails
        if($this->conn->connect_error){
            die("Unble to connect to the database: ". $this->conn->connect_error);
        }
    }
}
?>