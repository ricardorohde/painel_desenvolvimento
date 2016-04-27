<div class="widget-box">
   
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
		<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Histórico</a></li>
            <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eHistorico')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/historico/editar/'.$result->idHistorico.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    
            </div>
        </ul>


            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Informações do Histórico</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Id do Histórico</strong></td>
                                                    <td><?php echo $result->idHistorico ?></td>
                                                <tr>
                                                </tr>
                                                    <td style="text-align: right"><strong>Data do Cadastro</strong></td>
                                                    <td><?php echo $result->dataCadastro ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Descrição do Histórico</strong></td>
                                                    <td><?php echo $result->descricaoHistorico ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Retorno</strong></td>
                                                    <td><?php echo $result->retorno ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Data Retorno</strong></td>
                                                    <td><?php echo $result->dataRetorno ?></td>
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
		 
<a href="<?php echo base_url()?>index.php/historico/adicionar?idClientes=<?php echo $result->idClientes ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Histórico</a>
<?php
if(!$results){?>
        <div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-user"></i>
				</span>
					<h5>Histórico</h5>

			</div>

			<div class="widget-content nopadding">
				<table class="table table-bordered ">
					<thead>
						<tr style="backgroud-color: #2D335B">
							<th>Data</th>
							<th> </th>
							<th>Descrição</th>
							<th> </th>
						</tr>
					</thead>
					
					<tbody>    
						<tr>
							<td colspan="5">Nenhum Histórico Cadastrado</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>


	<?php } else{?>

		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-user"></i>
				</span>
				<h5>Histórico</h5>

			</div>

			<div class="widget-content nopadding">
			<table class="table table-bordered ">
				<thead>
					<tr style="backgroud-color: #2D335B">
						<th>Data</th>
						<th> </th>
						<th>Descrição</th>
						<th> </th>
					</tr>
				</thead>
				
				<tbody>
				<?php foreach ($results as $r) {
      				echo '<td>'.$r->dataCadastro.'</td>';
					echo '<td>';
					echo '<td>'.$r->descricaoHistorico.'</td>';
					echo '<td>
						<a href="'.base_url().'index.php/historico/adicionarHistorico?'.$r->idHistorico.'" class="btn btn-info tip-top" title="Adicionar Histórico"><i class="icon-pencil icon-white"></i></a>
						</td>';
					echo '</tr>';
				}?>
				<tr>
            
				</tr>
				</tbody>
			</table>
			</div>
		</div>
	
<?php echo $this->pagination->create_links();}?>		 
