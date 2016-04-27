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
                <h5>Editar Assinatura</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formClientes" method="post" class="form-horizontal"  >
				
                    <div class="control-group">
						<label for="idPedido" class="control-label">idPedido</label>
                        <div class="controls">
                            <input id="idPedido" type="text" name="idPedido" value="<?php echo $result->idPedido; ?>" readonly />
						</div>
				    </div>
					
					<div class="control-group">
						<label for="referencia" class="control-label">Referência</label>
                        <div class="controls">
                            <input id="referencia" type="text" name="referencia" value="<?php echo $result->referencia; ?>" readonly />
						</div>						
				    </div>
					
					<div class="control-group">
						<label for="dataCadastro" class="control-label">Data da Assinatura</label>
                        <div class="controls">
                            <input id="dataCadastro" type="text" name="dataCadastro" value="<?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?>" readonly />
						</div> 
				    </div>	
					
					 <div class="control-group">
						<label for="nomeCliente" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo $result->nomeCliente; ?>"  />
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label for="nascimento" class="control-label">Nascimento<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nascimento" type="text" name="nascimento" value="<?php echo $result->nascimento; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="sexo" class="control-label">Sexo<span class="required">:</span></label>
                        <div class="controls">
                            <input id="sexo" type="text" name="sexo" value="<?php echo $result->sexo; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="rg" class="control-label">Registro Geral<span class="required">:</span></label>
                        <div class="controls">
                            <input id="rg" type="text" name="rg" value="<?php echo $result->rg; ?>"  />
                        </div>
                    </div>		

                    <div class="control-group">
                        <label for="cpf" class="control-label">CPF<span class="required">:</span></label>
                        <div class="controls">
                            <input id="cpf" type="text" name="cpf" value="<?php echo $result->cpf; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="estadocivil" class="control-label">Estado Civil<span class="required">:</span></label>
                        <div class="controls">
                            <input id="estadocivil" type="text" name="estadocivil" value="<?php echo $result->estadocivil; ?>"  />
                        </div>
                    </div>
					
					
					<div class="control-group" class="control-label">
                        <label for="telefone" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo $result->telefone; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="celular" class="control-label">Celular<span class="required">:</span></label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="telComercial" class="control-label">Telefone Comecial<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telComercial" type="text" name="telComercial" value="<?php echo $result->telComercial; ?>"	/>
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="email" class="control-label">E-Mail<span class="required">:</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CEP<span class="required">:</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="endereco" class="control-label">Endereço<span class="required">:</span></label>
                        <div class="controls">
                            <input id="endereco" type="text" name="endereco" value="<?php echo $result->endereco; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="numero" class="control-label">Número<span class="required">:</span></label>
                        <div class="controls">
                            <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="complemento" class="control-label">Complemento<span class="required">:</span></label>
                        <div class="controls">
                            <input id="complemento" type="text" name="complemento" value="<?php echo $result->complemento; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Bairro<span class="required">:</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Cidade<span class="required">:</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="uf" class="control-label">Estado<span class="required">:</span></label>
                        <div class="controls">
                            <input id="uf" type="text" name="uf" value="<?php echo $result->uf; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="planosky" class="control-label">Plano Escolhido<span class="required">:</span></label>
                        <div class="controls">
                            <input id="planosky" type="text" name="planosky" value="<?php echo $result->planosky; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="Bandeira" class="control-label">Bandeira<span class="required">:</span></label>
                        <div class="controls">
                            <input id="Bandeira" type="text" name="Bandeira" value="<?php echo $result->Bandeira; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="numeroCartao" class="control-label">Cartão<span class="required">:</span></label>
                        <div class="controls">
                            <input id="numeroCartao" type="text" name="numeroCartao" value="<?php echo $result->numeroCartao; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="Validade" class="control-label">Validade<span class="required">:</span></label>
                        <div class="controls">
                            <input id="Validade" type="text" name="Validade" value="<?php echo $result->Validade; ?>"  />
                        </div>
                    </div>
					

					<div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
								<button type="submit" class="btn btn-success"><i class="icon-save"></i> Salvar</button>
								<button type="reset" class="btn"><i class="icon-blue"></i> Limpar Dados</button>
                                <a href="<?php echo base_url() ?>index.php/vendas" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
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
                <h5>Editar Assinatura</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formClientes" method="post" class="form-horizontal"  >
				
                    <div class="control-group">
						<label for="idPedido" class="control-label">idPedido</label>
                        <div class="controls">
                            <input id="idPedido" type="text" name="idPedido" value="<?php echo $result->idPedido; ?>" readonly />
						</div>
				    </div>
					
					<div class="control-group">
						<label for="referencia" class="control-label">Referência</label>
                        <div class="controls">
                            <input id="referencia" type="text" name="referencia" value="<?php echo $result->referencia; ?>" readonly />
						</div>						
				    </div>
					
					<div class="control-group">
						<label for="dataCadastro" class="control-label">Data da Assinatura</label>
                        <div class="controls">
                            <input id="dataCadastro" type="text" name="dataCadastro" value="<?php echo $result->dataCadastro; ?>" readonly />
						</div>
				    </div>	
					
					 <div class="control-group">
						<label for="nomeCliente" class="control-label">Nome<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nomeCliente" type="text" name="nomeCliente" value="<?php echo $result->nomeCliente; ?>"  />
                        </div>
                    </div>
					
                    <div class="control-group">
                        <label for="nascimento" class="control-label">Nascimento<span class="required">:</span></label>
                        <div class="controls">
                            <input id="nascimento" type="text" name="nascimento" value="<?php echo $result->nascimento; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="sexo" class="control-label">Sexo<span class="required">:</span></label>
                        <div class="controls">
                            <input id="sexo" type="text" name="sexo" value="<?php echo $result->sexo; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="rg" class="control-label">Registro Geral<span class="required">:</span></label>
                        <div class="controls">
                            <input id="rg" type="text" name="rg" value="<?php echo $result->rg; ?>"  />
                        </div>
                    </div>		

                    <div class="control-group">
                        <label for="cpf" class="control-label">CPF<span class="required">:</span></label>
                        <div class="controls">
                            <input id="cpf" type="text" name="cpf" value="<?php echo $result->cpf; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group">
                        <label for="estadocivil" class="control-label">Estado Civil<span class="required">:</span></label>
                        <div class="controls">
                            <input id="estadocivil" type="text" name="estadocivil" value="<?php echo $result->estadocivil; ?>"  />
                        </div>
                    </div>
					
					
					<div class="control-group" class="control-label">
                        <label for="telefone" class="control-label">Telefone<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telefone" type="text" name="telefone" value="<?php echo $result->telefone; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="celular" class="control-label">Celular<span class="required">:</span></label>
                        <div class="controls">
                            <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="telComercial" class="control-label">Telefone Comecial<span class="required">:</span></label>
                        <div class="controls">
                            <input id="telComercial" type="text" name="telComercial" value="<?php echo $result->telComercial; ?>"	/>
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="email" class="control-label">E-Mail<span class="required">:</span></label>
                        <div class="controls">
                            <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="cep" class="control-label">CEP<span class="required">:</span></label>
                        <div class="controls">
                            <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="endereco" class="control-label">Endereço<span class="required">:</span></label>
                        <div class="controls">
                            <input id="endereco" type="text" name="endereco" value="<?php echo $result->endereco; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="complemento" class="control-label">Complemento<span class="required">:</span></label>
                        <div class="controls">
                            <input id="complemento" type="text" name="complemento" value="<?php echo $result->complemento; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="bairro" class="control-label">Bairro<span class="required">:</span></label>
                        <div class="controls">
                            <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="cidade" class="control-label">Cidade<span class="required">:</span></label>
                        <div class="controls">
                            <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="uf" class="control-label">Estado<span class="required">:</span></label>
                        <div class="controls">
                            <input id="uf" type="text" name="uf" value="<?php echo $result->uf; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="planosky" class="control-label">Plano Escolhido<span class="required">:</span></label>
                        <div class="controls">
                            <input id="planosky" type="text" name="planosky" value="<?php echo $result->planosky; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="Bandeira" class="control-label">Bandeira<span class="required">:</span></label>
                        <div class="controls">
                            <input id="Bandeira" type="text" name="Bandeira" value="<?php echo $result->Bandeira; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="numeroCartao	" class="control-label">Cartão<span class="required">:</span></label>
                        <div class="controls">
                            <input id="numeroCartao	" type="text" name="numeroCartao	" value="<?php echo $result->numeroCartao; ?>"  />
                        </div>
                    </div>
					
					<div class="control-group" class="control-label">
                        <label for="Validade" class="control-label">Validade<span class="required">:</span></label>
                        <div class="controls">
                            <input id="Validade" type="text" name="Validade" value="<?php echo $result->Validade; ?>"  />
                        </div>
                    </div>
					

					<div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
								<button type="submit" class="btn btn-success"><i class="icon-save"></i> Salvar</button>
								<button type="reset" class="btn"><i class="icon-blue"></i> Limpar Dados</button>
                                <a href="<?php echo base_url() ?>index.php/vendas" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
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

