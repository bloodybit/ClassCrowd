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


<div class="bg1"></div>

<br><br><br>

<form class="form-wrap" enctype="multipart/form-data" action="Functions/AddContent.php" method="post">
    
    <div class="add-1">
    	<br>
	    <h2>1. Pick Lesson Highlight</h2>
	    <br>
	    <?php
	        foreach($bullets as $bullet){
	            echo '<label><input type="radio" name="bullet" value="'.$bullet->getId().'">'.$bullet->getBullet().'</label><br>';
	        }
	    ?>
	    <label><input class="input-addnew" type="radio" name="bullet" value="jolly">...or add new Lesson Hightlight:</label><br><input class="newbullet" type="text" name="newBullet">
	    <br><br><br><br><br><br>
	</div>

    <div class="add-2">
		<br>
		<h2>2. Add notes to chosen Lesson Highlight</h2>
		<br>
	    <h3>Add Text</h3>
	    <textarea name="text" rows="6" cols="40"></textarea>
		<br><br>
	    <h3>Add Code</h3>
	    <textarea name="code" rows="6" cols="40"></textarea>
		<br><br>
	    <h3>Add Image</h3>
	    <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	    Send this Image: <input name="photo" type="file" />
	    <br><br><br><br><br><br>
    </div>

    <div class="add-3">
	    <input type="submit" value="Add Content">
	</div>

    <p><?php if(!empty($_SESSION['message'])){
            echo 'ERROR: '.$_SESSION['message'];
            unset($_SESSION['message']);
        } ?></p>
</form>

