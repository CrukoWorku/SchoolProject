<?php 
    class Employee{
        public $id;
        public $lname;
        public $fname;
        public $position;

        public static $tblName = "tblEmployees";

        function __construct($f=null,$l=null,$p=null){
            $this->fname = $f;
            $this->lname = $l;
            $this->position = $p;
        }

        function save(){
            require("dbconfig.php");
            
            $sql = "INSERT INTO ".self::$tblName." (lname,fname,position) 
                    VALUES ('".$this->lname."',
                            '".$this->fname."',
                            '".$this->position."'
                    )";

            if($conn->query($sql)===TRUE){
                echo "New record created!";
            }else{
                echo "Error while saving data.";
            }
            
            $conn->close();
        }

        function remove(){
            require("dbconfig.php");
            $sql = "DELETE FROM ".self::$tblName." WHERE id=$this->id";

            if($conn->query($sql)===TRUE){
                header("location:index.php");
            }else{
                echo "Opps! Something went while deleting data.";
            }

            $conn->close();
        }

        function update(){
            require("dbconfig.php");
            $sql = "UPDATE ".self::$tblName." SET 
                    lname='$this->lname', 
                    fname='$this->fname',
                    position='$this->position' 
                     WHERE id=$this->id";
            if($conn->query($sql) === TRUE){
                header("location:index.php");
            }else{
                echo "Opps! Something went wrong while updating.";
            }

            $conn->close();
        }

        public static function getAll(){
            require("dbconfig.php");

            $sql = "SELECT * FROM ".self::$tblName;
            $result = $conn->query($sql);

            $conn->close();
            return $result;
        }

        public static function search($id){
            require("dbconfig.php");

            $sql = "SELECT * FROM ".self::$tblName.
                    " WHERE id=$id";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $emp = new Employee();
                while($row = $result->fetch_assoc()){
                    $emp->id = $row["ID"];
                    $emp->lname = $row["LNAME"];
                    $emp->fname = $row["FNAME"];
                    $emp->position = $row["POSITION"];
                }
                return $emp;
            }else{
                echo "Employee not found.";
            }

            
            $conn->close();
        }

    }
?>