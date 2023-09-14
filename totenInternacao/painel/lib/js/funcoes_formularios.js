////////////////////////////////////////////////////////////////////////////////////
///                               Fun��es JavaScript 	                         ///
///                           Valida��es de Formul�rios 	                 ///
///                        Sistemas de Controle de Chamados                      ///
////////////////////////////////////////////////////////////////////////////////////
// -------------------------------------------------------------------------
// Nome da Fun��o      : f_Mascara_AMB
// Analista            : Guilherme Muller Coletti
// Data                : 18-08-2006
// Utilidade           : Fun��o que mascara a digita��o de horas nos formul�rios
// Sintaxe             : f_Mascara_AMB(form1.fcod)
// Exemplo             : f_Mascara_AMB(form1.fcod)
// Data Ult. Altera��o :
// Altera��es          :
// -------------------------------------------------------------------------

function f_Mascara_AMB(cValor){
   var mydata = '';
   mydata = mydata + cValor.value;
   if (mydata.length == 2){
		mydata = mydata + '.';
		cValor.value = mydata;
   }
   if (mydata.length == 5){
		mydata = mydata + '.';
		cValor.value = mydata;
   }
   if (mydata.length == 9){
		mydata = mydata + '-';
		cValor.value = mydata;
   }

}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Validar apenas letras
// Analista            : Guilherme M. Coletti
// Data                : 28-06-2002
// Utilidade           : Fun��o que verifica se foi digitado sem espaco
// Sintaxe             : f_ValidarStringSemEspaco(Nome do Campo);
// Exemplo 	       : f_ValidarStringSemEspaco(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarStringSemEspaco(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var valid = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM"
	var ok = "yes";
	var temp;
	for (var i=0; i<cCampo.value.length; i++)
	{
		temp = "" + cCampo.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
		alert("Por favor, digite apenas letras sem acentos e nem aspa simples!");
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Validar apenas letras
// Analista            : Guilherme M. Coletti
// Data                : 28-06-2002
// Utilidade           : Fun��o que verifica se foi digitado sem acentos
// Sintaxe             : f_ValidarStringAcentos(Nome do Campo);
// Exemplo 	       : f_ValidarStringAcentos(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarStringAcentos(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var valid = "qwertyuiopasdfghjklzxcvbnm  QWERTYUIOPASDFGHJKLZXCVBNM"
	var ok = "yes";
	var temp;
	for (var i=0; i<cCampo.value.length; i++)
	{
		temp = "" + cCampo.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
		alert("Por favor, digite apenas letras sem acentos e nem aspa simples!");
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Carregando
// Analista            : Guilherme M. Coletti
// Data                : 03-04-2006
// Utilidade           : 
// Sintaxe             : 
// Exemplo 	       : 
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 


function HideStatus(){
	//window.status = document.readyState!="complete" ? "Carregando..." : window.defaultStatus;
	//if(document.readyState =="complete"){
		iCarregando.style.display='none';
	//}
}
//document.onreadystatechange = HideStatus;

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Ajuda
// Analista            : Guilherme M. Coletti
// Data                : 03-04-2006
// Utilidade           : 
// Sintaxe             : f_Ajuda(texto)
// Exemplo 	       : f_Ajuda('Digite o Nome')
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_Ajuda(sAjuda){
	top.ajuda.innerHTML=sAjuda;
}

// -------------------------------------------------------------------------
// Nome da Fun��o      : f_MascaraDiaMes
// Analista            : Guilherme Muller Coletti
// Analista            : Ricardo Campos Silva
// Data                : 27-07-2004
// Utilidade           : Fun��o que mascara a digita��o de dia e m�s nos formul�rios
// Sintaxe             : f_MascaraDiaMes(form1.fdata)
// Exemplo             : f_MascaraDiaMes(form1.fdata) // se for digitado 0104 ir�
// retornar 01/04 no campo do formul�rio
// Data Ult. Altera��o :
// Altera��es          :
// -------------------------------------------------------------------------

   function f_MascaraDiaMes(cValor){
       var mydata = '';
       mydata = mydata + cValor.value;
       if (mydata.length == 2){
   	   mydata = mydata + '/';
   	   cValor.value = mydata;
       }
   }

// -------------------------------------------------------------------------
// Nome da Fun��o      : f_MascaraTelefone
// Analista            : Guilherme M. Coletti
// Data                : 04-03-2008
// Utilidade           : Fun��o que mascara a digita��o de telefone
// Sintaxe             : f_MascaraData(form1.fdata)
// Exemplo             : f_MascaraData(form1.fdata) // se for digitado 01042004 ir�
// retornar 01/04/2004 no campo do formul�rio
// Data Ult. Altera��o :
// Altera��es          :
// -------------------------------------------------------------------------

   function f_MascaraTelefone(cValor){
       var mydata = '';
       mydata = mydata + cValor.value;
       if (mydata.length == 4){
   	  mydata = mydata + '-';
   	  cValor.value = mydata;
       }
   }

// -------------------------------------------------------------------------
// Nome da Fun��o      : f_MascaraData
// Analista            : Guilherme M. Coletti
// Data                : 14-03-2004
// Utilidade           : Fun��o que mascara a digita��o de datas nos formul�rios
// Sintaxe             : f_MascaraData(form1.fdata)
// Exemplo             : f_MascaraData(form1.fdata) // se for digitado 01042004 ir�
// retornar 01/04/2004 no campo do formul�rio
// Data Ult. Altera��o :
// Altera��es          :
// -------------------------------------------------------------------------

   function f_MascaraData(cValor){
       var mydata = '';
       mydata = mydata + cValor.value;
       if (mydata.length == 2){
   mydata = mydata + '/';
   cValor.value = mydata;
       }
       if (mydata.length == 5){
   mydata = mydata + '/';
   cValor.value = mydata;
       }
   }

// -------------------------------------------------------------------------
// Nome da Fun��o      : f_MascaraHora
// Analista            : Guilherme Muller Coletti
// Data                : 04-01-2005
// Utilidade           : Fun��o que mascara a digita��o de horas nos formul�rios
// Sintaxe             : f_MascaraHora(form1.fhora)
// Exemplo        : f_MascaraData(form1.fdata) // se for digitado 01042004 ir�
// retornar 01/04/2004 no campo do formul�rio
// Data Ult. Altera��o :
// Altera��es          :
// -------------------------------------------------------------------------

   function f_MascaraHora(cValor){
       var mydata = '';
       mydata = mydata + cValor.value;
       if (mydata.length == 2){
   mydata = mydata + ':';
   cValor.value = mydata;
       }
   }


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o CheckBox
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o para validar checkboxs nulos
// Sintaxe             : f_ValidarCheckBox(Nome do Form,Nome do Campo,Qtd Indexa��o);
// Exemplo 	       : Esta fun��o dever� ser usada no final do formul�rio, 
//                       no momento da valida��o do formul�rio
//                       return f_ValidarCheckBox(form1,"fOpcao",3);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarCheckBox(cForm,cValor,nQtd)
{
	var cEnc = false;
	for (var x=1;x<nQtd;x++)
	{
		cOpcao = cValor+x;
		if (cForm.elements[cOpcao].checked)
		{
			cEnc = true;
		}
	}
	if (cEnc == false)
	{
		alert("Por favor, preencha o campo obrigat�rio.");
		return false;
	}
	else
	{
		return true;
	}
}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o Radio Button
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o para validar radio buttons nulos
// Sintaxe             : f_ValidarRadio(Nome do Form.Nome do Campo);
// Exemplo 	       : Esta fun��o dever� ser usada no final do formul�rio, 
//                       no momento da valida��o do formul�rio
//                       return f_ValidarRadio(form1.fRadio);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarRadio(cValor)
{
    cOk  = false;
    nQtd = cValor.length;
    for (i=0;i<nQtd;i++)
    {
    	if (cValor[i].checked)
    	{
        	cOk = true;
        	break;
        }
    }
    if (cOk)
    {
    	return true;
    }
    else
    {
	alert("Por favor, preencha o campo obrigat�rio.");

    }
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de Hora
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica sea hora digitada � v�lida
// Sintaxe             : f_ValidarHora(Nome do Form, Hora);
// Exemplo 	       : Esta fun��o dever� ser usada no final do formul�rio, 
//                       no momento da valida��o do formul�rio
//                       return f_ValidarHora(form1,form1.fHora);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarHora( cCampo )
{
    var cHr, cMin;
    cCampo.style.background='#FFFFFF';
    cHr  = cCampo.value.substr( 0,2 );
    cMin = cCampo.value.substr( 3,2 );
    
    // Verifica se a hora foi digitada corretamente
    if ( ( cCampo.value.substr(2,1) == ':' ) &&
         ( ( parseInt( cHr  ) >= 0 ) && ( parseInt( cHr  ) <= 23 ) ) &&
         ( ( parseInt( cMin ) >= 0 ) && ( parseInt( cMin ) <= 59 ) ) )
    {
      return ( true );
    }
    else
    {
      alert( 'Favor fornecer a hora em um formato v�lido (HH:MM).' );
      cCampo.focus();
      cCampo.style.background='#F1F1F1';
      return false;
    }
}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de Per�odo
// Analista            : Guilherme M. Coletti
// Data                : 28-06-2002
// Utilidade           : Fun��o que verifica a validade de um per�odo
// Sintaxe             : f_ValidarPeriodo(Nome do Form, Data inicial, Data Final);
// Exemplo 	       : Esta fun��o dever� ser usada no final do formul�rio, 
//                       no momento da valida��o do formul�rio
//                       return f_ValidarPeriodo(form1,form1.DtIni, form1.DtFim);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarPeriodo( cForm, cDtIni,cDtFim )
{
    var cDtIniAux, cDtFimAux;
    
    cDtIniAux = cDtIni.value.substr( 6,4 ) + cDtIni.value.substr( 3,2 ) + cDtIni.value.substr( 0,2 );
    cDtFimAux = cDtFim.value.substr( 6,4 ) + cDtFim.value.substr( 3,2 ) + cDtFim.value.substr( 0,2 );
    
    if ( cDtIniAux > cDtFimAux )
    {
      alert( 'A data inicial n�o pode ser posterior � data final do per�odo' );	    
      return false;
    }
    else
    { 
      // Verifica se a quantidade de dias do per�odo � maior que o limite
      // Em implanta��o
      
    
      return true;
    }
}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Edi��o do Campo
// Analista            : Guilherme M. Coletti
// Data                : 28-06-2002
// Utilidade           : Fun��o que verifica se o campo em que a fun��o est� sendo chamada
//   	 	         poder� ser editado.
// Sintaxe             : f_EditaCampo(Nome do Form, Nome do Campo);
// Exemplo 	       : <input type=hidden name=feditadata>
//                       <input type=text name=fdata onFocus="return f_EditaCampo(form1,this);">
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_EditaCampo( cForm,cCampo )
{
    nValor = cCampo.name.substr(0,1) + 'edita' + cCampo.name.substr(1)
    if ( cForm.elements[nValor].value == 'N' )
    {
    	cCampo.blur();
    }
    return true;
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de Tamanho M�nimo
// Analista            : Guilherme M. Coletti
// Data                : 24-07-2003
// Utilidade           : Fun��o que verifica a quantidade m�nima de caracteres digitados em um
//			 determinando objeto do form.
// Sintaxe             : f_ValidarTamanhoMin(Nome do Campo, Maximo de Caracteres)
// Exemplo 	       : f_ValidarTamanhoMin(form1.fcObs,120);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarTamanhoMin(cCampo,nTamanho)
{
	cCampo.style.background='#FFFFFF';
	if ((cCampo.value.length < nTamanho) && (cCampo.value.replace(' ','') != ""))
	{
		alert('O campo deve ter no m�nimo ' + nTamanho + ' caracteres!');
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de Tamanho
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica a quantidade de caracteres digitados em um
//			 determinando objeto do form.
// Sintaxe             : f_ValidarTamanho(Nome do Campo, Maximo de Caracteres)
// Exemplo 	       : f_ValidarTamanho(form1.fcObs,120);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarTamanho(cCampo,nTamanho)
{
	cCampo.style.background='#FFFFFF';
	if ((cCampo.value.length > nTamanho) && (cCampo.value.replace(' ','') != ""))
	{
		alert('O campo deve ter apenas ' + nTamanho + ' caracteres!');
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de Data
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : 1 - Fun��o que verifica se a data � valida.
//			 2 - Verifica se a data mais hoje � maior que a data informada
//			 3 - Verifica se a data atual � maior que a data informada
//			 4 - Verifica se a data mais hoje � menor que a data informada
//			 5 - Verifica se a data atual � menor que a data informada
// Sintaxe             : f_ValidarData(Campo do Form);
// Exemplo 	       : f_ValidarData(fcData); --> 1
//			 f_ValidarData(fcData,'HF'); --> 2 n�o permite data < q atual
//			 f_ValidarData(fcData,'F'); --> 3
//			 f_ValidarData(fcData,'AH'); --> 4 n�o permite data > q atual
//			 f_ValidarData(fcData,'A'); --> 5
// Data Ult. Altera��o : 
// ---------------------------------------------------------------------------------- 

function f_ValidarData( cCampo, cTipo )
{
	cCampo.style.background='#FFFFFF';
	var Data = new Date();
	var dHoje = new Date(Data.getFullYear(),Data.getMonth(),Data.getDate(),0,0,0);
	var nMes, cMes;
	var dDataFornecida;
	var str = cCampo.value;
	var cErro = 'Por favor, digite a data corretamente ( Ex. 14/05/2001 )';

	if (str.replace(' ','') != "")
	{
		// Verifica se foram digitados 10 caracteres.
		if (str.length != 10)
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}
		// Verifica se os caracteres s�o n�meros e barra.
		for (var i = 0; i < str.length; i++)
		{
			var ch = str.substring(i, i + 1);
			if ((ch < "0" || "9" < ch) && ch != "/")
			{
				alert(cErro)
				cCampo.focus();
				cCampo.style.background='#F1F1F1';
				return false;
			}
		}

		// Verifica o valor do dia.
		if ( (str.substring(0, 2) < 1) || (str.substring(0, 2) > 31) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		// Verifica o valor do dia no valor do m�s.
		// Fevereiro
		if ( (str.substring(3, 5) == 2 ) && (str.substring(0, 2) > 29) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}
		if ( (str.substring(3, 5) == 2 ) && (str.substring(0, 2) == 29) )
		{
			if (!confirm('\nVoc� entrou com 29 de Fevereiro...\n\nVoc� tem certeza de que � ano bissexto?'))
			{
				cCampo.focus();
			        cCampo.style.background='#F1F1F1';
				return false;
			}
		}

		// Abril
		if ( (str.substring(3, 5) == 4 ) && (str.substring(0, 2) > 30) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		// Junho
		if ( (str.substring(3, 5) == 6 ) && (str.substring(0, 2) > 30) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		// Setembro
		if ( (str.substring(3, 5) == 9 ) && (str.substring(0, 2) > 30) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';

			return false;
		}

		// Novembro
		if ( (str.substring(3, 5) == 11 ) && (str.substring(0, 2) > 30) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		// Verifica o valor do m�s.
		if ( (str.substring(3, 5) < 1) || (str.substring(3, 5) > 12) )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}


		// Verifica posicionamento da barra.
		if ( str.substring(3, 4) == "/" || str.substring(4, 5) == "/" )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		if ( str.substring(0, 1) == "/" || str.substring(1, 2) == "/" )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		if ( str.substring(6, 9) == "/" || str.substring(7, 10) == "/" )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}

		if ( str.substring(2, 3) != "/" || str.substring(5, 6) != "/" )
		{
			alert(cErro)
			cCampo.focus();
			cCampo.style.background='#F1F1F1';
			return false;
		}


		// Verifica se a data � anterior a hoje
		nMes = str.substring(3,5) - 1;
		
		dDataFornecida = new Date( str.substring(6,10), nMes, str.substring(0,2) );
		
		if ( toString( dDataFornecida.getMonth() ).lenght  < 2 )
		{
			cMes = "0" + toString( dDataFornecida.getMonth() );
		}
		else
		{
			cMes = toString( dDataFornecida.getMonth() );
		}

		if (cTipo == "F")
		{
			if ( dDataFornecida <=  dHoje )
			{
				alert("\nA Data n�o pode ser menor que a Data de Hoje!");
				cCampo.focus();
				cCampo.style.background='#F1F1F1';
				return false;
			}
		}
		else if (cTipo == "A")
		{
			if ( dDataFornecida >=  dHoje )
			{
				alert("\nA Data n�o pode ser maior que a Data de Hoje!");
				cCampo.focus();
				cCampo.style.background='#F1F1F1';
				return false;
			}
		}
		else if (cTipo == "HF")
		{
			if ( dDataFornecida <  dHoje )
			{
				alert("\nA Data n�o pode ser menor que a Data de Hoje!");
				cCampo.focus();
				cCampo.style.background='#F1F1F1';
				return false;
			}
		}
		else if (cTipo == "AH")
		{
			if ( dDataFornecida >  dHoje )
			{
				alert("\nA Data n�o pode ser maior que a Data de Hoje!");
				cCampo.focus();
				cCampo.style.background='#F1F1F1';
				return false;
			}
		}
	return true;
	}
	else
	{
	 return true;
	}

}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Validar apenas caracteres
// Analista            : Guilherme M. Coletti
// Data                : 28-06-2002
// Utilidade           : Fun��o que verifica se foi informado apenas letras no campo
// Sintaxe             : f_ValidarString(Nome do Campo);
// Exemplo 	       : f_ValidarString(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarString(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var valid = "a����bcde��fghi��jklmno��pqrstuvwxyz' A����BC�DE��FGH��IJKLMNO��PQRSTUVWXYZ"
	var ok = "yes";
	var temp;
	for (var i=0; i<cCampo.value.length; i++)
	{
		temp = "" + cCampo.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
		alert("Por favor, digite apenas letras!");
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Validar apenas caracteres e numeros
// Analista            : Guilherme Muller Coletti
// Data                : 23-09-2004
// Utilidade           : Fun��o que verifica se foi informado apenas letras e numero no campo
// Sintaxe             : f_ValidarAlfanumerico(Nome do Campo);
// Exemplo 	       : f_ValidarAlfanumerico(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarAlfanumerico(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var valid = "'a����bcde��fghi��jklmno��pqrstuvwxyz A����BC�DE��FGH��IJKLMNO��PQRSTUVWXYZ 1234567890 -"
	var ok = "yes";
	var temp;
	for (var i=0; i<cCampo.value.length; i++)
	{
		temp = "" + cCampo.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
		alert("Por favor, digite apenas letras ou numeros!");
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}
// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Validar apenas caracteres e numeros
// Analista            : Guilherme Muller Coletti
// Data                : 23-09-2004
// Utilidade           : Fun��o que verifica se foi informado apenas letras e numero no campo
// Sintaxe             : f_ValidarAlfanumerico(Nome do Campo);
// Exemplo 	       : f_ValidarAlfanumerico(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarAlfanumericosemaspa(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var valid = "a����bcde��fghi��jklmno��pqrstuvwxyz A����BC�DE��FGH��IJKLMNO��PQRSTUVWXYZ 1234567890 -."
	var ok = "yes";
	var temp;
	for (var i=0; i<cCampo.value.length; i++)
	{
		temp = "" + cCampo.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
		alert("Por favor, digite apenas letras ou numeros, menos aspas simples!");
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}
// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Validar apenas caracteres e numeros
// Analista            : Guilherme Muller Coletti
// Data                : 23-09-2004
// Utilidade           : Fun��o que verifica se foi informado c�digo amb
// Sintaxe             : f_ValidarCodAmB(Nome do Campo);
// Exemplo 	       : f_ValidarCodAmB(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarCodAmB(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var valid = "1234567890 - ."
	var ok = "yes";
	var temp;
	for (var i=0; i<cCampo.value.length; i++)
	{
		temp = "" + cCampo.value.substring(i, i+1);
		if (valid.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
		alert("Por favor, digite apenas numeros!");
		cCampo.focus();
		cCampo.style.background='#F1F1F1';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de N�mero Reais
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o valor do campo informado � um numero real
//			 Ex: 1.25  1,25
// Sintaxe             : f_ValidarNumeroReal(Nome do Campo, cSep);
// Exemplo 	       : f_ValidarNumeroReal(form1,this);
// Data Ult. Altera��o : 
// Altera��es          : Inclus�o do par�metro cSep, que indica qual separador
//                       dever� ser considerado (v�rgula ou ponto ).
// ---------------------------------------------------------------------------------- 


function f_ValidarNumeroReal(nNumero, cSep)
{
	nNumero.style.background='#FFFFFF';
	var x=nNumero.value
	var cFiltroVirgula=/(^\d+$)|(^\d+\,\d+$)/
	var cFiltroPonto=/(^\d+$)|(^\d+\.\d+$)/
	var cFiltro
	
	if ( cSep == "," )
	{
	  cFiltro = cFiltroVirgula;
	}
	else
	{
	  cFiltro = cFiltroPonto;
	}
	
	if ((!cFiltro.test(x)) && (nNumero.value.replace(' ','') != ""))
	{
	  if ( cSep == "," )
	  {
	    alert("Por favor, preencha um n�mero v�lido! ( Somente Algarismos e V�rgula )");
	  }
	  else
	  {
	    alert("Por favor, preencha um n�mero v�lido! ( Somente Algarismos e Ponto )");
	  }
	  	
	  nNumero.focus();
	  nNumero.style.background='#E9E9E9';
	  return false;
	}
	else
	{
	  return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de N�mero Inteiro
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o valor do campo � um Numero Inteiro
//   	 	         Ex. 20
// Sintaxe             : f_ValidarNumeroInteiro(Nome do Campo);
// Exemplo 	       : f_ValidarNumeroInteiro(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarNumeroInteiro(nNumero)
{
	nNumero.style.background='#FFFFFF';
	var x=nNumero.value
	var cFiltro=/(^\d+$)|(^\d+\\d+$)/
	if ((!cFiltro.test(x)) && (nNumero.value.replace(' ','') != ""))
	{
		alert("Por favor, use somente n�meros!");
		nNumero.focus();
	  	nNumero.style.background='#E9E9E9';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de Campo Nulos
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o valor do campo � nulo
// Sintaxe             : f_ValidarCamposNulos(Nome do Campo);
// Exemplo 	       : f_ValidarCamposNulos(form.nome do campo);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarCamposNulos(cCampo)
{
	cCampo.style.background='#FFFFFF';
	if (cCampo.value.replace(' ','') == "")
	{

		cCampo.style.background='#F1F1F1';
		alert("Por favor, preencha o campo obrigat�rio.");

		cCampo.focus();

		return false;
	}
	else
	{
		return true;
	}
}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de E-mail
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o e-mail informada � v�lido
// Sintaxe             : f_ValidarEmail(Nome do Campo);
// Exemplo 	       : f_ValidarEmail(form1,this);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarEmail(cEmail)
{
	cEmail.style.background='#FFFFFF';
	var str=cEmail.value
	var cFiltro=/^.+@.+\..{1,3}$/
	if ((!cFiltro.test(str)) && (cEmail.value.replace(' ','') != ""))
	{
		alert("Por favor, insira um e-mail v�lido!")
		cEmail.focus();
		cEmail.style.background='#E9E9E9';
		return false;
	}
	else
	{
		return true;
	}
}

// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de N Campos Obrigat�rios
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o usu�rio preencheu pelo menos N campos
//			 em um formul�rio.
// Sintaxe             : f_ValidarUmCampo(Nome do Form,Qtd de Campo Necess�rios,Nome dos Campos);
// Exemplo 	       : f_ValidarUmCampo("form1",2,new Array ("campo1","campo2","campo3"));
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarUmCampo(cForm,nQtd,cCampo)
{
	var cErro = 0;
	for (x=0;x<cCampo.length;x++)
	{
		campo = cCampo[x];
		if (top.aplic_centro.document.forms[cForm].elements[campo].value.replace(' ','') != "")
		{
			cErro++;
		}
	}
	if (cErro < nQtd)
	{
		alert('Por favor, voc� precisa preencher pelo menos ' + nQtd + ' dos campos descritos!');
	}
	else
	{
		return true;
	}
}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o de N Campos Obrigat�rios para telefone
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o usu�rio preencheu pelo menos N campos
//			 em um formul�rio.
// Sintaxe             : f_ValidarUmCampo(Nome do Form,Qtd de Campo Necess�rios,Nome dos Campos);
// Exemplo 	       : f_ValidarUmCampo("form1",2,new Array ("campo1","campo2","campo3"));
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarUmCampoTel(cForm,nQtd,cCampo)
{ 
	var cErro = 0;
	for (x=0;x<cCampo.length;x++)
	{
		campo = cCampo[x];
		if (top.document.forms[cForm].elements[campo].value.replace(' ','') != "")
		{
			cErro++;
		}
	}
	if (cErro < nQtd)
	{
		alert('Por favor, voc� precisa preencher pelo menos um dos campos telefone!');
	}
	else
	{
		return true;
	}
}


// ---------------------------------------------------------------------------------
// Nome da Fun��o      : Valida��o Nome Abreviado
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se o nome esta abreviado
// Sintaxe             : f_ValidarNomeAbr(Nome do Form);
// Exemplo 	       : f_ValidarNomeAbr(form1.fnome);
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 
function f_ValidarNomeAbr(cCampo)
{
	cCampo.style.background='#FFFFFF';
	var frase    = cCampo.value;
	var frase2   = frase.split(" ");
	var tamanho  = frase.length;
	var totalarr = frase2.length;
	var erro     = 0;

	if(frase.indexOf(". ") != -1){
		alert('N�o pode conter nome abreviado');
		cCampo.style.background='#F1F1F1';
		cCampo.focus();
		erro = 1;
		return false;
	}
	if(frase.indexOf(".") != -1){
		alert('N�o pode conter nome abreviado');
		cCampo.style.background='#F1F1F1';
		cCampo.focus();
		erro = 1;
		return false;
	}
	if(frase.indexOf("  ") != -1){
		alert('N�o pode conter dois espa�o em branco');
		cCampo.style.background='#F1F1F1';
		cCampo.focus();
		erro = 1;
		return false;
	}
	var qtd = frase.split(" ");
	if( (qtd.length == 1) && (frase != "e" && frase != "E") ){
		alert('N�o pode conter nome abreviado');
		cCampo.style.background='#F1F1F1';
		cCampo.focus();
		erro = 1;
		return false;
	}


	//if(frase.slice(-1).indexOf(" ") != -1){
	//	alert('N�o pode conter nome abreviado');
	//	cCampo.style.background='#F1F1F1';
	//	cCampo.focus();
	//	erro = 1;
	//	return false;
	//}

	for(i=0;i<=totalarr - 1;i++){
		if(frase2[i].length == 1){
			alert('N�o pode conter nome abreviado');
			cCampo.style.background='#F1F1F1';
			cCampo.focus();
			erro = 1;
			return false;
		}
		if( (frase2[i].length == 2) && (frase2[i].toLowerCase() == "jr") ){
			alert('N�o pode conter nome abreviado');
			cCampo.style.background='#F1F1F1';
			cCampo.focus();
			erro = 1;
			return false;
		}
	}
	if(erro == 0){
		return true;
	}
}



// ---------------------------------------------------------------------------------
// Nome da Fun��o      : f_ValidarPlaca
// Analista            : Guilherme M. Coletti
// Data                : 27-06-2002
// Utilidade           : Fun��o que verifica se uma placa de autom�vel foi digitada corretamente
// Sintaxe             : f_ValidarString(Nome do Campo, M�scara);
// Exemplo 	       : f_ValidarString(form1.fPlaca, '-');
//                       Observa��o : se o 2� par�metro for omitido, significa que a
//                       m�scara n�o faz parte da informa��o. e n�o dever� ser validada
// Data Ult. Altera��o : 
// Altera��es          :
// ---------------------------------------------------------------------------------- 

function f_ValidarPlaca(cCampo, cMascara)
{
	cCampo.style.background='#FFFFFF';
	var aLetras  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"
	var aNumeros = "0123456789"
	var ok = "yes";
	var temp;
	var cMsgAdic;
	var nPosIniNr;
	
	// Valida a m�scara e define a mensagem adequada para ser mostrada em caso de erro
	if ( cMascara == "-" )
	{ cMsgAdic = ',\n separados por tra�o (-)';
	  if ( cCampo.value.substr(3,1) != '-' ) ok = "no";
	  nPosIniNr = 4;
	}
	else
	{ cMsgAdic = '';
	  nPosIniNr = 3;
	}
	  	
	// valida as letras
	for (var i=0; i<=2; i++)
	{
	  if (aLetras.indexOf(cCampo.value.substr(i,1)) == -1){ ok = "no"};
	}
	if (ok == "no")
	{
	  alert("A placa deve ser informada com 3 letras e 4 n�meros" + cMsgAdic);
	  cCampo.focus();
	  cCampo.style.background='#F1F1F1';
	  return false;
	}	
	
	// valida os n�meros
	ok = "yes";
	for (var i=nPosIniNr; i<cCampo.length; i++)
	{
	  temp = "" + cCampo.value.substring(i, i+1);
	  if (aNumeros.indexOf(temp) == "-1") ok = "no";
	}
	if (ok == "no")
	{
	  alert("A placa deve ser informada com 3 letras e 4 n�meros" + cMsgAdic);
	  cCampo.focus();
	  cCampo.style.background='#F1F1F1';
	  return false;
	}		
	else { return true; }
}