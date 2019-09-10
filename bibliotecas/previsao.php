<?php
function consultaTempo($nome_cidade){

  function hg_request($parametros, $chave = null, $endpoint = 'weather'){
    $url = 'http://api.hgbrasil.com/'.$endpoint.'/?format=json&';

    if(is_array($parametros)){
      // Insere a chave nos parametros
      if(!empty($chave)) $parametros = array_merge($parametros, array('key' => $chave));

      // Transforma os parametros em URL
      foreach($parametros as $key => $value){
        if(empty($value)) continue;
        $url .= $key.'='.urlencode($value).'&';
      }

      // Obtem os dados da API
      $resposta = file_get_contents(substr($url, 0, -1));

      return json_decode($resposta, true);
    } else {
      return false;
    }
  }
    $chave = 'c3fe3bd0 '; // Obtenha sua chave de API gratuitamente em http://hgbrasil.com/weather

    // Resgata o IP do usuario
    $ip = $_SERVER["REMOTE_ADDR"];

     $dados = hg_request(array(
     'city_name' => $nome_cidade
     ), $chave);

    if(!isset($dados)) {echo 'Erro durante a consulta da previsão.; die()';}

?>
<div class='row'>
  <div class="col-6 align-self-center" >
    <img src="./publico/img/20.png" class="rounded mx-auto d-block text-center" >
  </div>
  <div class="col-6">
    <?php echo $dados['results']['city']; ?> <?php echo $dados['results']['temp']; ?> ºC<br>
    <?php echo $dados['results']['description']; ?><br>
    Nascer do Sol: <?php echo $dados['results']['sunrise']; ?> - Pôr do Sol: <?php echo $dados['results']['sunset']; ?><br>
    Velocidade do vento: <?php echo $dados['results']['wind_speedy']; ?><br>
  </div>
</div>
<?php
}
?>
