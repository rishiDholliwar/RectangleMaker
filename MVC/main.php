    <?php

    require('page.php');
    require('Rect.php');
    require('userModel.php');

    //Create page obj
    $pg = new Page();
    // Create User Model
    $um = new userModel();

    $um->connect();




    //$pg->showRects($um->getConn());

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset ($_POST['width'])  && isset($_POST['height']) ) {
                $width = $_POST['width'];
                $height = $_POST['height'];
                $color = $_POST['color'];

                $sql = 'INSERT INTO rectangle(width,height,color) VALUES(:width, :height, :color)';
                $statement = $um->getConn()->prepare($sql);
                if ($statement->execute([':width' => $width, ':height' => $height, ':color' => $color])) {
                    $message = 'data inserted successfully';
                }
                header('Location: '.$_SERVER["PHP_SELF"], true, 303);
            }
    }
            //$newRect = new Rect($_POST['width'], $_POST['height'], $_POST['color']);

           //echo"Width of rect is: {$newRect->getWidth()} <br>";
       //       $um->add($newRect);
        //   $pg->header($rect);
         //   unset($_POST);

              //$pg->insertTable($newRect);
              //$pg->showRects($um->getConn());

    $pg->header($um->getAllRects());

    //}
    // displayAllUsers
    // conditions for displaying different forms (i.e. add user, update user)

    $pg->footer();

    ?>