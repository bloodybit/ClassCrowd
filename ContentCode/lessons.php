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
?>

<h1><?php echo($subjectName); ?>'s Lessons</h1>
<?php
    $lessonsList = Lesson::getLessonsBySubjectId($_GET['subject_id']);

    foreach($lessonsList as $lesson){
        //format the date
        $lessonDate = date("d/m/y", strtotime($lesson->getDate()));
        echo '<br><a href="main.php?sidebar=lessons&subject_id='.$lesson->getId().'&content=doc&lesson_id='.$lesson->getId().'">'. $lessonDate." - ".$lesson->getTitle()."</a>";
    }

