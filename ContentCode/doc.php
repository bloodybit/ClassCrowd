<?php
/**
 * Cosa ricevo
 *
 *      subject_id
 *      lesson_id
 */

//function to order by date
function cmp($a, $b)
{
    if ($a->getDate() == $b->getDate()) {
        return 0;
    }
    return ($a->getDate() < $b->getDate()) ? -1 : 1;
}

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

            echo "ee";
            //2) get Text in each bullets
            $texts = Text::getTextByBullet($bullet->getId());

            //3) get Code in each bullets
            $codes = Code::getCodeBybullet($bullet->getId());

            //4) get Photos in each bullets
            $photos = Photo::getPhotosByBullet($bullet->getId());

            // Now i Will make an associative array with date, type of object and object
            $notes = array();

        echo 4;
            //2) start whit text
            if(count($texts)>0) {
                foreach ($texts as $text) {
                    $note = new Note($text->getDate(), 'text', $text);
                    array_push($notes, $note);
                }
            }

            //3) then with code
            if(count($codes)>0) {
                foreach ($codes as $code) {
                    $note = new Note($code->getDate(), 'code', $code);
                    array_push($notes, $note);
                }
            }

            //4) and photos
            if(count($photos)>0){
                foreach($photos as $photo){
                    $note = new Note($photo->getDate(), 'photo', $photo);
                    array_push($notes, $note);
                }
            }


            //Sort using function
            if(count($notes)>1){
                usort($notes, "cmp");
            }

            //Now I print the object dynamically and ordered
            foreach($notes as $note){
                if($note->getKind() == 'text'){
                    $text = $note->getObject();
                    echo "<p>".$text->getText()."</p>";
                }
                if($note->getKind() == "code"){
                    $code = $note->getObject();
                    echo "<p>".$code->getCode()."</p>";
                }
                if($note->getKind() == "photo"){
                    $photo = $note->getObject();
                    echo '<img src="'.$photo->getPath().'">"';
                }
            }
    }
?>
</ul>


