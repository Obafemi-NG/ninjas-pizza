<?php 

    if(isset($_POST['submit'])){
        // validation for an empty email
        if(empty($_POST['email'])){
            echo 'An email is required <br /> ';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'Enter a valid E-maiil address. ';
            }
        };

        // validation for an empty title
        if(empty($_POST['title'])){
            echo 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                echo 'Enter a title with just normal characters and space.';
            }
        };
        
        // validation for an empty ingredient
        if(empty($_POST['ingredients'])){
            echo 'An ingredient is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                echo  "Ingredients must be separated by commas's ";
            }
        }
    };


?>

<!DOCTYPE html>
<html>
    <?php require('template/header.php') ?>

    <container class="container grey-text">
        <h4 class="center"> Add a Pizza </h4>
        <form action="add.php" class="white" method="POST" >
            <label for=""> Your Email: </label>
            <input type="text" name="email" >
            <label for=""> Pizza Title: </label>
            <input type="text" name="title" >
            <label for=""> Ingredients (comma-separated): </label>
            <input type="text" name="ingredients">
            <div class="center">
                <input type="Submit" name="submit" value="submit" class="btn  brand z-depth-0" >
            </div>
        </form>
    </container>
    
    <?php require('template/footer.php') ?>
</html>