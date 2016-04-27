<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-group"></i>
                </span>
                <h5>Cadastro de Técnico</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formTecnico" method="post" class="form-horizontal" >
				    <div class="control-group">
                        <label for="idskytecnico" class="control-label">ID SKY<span class="required">:</span></label>
                        <div class="controls">
                            <input id="idskytecnico" type="text" name="idskytecnico" value="<?php echo set_value('idskytecnico'); ?>"  />
                        </div>
                    </div>
				
                    <div class="control-group">
                        <label for="nometecnico" class="control-label">Nome Técnico<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nometecnico" type="text" name="nometecnico" value="<?php echo set_value('nometecnico'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="telefonetecnico" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefonetecnico" type="text" name="telefonetecnico" value="<?php echo set_value('telefonetecnico'); ?>"  />
                        </div>
                    </div>
					
					<label  class="control-label">Status</label>
                        <div class="controls">
                            <select name="tecnicoativo" id="tecnicoativo">
                                <option value="">Escolha o Status</option>
                                <option value="1">Ativo</option>
								<option value="0">Inativo</option>
                            </select>
                        </div>
	
	              

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                <a href="<?php echo base_url() ?>index.php/tecnicos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
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
                  idskytecnico:{ required: true},
                  nometecnico:{ required: true},
				  telefonetecnico:{ required: true},
                  tecnicoativo:{ required: true},
            },
            messages:{
                  idskytecnico :{ required: 'Campo Requerido.'},
                  nometecnico:{ required: 'Campo Requerido.'},
				  telefonetecnico:{ required: 'Campo Requerido.'},
                  tecnicoativo:{ required: 'Campo Requerido.'},
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

