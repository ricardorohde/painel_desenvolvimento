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
			<span class="icon"><i class="icon-list"></i></span><h5>Tentativa</h5>
			
			
			
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
			
			
			$clienteatual = $result->idClientes;/*para atualizar os status do Cliente*/
			
			$sql = mysql_query("SELECT status from clientes 
			WHERE idClientes = $clienteatual");
			
			while($exibe = mysql_fetch_assoc($sql)){
								$statusantigo = $exibe["status"];




switch ($statusantigo) {
    case 0:?>
       <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-white"></i> 1</a><?
        break;
    case 1:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-white"></i> 2</a><?
        break;
    case 2:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-white"></i> 3</a><?
        break;
	case 3:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-white"></i> 4</a><?
	    break;
	case 4:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-white"></i> 5</a><?
	break;
	case 5:?>
		<?php echo 'Última tentativa! Caso não consiga contato, favor finalizar o atendimento.';?>
		<p>
		<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
		<a href="<?php echo base_url()?>index.php/fimatendimento/adicionar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Finalizar Atendimento</a>
		<?break;

}}}}?>
	



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
                                                    <td style="text-align: right"><strong>Plano Escolhido</strong></td>
                                                    <td><?php echo $result->interesse ?></td>
                                                </tr>
												
												<tr>
                                                    <td style="text-align: right"><strong>Pagamento</strong></td>
                                                    <td><?php echo $result->pagamento ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                                    <td><?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?></td>
                                                </tr>

												<tr>
                                                    <td style="text-align: right"><strong>Tentativa</strong></td>
                                                    <td><?php echo $result->status ?></td>
                                                </tr>
												
												<tr>
                                                    <td style="text-align: right"><strong>Status</strong></td>
                                                    <td><?php echo $result->motivo ?></td>
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
	
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
   <a href="<?php echo base_url()?>index.php/fimatendimento/adicionar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Finalizar Atendimento</a>
<?php } ?>

    
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


