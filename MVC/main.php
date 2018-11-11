<?php

require('page.php');
require('Rect.php');
require('rectModel.php');

//Create page obj
$pg = new Page();
// Create User Model
$rm = new rectModel();

$rm->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isError = true;
    if (isset($_POST['add'])) {
        $values = $_POST['add'];
        $width = $values['width'];
        $height = $values['height'];
        $opacity = $values['opacity'];
        $color = $values['color'];
        $rm->add($width,$height,$opacity,$color);
    }
    if (isset($_POST['edit'])) {
        $values = $_POST['edit'];
        $id = $values['id'];
        $width = $values['width'];
        $height = $values['height'];
        $opacity = $values['opacity'];
        $color = $values['color'];
        $rm->update($id,$width,$height,$opacity,$color);
    }

    if (isset($_POST['reset'])) {
        $rm->resetDB();
    }

    header('Location: ' . $_SERVER["PHP_SELF"], true, 303);

}

if (array_key_exists('test', $_POST)) {
    $id = $_POST['id'];
    $rm->delete($id);
}


$pg->header($rm->getAllRects());
$pg->footer();

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

?>