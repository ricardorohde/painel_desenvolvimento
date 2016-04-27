<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Lead</a>    
<?php } ?>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
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
                        <td colspan="5">Nenhum Lead Cadastrado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{
	

?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-group"></i>
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
            <th>Ações</th>
        </tr>
    </thead>
	
    <tbody>
								<?php
								$sql = mysql_query("SELECT * from clientes WHERE clientesky='Nao' ORDER BY dataCadastro DESC");
									while($exibe = mysql_fetch_assoc($sql)){
										echo '<tr>';
										echo '<td>'.$exibe["idClientes"].'</td>';
										echo '<td>'.$exibe["referencia"].'</td>';
										echo '<td>'.$exibe["nomeCliente"].'</td>';
										echo '<td>'.$exibe["telefone"].'</td>';
										echo '<td>'.$exibe["celular"].'</td>';
										echo '<td>'.$exibe["operadora"].'</td>';
										echo '<td>'.$exibe["email"].'</td>';
										echo '<td>'.$exibe["dataCadastro"].'</td>';
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

<!-- E-mails enviados-->
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-ok-circle"></i>
         </span>
        <h5>E-mails Enviados</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
     <thead>
        <tr>
			<th>Nome Cliente</th>
            <th>E-mail</th>
            <th>Data Envio</th>
			<th>Hora Envio</th>
        </tr>
    </thead>

	
    <tbody>
								<?php
								$sql = mysql_query("SELECT * from clientes WHERE clientesky='Sim' ORDER BY dataCadastro DESC");
									while($exibe = mysql_fetch_assoc($sql)){

										  $name = $exibe["nomeCliente"];
										  $email = $exibe["email"];
										  $data = $exibe["dataCadastro"];
										  
										  $data_envio = date('d/m/Y');
										  $hora_envio = date('H:i:s');
										  
										
										echo '<tr>';
											echo '<td>'.$name.'</td>';
											echo '<td>'.$email.'</td>';
											echo '<td>'.$data_envio.'</td>';
											echo '<td>'.$hora_envio.'</td>';
										echo '</tr>';
									}?> 
		
        <tr>
            
        </tr>
    </tbody>
</table>


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