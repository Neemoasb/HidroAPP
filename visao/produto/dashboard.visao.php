
<?php
if (!empty($produtos)) {
 foreach ($produtos as $produto) {?>

  <!-- Page Wrapper -->

  <div id="wrapper">

    <!-- Sidebar -->
      <?php require "visao/components/sidebar.php"; ?>


        <div class="container">
          <?php if($produto['agua']<='0'){
            ?>

        <div class="alert alert-danger" role="alert">
          Troca de agua urgente! <a href="./produto/editar/<?php echo $produto['id'] ?>" class="alert-link">clique aqui para voltar</a>.
        </div>

            <?php
          }?>

          <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
            <h1 class="h3 mb-0 text-gray-800">Logado como:  <?php echo $produto['email'] ?></h1>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
              Sair
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#">
              Gerar relatorio
            </button>

          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Quantidade de Agua inserida (Litros)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><h4><?php echo $produto['agua'] ?></h4></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Plantas Inseridas(Unidade)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><h4><?php echo $produto['quant'] ?></h4></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tarefas </div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-3 mr-3 font-weight-bold text-gray-800">Proxima Troca de agua em: </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width:<?php echo ($produto['quant'] - $produto['agua']);?>" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tempo de execuxão: </div>
                      <div class=""><h6 id="number"></h6></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafico uso de agua</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <canvas id="barras" width="400" height="400"></canvas>



                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Dados</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <canvas id="radarchart" width="400" height="400"></canvas>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Nutrientes a serem usados
                    </span>
                  </div>
                </div>
              </div>

            <div class="card shadow mt-2">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Previsao do Tempo para: <?php echo $produto['local'] ?></h6>
              </div>
              <div class="card-body">
                    <?php
                    include ("./bibliotecas/previsao.php");
                    consultaTempo($produto['local']);
                    ?>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Temperatura ideal para  <?php echo $produto['cultura'] ?>
                      </span>
                    </div>
              </div>
            </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6 mb-6">
              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Dicas para a produção de <?php echo $produto['cultura'] ?></h6>
                </div>
                <div class="card-body">
                      <?php
                      if($produto['cultura']=='Alface'){
                              include './visao/dicas/alface.visao.php';
                      } if($produto['cultura']=='Tomate'){
                              include './visao/dicas/tomate.visao.php';
                      } if($produto['cultura']=='Morange'){
                              include './visao/dicas/morango.visao.php';
                      } if($produto['cultura']=='Flores'){
                              include './visao/dicas/flores.visao.php';
                      } if($produto['cultura']=='Feijao vagem'){
                              include './visao/dicas/feijao.visao.php';
                      } if($produto['cultura']=='Melao'){
                              include './visao/dicas/melao.visao.php';
                      }?>

                </div>
              </div>
            </div>
            <div class="col-lg-6 mb-6">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Possiveis problemas na produção de <?php echo $produto['cultura'] ?></h6>
                </div>
                <div class="card-body">
                  <?php
                  if($produto['cultura']=='Alface'){
                          include './visao/problemas/alface.problema.visao.php';
                  } if($produto['cultura']=='Tomate'){
                          include './visao/problemas/tomate.problema.visao.php';
                  } if($produto['cultura']=='Morange'){
                          include './visao/problemas/morango.problema.visao.php';
                  } if($produto['cultura']=='Flores'){
                          include './visao/problemas/flores.problema.visao.php';
                  } if($produto['cultura']=='Feijao vagem'){
                          include './visao/problemas/feijao.problema.visao.php';
                  } if($produto['cultura']=='Melao'){
                          include './visao/problemas/melao.problema.visao.php';
                  }?>
                </div>
              </div>
            </div>


          </div>
        

            <!-- Content Column -->

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Log de Atividades</h6>
                </div>
                <div class="card-body">

                </div>
              </div>
            </div>
          

          <?php
        }
      } else { ?>
        <main>
        <?php require "visao/components/login.php"; ?>
      </main>
         <?php
              }?>

          <?php require "visao/components/footer.php"; ?>
        </div>
      </div>





  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Realmente deseja sair?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Como é uma versão beta do app, ainda não conseguimos arrumar um bug de sobrescrever dados de usuarios. se Sair provavelmente seus dados serão perdidos
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-success" data-dismiss="modal">Não, Quero ficar</button>
          <a class="btn btn-outline-danger" href="./login/logout/<?php echo $produto['id'] ?>" role="button">Sim, Desejo Sair</a
        </div>
      </div>
    </div>
  </div>
