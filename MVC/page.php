<?php

class Page
{

    function header($rect)
    { ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Rectangle</title>
            <link rel="stylesheet" type="text/css" href="styles.css">
        </head>
        <body>


        <div class="split left">
            <h1>Rectangle Maker</h1>

            <?php self::addRectForm(); ?>
            <?php self::editRectForm(); ?>

            <br>

            <form id="reset" method="post">
                <div class="buttons">
                    <input id="sub" type="submit" name="reset[]" value="RESET DATABASE"></input>
                </div>
            </form>

            <table border="1" id="tbl" class="wrap">

                <tr>
                    <th>ID</th>
                    <th>Width</th>
                    <th>Height</th>
                    <th>Color</th>
                    <th>Action</th>
                </tr>
                <?php $array = array(); ?>
                <?php foreach ($rect as $r): ?>
                    <?php $array[] = new Rect($r->width, $r->height, $r->color, $r->id);

                    ?>
                    <tr>
                        <td><?= $r->id; ?></td>
                        <td><?= $r->width; ?></td>
                        <td><?= $r->height; ?></td>
                        <td bgcolor=<?= $r->color; ?>><?= $r->color; ?></td>

                        <td>
                            <form method="post">
                                <input type="submit" name="test" id="test" value="Delete"/><br/>
                                <input type="hidden" name="id" value=<?= $r->id; ?>>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>
        </div>

        <div class="split right">
            <h1>Current Rectangles</h1>

            <table border="1" id="tblTwo">
                <tr>
                    <th>ID</th>
                    <th>Rectangle</th>

                </tr>

                <?php foreach ($array as $r): ?>
                    <div id="div">
                        <tr>
                            <td><?= $r->getId(); ?></td>

                            <td>
                                <canvas id=<?= $r->getId(); ?>  style="border:0px solid #d3d3d3;
                                ">
                                Your browser does not support the HTML5 canvas tag.</canvas></td>

                            <script>
                                var c = document.getElementById(<?=$r->getId() ?>);
                                var ctx = c.getContext("2d");

                                // Red rectangle
                                ctx.beginPath();
                                ctx.lineWidth = "6";
                                ctx.strokeStyle = "red";
                                ctx.fillStyle = "<?=$r->getColor() ?>";
                                ctx.fillRect(0, 0,<?=$r->getWidth() ?>, <?=$r->getHeight() ?>);
                                ctx.stroke();
                            </script>
                        </tr>
                    </div>
                <?php endforeach; ?>

            </table>
        </div>


        </body>
        </html>

    <?php }

    function footer()
    {

    }

    function addRectForm()
    {

        echo ' <div class="leftForm"><fieldset>
                <legend>Add New Rectangle</legend> <form  method="post" id="add">
            <div>
        Width: <input type="text" value="" name="add[width]" id="width"></input>
            </div>

            <div>
        Height: <input type="text" value="" name="add[height]" id="height"></input>
            </div>

        Color:  <input type="color" name="add[color]" value="#ff0000" id="color">

            <div class="buttons">
                <input id="sub" type="submit" value="sub" ></input>
            </div>
            </fieldset>
        </form> </div>
        ';
    }

    function editRectForm()
    {

        echo ' <div class="rightForm">
                <fieldset>
                <legend>Edit Current Rectangle</legend> 
                <form  id="edit" method="post">
             <div>
        Id: <br><input type="text" value="" name="edit[id]" id="idEdit"></input>
            </div>
            <div>
        Width: <input type="text" value="" name="edit[width]" id="width"></input>
            </div>

            <div>
        Height: <input type="text" value="" name="edit[height]" id="height"></input>
            </div>

        Color:  <input type="color" name="edit[color]" value="#ff0000" id="color">

            <div class="buttons">
                <input id="sub" type="submit" value="sub" ></input>
            </div>
            </fieldset>
        </form>   <div>
        ';
    }

    function popUp()
    {
        $message = "wrong answer";
        echo "<script src='main.php' type='text/javascript'>alert('$message');</script>";
    }

    function drawRect($id, $width, $height, $color)
    {
//todo how do i pass the arguments to the javascipt??
        echo '
        <script>
      
            var c = document.getElementById(id);
            var ctx = c.getContext("2d");

            // Red rectangle
            ctx.beginPath();
            ctx.lineWidth = "6";
            ctx.strokeStyle = "red";
            ctx.fillRect(0, 0, 9, 140);
            ctx.stroke();

        </script> ';
    }

    function showDefaultRects()
    {
        echo '
        <script>
            var c = document.getElementById("myCanvas");
            var ctx = c.getContext("2d");

            // Red rectangle
            ctx.beginPath();
            ctx.lineWidth = "6";
            ctx.strokeStyle = "red";
            ctx.fillRect(5, 5, 290, 140);
            ctx.stroke();

        </script>
       ';
    }
}

?>