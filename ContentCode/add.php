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

session_start();
$bullets = Bullet::getBulletsByLesson($_GET['lesson_id']);
$_SESSION['lesson_id'] = $_GET['lesson_id'];
$_SESSION['subject_id'] = $_GET['subject_id'];

?>


<div class="lesson-header">
	<h2 class="cut-text">Adding notes to Lesson</h2>
</div>




<br><br><br>

<form enctype="multipart/form-data" action="Functions/AddContent.php" method="post">
    
    <div class="add-1">
	    <h2>1. Pick Lesson Hightligh</h2>
	    <?php
	        foreach($bullets as $bullet){
	            echo '<label><input type="radio" name="bullet" value="'.$bullet->getId().'">'.$bullet->getBullet().'</label><br>';
	        }
	    ?>
	    <label><input type="radio" name="bullet" value="jolly">Add new Lesson Hightlight:<br><input type="text" name="newBullet"></label> <br>
	</div>

    <div class="add-2">
		<h2>2. Add notes to Lesson</h2>
	    <h3>Add Text</h3>
	    <textarea name="text" rows="6" cols="40"></textarea>
	
	    <h3>Add Code</h3>
	    <textarea name="code" rows="6" cols="40"></textarea>
	
	    <h3>Add Img</h3>
	    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	    Send this Image: <input name="photo" type="file" />
    </div>

    <div class="add-3">
	    <input type="submit" value="Add Content">
	</div>

    <p><?php if(!empty($_SESSION['message'])){
            echo 'ERROR: '.$_SESSION['message'];
            unset($_SESSION['message']);
        } ?></p>
</form>

