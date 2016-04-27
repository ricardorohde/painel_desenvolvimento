<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Cadastro de Histórico</h5>
            </div>
            <div class="widget-content nopadding">
			
			<div class="collapse in accordion-body" id="collapseGOne">
                    <div class="widget-content">
                        <table class="table table-bordered">
                            <tbody>
							</tr>
                            </tbody>
                        </table>
                    </div>
				</div>
            </div>		
						
			<form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal" >
					<div class="control-group">
                        <label for="clientes_id" class="control-label">ID do Cliente</label>
                    </div>
		
					<div class="control-group">
                        <label for="dataCadastro" class="control-label">Data</label>
                        <div class="controls">
                            <input id="dataCadastro" type="date" name="dataCadastro" value="<?php set_value('dataCadastro'); ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="descricaoHistorico" class="control-label">Descrição</label>
                        <div class="controls">
                            <textarea id="descricaoHistorico" type="text" name="descricaoHistorico" cols="150" rows="5" value="<?php echo set_value('descricaoHistorico'); ?>" > </textarea>
                        </div>
                    </div>

					<div class="control-group">
                        <label  class="control-label">Retornar</label>
                        <div class="controls">
                            <select name="retorno" id="retorno">
                                <?php if($result->retorno == 1){$ativo = 'selected'; $inativo = '';} else{$ativo = ''; $inativo = 'selected';} ?>
                                <option value="1" <?php echo $ativo; ?>>Sim</option>
                                <option value="0" <?php echo $inativo; ?>>Não</option>
                            </select>
                        </div>
                    </div>

					
				<form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <label for="dataRetorno" class="control-label">Data de Retorno</label>
                        <div class="controls">
                            <input id="dataRetorno" type="date" name="dataRetorno" value="<?php echo set_value('dataRetorno'); ?>"  />
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




