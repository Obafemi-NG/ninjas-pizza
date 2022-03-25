<?php 
    include('config/db_connect.php');
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
            <?php else: ?>
                
        <?php endif; ?>
    </div>
    <!-- <h4>Details!</h4> -->
    <?php include('template/footer.php') ?>
</html>