<?php

    class Student{

        public $connection;
         public function __construct(){

        $this -> connection = new mysqli('localhost','root','','student_data');
    }

    public function insertStudent($name,$email, $cell, $uname){

        $sql = "INSERT INTO student(name, email, cell, uname) VALUES('$name', '$email', '$cell', '$uname')";
        $data = $this -> connection -> query($sql);

        if( $data  ){
            return true;
        }else{

            return false;
        }
    }


    public function allData(){

        $sql = "SELECT * FROM student";
        $data = $this -> connection -> query($sql);
        return $data;

    }

    public function checkUname($uname){
        $sql = "SELECT * FROM student WHERE uname = '$uname'";
       $data =  $this -> connection ->query($sql );

       $user_count = $data -> num_rows ;

       if($user_count > 0){
            return false;
       }else{
           return true;

       }
    }





    
    }

?>