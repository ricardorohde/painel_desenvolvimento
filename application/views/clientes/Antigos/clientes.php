<?php

date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR'); ?>




<!-- Leads para retornar-->
<?php
if(!$results){?>

    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>RETORNOS<h5>
        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
				<th>Retornar Em</th>
				<th>Hora Retorno</th>
                <th>Nome</th>
                <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Lead Para Retornar</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else 
{ ?>

	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-user"></i>
			</span>
				<h5>RETORNOS<h5>
		</div>

<div class="widget-content nopadding">
	<table class="table table-bordered ">
		<thead>
			<tr>				
				<th>Retornar Em:</th>
				<th>Hora Retorno</th>
                <th>Nome</th>
                <th>Ações</th>
			</tr>
		</thead>
	
    <tbody>
								<?php
									$datadehoje = date('Y-m-d');

									// Consulta que pega todos os retornos							
									
									$sql = "SELECT historico.*, clientes.*
									FROM historico 
									INNER JOIN clientes
									ON historico.clientes_id = clientes.idClientes
									WHERE historico.retorno = 'Sim' AND historico.dataRetorno = '$datadehoje'
									ORDER BY historico.dataRetorno ASC";
									$query = mysql_query($sql)or die("$sql_error" . mysql_error());
									while ($retorno = mysql_fetch_assoc($query)) {
												echo '<tr>';
												echo '<td>'.date_format(new DateTime($retorno['dataRetorno']), "d/m/y") .'</td>';
												echo '<td>'.$retorno['horaRetorno'] .'</td>';
												echo '<td>'.$retorno['nomeCliente'] .'</td>';
												echo '<td>';
										
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
											echo '<a href="'.base_url().'index.php/clientes/editar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
											echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
											}
											echo '</td>';
											echo '</tr>';
									}?>  
		
        <tr>
            
        </tr>
    </tbody>
	</table>
<?php } ?>
</div>
</div>
</div>


<!-- Leads Novos-->
<div class = "novosleads">
<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-envelope"></i>
            </span>
            <h5>NOVOS LEADS</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Referência</th>
                        <th>Nome</th>
                        <th>Telefone</th>
						<th>Celular</th>
						<th>E-mail</th>
						<th>Atendente</th>
						<th>Data Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Que pena! Não chegou nenhum lead novo. </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{ ?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-envelope"></i>
         </span>
        <h5>NOVOS LEADS</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
			<th>Id</th>
            <th>Referência</th>
            <th>Nome</th>
            <th>Telefone</th>
			<th>Celular</th>			
			<th>Operadora</th>
			<th>E-mail</th>
			<th>Data Cadastro</th>
			<th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
	
    <tbody>
								<?php
								$sql = mysql_query("SELECT * from clientes 
								WHERE clientesky='Nao' 
								AND status='0'
								GROUP BY idClientes 
								ORDER BY dataCadastro DESC
								LIMIT 10");
									while($exibe = mysql_fetch_assoc($sql)){
										echo '<tr>';
										echo '<td>'.$exibe["idClientes"].'</td>';
										echo '<td>'.$exibe["referencia"].'</td>';
										echo '<td>'.$exibe["nomeCliente"].'</td>';
										echo '<td>'.$exibe["telefone"].'</td>';
										echo '<td>'.$exibe["celular"].'</td>';
										echo '<td>'.$exibe["operadora"].'</td>';
										echo '<td>'.$exibe["email"].'</td>';
										echo '<td>'.date_format(new DateTime($exibe['dataCadastro']), "d/m/y") .'</td>';
										echo '<td>'.$exibe["status"].'</td>';
										echo '<td>';
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
											echo '<a href="'.base_url().'index.php/clientes/editar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
											echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
											}
											echo '</td>';
											echo '</tr>';
									}?> 
		
        <tr>
            
        </tr>
    </tbody>
</table>
<?php } ?>
</div>
</div>
</div>

<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/clientes" class="btn btn-success"><i class="icon-repeat"></i> <strong>Atualizar Leads</strong></a>    
<?php } ?>
</div>
<!-- Fim dos leads novos-->

