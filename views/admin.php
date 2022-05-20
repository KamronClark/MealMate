<!DOCTYPE html>
<html xml:lang="en" lang="en" class="mainbgDarkText">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Meal Mate - Admin</title>
  </head>           
<body class="mainbgDarkText">
<?php
    require_once 'views/navbar.php';
?>
<?php
    if (isset($data['deleteSuccessful'])) {
?>
    <div class="mx-auto text-center text-light w-75 mt-5 mb-5 border-primary">
        <h1 class="display-1 text-warning">Post was successfully deleted.</h1>
    </div>
<?php
}
?>
<div class="container-fluid" style="margin-bottom:100px;">
    <div class="row text-light">
        <div class="col-md-12">
            <div class="mx-auto text-center mt-5 mb-5">
                <h1 class="display-1">Welcome, Admin!</h1>
                <h1>Here's the most recent posts:</h1>
            </div>
        </div>
    </div>
    <?php
        echo '<table class="table bg-light table-striped mx-auto table-responsive">';
        echo '<thead>';
        echo '<th>ID</th>';
        echo '<th>Title</th>';
        echo '<th>Date</th>';
        echo '<th>Approved</th>';
        echo '<th></th>';
        echo '<th>Actions</th>';
        echo '</thead>';
        foreach ($data["recipes"] as $row) { 
            // Display the blog posts.
            echo '<tr class="exerciseRow">';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td><a class="text-dark" href="RecipeController/viewRecipeGET/'  . $row['id'] . '" class="text-decoration-none">' . $row['title'] . '</a></td>';
            echo '<td>' . $row['date_posted'] . '</td>';
            if ($row['is_approved'] == 1) {
                echo '<td>Yes</td>';
            } else {
                echo '<td>No</td>';
            }
            ?>
            <td><button type='button' class='btn btn-success' id='approvePost' <?php if ($row['is_approved'] == 1) {echo 'disabled';} ?> onclick="window.location.href='RecipeController/approvePost/<?php echo $row['id']; ?>'">Approve</button></td>
            <td><button type='button' class='btn btn-secondary' id='denyPost' <?php if ($row['is_approved'] == 0) {echo 'disabled';} ?> onclick="window.location.href='RecipeController/denyPost/<?php echo $row['id']; ?>'">Deny</button></td>
            <td><button type='button' class='btn btn-danger' id='deletePost' onclick="window.location.href='RecipeController/deletePostGET/<?php echo $row['id']; ?>'">Delete</button></td>
            <?php
            echo '</tr>';              
        }
        echo '</table>';
    ?>
</div>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>
