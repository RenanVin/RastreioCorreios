<?php
class ModelCatalogRastreioCorreios extends Model {

	public function getPost($codigo) {

		$url = "http://websro.correios.com.br/sro_bin/txect01$.Inexistente?P_LINGUA=001&P_TIPO=002&P_COD_LIS=".$codigo."";
 		$retorno = file_get_contents($url);
		preg_match("/<table  border cellpadding=1 hspace=10>.*<\/TABLE>/s", $retorno, $tabela);
 
		if(count($tabela) == 1){
			return utf8_encode($tabela[0]);  
		}else{
			return "Objeto não encontrado";  
		}
	}

}
?>