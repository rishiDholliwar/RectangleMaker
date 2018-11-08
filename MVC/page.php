

<?php

class Page {

    function header(){ ?>
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
        <?php  self::addRectForm(); ?>
        <br><br>
        <div class="container">

            <table border="1" id="tbl">
                <tr>
                    <th>ID</th>
                    <th>Width</th>
                    <th>Height</th>
                    <th>Action</th>
                </tr>



            </table>
        </div>

    <div class="split right">
        <h1>Current Rectangles</h1>


    </div>




        </body>
        </html>

    <?php  }
    function footer(){

    }
//todo make it work with rectangles db
    function insertTable(){
        echo '<script>
 var table = document.getElementById("tbl");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
    </script>


';
    }
    function insertTable2(){
        echo '<script>
 var table = document.getElementById("tbl");
    var row = table.insertRow(2);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "NEW CELL1";
    cell2.innerHTML = "NEW CELL2";
    </script>


';
    }


    function addRectForm(){
      echo'  <form action="main.php" method="post">
            <div>
        Width: <input type="text" value="" name="width" id="width"></input>
            </div>

            <div>
        Height: <input type="text" value="" name="height" id="height"></input>
            </div>

        Color:  <input type="color" name="color" value="#ff0000" id="color">

            <div class="buttons">
                <input id="sub" type="submit" value="sub" ></input>
            </div>
        </form> 
        ';
    }


    function showDefaultRects(){
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