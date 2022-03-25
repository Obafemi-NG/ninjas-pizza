<?php 
    //CONNECTING TO THE DATABASE.
    include('config/db_connect.php');

    //DELETE PIZZA FROM DATABASE.
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['idToDelete']);

        //CREATING THE SQL.
        $sql = "DELETE FROM pizzas where id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            //success
            header('Location: index.php');
        } else {
            //error
            echo 'Query error: ' . mysqli_error($conn, $sql);
        }
    }

    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //creating the sql.
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        //querying the data from the db.
        $result = mysqli_query($conn, $sql);

        //fetching the queried data.
        $pizza = mysqli_fetch_assoc($result);
        // print_r($pizza);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html >
    <?php include('template/header.php'); ?>

    <div class="container center">
        <?php if($pizza) : ?>
            <h4> <?php echo strtoupper(htmlspecialchars($pizza['title'])) ?> </h4>
            <p> Created By: <?php echo htmlspecialchars( $pizza['email'] ) ?> </p>
            <p> Created On: <?php echo htmlspecialchars( date($pizza['created_at']) ) ?> </p>
            <h4>Ingredients:</h4>
            <p> <?php echo htmlspecialchars($pizza['ingredients']) ?> </p>

            <!-- Delete Form !-->
            <form action="details.php" method="POST">
                <input type="hidden" name="idToDelete" value=" <?php echo htmlspecialchars($pizza['id']) ?> " >
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0" >
            </form>

            <?php else: ?>
                <h3>No such pizza exists!</h3>
                <a href="/tutorial" class="brand-text" > Go back home</a>
        <?php endif; ?>
    </div>
    <!-- <h4>Details!</h4> -->
    <?php include('template/footer.php') ?>
</html>