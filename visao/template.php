<html>
<head>
    <title>HidroApp</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1cc88a">
    <link rel="manifest" href="/manifest.json">
    <base href="<?= BASE_URL ?>">

<!-- css -->

<link rel="stylesheet" href="./publico/css/app.css">
<link rel="stylesheet" type="text/css" href="./publico/e_css/epoch.min.css">
<link rel="stylesheet" href="./publico/css/app.css">
<link rel="stylesheet" href="./publico/css/bootrtrap-grid.css.map">
<link rel="stylesheet" href="./publico/css/bootstrap-reboot.css">
<link rel="stylesheet" href="./publico/css/bootstrap.css">
<link rel="stylesheet" href="./publico/css/sb-admin-2.min.css">


<link rel="stylesheet" type="text/css" href="./publico/css/epoch.css">


</head>
<body>

    <?php require "./visao/components/cabecalho.php"; ?>

    <?php alertComponentRender(); ?>

    <main>
          <?php require $viewFilePath; ?>
    </main>
<!-- js -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="./publico/js/jquery.min.js"></script>
<script src="./publico/js/bootstrap.bundle.min.js"></script>
<script src="./publico/js/jquery.easing.min.js"></script>
<script src="./publico/js/sb-admin-2.min.js"></script>
<link rel="stylesheet" href="./publico/scss/_style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
</script>
      <?php if (!empty($produtos)) {
       foreach ($produtos as $produto) {?>
      <script>

      var ctx = document.getElementById('barras').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Planta (Unidade)', 'Agua (Litros)'],
             fontColor: 'black',
            datasets: [{
                label: 'Numero de uso',
                data: [<?php echo $produto['quant'];?>, <?php echo $produto['agua'];?>],
                backgroundColor: [
                    'rgb(61, 206, 61, 0.2)',
                    'rgba(54, 162, 235, 0.2)'


                ],
                borderColor: [
                    'rgb(0, 128, 0, 1)',
                    'rgba(54, 162, 235, 1)'

                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
      });


  var n = 0;
  var l = document.getElementById("number");
  window.setInterval(function(){
    l.innerHTML = n;
    n++;
  },1000);


  
      var ctx = document.getElementById('radarchart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Planta', 'Agua (L)', 'Nutrientes (L)'],
             fontColor: 'black',
            datasets: [{
                data: [<?php echo $produto['quant'];?>, <?php echo $produto['agua'];?>, (<?php echo $produto['agua'];?>/10)],
                backgroundColor: [
                    'rgb(61, 206, 61, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(251, 188, 5, 0.2)',
                    'rgba(249, 70, 4,0.2)'

                ],
                borderColor: [
                    'rgb(61, 206, 61,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(251, 188, 5, 1)',
                    'rgba(249, 70, 4, 1)'

                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
      });



      </script>
      <?php
            }
          }
      ?>
</body>
</html>
