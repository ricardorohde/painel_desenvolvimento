<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-group"></i>
                </span>
                <h5>Histórico</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
				    <div class="control-group">
                        <div class="controls">				           
							<input id="clientes_id" type="hidden" name="clientes_id" value="<?php echo ($_GET["idClientes"]);?><?php set_value('clientes_id');?>"  />
                        </div>
			
					
					<?php $clientehistorico = $_GET["idClientes"];?>
					
                    <div class="control-group">
                        <label for="nomeCliente" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
							<?php 
								$sql = mysql_query("SELECT clientes.nomeCliente from clientes
									WHERE idClientes='$clientehistorico' ");
									while($exibe = mysql_fetch_assoc($sql)){
									echo $exibe["nomeCliente"];
									} ?>
                        </div>
                    </div>
					
<!-- Dados do contato realizado----->
					
<div class="widget-box">
	<div class="widget-title">
		<span class="icon">
			<i class="icon-user"></i>
		</span>
				<h5>RETORNOS AGENDADOS<h5>
		</div>

<div class="widget-content nopadding">
	<table class="table table-bordered ">
		<thead>
			<tr>				
				<th>ID Cliente</th>
				<th>Retornar Em:</th>
				<th>Hora Retorno</th>
				<th>Realizado</th>
				<th>Alterar Status</th>
			</tr>
		</thead>
	
    <tbody>
								<?php
										$datadehoje = date('Y-m-d');
										$horaatual = date('H:i:s'); 	

										// Consulta que pega todos os retornos							
										
										$sql = "SELECT clientes.*, historico.*, MAX(historico.horaRetorno), usuarios.nome
										FROM clientes
										INNER JOIN historico
										ON clientes.idClientes = historico.clientes_id
										INNER JOIN usuarios
										ON usuarios.idUsuarios = clientes.usuario_id
										WHERE historico.retorno = 'Sim' AND historico.dataRetorno = '$datadehoje'
										AND clientes.motivo != 'Finalizado'
										AND historico.ligou = 'Nao'
										GROUP BY clientes_id
										ORDER BY historico.horaRetorno ASC
										LIMIT 1";
										$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													echo '<td>'.$retorno['clientes_id'] .'</td>';
													echo '<td>'.date_format(new DateTime($retorno['dataRetorno']), "d/m/y") .'</td>';
													echo '<td>'.date_format(new DateTime($retorno['horaRetorno']), "H:i") .'</td>';
													echo '<td>'.$retorno['ligou'] .'</td>';
													echo '<td>';
																				
										if($this->permission->checkPermission($this->session->userdata('permissao'),'eHistorico')){
											echo '<a href="'.base_url().'index.php/historico/editar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-phone"></i></a>';
											}
											echo '</td>';
											echo '</tr>';
									}
									$iddohistorico = $retorno['idHistorico']; ?> 
									
		
        <tr>
            
       </tr>
    </tbody>
	</table>
</div>
</div>
</div>

<!-- Fim dos contatos realizados------>





<!-- Inserção de um novo contato-->




                    <div class="control-group">
                        <label for="descricaoHistorico" class="control-label">Descrição Histórico<span class="required">:</span></label>
                        <div class="controls">
                            <textarea id="descricaoHistorico" type="text" name="descricaoHistorico" cols="150" rows="5" value="<?php echo set_value('descricaoHistorico'); ?>">  </textarea>
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label  class="control-label">Retornar</label>
                        <div class="controls">
                            <select name="retorno" id="retorno">
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                            </select>
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="dataRetorno" class="control-label">Data Retorno<span class="required">*</span></label>
                        <div class="controls">
                            <input id="dataRetorno" class="span2 datepicker" type="text" name="dataRetorno" value=""  />
                        </div>
                    </div>				

					<div class="control-group">
                        <label for="horaRetorno" class="control-label">Hora Retorno<span class="required">*</span></label>
                        <div class="controls">
                            <input id="horaRetorno" type="text" name="horaRetorno" value=""  />
                        </div>
                    </div>					


                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                <a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
	        </div>
				 

		</div>
	</div>
</div>





<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
           $('#formCliente').validate({
            rules :{
                  nomeCliente:{ required: true},
                  telefone:{ required: true},
				  celular:{ required: true},
                  operadora:{ required: true},
                  email:{ required: true},
                  clientesky:{ required: true},
                  atendente:{ required: true},
            },
            messages:{
                  nomeCliente :{ required: 'Campo Requerido.'},
                  telefone:{ required: 'Campo Requerido.'},
				  celular:{ required: 'Campo Requerido.'},
                  operadora:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
                  clientesky:{ required: 'Campo Requerido.'},
				  atendente:{ required: 'Campo Requerido.'},
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
		   
		       $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
      });
</script>
