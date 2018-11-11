<?php

require('page.php');
require('Rect.php');
require('userModel.php');

//Create page obj
$pg = new Page();
// Create User Model
$um = new userModel();

$um->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isError = true;
    if (isset($_POST['add'])) {
        $values = $_POST['add'];
        $width = $values['width'];
        $height = $values['height'];
        $color = $values['color'];
        $um->add($width,$height,$color);
    }
    if (isset($_POST['edit'])) {
        $values = $_POST['edit'];
        $id = $values['id'];
        $width = $values['width'];
        $height = $values['height'];
        $color = $values['color'];
        $um->update($id,$width,$height,$color);
    }

    if (isset($_POST['reset'])) {
        $um->resetDB();
    }

    header('Location: ' . $_SERVER["PHP_SELF"], true, 303);

}

if (array_key_exists('test', $_POST)) {
    $id = $_POST['id'];
    $um->delete($id);
}


$pg->header($um->getAllRects());
$pg->footer();

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

?>