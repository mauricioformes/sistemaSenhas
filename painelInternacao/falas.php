<script>
	function setaIdioma(){
		var msg = new SpeechSynthesisUtterance();
			var voices = window.speechSynthesis.getVoices();
			msg.voice = voices[15]; // Note: some voices don't support altering params
			msg.voiceURI = 'native';
			msg.volume = 1; // 0 to 1
			msg.rate = 0.8; // 0.1 to 10
			msg.pitch = 0; //0 to 2
			msg.text = "";
		speechSynthesis.speak(msg);
	}


	function fala(nome,senha,local){
		// CONFIGURAÇÂO DA SINTESE DE VOZ
		var msg = new SpeechSynthesisUtterance();
		var voices = window.speechSynthesis.getVoices();
		msg.voice = voices[15]; // Note: some voices don't support altering params
		msg.voiceURI = 'Google português do Brasil';
		msg.volume = 1; // 0 to 1
		msg.rate = 0.8; // 0.1 to 10
		msg.pitch = 0; //0 to 2
		


/*		LOCAIS DISPONIVEIS: 

		RECEPCAO EMERGENCIA  - <B>GUICHE: 4</B>
		RECEPCAO EMER PED. - <b>GUICHE: 3</b>
		RECEPCAO EMER PED.  - <B>GUICHE: 4</B>
		MEDICO ADULTO - <B>CONSULT. X</B>
		MEDICO PEDIATRA - <B>CONSULT. 5</B>
		ACOLHIMENTO
*/

		var letra   = senha.charAt(0);
		letra       = letra.toLowerCase();
		var numero1 = senha.substring(1,2);
		var numero2 = senha.substring(2,3);
		var numero3 = senha.substring(3,4);
	

		fraseMontada = "";
		if (nome == "NOVO ATENDIMENTO") {
			// fraseMontada = "Senha, " + letra + ", " + numero1 + " " + numero2 + numero3 + ", ";
			fraseMontada = "Senha, " + senha + ", ";
		}else{
			fraseMontada = "Chamando cliente, ";
		}
			

		var l = local.charAt(0);
		
		if(l == "R"){ // Se for recepcao da emergencia
				// Verifica se é recepcao Pediatria
				var verif = local.charAt(14);
				if (verif == 'P') {
					var numLocal = local.charAt(32);
				}else{
					if (verif == 'E') {
						var numLocal = local.charAt(34);
					}
				}			
				fraseMontada = fraseMontada + "guichê, " + numLocal;
		}else{

			if (l == "M") { // Se for médico (consultorio)
				
				// verifica se é pediatra ou adulto
				var verif = local.charAt(7);
				if (verif == 'A') {
					var numLocal = local.charAt(28);
				}else{
					if (verif == 'P') {
						var numLocal = local.charAt(30);
					}
				}
				fraseMontada = fraseMontada + "Consultório " + numLocal;
			}else{
				if (l == "A") { // Se for acolhimento
					fraseMontada = fraseMontada + "Acolhimento.";

				}
			}
		}





		// msg.onend = function(e) {
		//   console.log('Finished in ' + event.elapsedTime + ' seconds.');
		// };
		msg.text = fraseMontada;

		speechSynthesis.speak(msg);
	}

</script>