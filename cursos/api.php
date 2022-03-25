
<?php

if(isset($_REQUEST['procurar_cliente_cpf']) && isset($_REQUEST['cpf'])){
    procurar_cliente_cpf($_REQUEST['cpf']);
}

if(isset($_REQUEST['cadastrarCliente']) 
&& isset($_REQUEST['cpfAluno'])
&& isset($_REQUEST['nomeAluno']) 
&& isset($_REQUEST['dataNascimento']) 
&& isset($_REQUEST['endereco']) 
&& isset($_REQUEST['numero'])
&& isset($_REQUEST['bairro']) 
&& isset($_REQUEST['cidade']) 
&& isset($_REQUEST['fone'])
&& isset($_REQUEST['email']) 
&& isset($_REQUEST['codCadastroExistente'])
&& isset($_REQUEST['horario'])
&& isset($_REQUEST['curso'])){
    
    cadastrarCliente($_REQUEST['codCadastroExistente'],$_REQUEST['cpfAluno'],$_REQUEST['nomeAluno'],
    $_REQUEST['dataNascimento'],$_REQUEST['endereco'], $_REQUEST['numero'],
    $_REQUEST['bairro'],$_REQUEST['cidade'], $_REQUEST['fone'], $_REQUEST['email'], $_REQUEST['horario'], $_REQUEST['curso']);

}

function cadastrarCliente($codClienteExistente,$txtCpfAluno,$txtNomeAluno,$txtDataNascimento,$txtEndereco,$txtNumero,$txtBairro,
    $txtCidade,$txtFone,$txtEmail,$cbHorario, $txtCurso){
 

    $con = new mysqli("179.127.36.110", "marconi", "idigital123mc", "db_opus");
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    if($codClienteExistente != 0){
        $queryUpdate = sprintf("UPDATE clientes c SET c.ALUNO = 'SIM', c.CURSO='%s', c.HORARIO_CURSO ='%s', c.TITULAR_CONTRATO = '%s' 
        WHERE c.ID = '%s'",
        $txtCurso, $cbHorario, $codClienteExistente,$codClienteExistente);

        $qryUpdate = mysqli_query($con, $queryUpdate);
    }else{

        $queryEndereco = sprintf("INSERT INTO enderecos_principais (CEP, ENDERECO, NUMERO,COMPLEMENTO,BAIRRO, CIDADE,UF, PRINCIPAL,REFERENCIA) VALUES
        ('55150000', '%s', '%s', 'CASA', '%s', '%s','PE','1','REF')",$txtEndereco,$txtNumero,$txtBairro,$txtCidade);

        $qryEnd = mysqli_query($con, $queryEndereco);
        $cod_endereco = $con->insert_id;

        $query = sprintf("INSERT INTO clientes (             
            CATEGORIAS_ID, 
            EMPRESA_ID, 
            STATUS_2, 
            TIPO_PESSOA, 
            DOC_CPF_CNPJ, 
            NOME_RAZAO, 
            CONTATO, 
            DATA_NASCIMENTO, 
            DDD_FONE1,
            TELEFONE1, 
            DATA_CADASTRO,  
            DATA_ALTERACAO,
            EMAIL, 
            ORIGEM,  
            ENDERECO_ID, 
            OPERADOR_CADASTRO,
            BLACK_LIST,
            ALUNO,
            CURSO,
            HORARIO_CURSO,
            TITULAR_CONTRATO) VALUES (
                 1, 1, 'ATIVO', 'Pessoa Física', '%s','%s', '%s', '%s', 
                '81', '%s', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP, '%s', 'SITE','%s','SITE','NAO','SIM','%s','%s','%s');", $txtCpfAluno,$txtNomeAluno,$txtNomeAluno,
                $txtDataNascimento,$txtFone,$txtEmail,$cod_endereco, $txtCurso, $cbHorario, $codClienteExistente);

            
        $qryLista = mysqli_query($con, $query);
        $cod_cliente = $con->insert_id;

        $queryAtualizarEndereco = sprintf("UPDATE enderecos_principais ep SET ep.CLIENTES_ID = '%s' WHERE ep.ID = '%s'",$cod_cliente, $cod_endereco);
        $qryAtualizarEndereco = mysqli_query($con, $queryAtualizarEndereco);
    }


    echo "OK";
}

