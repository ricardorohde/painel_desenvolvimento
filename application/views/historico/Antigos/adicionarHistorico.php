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
                <h5>Cadastro de Histórico</h5>
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
                    </div>
				
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


