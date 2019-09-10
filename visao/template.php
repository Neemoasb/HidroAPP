<html>
<head>
    <title>HidroApp</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= BASE_URL ?>">
<!-- css -->
<link rel="stylesheet" href="./publico/css/app.css">
<link rel="stylesheet" type="text/css" href="./publico/e_css/epoch.min.css">
<link rel="stylesheet" href="./publico/css/app.css">
<link rel="stylesheet" href="./publico/css/bootrtrap-grid.css.map">
<link rel="stylesheet" href="./publico/css/bootstrap-reboot.css">
<link rel="stylesheet" href="./publico/css/bootstrap.css">
<link rel="stylesheet" href="./publico/css/sb-admin-2.min.css">
<!-- fim css -->
<!-- graficos -->

<link rel="stylesheet" type="text/css" href="./publico/css/tests.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="./dist/js/epoch.js"></script>
<script src="./dist/js/data.js"></script>
<script src="./dist/css/epoch.min.css"></script>

<!-- fim graficos -->
<!-- js -->

<script src="./publico/js/jquery.min.js"></script>
<script src="./publico/js/bootstrap.bundle.min.js"></script>
<script src="./publico/js/jquery.easing.min.js"></script>
<script src="./publico/js/sb-admin-2.min.js"></script>
<link rel="stylesheet" href="./publico/scss/_style.css">


<link rel="stylesheet" type="text/css" href="./publico/css/epoch.css">

</head>
<body>

    <?php require "./visao/components/cabecalho.php"; ?>

    <?php alertComponentRender(); ?>

    <main>
          <?php require $viewFilePath; ?>
    </main>
<!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./publico/js/bootstrap.min.js"></script>


</body>
</html>
