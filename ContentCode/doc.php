<?php
/**
 * Cosa ricevo
 *
 *      subject_id
 *      lesson_id
 */

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

        echo"<br><br>";
        print_r($texts);
        echo"<br><br>";

            //3) get Code in each bullets
            $codes = Code::getCodeBybullet($bullet->getId());

        echo"<br><br>";
        print_r($codes);
        echo"<br><br>";

            //4) get Photos in each bullets
            $photos = Photo::getPhotosByBullet($bullet->getId());

        echo"<br><br>";
        echo("<h1>PHOTO</h1>");
        print_r($photos);
        echo"<br><br>";
        echo"Ciaisomo";

            // Now i Will make an associative array with date, type of object and object
            $notes = array();

            //2) start whit text
            foreach($texts as $text){
                echo "<br> date: ". $text->getDate() . "   Text ". $text->getText();
                $note = new Note($text->getDate(), 'text', $text);
                array_push($notes, $note);
            }

            echo "2";
            //3) then with code
            if(count($photos)>0) {
                foreach ($codes as $code) {
                    $note = new Note($code->getDate(), 'code', $code);
                    array_push($notes, $note);
                }
            }

            echo "!!! ! ! ! !  ! ";
            //4) and photos
            if(count($photos)>0){
                foreach($photos as $photo){
                    $note = new Note($photo->getDate(), 'photo', $photo);
                    array_push($notes, $note);
                }
            }

            echo "3<br>";
            print_r($notes);
            //function to order by date

            echo "blloca?";
            if(count($notes)>1){
                usort($notes, "cmp");
            }

            foreach($notes as $note){
                echo"<br><br>";
                echo $note->getDate() . " - " . $note->getKind();
                echo"<br><br>";
            }

    }
?>
</ul>


