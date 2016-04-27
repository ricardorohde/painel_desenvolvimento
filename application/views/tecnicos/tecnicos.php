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


?> 
<!-- Tela principal dos técnicos-->

<br />

<br />


<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aTecnico')){ ?>
    <a href="<?php echo base_url();?>index.php/tecnicos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Técnico</a>    
<?php } ?>


	<div class="widget-box">
		<div class="widget-title">
			<span class="icon">
				<i class="icon-user"></i>
			</span>
				<h5>TÉCNICOS<h5>
		</div>

		<div class="widget-content nopadding">
			<table class="table table-bordered ">
		<thead>
			<tr>	
			<!--	<th>Id</th>			-->
				<th>Id SKY</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Status</th>				
                <th>Ações</th>
			</tr>
		</thead>
	
    <tbody>
								<?php
						
										$sql = "SELECT tecnicos.*
										FROM tecnicos
										ORDER By nometecnico";
										$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													/*echo '<td>'.$retorno['idtecnicos'] .'</td>';	*/												
													echo '<td>'.$retorno['idskytecnico'] .'</td>';
													echo '<td>'.$retorno['nometecnico'] .'</td>';
													echo '<td>'.$retorno['telefonetecnico'] .'</td>';
													$situacao = $retorno['tecnicoativo'];
													if ($situacao == 0){echo '<td>'."INATIVO" .'</td>';}
													else{echo '<td>'."Ativo" .'</td>';}													
													echo '<td>';
																				
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vTecnico')){
											echo '<a href="'.base_url().'index.php/tecnicos/visualizar/'.$retorno["idtecnicos"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-list-alt"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'eTecnico')){
											echo '<a href="'.base_url().'index.php/tecnicos/editar/'.$retorno["idtecnicos"].'" style="margin-right: 1%" class="btn tip-top" title="Editar"><i class="icon-pencil"></i></a>';
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
</div>


<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aTecnicos')){ ?>
    <a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Técnico</a>    
<?php } ?>



<?php echo $this->pagination->create_links();?>




 
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