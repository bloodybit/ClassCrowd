<h2>Classes</h2>

<?php
    $classes = Classe::getClasses();

    foreach($classes as $class){
        echo ('<br> <a href="main.php?sidebar=subject&class_id='.$class->getId() . '">' . $class->getClass() .'</a>');
    }
?>
