<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Star | Dashboard</title>
    <link rel="stylesheet" href="../css/menu.style.css">
    <link rel="stylesheet" href="../css/icomoon/style.css">
    <link rel="stylesheet" href="../css/dashboard.css">

</head>
<body>
  <?php
        require_once('../vista/menu_vista.php');
        $header = new HTMLMENU(0); 
        $header->createMenu(); 
  
  ?>  
  <section class="webface">
        <div class="bg">
        </div>
        <div class="textos-face">
            <h1>ALL STAR <span class="icon-star"></span></h1>
            <h3><small>
                Brilla en tu eventos
            </small></h3>
        </div>

    </section>
    <section class="events-div">
        <article class="newEvents">
          <?php
          
          
          
          
          
          ?>


        </article>
    </section>


</body>
</html>