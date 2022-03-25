<?php 

    //creating a connection to the SQL database.
    $conn = mysqli_connect('localhost', 'hezcode', 'olorosam70', 'pizza_ninjas');
    if(!$conn){
        echo 'An error occured' . mysqli_connect_error();
    };

    //writing a query for the database.
    $sql = 'SELECT * FROM pizzas ORDER BY created_at';

    //making a query to the database.
    $result = mysqli_query($conn, $sql);

    //Fetching the result from the database as an array.
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Free the result from the memory.
    mysqli_free_result($result);

    //closing the access to the database.
    mysqli_close($conn);
    //end of database query.

    // print_r($pizzas);
?>

<!DOCTYPE html>
<html>
    <?php require('template/header.php') ?>

        <h4 class="center grey-text">
            Pizzas!
        </h4>
        <div class="container">
            <div class="row">
                <?php
                    foreach($pizzas as $pizza): ?>
                    <div class="col s6 md3">
                        <div class="card z-depth-0">
                            <div class="card-content center">
                                <h4> <?php echo htmlspecialchars($pizza['title']) ?> </h4>
                                <ul>
                                    <?php foreach(explode(',',  $pizza['ingredients']) as $ingredient ) : ?>
                                        <li> <?php echo $ingredient ?> </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="card-action right-align">
                                <a href="#" class="brand-text" > more info </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    
    <?php require('template/footer.php') ?>
</html>