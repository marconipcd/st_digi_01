<?php

    if(isset($_REQUEST['fazerLogin']) && isset($_REQUEST['cpf_cnpj'])){
     
      fazerLogin($_REQUEST['cpf_cnpj']);
    }


    if(isset($_REQUEST['buscarContratos'])  && isset($_REQUEST['codCliente'])){
      buscarContratos($_REQUEST['codCliente']);
    }

    if(isset($_REQUEST['buscarBoletos']) && isset($_REQUEST['codContrato'])){
      buscarBoletos($_REQUEST['codContrato']);
    }

    if(isset($_REQUEST['buscarAtendimentos']) && isset($_REQUEST['codContrato'])){
        buscarAtendimentos($_REQUEST['codContrato']);
    }

    if(isset($_REQUEST['selecionarContrato']) && isset($_REQUEST['codContrato'])){
      selecionarContrato($_REQUEST['codContrato']);
    }

    if(isset($_REQUEST['buscarHistoricoAcesso']) && isset($_REQUEST['codContrato'])){
        buscarHistoricoAcesso($_REQUEST['codContrato']);
    }

    if(isset($_REQUEST['solicitarBoleto']) && isset($_REQUEST['codBoleto'])){
        solicitarBoleto($_REQUEST['codBoleto']);
    }

    function solicitarBoleto($codBoleto){
            require("phpmailer/class.phpmailer.php");

			// Inicia a classe PHPMailer
			$mail = new PHPMailer();
			// $mail->SMTPDebug = true;

			// Define os dados do servidor e tipo de conexão
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->IsSMTP(); // Define que a mensagem será SMTP
			$mail->SMTPSecure = 'ssl';

			$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
			$mail->Port = "465";
			$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
			$mail->Username = 'site@digitalonline.com.br'; // Usuário do servidor SMTP
			$mail->Password = 'sitedigital_enviar'; // Senha do servidor SMTP

			// Define o remetente
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->From = $email; // Seu e-mail
			$mail->FromName = "CENTRAL"; // Seu nome
			// $mail->AddReplyTo($email, $nome); 

			// Define os destinatário(s)
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->AddAddress("contato@digitalonline.com.br");
			//$mail->AddAddress("marketing@digitalonline.com.br");
			//$mail->AddAddress("marconi@digitalonline.com.br");
			
			// Define os dados técnicos da Mensagem
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

			// Define a mensagem (Texto e Assunto)
			// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			$mail->Subject  = "SOLICITACAO DE BOLETO"; // Assunto da mensagem
			$mail->Body = "Boleto: ".$codBoleto;

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

    function buscarAtendimentos($codContrato){
        $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $query = sprintf("SELECT c.ID,c.STATUS, c.DATA_AGENDADO, s.NOME AS SETOR, c.OPERADOR  FROM crm c, setores s  WHERE c.CONTRATO_ID = '%s' AND s.ID = c.SETOR_ID ORDER BY c.ID DESC",$codContrato);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        echo json_encode($vetor);
    }
    
    function selecionarContrato($codContrato){
        $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $query = sprintf("SELECT ac.ID, ep.CEP, ep.ENDERECO, ep.BAIRRO, ep.CIDADE, ep.NUMERO, pa.NOME AS PLANO, ca.NOME AS CONTRATO, ac.DATA_INSTALACAO, ac.STATUS_2 AS STATUS_2, ca.CATEGORIA AS CATEGORIA FROM acesso_cliente ac, enderecos_principais ep, planos_acesso pa, contratos_acesso ca  WHERE ac.ID = '%s' AND ac.ENDERECO_ID = ep.ID AND pa.ID = ac.PLANOS_ACESSO_ID AND ca.ID = ac.CONTRATOS_ACESSO_ID",$codContrato);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        echo json_encode($vetor);
    }
    
    function fazerLogin($cpf_cnpjusuario){
        $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
      
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $query = sprintf("SELECT ID, NOME_RAZAO, DOC_CPF_CNPJ, DDD_FONE1, TELEFONE1, EMAIL FROM `clientes` WHERE EMPRESA_ID = 1 AND `DOC_CPF_CNPJ` LIKE '%s'",$cpf_cnpjusuario);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        echo json_encode($vetor);
    }


    function buscarContratos ($codCliente){
        $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $query = sprintf("SELECT ac.ID, pa.NOME  FROM acesso_cliente ac, planos_acesso pa WHERE pa.ID = ac.PLANOS_ACESSO_ID AND ac.CLIENTES_ID = '%s' AND ac.STATUS_2 NOT LIKE 'ENCERRADO'",$codCliente);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        echo json_encode($vetor);
    }

    function buscarBoletos($codContrato){
       $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

        $rNovo = "^".$codContrato."/[0-9]{2}-[0-9]{2}/[0-9]{2}";
        $rBoletoInst = "^".$codContrato."-OS[0-9]{5}";
        $rBoletoProduto = "^".$codContrato."/PRORATA";
      

        $query = sprintf("select ID, N_DOC, VALOR_TITULO, DATA_VENCIMENTO, BLOQUEADO,STATUS_2 from contas_receber cr where cr.status_2 ='ABERTO' and cr.n_doc REGEXP '%s' OR cr.status_2 ='ABERTO' and cr.n_doc REGEXP '%s'  OR cr.status_2 ='ABERTO' and cr.n_doc REGEXP '%s' ",$rNovo, $rBoletoInst, $rBoletoProduto);
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        echo json_encode($vetor);
    }

    function buscarHistoricoAcesso($codContrato){
        $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");
        
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
        //$codContrato = '1892';
        $query = "select DATE_FORMAT(acctstarttime,'%M/%Y') as mes , acctinputoctets, acctoutputoctets, 
        username from radacct r where r.username LIKE '".$codContrato."' AND r.acctoutputoctets > 0 group by 
        DATE_FORMAT(acctstarttime,'%M/%Y') order by acctstarttime DESC LIMIT 0,12";
    
        $qryLista = mysqli_query($con, $query);    
        while($resultado = mysqli_fetch_assoc($qryLista)){
            $vetor[] = array_map('utf8_encode', $resultado); 
        }    

        echo json_encode(array_reverse($vetor));
    }

?>