function procurar_cliente_cpf($cpf){
    $con = new mysqli("179.127.36.110", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT ac.CLIENTES_ID,  ac.ID AS COD_CONTRATO, c.ID, c.NOME_RAZAO, c.DATA_NASCIMENTO, ep.CEP, ep.ENDERECO, ep.NUMERO, ep.COMPLEMENTO, 
    ep.BAIRRO, ep.CIDADE, ep.UF, c.TELEFONE1, c.EMAIL
    FROM clientes c 
    LEFT JOIN acesso_cliente ac ON c.ID = ac.CLIENTES_ID 
    LEFT JOIN enderecos_principais ep ON c.ENDERECO_ID = ep.ID 
    WHERE c.EMPRESA_ID =1 AND c.DOC_CPF_CNPJ LIKE '%s'", $cpf);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    $aluno = json_encode($vetor);

    echo $aluno;
}




if (isset($_REQUEST['cadastrar_aluno']) && isset($_REQUEST['escola']) && isset($_REQUEST['curso']) && isset($_REQUEST['horario']) && isset($_REQUEST['cpf']) &&
    isset($_REQUEST['nome']) && isset($_REQUEST['endereco']) && isset($_REQUEST['bairro']) && isset($_REQUEST['telefone']) && isset($_REQUEST['email']) &&
    isset($_REQUEST['serie']) && isset($_REQUEST['usuario']) && isset($_REQUEST['data_nascimento'])) {

    cadastrar_aluno(
        $_REQUEST['nome'],
        $_REQUEST['endereco'],
        $_REQUEST['bairro'],
        $_REQUEST['cpf'],
        $_REQUEST['telefone'],
        $_REQUEST['email'],
        $_REQUEST['escola'],
        $_REQUEST['curso'],        
        $_REQUEST['horario'],
        $_REQUEST['serie'],
        $_REQUEST['usuario'],
        $_REQUEST['data_nascimento']
    );    
}
if(isset($_REQUEST['atualizar_aluno']) && isset($_REQUEST['codAluno']) && isset($_REQUEST['escola']) && isset($_REQUEST['curso']) && isset($_REQUEST['frequencia']) &&
isset($_REQUEST['horario']) && isset($_REQUEST['cpf']) && isset($_REQUEST['nome']) && isset($_REQUEST['endereco']) && isset($_REQUEST['bairro']) && isset($_REQUEST['telefone']) &&
isset($_REQUEST['email']) && isset($_REQUEST['serie']) && isset($_REQUEST['usuario']) && isset($_REQUEST['data_nascimento'])){

    atualizar_aluno($_REQUEST['codAluno'], $_REQUEST['nome'], $_REQUEST['endereco'], $_REQUEST['bairro'], $_REQUEST['cpf'],$_REQUEST['telefone'],$_REQUEST['email'],
    $_REQUEST['escola'], $_REQUEST['curso'], $_REQUEST['frequencia'],$_REQUEST['horario'],$_REQUEST['serie'],$_REQUEST['usuario'],$_REQUEST['data_nascimento']);

    
}
if(isset($_REQUEST['verificar_limite_horario']) && isset($_REQUEST['escola']) && isset($_REQUEST['horario'])){
    verificarLimitePorHorario($_REQUEST['escola'], $_REQUEST['horario']);
}

function checar_horario($escola, $horario){


    //Qual o limite desta escola
    $escola = buscarEscola($escola);
    $limite = 0;
    $qtd = 0;

    if($horario == "89SS"){
        $limite = $escola[0]->LIMITE_89_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"08:00h as 09:00h (Segunda a sexta-feira)");
    }
    if($horario == "910SS"){
        $limite = $escola[0]->LIMITE_910_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"09:00h as 10:00h (Segunda a sexta-feira)");
    }
    if($horario == "1011SS"){
        $limite = $escola[0]->LIMITE_1011_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"10:00h as 11:00h (Segunda a sexta-feira)");
    }
    if($horario == "1112SS"){
        $limite = $escola[0]->LIMITE_1112_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"11:00h as 12:00h (Segunda a sexta-feira)");
    }
    if($horario == "1415SS"){
        $limite = $escola[0]->LIMITE_1415_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"14:00h as 15:00h (Segunda a sexta-feira)");
    }
    if($horario == "1516SS"){
        $limite = $escola[0]->LIMITE_1516_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"15:00h as 16:00h (Segunda a sexta-feira)");
    }
    if($horario == "1617SS"){
        $limite = $escola[0]->LIMITE_1617_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"16:00h as 17:00h (Segunda a sexta-feira)");
    }
    if($horario == "1718SS"){
        $limite = $escola[0]->LIMITE_1718_SS;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"17:00h as 18:00h (Segunda a sexta-feira)");
    }
    if($horario == "810S"){
        $limite = $escola[0]->LIMITE_810_S;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"08:00h as 10:00h (Sábados)");
    }
    if($horario == "1012S"){
        $limite = $escola[0]->LIMITE_1012_S;
        $qtd = verificarLimitePorHorario1($escola[0]->NOME,"10:00h as 12:00h (Sábados)");
    }

    if($qtd < $limite){
        echo "SIM";
    }else{
        echo "NAO";
    }
    
}

