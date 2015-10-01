<?php
/**
 * Created by IntelliJ IDEA.
 * User: riccardosibani
 * Date: 30/09/15
 * Time: 22:36
 */

/*
 * Which informations I have
 *
 *      sidebar->lesson
 *      subject_id
 *      content -> add
 *      lesson_id
 */

$bullets = Bullet::getBulletsByLesson($_GET['lesson_id']);
$_SESSION['lesson_id'] = $_GET['lesson_id'];

?>

<h1>Add Content</h1>

<form enctype="multipart/form-data" action="Functions/AddContent.php" method="post">
    <h2>Add to Bullet</h2>
    <?php
        foreach($bullets as $bullet){
            echo '<input type="radio" name="bullet" value="'.$bullet->getId().'">'.$bullet->getBullet().'<br>';
        }
    ?>
    <input type="radio" name="bullet" value="jolly">Add new bullet: <input type="text" name="newBullet"> <br>

    <h3>Add Text</h3>
    <textarea name="text" rows="10" cols="40"></textarea>

    <h3>Add Code</h3>
    <textarea name="code" rows="10" cols="40"></textarea>

    <h3>Add Img</h3>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
    Send this Image: <input name="photo" type="file" />
    <br><br>
    <input type="submit" value="Add Content">

    <p><?php if(!empty($_SESSION['message'])){
            echo 'ERROR: '.$_SESSION['message'];
            unset($_SESSION['message']);
        } ?></p>
</form>

