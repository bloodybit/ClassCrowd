<?php
/**
 *
 */
if(isset($_GET['subject_id'])){
    //Subject name
    $subjectName = Subject::getSubjectById($_GET['subject_id']);
}
?>

<h2><?php echo($subjectName); ?>'s Lessons</h2>
<br>
<?php
//echo $_GET['subject_id'/*. " ee "*/];
$lessonsList = Lesson::getLessonsBySubjectId($_GET['subject_id']);

foreach($lessonsList as $lesson){
    //format the date
    $lessonDate = date("d/m/y", strtotime($lesson->getDate()));
    echo '<div class="sidebar-link"><a href="main.php?sidebar=lessons&subject_id='.$lesson->getSubjectId().'&content=doc&lesson_id='.$lesson->getId().'">'. $lessonDate." - ".$lesson->getTitle()."</a></div>";
}
?>
<br><br>
<a href="main.php?sidebar=class"><i class="fa fa-arrow-circle-o-left"></i> Back to Classes</a>