<?php //pegar a hora local para comparar______________________________________________________________________________

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR'); ?>
<!-- fim da hora local______________________________________________________________________________________________-->







<!--Atendente_______________________________________________________________________________________________________-->
 <?php 
 /* quem esta logado no sistema*/
$data['usuario'] = $this->session->userdata('id');
$televendedor = $data['usuario'];

 /*nome do atendente*/
$sql = mysql_query("SELECT * from usuarios
					WHERE idUsuarios='$televendedor' ");
					while($exibe = mysql_fetch_assoc($sql)){
					echo '<tr>';
					echo '<td>'. 'Olá, '. $exibe["nome"]. '!' . '</td>';
					};
			
/*fim do atendente____________________________________________________________________________________________________*/





/*guardar a permissao_________________________________________________________________________________________________*/
$sql = mysql_query("SELECT usuarios.permissoes_id from usuarios
					WHERE idUsuarios='$televendedor' ");
					while($exibe = mysql_fetch_assoc($sql)){
					$permissao = $exibe['permissoes_id'];
					};
					
/*fim permissao_______________________________________________________________________________________________________*/







/*verificar se algum filtro foi selecionado_________________________________________________________________________*/

if(isset($_POST['selecaocheck']))
{
	$selecao = $_POST['selecaocheck'];
}
else
{
	$selecao = '1';
}


/*fim da verificação do filtro ______________________________________________________________________________________*/







/*Verifica se é administrador. Se for, seleciona informações gerais__________________________________________________*/

if ($permissao == '1'){ /*abre a chave da permissao*/


				/*Leads Finalizados*/


							if(!$results){?> <!-- fim do php que começou na linha 1/chave quando não há finalizados-->

								<div class="widget-box">
									<div class="widget-title">
										<span class="icon">
											<i class="icon-cog"></i>
										</span>
										<h5>FINALIZADOS</h5>
									</div>

								<div class="widget-content nopadding">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Nome</th>
												<th>Data Finalização</th>
												<th>Atendente</th>
												<th>Pacote</th>
											</tr>
										</thead>
               
										<tbody>
											<tr>
												<td colspan="5">Nenhum Lead Finalizado</td>
											</tr>
										</tbody>
									</table>
								</div>
								</div>

							<?php }else{ ?><!-- fim da chave quando não há finalizados/chave quando há finalizados-->
								<div class="widget-box">
									<div class="widget-title">
										<span class="icon">
											<i class="icon-cog"></i>
										</span>
										<h5>FINALIZADOS</h5>
									</div>

								<div class="widget-content nopadding">
									<table class="table table-bordered ">
										<thead>
											<tr>
												<th>Id</th>
												<th>Afiliado</th>												
												<th>Nome</th>
												<th>Data Finalização</th>
												<th>Atendente</th>
												<th>Pacote</th>
											</tr>
										</thead>
	
										<tbody>
								<?php
								$data = intval(date('m'));/*transforma o mes da data num inteiro*/
								$sql = "SELECT clientes.*,fimatendimento.*,usuarios.nome
								FROM clientes
								INNER JOIN fimatendimento
								ON clientes.idClientes = fimatendimento.cliente_id
								INNER JOIN usuarios
								ON usuarios.idUsuarios = clientes.usuario_id
								WHERE fimatendimento.motivo='Assinou'
								GROUP BY clientes.idClientes 
								ORDER BY fimatendimento.datafim DESC";
								$query = mysql_query($sql)or die(mysql_error());
								$contador = 0;
									while($exibe = mysql_fetch_assoc($query)){
										$data2 = (intval(date_format(new DateTime($exibe['datafim']), "m"))) . '</td>';;
											if ($data == $data2){
												$contador++;
													echo '<tr>';
													echo '<td>'.$exibe['cliente_id'] .'</td>';
													echo '<td>'.$exibe['referencia'] .'</td>';													
													echo '<td>'.$exibe['nomeCliente'] .'</td>';
													echo '<td>'.date_format(new DateTime($exibe['datafim']), "d/m/y") .'</td>';
													echo '<td>'.$exibe['nome'] .'</td>';
													echo '<td>'.$exibe['pacote'] .'</td>';
											}}
						
		
								'<tr>';
								echo 'Neste mês conseguimos '. $contador . ' novos clientes.';?>
								</tr>
										</tbody>
									</table>

								</div>
								</div>
								
							<?php }?> <!-- fim da chave quando há finalizados-->


<!-- Fim dos leads finalizados-->






<!-- Leads com problemas-->

							<?php
							if(!$results){?><!-- chave caso não haja leads com problemas-->

								<div class="widget-box">
									<div class="widget-title">
										<span class="icon">
											<i class="icon-cog"></i>
										</span>
											<h5>PROBLEMAS DE CONTATO</h5>
									</div>

									<div class="widget-content nopadding">
										<table class="table table-bordered">
											<thead>
												<tr>
												<th>Id</th>
												<th>Referência</th>
												<th>Nome</th>
												<th>E-mail</th>
												<th>Atendente</th>
												<th>Ações</th>
												</tr>
											</thead>
											
										<tbody>
											<tr>
												<td colspan="5">Nenhum Lead Com Problemas</td>
											</tr>
										</tbody>
										</table>
									</div>
								</div>

						<?php } else {?><!-- chave caso não haja leads com problemas/abre chaves de selecao de problemas-->
						
<!--------------Selecao de tipo de problema--------------------------------------------------------------------------------------------->
						
						<div class="span12" style="margin-left: 0">
							<form action="<?php echo base_url();?>index.php/finalizados/finalizados" id="problemas" method="post">
								<div class="span12" style="margin-left: 0">
        
									<div class="widget-box">
										<div class="widget-title">
											<span class="icon">
												<i class="icon-lock"></i>
											</span>
										<h5> Escolha o problema</h5>
										</div>
										
										<div class="widget-content">              

										<div class="control-group">
											<label for="documento" class="control-label"></label>
											<div class="controls">

												<table class="table table-bordered">
													<tbody>
														<tr>
														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="1" />
															<span class="lbl"> Todos</span>
															</label>
														</td>

														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="2" />
															<span class="lbl"> Contato Errado</span>
															</label>
														</td>

														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="3" />
															<span class="lbl"> Duplicado</span>
															</label>
														</td>

														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="4" />
															<span class="lbl"> Não Atende</span>
															</label>
														</td>
														
														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="5" />
															<span class="lbl"> Sem Interesse</span>
															</label>
														</td>
														
														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="6" />
															<span class="lbl"> Assinante SKY</span>
															</label>
														</td>
														
														<td>
															<label>
															<input name="selecaocheck" class="marcar" type="radio" value="7" />
															<span class="lbl"> Assinante OUTRAS</span>
															</label>
														</td>
                                 
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										</div>
									</div>
								</div>
						</div>
						
						
						<div class="form-actions">
							<div class="span12">
								<div class="span6 offset3">
									<button type="submit" class="btn btn-success"><i class="icon-refresh icon-white"></i>  Filtrar</button>
								</div>
							</div>
						</div>

<!--------------FIM - Selecao de tipo de problema--------------------------------------------------------------------------------------------->





<!--------------Problemas de Contato---------------------------------------------------------------------------------------------------------->

						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-cog"></i>
								</span>
								<h5>PROBLEMAS DE CONTATO</h5>
							</div>
							
							<div class="widget-content nopadding">
								<table class="table table-bordered ">
									<thead>
										<tr>
										<th>Id</th>
										<th>Referência</th>
										<th>Nome</th>
										<th>E-mail</th>
									    <th>Motivo</th>
										<th>Atendente</th>
										<th>Data Fechamento</th>
										<th>Ações</th>
										</tr>
									</thead>
									
									<tbody>
								<?php		
																
																
								switch ($selecao) {
									case "1":
									{/*case 1*/
									$motivo = 'Todos';
									$data = intval(date('m'));/*transforma o mes da data num inteiro*/
									$sql = "SELECT clientes.*,fimatendimento.*,usuarios.nome
										FROM clientes
										INNER JOIN fimatendimento
										ON clientes.idClientes = fimatendimento.cliente_id
										INNER JOIN usuarios
										ON usuarios.idUsuarios = clientes.usuario_id
										WHERE fimatendimento.motivo!='Assinou'
										GROUP BY clientes.idClientes 
										ORDER BY clientes.idClientes DESC";
										$query = mysql_query($sql)or die(mysql_error());
										$contador = 0;
										while($exibe = mysql_fetch_assoc($query)){
										$data2 = (intval(date_format(new DateTime($exibe['datafim']), "m"))) . '</td>';;
											if ($data == $data2){
												$contador++;
													echo '<tr>';
													echo '<td>'.$exibe['cliente_id'] .'</td>';
													echo '<td>'.$exibe['referencia'] .'</td>';
													echo '<td>'.$exibe['nomeCliente'] .'</td>';
													echo '<td>'.$exibe['email'] .'</td>';
													echo '<td>'.$exibe['motivo'] .'</td>';
													echo '<td>'.$exibe['nome'] .'</td>';
													echo '<td>'.date_format(new DateTime($exibe['datafim']), "d/m/y") .'</td>';
													echo '<td>';
														if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
														echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
														}
														if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
														echo '<a href="'.base_url().'index.php/clientes/editar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
														}
														if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
														echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
														}
													echo '</td>';
													echo '</tr>';
									
											}}
		
													'<tr>';

											echo 'Total: '. $contador; ?>
											</tr>
									</tbody>
								</table>
							</div>
						</div><?php };	
										break;				
									
									case "2":
										$motivo='Contato Errado';
										break;
									case "3":
										$motivo='Duplicado';
										break;
									case "4":
										$motivo='Nao Atende';
										break;
									case "5":
										$motivo='Sem Interesse';
										break;
									case "6":
										$motivo='Assinante SKY';
										break;
									case "7":
										$motivo='Assinante OUTRAS';
										break;
								}
																
								$data = intval(date('m'));/*transforma o mes da data num inteiro*/
								$sql = "SELECT clientes.*,fimatendimento.*,usuarios.nome
								FROM clientes
								INNER JOIN fimatendimento
								ON clientes.idClientes = fimatendimento.cliente_id
								INNER JOIN usuarios
								ON usuarios.idUsuarios = clientes.usuario_id
								WHERE fimatendimento.motivo!='Assinou'
								AND fimatendimento.motivo='$motivo'
								GROUP BY clientes.idClientes 
								ORDER BY clientes.idClientes DESC";
								$query = mysql_query($sql)or die(mysql_error());
								$contador = 0;
									while($exibe = mysql_fetch_assoc($query)){
										$data2 = (intval(date_format(new DateTime($exibe['datafim']), "m"))) . '</td>';;
											if ($data == $data2){
												$contador++;
													echo '<tr>';
													echo '<td>'.$exibe['cliente_id'] .'</td>';
													echo '<td>'.$exibe['referencia'] .'</td>';
													echo '<td>'.$exibe['nomeCliente'] .'</td>';
													echo '<td>'.$exibe['email'] .'</td>';
													echo '<td>'.$exibe['motivo'] .'</td>';
													echo '<td>'.$exibe['nome'] .'</td>';
													echo '<td>'.date_format(new DateTime($exibe['datafim']), "d/m/y") .'</td>';
													echo '<td>';
														if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
														echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
														}
														if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
														echo '<a href="'.base_url().'index.php/clientes/editar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
														}
														if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
														echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
														}
													echo '</td>';
													echo '</tr>';
									
											}}
		
									echo 'Filtro escolhido: ' .$motivo . '  -  ' . 'Total: '. $contador; ?>
																			
									
        </tr>
    </tbody>
	</table>
