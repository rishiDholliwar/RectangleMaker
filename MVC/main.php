    <?php

    require('page.php');
    require('Rect.php');
    require('userModel.php');

    //Create page obj
    $pg = new Page();
    // Create User Model
    $um = new userModel();


    $pg->header();
    $um->connect();
    //$pg->showRects($um->getConn());
    $pg->showDefaultRects();
    $pg->insertTable();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['width']) || isset($_POST['height']) || isset($_POST['color'])) {
            $newRect = new Rect($_POST['width'], $_POST['height'], $_POST['color']);

           //echo"Width of rect is: {$newRect->getWidth()} <br>";
              $um->add($newRect);
              $pg->insertTable2();
              //$pg->showRects($um->getConn());
        }


    }
    // displayAllUsers
    // conditions for displaying different forms (i.e. add user, update user)

    $pg->footer();

    ?>