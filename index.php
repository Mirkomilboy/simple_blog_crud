<?php
    // require db.php file
    require('config/config.php');
    require('config/db.php');
    // Create query
    $query = "SELECT * FROM posts ORDER BY created_at DESC";
    // Get result
    $result = mysqli_query($conn, $query);
    // fetching data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Free results
    mysqli_free_result($result);
    // Close connection
    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container" style="margin-top:70px">
        <h1 style="color:green">Posts</h1>
        <div style="margin-left:20px">
            <?php foreach($posts as $post) : ?>
                <div class="well">
                    <h3 style="color:green"><?php echo $post['title']; ?></h3>
                    <small>Created on <?php echo $post['created_at']; ?> by</small><small style="color:red"> <?php echo $post['author']; ?></small>
                    <p><?php echo $post['body']; ?></p>
                    <a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>" class="btn btn-primary" style="margin-bottom:30px; margin-top:-10px">Read More</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php include('inc/footer.php') ?>