</div>
</div>

						
<!-- Fim dos leads com problemas-->




<?php echo $this->pagination->create_links();?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Cliente</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idCliente" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este cliente e os dados associados a ele?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>

<?php } } else {	/*Fim do ADM*/
	if ($permissao == '3'){/* permissao do usuario de televendas*/
		
						/*Leads Finalizados*/


							if(!$results){?>

								<div class="widget-box">
									<div class="widget-title">
										<span class="icon">
											<i class="icon-cog"></i>
										</span>
										<h5>FINALIZADOS</h5>
									</div>

								<div class="widget-content nopadding">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>Id</th>
												<th>Nome</th>
												<th>Data Finalização</th>
												<th>Atendente</th>
												<th>Pacote</th>
											</tr>
										</thead>
               
										<tbody>
											<tr>
												<td colspan="5">Nenhum Lead Finalizado</td>
											</tr>
										</tbody>
									</table>
								</div>
								</div>

							<?php }else{ ?><!-- fim da chave quando não há finalizados/chave quando há finalizados-->
								<div class="widget-box">
									<div class="widget-title">
										<span class="icon">
											<i class="icon-cog"></i>
										</span>
										<h5>FINALIZADOS</h5>
									</div>

								<div class="widget-content nopadding">
									<table class="table table-bordered ">
										<thead>
											<tr>
												<th>Id</th>
												<th>Afiliado</th>
												<th>Nome</th>
												<th>Data Finalização</th>
												<th>Atendente</th>
												<th>Pacote</th>
											</tr>
										</thead>
	
										<tbody>
								<?php
								$data = intval(date('m'));/*transforma o mes da data num inteiro*/
								$sql = "SELECT clientes.*,fimatendimento.*,usuarios.nome
								FROM clientes
								INNER JOIN fimatendimento
								ON clientes.idClientes = fimatendimento.cliente_id
								INNER JOIN usuarios
								ON usuarios.idUsuarios = clientes.usuario_id
								WHERE fimatendimento.motivo='Assinou'
								AND clientes.usuario_id = '$televendedor'
								GROUP BY clientes.idClientes 
								ORDER BY fimatendimento.datafim DESC";
								$query = mysql_query($sql)or die(mysql_error());
								$contador = 0;
									while($exibe = mysql_fetch_assoc($query)){
										$data2 = (intval(date_format(new DateTime($exibe['datafim']), "m"))) . '</td>';;
											if ($data == $data2){
												$contador++;
													echo '<tr>';
													echo '<td>'.$exibe['cliente_id'] .'</td>';
													echo '<td>'.$exibe['referencia'] .'</td>';													
													echo '<td>'.$exibe['nomeCliente'] .'</td>';
													echo '<td>'.date_format(new DateTime($exibe['datafim']), "d/m/y") .'</td>';
													echo '<td>'.$exibe['nome'] .'</td>';
													echo '<td>'.$exibe['pacote'] .'</td>';
											}}
						
		
								'<tr>';
								echo 'Neste mês você conseguiu '. $contador . ' novo(s) cliente(s).';?>
								</tr>
										</tbody>
									</table>

								</div>
								</div>
								
							<?php }?> <!-- fim da chave quando há finalizados-->


<!-- Fim dos leads finalizados-->
		
		
		
		
		
<?php } }?>
	
	






