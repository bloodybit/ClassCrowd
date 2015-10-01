<?php
/**
 * Things that I receive from Subject sidebar
 *
 * GET
 *      sidebar (should be subject
 *      class_id
 *      subject_id
 *      content (it's lessons)
 */
if(isset($_GET['subject_id'])){
    //Subject name
    $subjectName = Subject::getSubjectById($_GET['subject_id']);
}

$_SESSION['class_id'] = $_GET['class_id'];
?>

<div class="lesson_container">
<h1><?php echo($subjectName); ?>'s Lessons</h1>
<?php

    $lessonsList = Lesson::getLessonsBySubjectId($_GET['subject_id']);


?>
<a href="add-new-lesson"><div class="lesson_box"> 
<i class="fa fa-plus"></i>
</div></a><form action="Functions/AddLesson.php" method="post">
        New Lesson's name: <input type="text" name="newLesson">
        <input type="hidden" name="subject_id" value="<?php echo $_GET['subject_id']; ?>">
        <input type="submit" value="Add Lesson">
    </form>

<?php

if (!empty($lessonsList)) {
 foreach($lessonsList as $lesson){
    ?>
    <?php echo '<a href="main.php?sidebar=lessons&subject_id='.$lesson->getSubjectId().'&content=doc&lesson_id='.$lesson->getId().'"> '?>
    <div class="lesson_box"> 
 

    <?php
        //format the date
        $day = date('j', strtotime($lesson->getDate()));
        $year = date('Y', strtotime($lesson->getDate()));
        $month = date('F', strtotime($lesson->getDate()));
        /*$lessonDate = date("d/m/y", strtotime($lesson->getDate()));*/
    ?>

        <p class="lesson_day"> <?php echo $day; ?> </p>
        <p class="lesson_month"> <?php echo $month; ?> </p>
        

        <p class="lesson_subject"> <?php /*
                                    echo $sub_name . ' <span class = "lesson_class_name"> / ' . $class_name . "</span>";
                                    $subjectName = Subject::getSubjectById($lesson->getSubjectId());
                                    $className = Classe::getNameById($subjectName->getId());

                                    echo $className . ' <span class = "lesson_class_name"> / ' . $subjectName->getSubject() . "</span>";
                                    
                                     */

                                    $connection = Database::getConnection();
                                    $query = "SELECT class FROM class WHERE id=".$_GET['class_id'];

                                
                                    $result_obj = $connection->query($query);
                                    
                                        //I COULD USE A FOR AND IT WOULD BE BETTER
                                        //BUT IT DOESN'T WORK AND I HAVE NO TIME TO
                                        //FIND THE PROBLEM :)
                                        $i=0;
                                        while($result = $result_obj->fetch_array(MYSQLI_ASSOC)){
                                            $class = $result;
                                            $i++;
                                        }
                                    echo $class['class'];
                                    ?> </p>

        <p class="lesson_title"> <?php echo $lesson->getTitle(); ?> </p>

        </div>  </a>

    <?php
        /*echo '<br><a href="main.php?sidebar=lessons&subject_id='.$lesson->getSubjectId().'&content=doc&lesson_id='.$lesson->getId().'">'. $lessonDate." - ".$lesson->getTitle()."</a>";*/
    }
?>
    </div>
<?php
}
else{ 

?>

    <ul id="empty-list">

        <li><span>There are no <span class="special-char">lessons</span> added to this <span class="special-char">Subject</span> yet!</li>

        <li><span>Use the <span class="special-char">add</span> button to add new lesson!</span></li>
       
    </ul>

<?php
   }?>
