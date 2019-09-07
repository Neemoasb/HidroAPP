<?php
	function rootAcess(){
		$linha = array();
		$arq = fopen("C:/xampp/htdocs/PJINovo/servicos/confCnx.txt", "r");
		while (!feof($arq)) {
			$linha[] = trim(fgets($arq));
		}
		return $linha;
	}

?>
