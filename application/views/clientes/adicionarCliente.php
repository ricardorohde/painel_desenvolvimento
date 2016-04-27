<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-group"></i>
                </span>
                <h5>Cadastro de Lead</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal" >
				    <div class="control-group">
                        <label for="referencia" class="control-label">Referência<span class="required">:</span></label>
                        <div class="controls">
                            <input id="referencia" type="text" name="referencia" value="<?php echo set_value('referencia'); ?>"  />
                        </div>
                    </div>
				
                    <div class="control-group">
                        <label for="nomeCliente" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo set_value('nomeCliente'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="telefone" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo set_value('telefone'); ?>"  />
                        </div>
                    </div>
				
                    <div class="control-group">
                        <label for="celular" class="control-label">Celular<span class="required">:</span></label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo set_value('celular'); ?>"  />
                        </div>
                    </div>					
	
	                <div class="control-group">
                        <label for="operadora" class="control-label">Operadora<span class="required">:</span></label>
                        <div class="controls">
                            <input id="operadora" type="text" name="operadora" value="<?php echo set_value('operadora'); ?>"  />
                        </div>
                    </div>						


                    <div class="control-group">
                        <label for="email" class="control-label">Email<span class="required">:</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />
                        </div>
                    </div>					
                           
                 								
					
                    <div class="control-group">
                        <label for="clientesky" class="control-label">Cliente SKY?<span class="required">:</span></label>
                        <div class="controls">
                            <input id="clientesky" type="text" name="clientesky" value="<?php echo set_value('clientesky'); ?>"  />
                        </div>
                    </div>

                    <!--<div class="control-group" class="control-label">
                        <label for="dataCadastro" class="control-label">Data de Cadastro<span class="required">:</span></label>
                        <div class="controls">
                            <input id="dataCadastro" type="text" name="dataCadastro" value="<?php echo set_value('dataCadastro'); ?>"  />
                        </div>
                    </div>-->

					<div class="control-group" class="control-label">
                        <label for="usuario_id" class="control-label">Atendente<span class="required">:</span></label>
                        <div class="controls">
                            <input id="usuario_id" type="text" name="usuario_id" value="<?php echo set_value('usuario_id'); ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="status" class="control-label">Status<span class="required">:</span></label>
                        <div class="controls">
                            <input id="status" type="text" name="status" value="<?php echo set_value('status'); ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="ip_lead" class="control-label">Ip Lead<span class="required">:</span></label>
                        <div class="controls">
                            <input id="ip_lead" type="text" name="ip_lead" value="<?php echo set_value('ip_lead'); ?>"  />
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
      });
</script>



-->
