<?php 
    $email = $title = $ingredients = '';
    $error = ['email' => '', 'title' => '', 'ingredients' => '' ];

    if(isset($_POST['submit'])){
        // validation for an empty email
        if(empty($_POST['email'])){
            $error['email'] = 'An email is required <br /> ';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'Enter a valid E-maiil address. ';
            }
        };

        // validation for an empty title
        if(empty($_POST['title'])){
            $error['title'] = 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $error['title'] = 'Enter a valid title that contains just characters. ';
            }
        };
        
        // validation for an empty ingredient
        if(empty($_POST['ingredients'])){
            $error['ingredients'] = 'An ingredient is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $error['ingredients'] = 'Enter ingredients separated by commas. ';
            }
        }

        if(array_filter($error)){
            // return;
        } else {
            header('Location: index.php ');
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
            <input type="text" name="email" value= '<?php echo $email ?>'  >
            <div class="red-text error">
                <?php echo $error['email'] ?>
            </div>
            <label for=""> Pizza Title: </label>
            <input type="text" name="title" value= '<?php echo $title ?>'  >
            <div class="red-text error">
                <?php echo $error['title'] ?>
            </div>
            <label for=""> Ingredients (comma-separated): </label>
            <input type="text" name="ingredients" value= '<?php echo $ingredients ?>' >
            <div class="red-text error">
                <?php echo $error['ingredients'] ?>
            </div>
            <div class="center">
                <input type="Submit" name="submit" value="submit" class="btn  brand z-depth-0" >
            </div>
        </form>
    </container>
    
    <?php require('template/footer.php') ?>
</html>