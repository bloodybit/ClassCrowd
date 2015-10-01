 <?php $connection = Database::getConnection();
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
                                   
?>

<h2><?php  echo $class['class'] . ' / '; ?><span id="subject-title">Subjects</span></h2>
<br>
<?php
    $subjects = Subject::getSubjectByClass($_GET['class_id']);

 if (!empty($subjects)) {
    foreach($subjects as $sub){
        echo('<div class="sidebar-link"><a href="main.php?sidebar=subject&class_id='.$_GET['class_id'].'&subject_id='.$sub->getId().'&content=lessons">'.$sub->getSubject().'</a></div>');
    }
 }
 else{
 	echo "No subjects created yet!";
 }
//main.php?sidebar=subject&subject_id='.$sub->getId().'&content=lessons
?>

<!--  <a href="main.php?sidebar=lessons">Lessons</a> -->
<br><br>
<a href="main.php?sidebar=class"><i class="fa fa-arrow-circle-left"></i> Back to Classes</a>