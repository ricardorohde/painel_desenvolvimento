<div class="widget-box">
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
		<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Técnico</a></li>
            <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eTecnico')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/tecnicos/editar/'.$result->idtecnicos.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
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
                                             <!--   <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Id</strong></td>
                                                    <td><?php /*echo $result->idtecnicos */?></td>
                                                <tr>
                                                </tr>-->
                                                    <td style="text-align: right"><strong>Id SKY</strong></td>
                                                    <td><?php echo $result->idskytecnico ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Nome</strong></td>
                                                    <td><?php echo $result->nometecnico ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Telefone</strong></td>
                                                    <td><?php echo $result->telefonetecnico ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Status</strong></td>
                                                    <td><?php $situacao = $result->tecnicoativo;
													if ($situacao == 0){echo "INATIVO";}
													else {echo "Ativo";}			
													?></td>
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
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aAvanco')){ ?>
   <a href="<?php echo base_url()?>index.php/retiradatecnico/adicionar?idtecnicos=<?php echo $result->idtecnicos ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Retirada</a>
<?php } ?>
	<a href="<?php echo base_url() ?>index.php/tecnicos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a> <!-- Adicionado em 04/09/2015-->

 
<!--Tab 2 Lista todos os itens que estão com o tecnico e que ainda não foi dado baixa-->
 
<div class="accordion" id="collapse-group">
	<?if(!$results){?>
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-user"></i>
				</span>
				<h5>AVANÇOS<h5>
			</div>

			<div class="widget-content nopadding">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código do Produto</th>
							<th>Descrição Produto</th>
							<th>Quantidade</th>
							<th>Métrica</th>
							<th>Data</th>
						</tr>
					</thead>
					
					<tbody>
						<tr>
							<td colspan="5">Nenhum Avanço Para Exibir</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	<?php }else
	{ ?>
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-user"></i>
				</span>
				<h5>AVANÇOS<h5>
			</div>

			<div class="widget-content nopadding">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código do Produto</th>
							<th>Descrição Produto</th>
							<th>Quantidade</th>
							<th>Métrica</th>
							<th>Data</th>
							<th></th>
						</tr>
					</thead>
	
					<tbody>
						<?php foreach ($results as $r) {
							echo '<tr>';
							echo '<td>'.$r->produto_ids.'</td>';
							echo '<td>'.$r->produto_nome.'</td>';
							echo '<td>'.$r->quantidadeproduto.'</td>';	
							echo '<td>'.$r->metrica_produto.'</td>';	
							echo '<td>'.date_format(new DateTime($r->dataavanco), "d/m/y") .'</td>';
							/*echo date('d/m/Y',  strtotime($r->dataavanco));*/
							echo '<td>';
							/*if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
							echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
							}
							if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
							echo '<a href="'.base_url().'index.php/ligou/adicionar?idHistorico='.$retorno["idHistorico"].'" style="margin-right: 1%" class="btn tip-top" title="Ligou?"><i class="icon-phone"></i></a>';
							}
							echo '</td>';
							echo '</tr>';*/
							}?> 
					</tbody>
				</table>
			</div>
		</div>
	<?php } ?>

<!-- Fim dos itens que estão com os tecnicos-->
