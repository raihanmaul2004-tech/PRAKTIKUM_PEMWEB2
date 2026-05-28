<div class="col-md-9 p-4">

    <?php
    //tangkap req dari navbar
    $hal = $_REQUEST['hal'] ?? '';   // gunakan null coalescing
    
    if (!empty($hal)) {
        include_once $hal . '.php';
    } else {
        include_once 'home.php';
    }
    ?>
</div>
</div>