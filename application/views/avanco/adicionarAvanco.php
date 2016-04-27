<div class="row-fluid" style="margin-top:0">
    <div class="span12">
	<?php echo 'Data: ' . date("d-m-Y") . ' |    Hora: ' . date("h:i");?>
        <div class="widget-box">
            <div class="widget-title">
               <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
				
				
                <h5>Novo Avanço</h5>		
		</div>
            <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formAvanco" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="tecnico" class="control-label"><span class="required">Técnico</span></label>
                        <div class="controls">
						<!-- Seleção dos tecnicos-->
						<?php
							$query = "SELECT * from tecnicos ORDER BY nometecnico";
							$result = mysql_query($query);
								echo "<select name='tecnicos'>";
								//echo "<option value='0'>-Selecione-</option>";
									while($row = mysql_fetch_array($result)) {
										echo "<option value='".$row['idskytecnico']."'>".$row['nometecnico']."</option>";
									}
										echo "</select>";
						?>
						</p>



						

				
				
						<!-- Fim da seleção dos técnicos -->
																
						
                            <input id="tecnico" type="text" name="tecnico" value="<?php echo set_value('preco'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="preco" class="control-label"><span class="required">Preço*</span></label>
                        <div class="controls">
                            <input id="preco" class="money" type="text" name="preco" value="<?php echo set_value('preco'); ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="descricao" class="control-label">Descrição</label>
                        <div class="controls">
                            <input id="descricao" type="text" name="descricao" value="<?php echo set_value('descricao'); ?>"  />
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>
                                <a href="<?php echo base_url() ?>index.php/avanco" id="btnAdicionar" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>

<script type="text/javascript">
$(document).ready(function(){

      $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 1,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
                

            }
      });

      $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/tecnicos/autoCompleteUsuario",
            minLength: 1,
            select: function( event, ui ) {

                 $("#idskytecnico").val(ui.item.id);


            }
      });

      
      

      $("#formOs").validate({
          rules:{
             cliente: {required:true},
             tecnico: {required:true},
             dataInicial: {required:true}
          },
          messages:{
             cliente: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             dataInicial: {required: 'Campo Requerido.'}
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
</script>




                                    
