<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>layoutit-project</title>
    <meta name="description" content="Generated with Layoutit" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-12"><?php include_once "header.php"; ?></div>
    </div>
    <div class="row">
        <div class="col-12"><?php include_once "menu.php"; ?></div>
    </div>
    <br>
    <div class="row">
        <div class="col-8">
            <?php 
            $req = @$_REQUEST['hal'];
            if(!empty($req)){
                include_once $req.".php";
            } else {
                include_once "home.php";
            }

            ?>
    </div>
        <div class="col-4"><?php include_once "sidebar.php"; ?></div>
    </div>
    <br>
    <div class="row">
        <div class="col-12"><?php include_once "footer.php"; ?></div>
    </div>
</div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
