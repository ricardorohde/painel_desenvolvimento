<?php //pegar a hora local para comparar

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR'); ?>
<!-- fim da hora local-->

<!--Atendente-->
 <?php 
 /* quem esta logado no sistema*/
$data['usuario'] = $this->session->userdata('id');
$estocador = $data['usuario'];

 /*nome do estocador*/
$sql = mysql_query("SELECT * from usuarios
					WHERE idUsuarios='$estocador' ");
					while($exibe = mysql_fetch_assoc($sql)){
					echo '<tr>';
					echo '<td>'. 'Olá, '. $exibe["nome"]. '!' . '</td>';
					};
			
/*fim do atendente*/



/*guardar a permissao*/
$sql = mysql_query("SELECT usuarios.permissoes_id from usuarios
					WHERE idUsuarios='$estocador' ");
					while($exibe = mysql_fetch_assoc($sql)){
					$permissao = $exibe['permissoes_id'];
					};


/*Verificando se é administrador. Se for aparece sem a seleção do usuário*/


if ($permissao == 1) {?> 

<!-- Tela edição dos técnicos para o Administrador-->

	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-user"></i>
			</span>
				<h5>EDITAR TÉCNICO<h5>
		</div>

            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal"  >
                    <div class="control-group">
						<label for="idtecnicos" class="control-label">Id Técnico</label>
                        <div class="controls">
                            <input id="idtecnicos type="text" name="idtecnicos" value="<?php echo $result->idtecnicos; ?>" readonly />
						</div>
						</div>
						
					<div class="control-group">
						<label for="idskytecnico" class="control-label">Id SKY</label>
                        <div class="controls">
                            <input id="idskytecnico type="text" name="idskytecnico" value="<?php echo $result->idskytecnico; ?>"/>
						</div>
					</div>
						
					 <div class="control-group">
						<label for="nometecnico" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nometecnico" type="text" name="nometecnico" value="<?php echo $result->nometecnico; ?>"  />
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label for="telefonetecnico" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefonetecnico" type="text" name="telefonetecnico" value="<?php echo $result->telefonetecnico; ?>"  />
                        </div>
                    </div>
					
					<label  class="control-label">Status</label>
                        <div class="controls">
                            <select name="tecnicoativo" id="tecnicoativo">
                                <option value="<?php echo $result->tecnicoativo; ?>">
								<?php $situacao = $result->tecnicoativo; 
								if ($situacao == 0){echo "INATIVO" . '</option>';?>
								<option value="1">Ativo</option>'<?php }
								else {echo "Ativo" . '</option>';?>	
								<option value="0">Inativo</option><?php }?>
                             </select>
                        </div>
             
					<div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
								<button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> SALVAR</button>
								<!--<button type="reset" class="btn"><i class="icon-blue"></i> Limpar Dados</button>-->
                                <a href="<?php echo base_url() ?>index.php/tecnicos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } else {?>

<!-- Tela edição dos técnicos para o quem não é administrador-->

	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-user"></i>
			</span>
				<h5>EDITAR TÉCNICO<h5>
		</div>

            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal"  >
                    <div class="control-group">
						<label for="idtecnicos" class="control-label">Id Técnico</label>
                        <div class="controls">
                            <input id="idtecnicos type="text" name="idtecnicos" value="<?php echo $result->idtecnicos; ?>" readonly />
						</div>
						</div>
						
					<div class="control-group">
						<label for="idskytecnico" class="control-label">Id SKY</label>
                        <div class="controls">
                            <input id="idskytecnico type="text" name="idskytecnico" value="<?php echo $result->idskytecnico; ?>" readonly />
						</div>
					</div>
						
					 <div class="control-group">
						<label for="nometecnico" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nometecnico" type="text" name="nometecnico" value="<?php echo $result->nometecnico; ?>" readonly />
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label for="telefonetecnico" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefonetecnico" type="text" name="telefonetecnico" value="<?php echo $result->telefonetecnico; ?>"  />
                        </div>
                    </div>
					
					<label  class="control-label">Status</label>
                        <div class="controls">
                            <select name="tecnicoativo" id="tecnicoativo">
                                <option value="<?php echo $result->tecnicoativo; ?>">
								<?php $situacao = $result->tecnicoativo; 
								if ($situacao == 0){echo "INATIVO" . '</option>';?>
								<option value="1">Ativo</option>'<?php }
								else {echo "Ativo" . '</option>';?>	
								<option value="0">Inativo</option><?php }?>
                             </select>
                        </div>
             
					<div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
								<button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> SALVAR</button>
								<!--<button type="reset" class="btn"><i class="icon-blue"></i> Limpar Dados</button>-->
                                <a href="<?php echo base_url() ?>index.php/tecnicos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>

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
                  idskytecnico:{ required: 'Campo Requerido.'},
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

