<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
        <?php
        require_once 'views/head.php';     
        ?>
        <title>Confirm delete</title>
  </head>          
<body>
<?php
    require_once 'views/navbar.php';
?>
<div class="container-fluid">
<?php
    if (isset($data['deleted'])) {
        echo '<div class="mx-auto text-light text-center border border-success w-75" style="margin-bottom:300px;">';
        echo "<h1 class='display-1'>Post Deleted</h1>";
        echo '</div>';
    }
?>
<?php
    if (!isset($data['deleted'])) {
?>
    <div class="row">
        <div class="col-md-12">
            <div class="mx-auto text-center text-light mt-5 mb-5 pb-5 w-75">
                <h1 class="display-1 mainText">Are you sure you want to delete this post?</h1>
                <h2><button type="button" class="btn btn-danger" id="deletePost" onclick="window.location.href='RecipeController/deletePostPOST/<?php echo $data['id']; ?>'">Confirm Delete</button></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="mx-auto text-start mainText mt-5 w-75">
                <h1 class="display-1"><?php echo $data['title']; ?></h1>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mx-auto text-end mainText mt-5 w-75">
                <h3>Posted on: <?php echo $data['date']; ?></h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mx-auto text-start text-dark mt-5 mb-5 w-75">
                <?php echo $data['steps']; ?>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<?php
    require_once 'views/footer.php';
    require_once 'views/resetURL.php';
?>
</body>
</html>