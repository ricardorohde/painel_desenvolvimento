<div class="widget-box">
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
		<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Lead</a></li>
            <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientes/editar/'.$result->idClientes.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    
            </div>
        </ul>


            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Informações</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Id</strong></td>
                                                    <td><?php echo $result->idClientes ?></td>
                                                <tr>
                                                </tr>
                                                    <td style="text-align: right"><strong>Referência</strong></td>
                                                    <td><?php echo $result->referencia ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Nome</strong></td>
                                                    <td><?php echo $result->nomeCliente ?></td>
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
                                                    <td style="text-align: right"><strong>Operadora</strong></td>
                                                    <td><?php echo $result->operadora ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>E-mail</strong></td>
                                                    <td><?php echo $result->email ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Cliente SKY?</strong></td>
                                                    <td><?php echo $result->clientesky ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                                    <td><?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Atendente</strong></td>
                                                    <td><?php echo $result->atendente ?></td>
                                                </tr>

												<tr>
                                                    <td style="text-align: right"><strong>Status</strong></td>
                                                    <td><?php echo ($result->status)+1 ?></td>
                                                </tr>
												
												<tr>
                                                    <td style="text-align: right"><strong>IP Lead</strong></td>
                                                    <td><?php echo $result->ip_lead ?></td>
                                                </tr>

											</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            



          
			</div>
		</div>
	</div>
</div>
			
		        <!--Tab 2-->
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
   <a href="<?php echo base_url()?>index.php/historico/adicionar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Histórico</a>
<?php } ?>
	<a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a> <!-- Adicionado em 04/09/2015-->

    
          <div class="accordion" id="collapse-group">
                           <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"></span><h5>Histórico</h5>
                                        </a>
                                    </div>
                                </div>
                               <!-- <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
							
							<tbody> -->
								<?php
									$query = "SELECT dataCadastro, descricaoHistorico, retorno, dataRetorno from historico WHERE clientes_id=$result->idClientes ORDER BY dataCadastro DESC";
									$result = mysql_query($query);
									while($fetch = mysql_fetch_row($result)){
										echo "<br>". $fetch[0] . " - " . $fetch[1] . " - " . "</p>";
									}
								?>

	
					<!--    </tbody> 
							</div>
							</div> -->
					
					
					
                            </div>
							
							
                            



          
			</div>


