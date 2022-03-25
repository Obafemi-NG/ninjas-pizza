<?php 
    //creating a connection to the SQL database.
    $conn = mysqli_connect('localhost', 'hezcode', 'olorosam70', 'pizza_ninjas');
    if(!$conn){
        echo 'An error occured' . mysqli_connect_error();
    };
    
?>