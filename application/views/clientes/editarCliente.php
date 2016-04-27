<?php //pegar a hora local para comparar

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR'); ?>
<!-- fim da hora local-->

<!--Atendente-->
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
			
/*fim do atendente*/



/*guardar a permissao*/
$sql = mysql_query("SELECT usuarios.permissoes_id from usuarios
					WHERE idUsuarios='$televendedor' ");
					while($exibe = mysql_fetch_assoc($sql)){
					$permissao = $exibe['permissoes_id'];
					};


/*Verificando se é administrador. Se for aparece sem a seleção do usuário*/

if ($permissao == '1'){?>
	

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Cliente</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal"  >
                    <div class="control-group">
						<label for="idClientes" class="control-label">idClientes</label>
                        <div class="controls">
                            <input id="idClientes" type="text" name="idClientes" value="<?php echo $result->idClientes; ?>" readonly />
						</div>
				    </div>
						
					 <div class="control-group">
						<label for="nomeCliente" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo $result->nomeCliente; ?>"  />
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label for="telefone" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo $result->telefone; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Celular<span class="required">:</span></label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="operadora" class="control-label">Operadora<span class="required">:</span></label>
                        <div class="controls">
                            <input id="operadora" type="text" name="operadora" value="<?php echo $result->operadora; ?>"  />
                        </div>
                    </div>		

                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">:</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"  />
                        </div>
                    </div>

					<div class="control-group" class="control-label">
                        <label for="usuario_id" class="control-label">Atendente<span class="required">:</span></label>
                        <div class="controls">
                            <input id="usuario_id" type="text" name="usuario_id" value="<?php echo $result->usuario_id; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="status" class="control-label">Status<span class="required">:</span></label>
                        <div class="controls">
                            <input id="status" type="text" name="status" value="<?php echo $result->status; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="referencia" class="control-label">Referência<span class="required">:</span></label>
                        <div class="controls">
                            <input id="referencia" type="text" name="referencia" value="<?php echo $result->referencia; ?>" readonly />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="clientesky" class="control-label">Cliente SKY?<span class="required">:</span></label>
                        <div class="controls">
                            <input id="clientesky" type="text" name="clientesky" value="<?php echo $result->clientesky; ?>" readonly />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="ip_lead" class="control-label">IP Lead<span class="required">:</span></label>
                        <div class="controls">
                            <input id="ip_lead" type="text" name="ip_lead" value="<?php echo $result->ip_lead; ?>" readonly />
                        </div>
                    </div>
					

					<div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
								<button type="submit" class="btn btn-success"><i class="icon-save"></i> Salvar</button>
								<button type="reset" class="btn"><i class="icon-blue"></i> Limpar Dados</button>
                                <a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } /* caso algum funcionario esteja logado, a seleção é feita por usuário*/
else {?>


<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Cliente</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                               <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal"  >
                    <div class="control-group">
						<label for="idClientes" class="control-label">idClientes</label>
                        <div class="controls">
                            <input id="idClientes" type="text" name="idClientes" value="<?php echo $result->idClientes; ?>" readonly />
						</div>
				    </div>
						
					 <div class="control-group">
						<label for="nomeCliente" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo $result->nomeCliente; ?>" readonly  />
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label for="telefone" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo $result->telefone; ?>" readonly />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="celular" class="control-label">Celular<span class="required">:</span></label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>" readonly />
                        </div>
                    </div>				
		
					<div class="control-group">
                        <label for="operadora" class="control-label">Operadora<span class="required">:</span></label>
                        <div class="controls">
                            <input id="operadora" type="text" name="operadora" value="<?php echo $result->operadora; ?>"  />
                        </div>
                    </div>		

                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">:</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>" readonly />
                        </div>
                    </div>

					<div class="control-group" class="control-label">
                        <label for="usuario_id" class="control-label">Atendente<span class="required">:</span></label>
                        <div class="controls">
                            <input id="usuario_id" type="text" name="usuario_id" value="<?php echo $result->usuario_id; ?>" readonly />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="status" class="control-label">Status<span class="required">:</span></label>
                        <div class="controls">
                            <input id="status" type="text" name="status" value="<?php echo $result->status; ?>" readonly  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="referencia" class="control-label">Referência<span class="required">:</span></label>
                        <div class="controls">
                            <input id="referencia" type="text" name="referencia" value="<?php echo $result->referencia; ?>" readonly />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="clientesky" class="control-label">Cliente SKY?<span class="required">:</span></label>
                        <div class="controls">
                            <input id="clientesky" type="text" name="clientesky" value="<?php echo $result->clientesky; ?>" readonly />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="ip_lead" class="control-label">IP Lead<span class="required">:</span></label>
                        <div class="controls">
                            <input id="ip_lead" type="text" name="ip_lead" value="<?php echo $result->ip_lead; ?>" readonly />
                        </div>
                    </div>

					<div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
								<button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
								<button type="reset" class="btn"><i class="icon-blue"></i> Limpar Dados</button>
                                <a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
	
	
<?php }?>

<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
           $('#formCliente').validate({
            rules :{
                  telefone:{ required: true},
				  celular:{ required: true},
                  operadora:{ required: true},
                  email:{ required: true},
                  },
            messages:{
                  telefone:{ required: 'Campo Requerido.'},
				  celular:{ required: 'Campo Requerido.'},
                  operadora:{ required: 'Campo Requerido.'},
                  email:{ required: 'Campo Requerido.'},
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
      });
</script>

