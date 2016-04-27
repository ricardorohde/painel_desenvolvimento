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
                <h5>Finalizar Atendimento</h5>
            </div>
			
			<!-- Dados do Lead -->
	                    <div class="accordion" id="collapse-group">
							<div class="accordion-group widget-box">
                                <div class="collapse in accordion-body" id="collapseGOne">
									<div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Id</strong></td>
                                                    <td><?php echo $clienteatual = ($_GET["idClientes"]);?></td>
                                                <tr>
                                                <tr> 
													<td style="text-align: right; width: 30%"><strong>Nome do Cliente</strong></td>
                                                    <td><?php
													$sql = mysql_query("SELECT clientes.nomeCliente
													from clientes
													WHERE '$clienteatual'=idClientes");
													while($exibe = mysql_fetch_assoc($sql)){
														echo $exibe["nomeCliente"];
																};
													?></td>
                                                </tr>
											</tbody>
										</table>
									</div>
								</div>
												 
			<!-- Fim dados do lead-->
			
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
				    <div class="control-group">
                        <div class="controls">				           
							<input id="cliente_id" type="hidden" name="cliente_id" value="<?php echo ($_GET["idClientes"]);?><?php set_value('cliente_id');?>"  />
                        </div>
						<?php $idatual = ($_GET["idClientes"]);?>
							
						
												
			
                        <label  class="control-label">Motivo</label>
                        <div class="controls">
                            <select name="motivo" id="motivo">
                                <option value="">Escolha o motivo</option>
                                <option value="Assinou">ASSINOU SKY</option>
                                <option value="Assinante SKY">Assinante</option>
                                <option value="Assinou OUTRAS">Assinou - Outras</option>							
                         		<option value="Duplicado">Duplicado</option>
                                <option value="Contato Errado">Número Errado/ Não existe</option>  								
                                <option value="Nao tem Globo">Não tem Globo/ SBT</option>
								<option value="Nao tem Internet">Não tem Internet</option>
								<option value="Restricao">Restrição</option>
								<option value="Sem Contato">Sem Contato</option>								
								<option value="Sem Interesse">Sem interesse</option>
								<option value="Valor Concorrente">Valor da Concorrente</option>
                            </select>
                        </div>
						
						
						<label  class="control-label">Pacote</label>
                        <div class="controls">
                            <select name="pacote" id="pacote">
                                <option value="Sem Pacote">Sem Pacote</option>							
                                <option value="Smart16">SMART 1 (6m)</option>							
                                <option value="Smart26">SMART 2 (6m)</option>
                                <option value="Smarthd6">SMART HD(6m)</option>
                                <option value="Smart112">SMART 1 (12m)</option>		
                                <option value="Master16">MASTER 1 (6m)</option>							
                                <option value="Master26">MASTER 2 (6m)</option>
                                <option value="Master112">MASTER 1(12m)</option>
                                <option value="Pop12">POP (12m)</option>	
                                <option value="Flexsd">FLEX SD</option>	
                                <option value="Flexhd">FLEX HD</option>									
                                <option value="Light II">Light II</option>
								<option value="Light HD">Light HD</option>
                                <option value="Light Futebol">Light + Futebol</option>
								<option value="Mix HD">Mix HD</option>
								<option value="HBO Max HD">HBO Max HD</option>
								<option value="Telecine HD">Telecine HD</option>
								<option value="Cinema HD">Cinema HD</option>
								<option value="Plus Cinema HD">Plus Cinema HD</option>
								<option value="Plus Cinema HD Futebol">Plus Cinema HD + Futebol</option>
								<option value="Full HBO Max HD">Full HBO Max HD</option>
								<option value="Full Telecine Max HD">Full Telecine Max HD</option>
								<option value="Full Cinema HD">Full Cinema HD</option>
								<option value="Full Cinema HD Futebol HD">Full Cinema HD + Futebol HD</option>
                            </select>
                        </div>
                    </div>
					
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Finalizar</button>
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
                  motivo:{ required: true},
				  status:{ required: true},
            },
            messages:{
                  motivo:{ required: 'Campo Requerido.'},
                  status:{ required: 'Campo Requerido.'},
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



