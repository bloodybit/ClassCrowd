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
    $subjectName = Subject::getSubjectById($_GET['subject_id'])->getSubject();
}
?>



<h1><?php echo($subjectName); ?>'s Lessons</h1>
<?php
    $lessonsList = Lesson::getLessonsBySubjectId($_GET['subject_id']);

    foreach($lessonsList as $lesson){
?> 
	<div class="lesson_box"> 

<?php
        
        //format the dates
        $day = date('j', strtotime($lesson->getDate()));
        $year = date('Y', strtotime($lesson->getDate()));
   		$month = date('F', strtotime($lesson->getDate()));
   		/*$lessonDate = date("d/m/y", strtotime($lesson->getDate()));*/
        /*echo "<br><a>". $day." - ".$lesson->getTitle()."</a>"; */ 
?> 
	
		<p class="lesson_day"> <?php echo $day; ?> </p>
		<p class="lesson_month"> <?php echo $month; ?> </p>
		
		<p class="lesson_subject"> <?php /*
									echo $sub_name . ' <span class = "lesson_class_name"> / ' . $class_name . "</span>"; */
									$subjectName = Subject::getSubjectById($lesson->getSubjectId());
									$className = Classe::getNameById($subjectName->getId());

									echo $subjectName->getSubject();
									echo $className;
									?> </p>



		<p class="lesson_title"> <?php echo $lesson->getTitle(); ?> </p>



	</div> 

<?php
    } 
?>

</div>
