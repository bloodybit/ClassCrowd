<h2>Classes</h2>
<br>
<?php
    $classes = Classe::getClasses();

    foreach($classes as $class){
        echo ('<div class="sidebar-link"><a href="main.php?sidebar=subject&class_id='.$class->getId() . '">' . $class->getClass() .'</a></div>');
    }
?>