function atualizar_aluno($codAluno, $nome, $endereco, $bairro, $cpf, $fone, $email, $escola, $curso, $frequencia, $horario, $serie, $usuario, $data_nascimento) {

    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf(
        "INSERT INTO alunos (ID, NOME, ENDERECO, BAIRRO, CPF, TELEFONE, EMAIL, ESCOLA, CURSO, 
    FREQUENCIA, HORARIO, SERIE, OPERADOR_CADASTRO, DATA_CADASTRO, STATUS, DATA_NASCIMENTO) VALUES 
    (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', CURRENT_TIMESTAMP, 'ATIVO','%s')",
        $nome,
        $endereco,
        $bairro,
        $cpf,
        $fone,
        $email,
        $escola,
        $curso,
        $frequencia,
        $horario,
        $serie,
        $usuario,
        $data_nascimento
    );

    $result = mysqli_query($con, $query);
}
function verificarLimitePorHorario($escola, $horario){
    
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM alunos a WHERE a.STATUS LIKE 'ATIVO' AND a.ESCOLA LIKE '%s' AND a.HORARIO LIKE '%s'",$escola, $horario);

    $result = mysqli_query($con, $query);
    $rowcount=mysqli_num_rows($result);

    echo   $rowcount;
}
function verificarLimitePorHorario1($escola, $horario){
    
    
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM alunos a WHERE a.STATUS LIKE 'ATIVO' AND a.ESCOLA LIKE '%s' AND a.HORARIO LIKE '%s'",$escola, $horario);
    

    $result = mysqli_query($con, $query);
    $rowcount=mysqli_num_rows($result);

    return $rowcount;
}
function cadastrar_aluno($nome, $endereco, $bairro, $cpf, $fone, $email, $escola, $curso, $horario, $serie, $usuario, $data_nascimento) {

    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf(
        "INSERT INTO alunos (ID, NOME, ENDERECO, BAIRRO, CPF, TELEFONE, EMAIL, ESCOLA, CURSO, HORARIO, SERIE, OPERADOR_CADASTRO, DATA_CADASTRO, STATUS, DATA_NASCIMENTO) 
        VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', CURRENT_TIMESTAMP, 'ATIVO','%s')",
        $nome,
        $endereco,
        $bairro,
        $cpf,
        $fone,
        $email,
        $escola,
        $curso,        
        $horario,
        $serie,
        $usuario,
        $data_nascimento
    );

    $result = mysqli_query($con, $query);
}

