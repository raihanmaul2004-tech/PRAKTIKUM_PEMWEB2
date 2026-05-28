<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menampilkan Halaman Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .hero {
            background: url('https://images.unsplash.com/photo-1554224155-6726b3ff858f') center/cover;
            height: 300px;
            position: relative;
        }

        .hero-text {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
        }

        .footer {
            background: #0d6efd;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="container-fluid p-0">

        <!-- HEADER -->
        <?php include_once 'header.php'; ?>

        <!-- MENU -->
        <?php include_once 'menu.php'; ?>

        <!-- HERO IMAGE -->
        <div class="hero">
            <div class="hero-text">
                <h5>Some representative placeholder</h5>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="container mt-3">
            <div class="row">

                <div class="col-md-8">
                    <?php include_once 'main.php'; ?>
                </div>

                <div class="col-md-4">
                    <?php include_once 'sidebar.php'; ?>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <?php include_once 'footer.php'; ?>

    </div>
</body>

</html>