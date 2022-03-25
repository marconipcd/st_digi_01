
$.support.cors=true;

var login = new Vue({
    el:'#app',
    
    data:{
        mostrar_erro_login: false,
        mostrar_erro_login_null: false,
        mostrarLogin: true,
        cliente_selecionado:[],
        contratos:[],
        contrato_selecionado:[],
        faturas:[],
        atendimentos:[],
        consumo:[],
        contract_sel:''
    },
    filters: {
        primeiro_segundo_nome: function (value) {
          if (!value) return ''
          var str = value.toString();
          var res = str.split(" ");
          return res[0] + ' ' + res[1];
        },

        esconderNome: function (value) {
            if (!value) return ''
            var str = value.toString();
            var res = str.substr(0, 10);
            return res + '*****';
        },
        esconderCPF: function (value) {
            if (!value) return ''
            var str = value.toString();
            var res = str.substr(0, 8);
            return res + '*****';
        },
        esconderTelefone: function (value) {
            if (!value) return ''
            var str = value.toString();
            var res = str.substr(0, 6);
            return res + '*****';
        },
        esconderEMAIL: function (value) {
            if (!value) return ''
            var str = value.toString();
            var res = str.split("@");
            return res[0].substr(0,4) + '*****@' + res[1];
        },
        formatarData: function (value) {
            if (!value) return ''
            var str = value.toString();
            var res = str.split("-");
            return res[2] + '/' +res[1]+ '/' +res[0];
        },
        formatarVlrBra: function (value) {
            if (!value) return ''
            var str = value.toString();
            var res = str.replace(".", "");
            return res;
        }

    },

    methods:{
                
        fazerLogin(){
           
            var cpf_cnpj = $("#cpf-cnpj").val();
            if(cpf_cnpj != ''){

                login.$data.mostrar_erro_login_null = false;
                 
                $.ajax({
                    type:'post',
                    dataType:'json',
                    data: {
                        fazerLogin: true,
                        cpf_cnpj: cpf_cnpj
                    },
                    url: 'backend/api.php',
                    success: function(r){
                    
                        if(r != null && r.length > 0){
                            //console.log(r);

                            login.$data.cliente_selecionado=r;
                            login.buscarContratos();                        
                            
                            login.$data.mostrarLogin=false;
                            login.$data.mostrar_erro_login = false; 
                        }else{
                            login.$data.mostrarLogin=true;
                            login.$data.mostrar_erro_login = true; 
                        }
                    }
                });
            }else{
                login.$data.mostrar_erro_login_null = true;
                login.$data.mostrar_erro_login = false; 
            }
        },

        gerarGraficoConsumo(){
            //console.log(login.$data.contrato_selecionado[0].ID);
            $.ajax({
                type:'post',
                dataType:'json',
                data: {
                    buscarHistoricoAcesso: true,
                    codContrato: login.$data.contrato_selecionado[0].ID
                },
                url: 'backend/api.php',
                success: function(r){
                    
                    if(r != null && r.length > 0){
                        
                            login.$data.consumo = r;
                            var datas = [];
                            var downloads = [];
                            var uploads = [];

                            var i = 0;

                            while (login.$data.consumo[i]) {
                                datas.push(login.$data.consumo[i].mes);   

                                var up = login.$data.consumo[i].acctinputoctets / 1000000000;
                                var dow = login.$data.consumo[i].acctoutputoctets / 1000000000;
                                
                                downloads.push(parseFloat(dow.toFixed(2)));   
                                uploads.push(parseFloat(up.toFixed(2)));   

                                i++;
                            }

                            //console.log(downloads);

                            var ctx = document.getElementById("myChart");
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'bar',
                                // The data for our dataset
                                data: {
                                   
                                    labels: datas,
                                    datasets: [{  
                                        label: 'download(GB)',                      
                                        backgroundColor: 'rgb(91, 169, 214)',
                                        borderColor: 'rgb(28, 114, 154)',
                                        data: downloads,
                                    },{  
                                        label: 'upload(GB)',                      
                                        backgroundColor: 'rgb(216, 37, 16)',
                                        borderColor: 'rgb(122, 24, 13)',
                                        data: uploads,
                                    }]
                                },
                               
                                // Configuration options go here
                                options: {
                                    elements: {
                                        line: {
                                            tension: 0, // disables bezier curves
                                        }
                                    }
                                }
                            });
                    }
                }
            });

            
        },

        buscarContratos(){
            var codCliente = login.$data.cliente_selecionado[0].ID;
            
            $.ajax({
                type:'post',
                dataType:'json',
                data: {
                    buscarContratos: true,
                    codCliente: codCliente
                },
                url: 'backend/api.php',
                success: function(r){
                   
                    if(r != null && r.length > 0){
                        login.$data.contratos = r;
                        login.$data.contract_sel = login.$data.contratos[0].ID;
                        login.selecionarContrato();
                        
                    }
                }
            });
        },

        selecionarContrato(){
            var cod = login.$data.contract_sel;
            console.log(login.$data.contract_sel);
            $.ajax({
                type:'post',
                dataType:'json',
                data: {
                    selecionarContrato: true,
                    codContrato: cod
                },
                url: 'backend/api.php',
                success: function(r){
                   
                    if(r != null && r.length > 0){
                        login.$data.contrato_selecionado = r;     
                        login.buscarBoletos(login.$data.contrato_selecionado[0].ID);     
                        login.buscarAtendimentos(login.$data.contrato_selecionado[0].ID); 
                        login.gerarGraficoConsumo();
                    }
                }
            });
        },

        buscarAtendimentos(codContrato){

            $.ajax({
                type:'post',
                dataType:'json',
                data: {
                    buscarAtendimentos: true,
                    codContrato: codContrato
                },
                url: 'backend/api.php',
                success: function(r){
                   
                    if(r != null && r.length > 0){
                        login.$data.atendimentos = r;          
                    }
                }
            });
        },

        solicitarBoleto(codBoleto){

            //console.log("teste");
            $.ajax({
                type:'post',
                dataType:'json',
                data: {
                    solicitarBoleto: true,
                    codBoleto: codBoleto
                },
                url: 'backend/api.php',
                success: function(r){
                   console.log(r);
                   // if(r != null && r.length > 0){
                   //     login.$data.atendimentos = r;          
                   // }
                }
            });
        },

        buscarBoletos(codContrato){

            login.$data.faturas = [];
          
           
            $.ajax({
                type:'post',
                dataType:'json',
                data: {
                    buscarBoletos: true,
                    codContrato: codContrato
                },
                url: 'backend/api.php',
                success: function(r){
                   
                    if(r != null && r.length > 0){
                        login.$data.faturas = r;          
                    }
                }
            });
        },

        pagar(cod, valor){
           // console.log('teste');
            $.ajax({  
                dataType:'text',
                type:'POST',              
                data: {
                    boleto: cod,
                    codContrato: login.$data.contrato_selecionado[0].ID,
                    valorFatura:valor,
                    nomeCliente: login.$data.cliente_selecionado[0].NOME_RAZAO,
                    dddTelefone: login.$data.cliente_selecionado[0].DDD_FONE1,
                    telefone: login.$data.cliente_selecionado[0].TELEFONE1,
                    emailCliente: login.$data.cliente_selecionado[0].EMAIL,
                    endereco: login.$data.contrato_selecionado[0].ENDERECO,
                    numero: login.$data.contrato_selecionado[0].NUMERO,
                    cidade: login.$data.contrato_selecionado[0].CIDADE,
                    cep: login.$data.contrato_selecionado[0].CEP
                },
                url: 'backend/pagseguro.php',
                success: function(r){                  
                   // console.log(r);
                    PagSeguroLightbox({
                        code: r
                        }, {
                        success : function(transactionCode) {
                            //console.log("Processo concluído!");
                            login.selecionarContrato(login.$data.contrato_selecionado[0].ID);
                        },
                        abort : function() {
                            //console.log("Processo abortado!");
                        }
                    });
                   
                   //window.open('https://pagseguro.uol.com.br/v2/checkout/payment.html?code='+r,'_blank');
                }
            });

        },

        mostrarCartao(){
            
            //var cpf_cnpj = login.$data.cliente_selecionado[0].DOC_CPF_CNPJ;

            //console.log(login.$data.contrato_selecionado[0].CATEGORIA);
            if(login.$data.contrato_selecionado[0].CATEGORIA == "CORPORATIVO"){
                return false;
            }else{
                return true;
            }
        },     

        isVencido(dataVencimento){
            //var strData = "28/02/2015";
            var partesData = dataVencimento.split("-");
            var data = new Date(partesData[0], partesData[1] - 1, partesData[2]);
            if(data < new Date()){
                return true;
            }else{
                return false;
            }
            
        },

        calcularJuros(vlr, dataVencimento, codBoleto){
            
            var oneDay = 27*60*60*1000;

            var oneDay = 24*60*60*1000; 
            var partesData = dataVencimento.split("-");
            var firstDate = new Date(partesData[0], partesData[1] -1, partesData[2]);
            var secondDate = new Date();
            var dias = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime())/(oneDay)));            
            
            if(firstDate < new Date() && dias >= 2){
                
                
                var juros = 0.00;
                var multa = 2.00;
                        
                var jurosTotais = 0.00;
               
                juros = 0.03333 * dias;
                    
                jurosTotais = juros + multa;
                
                vlr = vlr.replace(".","");
                vlr = vlr.replace(",",".");

                
                var jurosFinal = parseFloat((vlr * jurosTotais) / 100).toFixed(2);
                var vlrAtualizado =  parseFloat(parseFloat(vlr) + parseFloat(jurosFinal)).toFixed(2);
                var vlrAtualizado2 =  String(vlrAtualizado).replace(".",",");
                
                console.log(vlrAtualizado);
                //console.log();
              

                return vlrAtualizado2;
            }else{
                return vlr;
            }
        },

        mostrarLightBox(){

            if(login.$data.cliente_selecionado[0].DOC_CPF_CNPJ == '26569027700'){
                return true;   
            }else{
                return false;
            }
        },

        gerenciaNetLightBox(codBoleto, venc, vlr){
            
            var url = 'https://digitalonline.com.br/2via/visualizarBoletoGerencia.php?url=https://visualizacao.gerencianet.com.br/emissao/177311_52_NAELO1/A4XB-177311-123673678-CHODRA8';
                                var lightbox = lity(url);

            var descricao = 'Boleto';           
            var valor = vlr.replace(",", "").replace(".", "");
            //console.log(valor);
            var quantidade = '1';
            var nome_cliente = login.$data.cliente_selecionado[0].NOME_RAZAO;            
            var cpf = login.$data.cliente_selecionado[0].DOC_CPF_CNPJ;
            var telefone = login.$data.cliente_selecionado[0].DDD_FONE1+""+login.$data.cliente_selecionado[0].TELEFONE1;
            var categoria = login.$data.contrato_selecionado[0].CATEGORIA;
            var email = login.$data.cliente_selecionado[0].EMAIL;
            

            console.log(categoria);

            var str = venc.toString();
            var res = str.split("-");
            var vencimento = res[2] + '/' +res[1]+ '/' +res[0];

            //console.log(vencimento);

            $.ajax({
                url: "boleto/emitir_boleto.php",
                data:{descricao:descricao,
                    valor:valor,
                    quantidade:quantidade,
                    nome_cliente:nome_cliente,
                    cpf:cpf,
                    telefone:telefone,
                    vencimento:vencimento,
                    codBoleto:codBoleto,
                    tipoPessoa:categoria,
                    email:email
                },
                type:'post',
                dataType:'json',
		        success: function(resposta){
                    //  $("#myModal").modal('hide');
                      //console.log(resposta)
                    if(resposta.code == 200){
                                    //$("#boleto").removeClass("hide");
                                    //"code":200,"data":{"barcode":"03399.32766 55400.000000 60348.101027 6 69020000009000","link":"https:\/\/visualizacaosandbox.gerencianet.com.br\/emissao\/59808_79_FORAA2\/A4XB-59808-60348-HIMA4","expire_at":"2016-08-30","charge_id":76777,"status":"waiting","total":9000,"payment":"banking_billet"-->
                               //     var html = "<th>"+resposta.data.charge_id+"</th>"
                                //        html+= "<th>"+resposta.data.barcode+"</th>"
                                //        html+= "<th>"+resposta.data.link+"</th>"
                                //        html+= "<th>"+resposta.data.expire_at+"</th>"
                                //        html+= "<th>"+resposta.data.status+"</th>"
                                //        html+= "<th>"+resposta.data.total+"</th>"
                                //        html+= "<th>"+resposta.data.payment+"</th>";
                                
                                var resposta = resposta.data.link;
                                var url = 'https://digitalonline.com.br/2via/visualizarBoletoGerencia.php?url=https://visualizacao.gerencianet.com.br/emissao/177311_52_NAELO1/A4XB-177311-123673678-CHODRA8';
                                var lightbox = lity(url);
                                console.log(url);
                                //$(document).on('click', '[data-lightbox]', lity);
                                //window.open('visualizarBoletoGerencia.php?url='+resposta.data.link, '_blank'); 
                                
                    }else{
                        console.log("ERRO:");
                        console.log(resposta.code);
                                // $("#myModal").modal('hide');
                        //alert("Code: "+ resposta.code)
                    }
                },
                 
                error:function (resposta){
                    //  $("#myModal").modal('hide');
                      //alert("Ocorreu um erro - Mensagem: "+resposta.responseText)
                }
		    });
        },

        gerarBoletoGerenciaNet(codBoleto, venc, vlr){

            //console.log('teste');

            var descricao = 'Boleto';           
            var valor = vlr.replace(",", "").replace(".", "");
            //console.log(valor);
            var quantidade = '1';
            var nome_cliente = login.$data.cliente_selecionado[0].NOME_RAZAO;            
            var cpf = login.$data.cliente_selecionado[0].DOC_CPF_CNPJ;
            var telefone = login.$data.cliente_selecionado[0].DDD_FONE1+""+login.$data.cliente_selecionado[0].TELEFONE1;
            var categoria = login.$data.contrato_selecionado[0].CATEGORIA;
            var email = login.$data.cliente_selecionado[0].EMAIL;
            

            console.log(categoria);

            var str = venc.toString();
            var res = str.split("-");
            var vencimento = res[2] + '/' +res[1]+ '/' +res[0];

            //console.log(vencimento);

            $.ajax({
                url: "boleto/emitir_boleto.php",
                data:{descricao:descricao,
                    valor:valor,
                    quantidade:quantidade,
                    nome_cliente:nome_cliente,
                    cpf:cpf,
                    telefone:telefone,
                    vencimento:vencimento,
                    codBoleto:codBoleto,
                    tipoPessoa:categoria,
                    email:email
                },
                type:'post',
                dataType:'json',
		        success: function(resposta){
                    //  $("#myModal").modal('hide');
                    var r= resposta;
                      console.log(r);
                    if(resposta.code == 200){
                                                             
                                
                                var link = resposta.data.link
                                var url = 'https://digitalonline.com.br/2via/visualizarBoletoGerencia.php?url=';
                                url+=link;
                                var lightbox = lity(url);
                                
                    }else{
                        console.log("ERRO:");
                        console.log(resposta.code);
                                // $("#myModal").modal('hide');
                        //alert("Code: "+ resposta.code)
                    }
                },
                 
                error:function (resposta){
                    //  $("#myModal").modal('hide');
                      alert("Ocorreu um erro - Mensagem: "+resposta.responseText)
                }
		    });
        }

        
    }
});