function buscarAlunosFiltro($horario)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM alunos a WHERE a.STATUS LIKE 'ATIVO' and a.HORARIO LIKE '%s' ORDER BY a.NOME", $horario);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $aluno = json_decode(json_encode($vetor));
}

function buscarAluno($id)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM alunos a WHERE a.STATUS LIKE 'ATIVO' and a.ID = '%s'", $id);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $aluno = json_decode(json_encode($vetor));
}


function buscarEscolas(){
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM escolas e ORDER BY e.NOME");

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $escolas = json_decode(json_encode($vetor));
}

function buscarEscola($escola){
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM escolas e WHERE e.NOME LIKE '%s'",$escola);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $escolas = json_decode(json_encode($vetor));
}

function buscarEscolaPorCod($escola){
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM escolas e WHERE e.ID = '%s'",$escola);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $escolas = json_decode(json_encode($vetor));
}

function buscarAlunos()
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT *  FROM alunos a WHERE a.STATUS LIKE 'ATIVO' ORDER BY a.NOME");

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $alunos = json_decode(json_encode($vetor));
}

function gravarNnumeroGerenciaNet($codBoleto, $nNumeroGerenciaNet, $transacao)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("UPDATE contas_receber SET N_NUMERO_GERENCIANET = '%s', TRANSACAO_GERENCIANET = '%s'  
     WHERE ID =%s;", $nNumeroGerenciaNet, $transacao, $codBoleto);
    $qryLista = mysqli_query($con, $query);

    echo $qryLista;
}

function fazerLogin($usuario, $senha)
{

    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT ID,NOME,USERNAME FROM `usuario` WHERE USERNAME LIKE '%s' AND 
     PASSWORD_2 LIKE MD5('%s')", $usuario, $senha);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $cliente = json_decode(json_encode($vetor));
}

function fazerLoginPorContrato($codUsuario)
{


    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT ID,NOME,USERNAME FROM `usuario` WHERE ID = '%s'", $codUsuario);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $cliente = json_decode(json_encode($vetor));
}

function buscarContratos($codCliente)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT ac.ID, pa.NOME  FROM acesso_cliente ac, planos_acesso pa WHERE pa.ID = ac.PLANOS_ACESSO_ID AND ac.CLIENTES_ID = '%s' AND ac.STATUS_2 NOT LIKE 'ENCERRADO'", $codCliente);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $contratos = json_decode(json_encode($vetor));
}

function selecionarContrato($codContrato)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT ac.ID, ep.CEP, ep.ENDERECO, ep.BAIRRO, ep.CIDADE, ep.NUMERO, pa.NOME AS PLANO, ca.NOME AS CONTRATO, ac.DATA_INSTALACAO, ac.STATUS_2 AS STATUS_2, ca.CATEGORIA AS CATEGORIA, ca.NOME AS NOME_CONTRATO, ac.CLIENTES_ID FROM acesso_cliente ac, enderecos_principais ep, planos_acesso pa, contratos_acesso ca  WHERE ac.ID = '%s' AND ac.ENDERECO_ID = ep.ID AND pa.ID = ac.PLANOS_ACESSO_ID AND ca.ID = ac.CONTRATOS_ACESSO_ID", $codContrato);

    $qryLista = mysqli_query($con, $query);
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $contrato_selecionado = json_decode(json_encode($vetor));
}

