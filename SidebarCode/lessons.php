<?php
/**
 *
 */
if(isset($_GET['subject_id'])){
    //Subject name
    $subjectName = Subject::getSubjectById($_GET['subject_id']);
}
?>

<h2>Lessons</h2>
<br>
<h5><?php echo($subjectName); ?>'s Lessons</h5>
<?php
echo $_GET['subject_id'. " ee "];
$lessonsList = Lesson::getLessonsBySubjectId($_GET['subject_id']);

foreach($lessonsList as $lesson){
    //format the date
    $lessonDate = date("d/m/y", strtotime($lesson->getDate()));
    echo '<div class="sidebar-link"><a href="main.php?sidebar=lessons&subject_id='.$lesson->getSubjectId().'&content=doc&lesson_id='.$lesson->getId().'">'. $lessonDate." - ".$lesson->getTitle()."</a></div>";
}
?>
<br><br><br>
<a href="main.php?sidebar=class">Back to class</a>