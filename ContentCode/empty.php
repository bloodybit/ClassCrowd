<h2>All lessons</h2>
<?php
//connect
 $db = mysql_connect("localhost","root",""); 
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
//select db
 $db_select = mysql_select_db("classcrowd",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
?>

<?php 

$query = mysql_query("SELECT * FROM lesson ORDER BY id DESC");

   while ($rows = mysql_fetch_array($query)) { 
   $title = $rows['title'];
   $date = $rows['date'];
   $subject_id = $rows['subject_id'];
   $get_subject = mysql_query("SELECT * FROM subject WHERE id = '$subject_id'");
 		while ($subject = mysql_fetch_array($get_subject)) { 
   			$sub_name = $subject['subject'];
   			$class_id = $subject['class_id'];
   				 $get_class = mysql_query("SELECT * FROM class WHERE id = '$class_id'");
   				 		while ($class = mysql_fetch_array($get_class)) { 
				   			$class_name = $class['class'];
				   		}

		}

   $year = date('Y', strtotime($date));
   $month = date('F', strtotime($date));
   $day = date('j', strtotime($date));



?>

   <a href="#"><div class="lesson_box">

	<div class="date_box"> 
		<p class="lesson_day"> <?php echo $day; ?> </p>
		<p class="lesson_month"> <?php echo $month; ?> </p>
		<p class="lesson_subject"> <?php 
									echo $class_name . ' <span class = "lesson_class_name"> / ' . $sub_name . "</span>"; 

									?> </p>
		<p class="lesson_title"> <?php echo $title; ?> </p>
		
		
	</div>
</div></a> 

<?php
} 


?>