function buscarBoletos($codContrato)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $rNovo = "^" . $codContrato . "/[0-9]{2}-[0-9]{2}/[0-9]{2}";
    $rBoletoInst = "^" . $codContrato . "-OS[0-9]{5}";
    $rBoletoProduto = "^" . $codContrato . "/PRORATA";


    $query = sprintf("select ID, N_DOC, VALOR_TITULO, DATA_VENCIMENTO, BLOQUEADO,STATUS_2, N_NUMERO_GERENCIANET from contas_receber cr where 
     cr.status_2 ='ABERTO' and cr.n_doc REGEXP '%s' OR 
     cr.status_2 ='ABERTO' and cr.n_doc REGEXP '%s'  OR 
     cr.status_2 ='ABERTO' and cr.n_doc REGEXP '%s'", $rNovo, $rBoletoInst, $rBoletoProduto);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $boletos = json_decode(json_encode($vetor));
}
function buscarAtendimentos($codContrato)
{
    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT c.ID,c.STATUS, c.DATA_AGENDADO, s.NOME AS SETOR, c.OPERADOR  FROM crm c, setores s  WHERE c.CONTRATO_ID = '%s' AND s.ID = c.SETOR_ID ORDER BY c.ID DESC", $codContrato);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $atendimentos = json_decode(json_encode($vetor));
}
function buscarIndicacoes($codCliente)
{

    $con = new mysqli("172.17.0.11", "marconi", "idigital123mc", "db_opus");

    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    $query = sprintf("SELECT c.NOME_RAZAO, c.DOC_CPF_CNPJ, ic.STATUS_2, ic.DATA_CADASTRO FROM indicacoes_cliente ic, clientes c 
    WHERE c.ID = ic.COD_CLIENTE_INDICADO AND ic.COD_CLIENTE_QUE_INDICOU = %s", $codCliente);

    $qryLista = mysqli_query($con, $query);
    $vetor = null;
    while ($resultado = mysqli_fetch_assoc($qryLista)) {
        $vetor[] = array_map('utf8_encode', $resultado);
    }

    return $indicacoes = json_decode(json_encode($vetor));
}

function calcularJuros($vlr, $dataVencimento, $codBoleto)
{


    $oneDay = 24 * 60 * 60 * 1000;
    $dataHoje = new DateTime();
    $dataVenc = new DateTime($dataVencimento);
    $intervalo = $dataHoje->diff($dataVenc);
    $dias = $intervalo->d;

    if ($dataVenc < $dataHoje && $dias >= 2) {

        $juros = (float)0.00;
        $multa = (float)2.00;

        $jurosTotais = (float)0.00;

        $juros = (float)0.03333 * $dias;

        $jurosTotais = (float)$juros + (float)$multa;

        $vlr = str_replace(".", "", $vlr);
        $vlr = str_replace(",", ".", $vlr);

        $jurosFinal = (((float)$vlr * $jurosTotais) / 100);
        $vlrAtualizado =  (float)$vlr + (float)$jurosFinal;
        $vlrAtualizado1 = number_format($vlrAtualizado, 2);
        $vlrAtualizado2 =   str_replace(".", ",", $vlrAtualizado1);

        return $vlrAtualizado2;
    } else {
        return $vlr;
    }
}

function primeiro_segundo_nome($nome)
{

    $str = $nome;
    $res = explode(" ", $str);
    return $res[0] . ' ' . $res[1];
}

function esconderNome($nome)
{

    $str = $nome;
    $res = substr($str, 0, 10);
    return $res . '*****';
}
function   esconderCPF($cpf)
{

    $str = $cpf;
    $res = substr($str, 0, 8);
    return $res . '*****';
}
function esconderTelefone($telefone)
{

    $str = $telefone;
    $res = substr($str, 0, 6);
    return $res . '*****';
}
function esconderEMAIL($email)
{

    if ($email != null && strlen($email) > 0) {
        $str = $email;
        $res = explode("@", $str);
        return substr($res[0], 0, 4) . '*****@' . $res[1];
    }
}

function calcularIdade($data){
    $idade = 0;
    $data_nascimento = date('Y-m-d', strtotime($data));
    list($anoNasc, $mesNasc, $diaNasc) = explode('-', $data_nascimento);
    
       $idade      = date("Y") - $anoNasc;
       if (date("m") < $mesNasc){
           $idade -= 1;
       } elseif ((date("m") == $mesNasc) && (date("d") <= $diaNasc) ){
           $idade -= 1;
       }
    
       return $idade;
}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

?>