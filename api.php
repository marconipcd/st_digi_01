<?php
	
	if(isset($_REQUEST['contato'])){
		header('Content-Type: text/html');
		contato($_REQUEST['nome'], $_REQUEST['email'],$_REQUEST['assunto'], $_REQUEST['mensagem']);
	}

	if(isset($_REQUEST['contato_residencia'])){
		header('Content-Type: text/html');
		
		contato_residencia($_REQUEST['plano'],$_REQUEST['nome_completo'], $_REQUEST['cpf'], $_REQUEST['rg'], $_REQUEST['telefone'], 
		$_REQUEST['telefoneSecundario'],$_REQUEST['email'],$_REQUEST['cep'],$_REQUEST['endereco'],$_REQUEST['bairro'],$_REQUEST['cidade'],
		$_REQUEST['complemento'],$_REQUEST['referencia'],$_REQUEST['melhor_horario']);
	}

	if(isset($_REQUEST['contato_comercial'])){

		//echo 'teste';
		header('Content-Type: text/html');
		
		contato_comercial($_REQUEST['plano'],$_REQUEST['nome_completo'], $_REQUEST['cpf'], $_REQUEST['rg'], $_REQUEST['telefone'], 
		$_REQUEST['telefoneSecundario'],$_REQUEST['email'],$_REQUEST['cep'],$_REQUEST['endereco'],$_REQUEST['numero'],$_REQUEST['bairro'],$_REQUEST['cidade'],
		$_REQUEST['complemento'],$_REQUEST['referencia'],$_REQUEST['melhor_horario']);
	}

	if(isset($_REQUEST['contato_gamer'])){

		//echo 'teste';
		header('Content-Type: text/html');
		
		contato_gamer($_REQUEST['plano'],$_REQUEST['nome_completo'], $_REQUEST['cpf'], $_REQUEST['rg'], $_REQUEST['telefone'], 
		$_REQUEST['telefoneSecundario'],$_REQUEST['email'],$_REQUEST['cep'],$_REQUEST['endereco'],$_REQUEST['numero'],$_REQUEST['bairro'],$_REQUEST['cidade'],
		$_REQUEST['complemento'],$_REQUEST['referencia'],$_REQUEST['melhor_horario']);
	}

	if(isset($_REQUEST['contato_empresa'])){

		//echo 'teste';
		header('Content-Type: text/html');
		
		contato_empresa($_REQUEST['plano'],$_REQUEST['nome_completo'], $_REQUEST['cpf'], $_REQUEST['rg'], $_REQUEST['telefone'], 
		$_REQUEST['telefoneSecundario'],$_REQUEST['email'],$_REQUEST['cep'],$_REQUEST['endereco'],$_REQUEST['numero'],$_REQUEST['bairro'],$_REQUEST['cidade'],
		$_REQUEST['complemento'],$_REQUEST['referencia'],$_REQUEST['melhor_horario']);
	}

	if(isset($_REQUEST['me_liga'])){

		//echo 'teste';
		header('Content-Type: text/html');
		
		me_liga($_REQUEST['nome'],$_REQUEST['telefone']);
	}

	
	function contato($nome,$email,$assunto,$mensagem){

			require("phpmailer/class.phpmailer.php");

			// Inicia a classe PHPMailer
			$mail = new PHPMailer();			
			$mail->IsSMTP();
			$mail->SMTPSecure = 'ssl';
			$mail->Host = "smtp.gmail.com";
			$mail->Port = "465";
			$mail->SMTPAuth = true;
			$mail->Username = 'site@digitalonline.com.br';
			$mail->Password = '>3q75MKW_125@45874';
			//https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4P0t9mg9rlgT6uHbGyY6J4nwbmQmtKJCvvWzgrHmBFnh0EmRf6GNMvp9Zcfu6cy54X4rCpmD9rlh32WlMyk-JdNCdSSaw

			$mail->From = $email; // Seu e-mail
			$mail->FromName = $nome; // Seu nome
			
			// Define os destinatário(s)
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->AddAddress("marconipcd@gmail.com");
			$mail->AddAddress("contato@digitalonline.com.br");
			
			$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

			// Define a mensagem (Texto e Assunto)
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->Subject  = "Nova novo contato no site de: ".strtoupper($nome); 
			$mail->Body = 
						  "<br/>De: ".strtoupper($nome).
						  "<br/>Assunto: ".strtoupper($assunto).
						  "<br/><br/>Mensagem: ".$mensagem.
						  "<br/><br/><br/>Este email foi enviado por um formário de contato no site.";

			$mail->AltBody = "";

			// Envia o e-mail
			$enviado = $mail->Send();

			// Limpa os destinatários e os anexos
			$mail->ClearAllRecipients();
			$mail->ClearAttachments();

			// Exibe uma mensagem de resultado
			if ($enviado) {
				echo "ENVIADO COM SUCESSO";
			} else {
				echo $mail->ErrorInfo;
			}

	}

	function contato_residencia($plano,$nome,$cpf,$rg,$telefone, $telefone_secundario, $email, $cep, $rua, $bairro, $cidade, $complemento, $ponto_referencia,$melhor_horario){

		require("phpmailer/class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();			
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "465";
		$mail->SMTPAuth = true;
		$mail->Username = 'site@digitalonline.com.br';
		$mail->Password = '>3q75MKW_125@45874';
		//https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4P0t9mg9rlgT6uHbGyY6J4nwbmQmtKJCvvWzgrHmBFnh0EmRf6GNMvp9Zcfu6cy54X4rCpmD9rlh32WlMyk-JdNCdSSaw

		$mail->From = $email; // Seu e-mail
		$mail->FromName = $nome; // Seu nome
		
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress("marconipcd@gmail.com");
		$mail->AddAddress("contato@digitalonline.com.br");
		
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = "Nova solicitação de plano residencia - ".strtoupper($nome); 
		$mail->Body = 
					  "<br/>Plano: ".strtoupper($plano).
					  "<br/><br/>".
					  "<br/>Nome: ".strtoupper($nome).
					  "<br/>CPF: ".strtoupper($cpf).
					  "<br/>RG: ".strtoupper($rg).
					  "<br/>Telefone: ".strtoupper($telefone).
					  "<br/>Telefone secundário: ".strtoupper($telefone_secundario).
					  "<br/>email: ".strtoupper($email).
					  "<br/>CEP: ".strtoupper($cep).
					  "<br/>Rua: ".strtoupper($rua).					
					  "<br/>Bairro: ".strtoupper($bairro).
					  "<br/>Cidade: ".strtoupper($cidade).
					  "<br/>Complemento: ".strtoupper($complemento).
					  "<br/>Ponto de Referência: ".strtoupper($ponto_referencia).
					  "<br/>Melhor horário para ligar: ".strtoupper($melhor_horario).
					  
					  "<br/>--<br/><br/>Este email foi enviado por um formário de contato no site.";

		$mail->AltBody = "";

		// Envia o e-mail
		$enviado = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		// Exibe uma mensagem de resultado
		if ($enviado) {
			echo "ENVIADO COM SUCESSO";
		} else {
			echo $mail->ErrorInfo;
		}

	}

	function contato_comercial($plano,$nome,$cpf,$rg,$telefone, $telefone_secundario, $email, $cep, $rua, $numero, $bairro, $cidade, $complemento, $ponto_referencia,$melhor_horario){

		require("phpmailer/class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();			
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "465";
		$mail->SMTPAuth = true;
		$mail->Username = 'site@digitalonline.com.br';
		$mail->Password = '>3q75MKW_125@45874';
		//https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4P0t9mg9rlgT6uHbGyY6J4nwbmQmtKJCvvWzgrHmBFnh0EmRf6GNMvp9Zcfu6cy54X4rCpmD9rlh32WlMyk-JdNCdSSaw

		$mail->From = $email; // Seu e-mail
		$mail->FromName = $nome; // Seu nome
		
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress("marconipcd@gmail.com");
		$mail->AddAddress("contato@digitalonline.com.br");
		
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = "Nova solicitação de plano comercial - ".strtoupper($nome); 
		$mail->Body = 
					  "<br/>Plano: ".strtoupper($plano).
					  "<br/><br/>".
					  "<br/>Nome: ".strtoupper($nome).
					  "<br/>CPF: ".strtoupper($cpf).
					  "<br/>RG: ".strtoupper($rg).
					  "<br/>Telefone: ".strtoupper($telefone).
					  "<br/>Telefone secundário: ".strtoupper($telefone_secundario).
					  "<br/>email: ".strtoupper($email).
					  "<br/>CEP: ".strtoupper($cep).
					  "<br/>Rua: ".strtoupper($rua).
					  "<br/>Número: ".strtoupper($numero).
					  "<br/>Bairro: ".strtoupper($bairro).
					  "<br/>Cidade: ".strtoupper($cidade).
					  "<br/>Complemento: ".strtoupper($complemento).
					  "<br/>Ponto de Referência: ".strtoupper($ponto_referencia).
					  "<br/>Melhor horário para ligar: ".strtoupper($melhor_horario).
					  
					  "<br/>--<br/><br/>Este email foi enviado por um formário de contato no site.";

		$mail->AltBody = "";

		// Envia o e-mail
		$enviado = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		// Exibe uma mensagem de resultado
		if ($enviado) {
			echo "ENVIADO COM SUCESSO";
		} else {
			echo $mail->ErrorInfo;
		}

	}

	function contato_gamer($plano,$nome,$cpf,$rg,$telefone, $telefone_secundario, $email, $cep, $rua, $numero, $bairro, $cidade, $complemento, $ponto_referencia,$melhor_horario){

		require("phpmailer/class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();			
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "465";
		$mail->SMTPAuth = true;
		$mail->Username = 'site@digitalonline.com.br';
		$mail->Password = '>3q75MKW_125@45874';
		//https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4P0t9mg9rlgT6uHbGyY6J4nwbmQmtKJCvvWzgrHmBFnh0EmRf6GNMvp9Zcfu6cy54X4rCpmD9rlh32WlMyk-JdNCdSSaw

		$mail->From = $email; // Seu e-mail
		$mail->FromName = $nome; // Seu nome
		
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress("marconipcd@gmail.com");
		$mail->AddAddress("contato@digitalonline.com.br");
		
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = "Nova solicitação de plano gamer - ".strtoupper($nome); 
		$mail->Body = 
					  "<br/>Plano: ".strtoupper($plano).
					  "<br/><br/>".
					  "<br/>Nome: ".strtoupper($nome).
					  "<br/>CPF: ".strtoupper($cpf).
					  "<br/>RG: ".strtoupper($rg).
					  "<br/>Telefone: ".strtoupper($telefone).
					  "<br/>Telefone secundário: ".strtoupper($telefone_secundario).
					  "<br/>email: ".strtoupper($email).
					  "<br/>CEP: ".strtoupper($cep).
					  "<br/>Rua: ".strtoupper($rua).
					  "<br/>Número: ".strtoupper($numero).
					  "<br/>Bairro: ".strtoupper($bairro).
					  "<br/>Cidade: ".strtoupper($cidade).
					  "<br/>Complemento: ".strtoupper($complemento).
					  "<br/>Ponto de Referência: ".strtoupper($ponto_referencia).
					  "<br/>Melhor horário para ligar: ".strtoupper($melhor_horario).
					  
					  "<br/>--<br/><br/>Este email foi enviado por um formário de contato no site.";

		$mail->AltBody = "";

		// Envia o e-mail
		$enviado = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		// Exibe uma mensagem de resultado
		if ($enviado) {
			echo "ENVIADO COM SUCESSO";
		} else {
			echo $mail->ErrorInfo;
		}

	}
	function contato_empresa($plano,$nome,$cpf,$rg,$telefone, $telefone_secundario, $email, $cep, $rua, $numero, $bairro, $cidade, $complemento, $ponto_referencia,$melhor_horario){

		require("phpmailer/class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();			
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "465";
		$mail->SMTPAuth = true;
		$mail->Username = 'site@digitalonline.com.br';
		$mail->Password = '>3q75MKW_125@45874';
		//https://myaccount.google.com/lesssecureapps?pli=1&rapt=AEjHL4P0t9mg9rlgT6uHbGyY6J4nwbmQmtKJCvvWzgrHmBFnh0EmRf6GNMvp9Zcfu6cy54X4rCpmD9rlh32WlMyk-JdNCdSSaw

		$mail->From = $email; // Seu e-mail
		$mail->FromName = $nome; // Seu nome
		
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress("marconipcd@gmail.com");
		$mail->AddAddress("contato@digitalonline.com.br");
		
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = "Nova solicitação de plano empresa - ".strtoupper($nome); 
		$mail->Body = 
					  "<br/>Plano: ".strtoupper($plano).
					  "<br/><br/>".
					  "<br/>Nome: ".strtoupper($nome).
					  "<br/>CPF: ".strtoupper($cpf).
					  "<br/>RG: ".strtoupper($rg).
					  "<br/>Telefone: ".strtoupper($telefone).
					  "<br/>Telefone secundário: ".strtoupper($telefone_secundario).
					  "<br/>email: ".strtoupper($email).
					  "<br/>CEP: ".strtoupper($cep).
					  "<br/>Rua: ".strtoupper($rua).
					  "<br/>Número: ".strtoupper($numero).
					  "<br/>Bairro: ".strtoupper($bairro).
					  "<br/>Cidade: ".strtoupper($cidade).
					  "<br/>Complemento: ".strtoupper($complemento).
					  "<br/>Ponto de Referência: ".strtoupper($ponto_referencia).
					  "<br/>Melhor horário para ligar: ".strtoupper($melhor_horario).
					  
					  "<br/>--<br/><br/>Este email foi enviado por um formário de contato no site.";

		$mail->AltBody = "";

		// Envia o e-mail
		$enviado = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		// Exibe uma mensagem de resultado
		if ($enviado) {
			echo "ENVIADO COM SUCESSO";
		} else {
			echo $mail->ErrorInfo;
		}

	}
	function me_liga($nome,$telefone){

		require("phpmailer/class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();			
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->Port = "465";
		$mail->SMTPAuth = true;
		$mail->Username = 'site@digitalonline.com.br';
		$mail->Password = '>3q75MKW_125@45874';
		
		$mail->From = $email; // Seu e-mail
		$mail->FromName = $nome; // Seu nome
		
		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress("marconipcd@gmail.com");
		$mail->AddAddress("contato@digitalonline.com.br");
		
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = "Me Liga - ".strtoupper($nome); 
		$mail->Body = 					  
					  "<br/>Nome: ".strtoupper($nome).
					  "<br/>Telefone: ".strtoupper($telefone).
					  
					  "<br/>--<br/><br/>Este email foi enviado por um formário de contato no site.";

		$mail->AltBody = "";

		// Envia o e-mail
		$enviado = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		// Exibe uma mensagem de resultado
		if ($enviado) {
			echo "ENVIADO COM SUCESSO";
		} else {
			echo $mail->ErrorInfo;
		}

	}