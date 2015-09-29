<h2>Subjects</h2>
<?php
    $subjects = Subject::getSubjectByClass($_GET['class_id']);

    foreach($subjects as $sub){
        echo('<br><a href="main.php?sidebar=subject&class_id='.$_GET['class_id'].'&subject_id='.$sub->getId().'&content=lessons">'.$sub->getSubject().'</a><br>');
    }
//main.php?sidebar=subject&subject_id='.$sub->getId().'&content=lessons
?>
<a href="main.php?sidebar=lessons">Lessons</a>