<?php

	/*
		Últimas notícias http://rss.terra.com.br/0,,EI1,00.xml
		Brasil: http://rss.terra.com.br/0,,EI306,00.xml
		Mundo: http://rss.terra.com.br/0,,EI294,00.xml
		Ciência: http://rss.terra.com.br/0,,EI238,00.xml
		Tecnologia: http://rss.terra.com.br/0,,EI4795,00.xml
		Popular: http://rss.terra.com.br/0,,EI1140,00.xml
	*/


	@$feed = file_get_contents('http://g1.globo.com/dynamo/sao-paulo/rss2.xml');

	if($feed != ""){
		$rss = new SimpleXmlElement($feed);

		$idx = 1;
		foreach($rss->channel->item as $entrada) {
			$aNoticias[$idx][categoria] = trim($entrada->category);
			$aNoticias[$idx][data] 	    = trim($entrada->pubDate);
			$aNoticias[$idx][nome]      = trim($entrada->title);
			$idx ++;
		}

		if($idx > 1){
			echo json_encode($aNoticias);
		}
	}

?>