<!-- Leads em Atendimento -->

<!-- Leads em  Atendimento-->

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-fixed-width icon-book"></i>
            </span>
            <h5>ATENDIMENTO</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Referência</th>
                        <th>Nome</th>
                        <th>Telefone</th>
						<th>Celular</th>
						<th>E-mail</th>
						<th>Atendente</th>
						<th>Data Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Lead Em Atendimento</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{ ?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-fixed-width icon-book"></i>
         </span>
        <h5>ATENDIMENTO</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
			<th>Id</th>
            <th>Referência</th>
            <th>Nome</th>
            <th>Telefone</th>
			<th>Celular</th>			
			<th>Operadora</th>
			<th>E-mail</th>
			<th>Data Cadastro</th>
			<th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
	
    <tbody>
								<?php
								$sql = mysql_query("SELECT * from clientes 
								WHERE clientesky='Nao' 
								AND (status >= '1' and status<='5')
								GROUP BY idClientes 
								ORDER BY dataCadastro DESC");
									while($exibe = mysql_fetch_assoc($sql)){
										echo '<tr>';
										echo '<td>'.$exibe["idClientes"].'</td>';
										echo '<td>'.$exibe["referencia"].'</td>';
										echo '<td>'.$exibe["nomeCliente"].'</td>';
										echo '<td>'.$exibe["telefone"].'</td>';
										echo '<td>'.$exibe["celular"].'</td>';
										echo '<td>'.$exibe["operadora"].'</td>';
										echo '<td>'.$exibe["email"].'</td>';
										echo '<td>'.date_format(new DateTime($exibe['dataCadastro']), "d/m/y") .'</td>';
										echo '<td>'.$exibe["status"].'</td>';
										echo '<td>';
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
											echo '<a href="'.base_url().'index.php/clientes/editar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
											echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
											}
											echo '</td>';
											echo '</tr>';
									}?> 
		
        <tr>
            
        </tr>
    </tbody>
</table>
<?php } ?>
</div>
</div>
<!--</div>-->


<!-- Fim dos Leads em Atendimento-->

<!-- Leads Finalizados-->

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-cog"></i>
            </span>
            <h5>FINALIZADOS</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Referência</th>
                        <th>Nome</th>
                        <th>Data Cadastro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Lead Finalizado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{ ?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-cog"></i>
         </span>
        <h5>FINALIZADOS</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
			<th>Id</th>
            <th>Referência</th>
            <th>Nome</th>
            <th>Data Cadastro</th>
        </tr>
    </thead>
	
    <tbody>
								<?php
								$datadehoje = date('Y-m-d H:i:i');
								$date5 = date('d/m/Y', strtotime("-5 days"));	
								$sql = mysql_query("SELECT * from clientes 
								WHERE clientesky='Nao' AND (status='6' OR status='8') 
								GROUP BY idClientes 
								ORDER BY dataCadastro DESC
								LIMIT 10");
									while($exibe = mysql_fetch_assoc($sql)){
										echo '<tr>';
										echo '<td>'.$exibe["idClientes"].'</td>';
										echo '<td>'.$exibe["referencia"].'</td>';
										echo '<td>'.$exibe["nomeCliente"].'</td>';
										echo '<td>'.date_format(new DateTime($exibe['dataCadastro']), "d/m/y") .'</td>';
										echo '<td>';
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
											echo '<a href="'.base_url().'index.php/clientes/editar/'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'dCliente')){
											echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$exibe["idClientes"].'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
											}
											echo '</td>';
											echo '</tr>';
									}?> 
		
        <tr>
            
        </tr>
    </tbody>
</table>

</div>
</div>

<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Lead</a>    
<?php } ?>
</div>


</div>


<?php echo $this->pagination->create_links();}?>




 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/clientes/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Cliente</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idCliente" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este cliente e os dados associados a ele?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>


<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var cliente = $(this).attr('cliente');
        $('#idCliente').val(cliente);

    });

});

</script>