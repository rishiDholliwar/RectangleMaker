    <?php

    require('page.php');
    require('Rect.php');
    require('userModel.php');

    //Create page obj
    $pg = new Page();
    // Create User Model
    $um = new userModel();

    $um->connect();


//todo need to create table in begigning?

    //$pg->showRects($um->getConn());
$isError = false;
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
$isError = true;
       if (isset($_POST['add'])) {
           $values = $_POST['add'];
          //  if (isset ($_POST['add[width]'])  && isset($_POST['add[height]']) ) {


                $width = $values['width'];
                $height = $values['height'];
                $color = $values['color'];

                $sql = 'INSERT INTO rectangle(width,height,color) VALUES(:width, :height, :color)';
                $statement = $um->getConn()->prepare($sql);
                if ($statement->execute([':width' => $width, ':height' => $height, ':color' => $color])) {
                    $message = 'data inserted successfully';
                }
          //  }
               // header('Location: '.$_SERVER["PHP_SELF"], true, 303);

       }
       if (isset($_POST['edit'])) {

           $values = $_POST['edit'];
           $id = $values['id'];
           $width = $values['width'];
           $height = $values['height'];
           $color = $values['color'];
            //todo get previous values if null
           $sql = 'UPDATE rectangle SET width=:width, height=:height,color=:color WHERE id=:id';
           $statement = $um->getConn()->prepare($sql);
           if ($statement->execute([':width' => $width, ':height' => $height,':color' => $color ,':id' => $id])) {
               //header("Location: index.php"); //redirect to home page
           } else {

           }

       }

       if (isset($_POST['reset'])) {


           //todo get previous values if null
           $sql = 'Truncate table rectangle';
           $statement = $um->getConn()->prepare($sql);
           if ($statement->execute()) {
               //header("Location: index.php"); //redirect to home page
           } else {

           }

       }
       header('Location: '.$_SERVER["PHP_SELF"], true, 303);

    }

    if(array_key_exists('test',$_POST)) {
        $id = $_POST['id'];
        debug_to_console($id);

        $sql = 'DELETE FROM rectangle WHERE id=:id';
        $statement = $um->getConn()->prepare($sql);
        if ($statement->execute([':id' => $id])) {
            header("Location: main.php");
        }
    }



    if($isError){

    }
    $pg->header($um->getAllRects());
    $pg->popUp();
    //}
    // displayAllUsers
    // conditions for displaying different forms (i.e. add user, update user)

    $pg->footer();
    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
    ?>