<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-align-justify"></i>
                </span>
                <h5>Cadastro de Estoque</h5>
            </div>
            <div class="widget-content nopadding">
                <?php echo $custom_error; ?>
                <form action="<?php echo current_url(); ?>" id="formProduto" method="post" class="form-horizontal" >
				<div class="control-group">
                        <label for="dataentrada" class="control-label">Data Entrada<span class="required">:</span></label>
                        <div class="controls">
                            <input id="dataentrada" type="text" name="dataentrada" value="<?php echo date ('d/m/Y')?>" readonly />
                        </div>
                    </div>
					
                     <div class="control-group">
                        <label for="notafiscal" class="control-label">Nota Fiscal<span class="required">:</span></label>
                        <div class="controls">
                            <input id="notafiscal" type="text" name="notafiscal" value="<?php echo set_value('notafiscal'); ?>"  />
                        </div>
                    </div>

					<div class="control-group">
                    <label  class="control-label">Item:</label>
                        <div class="controls">
						<?php
							$query = "SELECT * from materiais ORDER BY nomematerial";
							$result = mysql_query($query);
								echo "<select name='descricao'>";
								echo "<option value=''>-Selecione-</option>";
									while($row = mysql_fetch_array($result)) {
										echo "<option value='".$row['sky_codigo']."'>".$row['nomematerial']."</option>";
									}
										echo "</select>";
						?>
                        </div>
					</label>
					</div>
						
					<div class="control-group">
                        <label for="estoque" class="control-label">Quantidade:<span class="required"></span></label>
                        <div class="controls">
                            <input id="estoque" type="text" name="estoque" value="<?php echo set_value('estoque'); ?>"  />
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <!--<button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar</button>-->
								<a href="#modal-confirmar" role="button" data-toggle="modal" cliente="'.$row['sky_codigo'].''" style="margin-right: 1%" class="btn btn-success" title="Inserção"><i class="icon-plus icon-white"></i> Adicionar</a>
                                <a href="<?php echo base_url() ?>index.php/produtos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

         </div>
     </div>
</div>

<!-- Modal -->
<div id="modal-confirmar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/insercao/adicionar" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Inserir</button>
    <h5 id="myModalLabel">Confirmar Inserção</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="sky_codigo" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente inserir estes produtos?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Inserir</button>
  </div>
  </form>
</div>




<script src="<?php echo base_url()?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/maskmoney.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#formProduto').validate({
            rules :{
                  notafiscal: { required: true},
                  descricao: { required: true},
                  estoque: { required: true},
            },
            messages:{
                  notafiscal: { required: 'Campo Requerido.'},
                  descricao: {required: 'Campo Requerido.'},
                  estoque: { required: 'Campo Requerido.'},
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



