<?php 


	
    require_once "../libs/function.php";
    $stu = new Student;


     

    if( isset($_GET['id']) ){

        
         $sid = $_GET['id'];

          $data = $stu -> studentDelete( $sid );

         

        

    }

    

    

    

?>