<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Assinatura</h5>
                <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/vendas/editar/'.$result->idPedido.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    
                    <a id="imprimir" title="Imprimir" class="btn btn-mini btn-inverse" href=""><i class="icon-print icon-white"></i> Imprimir</a>
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head">
					
                                           <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 20%"><strong>Pedido</strong></td>
                                                    <td><?php echo $result->idPedido ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Referência</strong></td>
                                                    <td><?php echo $result->referencia ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                                    <td><?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?></td>
                                                </tr>
												</table>
												<div class="widget-box">
												<div class="widget-title">
													<span class="icon">
														<i class="icon-tags"></i>
													</span>
													<h5>Dados Pessoais:</h5>
												</div>
												</div>
												<table class="table table-bordered">
												<tr>
                                                    <td style="text-align: right; width: 20%"><strong>Nome Completo</strong></td>
                                                    <td><?php echo $result->nomeCliente ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Data de Nascimento</strong></td>
                                                    <td><?php echo $result->nascimento ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Sexo</strong></td>
                                                    <td><?php echo $result->sexo ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Registro Geral</strong></td>
                                                    <td><?php echo $result->rg	 ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>CPF</strong></td>
                                                    <td><?php echo $result->cpf ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Estado Civil</strong></td>
                                                    <td><?php echo $result->estadocivil ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Telefone</strong></td>
                                                    <td><?php echo $result->telefone ?></td>
                                                </tr>
												
												 <tr>
                                                    <td style="text-align: right"><strong>Celular</strong></td>
                                                    <td><?php echo $result->celular ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Telefone Comecial</strong></td>
                                                    <td><?php echo $result->telComercial ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>E-mail</strong></td>
                                                    <td><?php echo $result->email ?></td>
                                                </tr>
																								
												</table>
												<div class="widget-box">
												<div class="widget-title">
													<span class="icon">
														<i class="icon-tags"></i>
													</span>
													<h5>Endereço de Instalação:</h5>
												</div>
												</div>
												<table class="table table-bordered">
												<tr>
                                                    <td style="text-align: right; width: 20%"><strong>CEP</strong></td>
                                                    <td><?php echo $result->cep ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Endereço</strong></td>
                                                    <td><?php echo $result->endereco ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Número</strong></td>
                                                    <td><?php echo $result->numero ?></td>
                                                </tr>												
												 <tr>
                                                    <td style="text-align: right"><strong>Complemento</strong></td>
                                                    <td><?php echo $result->complemento ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Bairro</strong></td>
                                                    <td><?php echo $result->bairro ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Cidade</strong></td>
                                                    <td><?php echo $result->cidade ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Estado</strong></td>
                                                    <td><?php echo $result->uf ?></td>
                                                </tr>
												</table>
												<div class="widget-box">
												<div class="widget-title">
													<span class="icon">
														<i class="icon-tags"></i>
													</span>
													<h5>Plano de Assinatura</h5>
												</div>
												</div>
												<table class="table table-bordered">
												<tr>
                                                    <td style="text-align: right; width: 20%"><strong>Plano Escolhido</strong></td>
                                                    <td><?php echo $result->planosky ?></td>
                                                </tr>
												</table>
												<table class="table table-bordered">
												<tr>
                                                    <td style="text-align: right; width: 20%"><strong>Pacelas</strong></td>
                                                    <td><?php echo $result->Parcelas ?></td>
                                                </tr>
												</table>
												<div class="widget-box">
												<div class="widget-title">
													<span class="icon">
														<i class="icon-tags"></i>
													</span>
													<h5>Forma de Pagamento</h5>
												</div>
												</div>
												<table class="table table-bordered">
												<tr>
                                                    <td style="text-align: right; width: 20%"><strong>Bandeira do Cartão</strong></td>
                                                    <td><?php echo $result->Bandeira ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Número</strong></td>
                                                    <td><?php echo $result->numeroCartao ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Validade</strong></td>
                                                    <td><?php echo $result->MesVencimento ?>/<?php echo $result->AnoVencimento ?></td>
                                                </tr>
												</table>

											</tbody>
                                    </div>
                                </div>
                            </div>
      
<script type="text/javascript">
    $(document).ready(function(){
        $("#imprimir").click(function(){         
            PrintElem('#printOs');
        })

        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data)
        {
            var mywindow = window.open('', 'MapOs', 'height=600,width=800');
            mywindow.document.write('<html><head><title>Map Os</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-style.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-media.css' />");


            mywindow.document.write('</head><body >');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');

            mywindow.print();
            mywindow.close();

            return true;
        }

    });
</script>