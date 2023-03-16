<?php

class CreateDb
{
    public$servername;
    public$username;
    public$password;
    public$dbname;
    public$conn;

    //class contructor
    public function __construct(
        $dbname="Newdb",
        $tablename="productdb",
        $servername="localhost",
        $username="root",
        $password=""
    )
    {
        $this->dbname=$dbname;
        $this->tablename=$tablename;
        $this->servername=$servername;
        $this->$username=$username;
        $this->password=$password;

        // connection database
        $this->conn=mysqli_connect($servername, $username, $password);

        // check connection
        if(!$this->conn) {
            die("connection fail".mysqli_connect_erro());
        }

        // quary
        $sql="CREATE DATABASE IF NOT EXISTS $dbname";

        //execute quary
        if(mysqli_quary($this->conn, $sql)) {
            $this->conn=mysqli_connect($servername, $username, $password, $dbname);
            //sql to create new table

            $sql="CREATE TABLE IF NOT EXISTS $tablename
                 (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 product_name VARCHAR(25) NOT NULL,
                 product_price FLOAT,
                 product_image VARCHAR(100)
                );";
           
        if(!mysqli_quary($this->conn, $sql)) {
            echo "Error creating table:".mysqli_error($this->conn);
        }
        
        }else {
              return false;
        }
    }
}

?>