<?php
/**
 * Cosa ricevo
 *
 *      subject_id
 *      lesson_id
 */

//First thing I get all the snippets about the document

// 1) get bullets
$bullets = Bullet::getBulletsByLesson($_GET['lesson_id']);
?>

<h1>Document</h1>

<h5>Bullets</h5>
<ul>
<?php
    foreach($bullets as $bullet){
        echo '<li>'.$bullet->getBullet().'</li>';


        //2) get Text in each bullets
        $texts = Text::getTextByBullet($bullet->getId());

    }
?>
</ul>


