<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Histórico</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <?php echo form_hidden('idClientes',$result->idClientes) ?>
						
						<label for="referencia" class="control-label">Referência<span class="required">:</span></label>
                        <div class="controls">
                            <input id="referencia" type="text" name="referencia" value="<?php echo $result->referencia; ?>"  />
                        </div>
						
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

                    <div class="control-group">
                        <label for="clientesky" class="control-label">Cliente SKY?<span class="required">:</span></label>
                        <div class="controls">
                            <input id="clientesky" type="text" name="clientesky" value="<?php echo $result->clientesky; ?>"  />
                        </div>
                    </div>

                    <div class="control-group" class="control-label">
                        <label for="dataCadastro" class="control-label">Data de Cadastro<span class="required">:</span></label>
                        <div class="controls">
                            <input id="dataCadastro" type="text" name="dataCadastro" value="<?php echo $result->dataCadastro; ?>"  />
                        </div>
                    </div>

					<div class="control-group" class="control-label">
                        <label for="atendente" class="control-label">Atendente<span class="required">:</span></label>
                        <div class="controls">
                            <input id="atendente" type="text" name="atendente" value="<?php echo $result->atendente; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="status" class="control-label">Status<span class="required">:</span></label>
                        <div class="controls">
                            <input id="status" type="text" name="status" value="<?php echo $result->status; ?>"  />
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
      });
</script>

