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
					};?>
<br>

<?php
		$data = intval(date('m'));/*transforma o mes da data num inteiro*/
		$sql = "SELECT clientes.idClientes, clientes.dataCadastro
				FROM clientes";																	
		$query = mysql_query($sql)or die(mysql_error());
		$contador = 0.0;
		while($exibe = mysql_fetch_assoc($query)){
			$data2 = (intval(date_format(new DateTime($exibe['dataCadastro']), "m"))) . '</td>';;
			$id = $exibe['idClientes'];
				if (($data == $data2) and ($id>3986)){
				$contador++;
		}}
		$valor = 5.5 * $contador;
		echo 'Até o momento foi investido R$'. number_format($valor, 2, '.', ',') . ' reais';
					
					
					
			
/*fim do atendente*/



/*guardar a permissao*/
$sql = mysql_query("SELECT usuarios.permissoes_id from usuarios
					WHERE idUsuarios='$televendedor' ");
					while($exibe = mysql_fetch_assoc($sql)){
					$permissao = $exibe['permissoes_id'];
					};


/*Verificando se é administrador. Se for aparece sem a seleção do usuário*/

if ($permissao == '1'){


/*Leads para retornar*/

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
				<!--<th>Id Cliente</th>-->
				<!--<th>Id Histórico</th>-->
				<th>Retornar em:</th>
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
				<!--<th>Id Cliente</th>-->
				<!--<th>Id Histórico</th>-->
				<th>Retornar Em:</th>
				<th>Hora Retorno</th>
                <th>Nome</th>
				<th>Atendente</th>
                <th>Ações</th>
			</tr>
		</thead>
	
    <tbody>
								<?php
										$datadehoje = date('Y-m-d');
										$horaatual = date('H:i:s'); 	

										// Consulta que pega todos os retornos							
										
										$sql = "SELECT clientes.*, historico.*, usuarios.nome
										FROM clientes
										INNER JOIN historico
										ON clientes.idClientes = historico.clientes_id
										INNER JOIN usuarios
										ON usuarios.idUsuarios = clientes.usuario_id
										WHERE (historico.retorno = 'Sim' AND historico.dataRetorno <= '$datadehoje')
										AND historico.ligou='Nao'
										AND clientes.motivo != 'Finalizado'
										AND historico.ligou = 'Nao'
										GROUP BY clientes_id
										ORDER BY historico.horaRetorno ASC";
										$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													/*echo '<td>'.$retorno['clientes_id'] .'</td>';*/
													/*echo '<td>'.$retorno['idHistorico'] .'</td>';*/
													echo '<td>'.date_format(new DateTime($retorno['dataRetorno']), "d/m/y") .'</td>';
													echo '<td>'.date_format(new DateTime($retorno['horaRetorno']), "H:i") .'</td>';
													echo '<td>'.$retorno['nomeCliente'] .'</td>';
													echo '<td>'.$retorno['nome'] .'</td>';
													echo '<td>';
																	
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
											echo '<a href="'.base_url().'index.php/ligou/adicionar?idHistorico='.$retorno["idHistorico"].'" style="margin-right: 1%" class="btn tip-top" title="Ligou?"><i class="icon-phone"></i></a>';
											}
											echo '</td>';
											echo '</tr>';
											}?> 
											

									
		
        <tr>
		<?php $NumeroLinhas = mysql_num_rows($query);
		echo 'Há '. $NumeroLinhas . ' contatos para retornar hoje!';?>
		     
        </tr>
	
    </tbody>
	</table>
<?php } ?>
</div>
</div>
</div>


<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){ ?>
    <a href="<?php echo base_url();?>index.php/clientes/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Lead</a>    
<?php } ?>

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
                       <!--<th>Id</th>-->
                       <!--<th>Referência</th>-->
                        <th>Nome</th>
                        <th>Telefone</th>
						<th>Celular</th>
						<th>E-mail</th>
						<th>Atendente</th>
						<th>Tentativa</th>
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
                       <!--<th>Id</th>-->
                       <!--<th>Referência</th>-->
                        <th>Nome</th>
                        <th>Telefone</th>
						<th>Celular</th>
						<th>E-mail</th>
						<th>Atendente</th>
						<th>Tentativa</th>
                        <th>Ações</th>
        </tr>
    </thead>
	
    <tbody>
								<?php
								$sql =("SELECT clientes.*, usuarios.nome
								FROM clientes
								INNER JOIN usuarios
								ON usuarios.idUsuarios = clientes.usuario_id
								WHERE clientesky='Nao' 
								AND status='0'
								AND clientes.motivo != 'Finalizado'
								GROUP BY idClientes 
								ORDER BY idClientes ASC");
								$query = mysql_query($sql)or die("$sql_error" . mysql_error());
								while ($retorno = mysql_fetch_assoc($query)) {
										echo '<tr>';
										/*echo '<td>'.$retorno["idClientes"].'</td>';*/
										/*echo '<td>'.$retorno["referencia"].'</td>';*/
										echo '<td>'.$retorno["nomeCliente"].'</td>';
										echo '<td>'.$retorno["telefone"].'</td>';
										echo '<td>'.$retorno["celular"].'</td>';
										echo '<td>'.$retorno["email"].'</td>';
										echo '<td>'.$retorno["nome"] .'</td>';
										echo '<td>';
										
										
										/*Tentativa*/			
										if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
			
			
										$clienteatual = $retorno["idClientes"];/*para atualizar os status do Cliente*/
			
										$sql = mysql_query("SELECT status from clientes 
											WHERE idClientes = $clienteatual");
			
											while($exibe = mysql_fetch_assoc($sql)){
											$statusantigo = $exibe["status"];

								switch ($statusantigo) {
    case 0:?>
       <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 1</a><?
        break;
    case 1:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 2</a><?
        break;
    case 2:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 3</a><?
        break;
	case 3:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 4</a><?
	    break;
	case 4:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 5</a><?
	break;
	case 5:?>
		<?php echo 'Última tentativa! Caso não consiga contato, favor finalizar o atendimento.';?>
		<p>
		<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
		<a href="<?php echo base_url()?>index.php/fimatendimento/adicionar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Finalizar Atendimento</a>
		<?break;

}}}}/*Fim da tentativa*/

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
		<?php $NumeroLinhas = mysql_num_rows($query);
		echo 'Hoje temos '. $NumeroLinhas . ' novos leads!!';?>
            
        </tr>
    </tbody>
</table>
<?php } ?>
</div>
</div>
</div>

</div>


</div>


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

<?php } /* caso algum funcionario esteja logado, a seleção é feita por usuário*/
else {

/*Leads para retornar*/

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
				<!--<th>Id Cliente</th>-->
				<!--<th>Id Histórico</th>-->
				<th>Retornar em:</th>
				<th>Hora Retorno</th>
                <th>Nome</th>
				<th>Atendente</th>
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
				<!--<th>Id Cliente</th>-->
				<!--<th>Id Histórico</th>-->
				<th>Retornar Em:</th>
				<th>Hora Retorno</th>
                <th>Nome</th>
				<th>Atendente</th>
				<th>Tentativa</th>
                <th>Ações</th>
			</tr>
		</thead>
	
    <tbody>
								<?php
										$datadehoje = date('Y-m-d');
										$horaatual = date('H:i:s'); 	

										// Consulta que pega todos os retornos							
										
										$sql = "SELECT clientes.*, historico.*, usuarios.nome
										FROM clientes
										INNER JOIN historico
										ON clientes.idClientes = historico.clientes_id
										INNER JOIN usuarios
										ON usuarios.idUsuarios = clientes.usuario_id
										WHERE (historico.retorno = 'Sim' AND historico.dataRetorno <= '$datadehoje')
										AND historico.ligou='Nao'
										AND clientes.motivo != 'Finalizado'
										AND usuario_id='$televendedor'
										GROUP BY clientes_id
										ORDER BY historico.horaRetorno ASC";
										$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													/*echo '<td>'.$retorno['clientes_id'] .'</td>';*/
													/*echo '<td>'.$retorno['idHistorico'] .'</td>';*/
													echo '<td>'.date_format(new DateTime($retorno['dataRetorno']), "d/m/y") .'</td>';
													echo '<td>'.date_format(new DateTime($retorno['horaRetorno']), "H:i") .'</td>';
													echo '<td>'.$retorno['nomeCliente'] .'</td>';
													echo '<td>'.$retorno['nome'] .'</td>';
													echo '<td>';
													
										/*Tentativa*/			
										if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
			
			
										$clienteatual = $retorno['clientes_id'];/*para atualizar os status do Cliente*/
			
										$sql = mysql_query("SELECT status from clientes 
											WHERE idClientes = $clienteatual");
			
											while($exibe = mysql_fetch_assoc($sql)){
											$statusantigo = $exibe["status"];

								switch ($statusantigo) {
    case 0:?>
       <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno['clientes_id'] ?>" class="btn btn-success"><i class="icon-white"></i> 1</a><?
        break;
    case 1:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno['clientes_id'] ?>" class="btn btn-success"><i class="icon-white"></i> 2</a><?
        break;
    case 2:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno['clientes_id'] ?>" class="btn btn-success"><i class="icon-white"></i> 3</a><?
        break;
	case 3:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno['clientes_id'] ?>" class="btn btn-success"><i class="icon-white"></i> 4</a><?
	    break;
	case 4:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno['clientes_id'] ?>" class="btn btn-success"><i class="icon-white"></i> 5</a><?
	break;
	case 5:?>
		<?php echo 'Última tentativa! Caso não consiga contato, favor finalizar o atendimento.';?>
		<p>
		<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
		<a href="<?php echo base_url()?>index.php/fimatendimento/adicionar?idClientes=<?php echo $retorno['clientes_id'] ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Finalizar Atendimento</a>
		<?break;

}}}}/*Fim da tentativa*/

										echo '<td>';	
																				
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
										if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
											echo '<a href="'.base_url().'index.php/ligou/adicionar?idHistorico='.$retorno["idHistorico"].'" style="margin-right: 1%" class="btn tip-top" title="Ligou?"><i class="icon-phone"></i></a>';
											}
											echo '</td>';
											echo '</tr>';
											}?> 
											
		
        <tr>
		<?php $NumeroLinhas = mysql_num_rows($query);
		echo 'Você tem '. $NumeroLinhas . ' contatos para retornar hoje!';?>
            
        </tr>
    </tbody>
	</table>
<?php } ?>
</div>
</div>
</div>

<!-- Fim dos retornos-->

<!--Leads retornos perdidos-->

<?php /*if(!$results){?>

				</div>
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>RETORNOS PERDIDOS!<h5>
        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
				<th>Retornar Em</th>
				<th>Hora Retorno</th>
				<th>Id Cliente</th>
                <th>Nome</th>
				<th>Atendente</th>
                <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Retorno Perdido</td>
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
				<h5>RETORNOS PERDIDOS - Tolerância de 1 horas<h5>
		</div>

<div class="widget-content nopadding">
	<table class="table table-bordered ">
		<thead>
			<tr>				
				<th>Id Cliente</th>
				<th>Retornar Em:</th>
				<th>Hora Retorno</th>
                <th>Nome</th>
				<th>Atendente</th>
                <th>Ações</th>
			</tr>
		</thead>
	
    <tbody>
								<?php
										$datadehoje = date('Y-m-d');
										$horaatual = date('H:i:s');
										$horalimite = date('H:i:s', strtotime('-60 minute', strtotime($horaatual)));

										// Consulta que pega todos os retornos perdidos						
										
										$sql = "SELECT clientes.*, historico.*, MAX(historico.horaRetorno), usuarios.nome
										FROM clientes
										INNER JOIN historico
										ON clientes.idClientes = historico.clientes_id
										INNER JOIN usuarios
										ON usuarios.idUsuarios = clientes.usuario_id
										WHERE (historico.retorno = 'Sim' AND historico.dataRetorno = '$datadehoje')
										AND (historico.horaRetorno<'$horaatual' AND historico.horaRetorno>'$horalimite')
										AND clientes.usuario_id='$televendedor'
										AND clientes.motivo != 'Finalizado'
										GROUP BY clientes_id
										ORDER BY historico.horaRetorno ASC";
										$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													echo '<td>'.$retorno['clientes_id'] .'</td>';
													echo '<td>'.date_format(new DateTime($retorno['dataRetorno']), "d/m/y") .'</td>';
													echo '<td>'.date_format(new DateTime($retorno['horaRetorno']), "H:i") .'</td>';
													echo '<td>'.$retorno['nomeCliente'] .'</td>';
													echo '<td>'.$retorno['nome'] .'</td>';
													echo '<td>';
										
										if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
											echo '<a href="'.base_url().'index.php/clientes/visualizar/'.$retorno["idClientes"].'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
											}
											echo '</td>';
											echo '</tr>';
									}?>  
		
        <tr>
		<?php $NumeroLinhas = mysql_num_rows($query);
		echo 'Há '. $NumeroLinhas . ' contatos perdidos!';?>
            
        </tr>
    </tbody>
	</table>
<?php } */?>
<!--</div>
</div>
</div>-->


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
                       <!--<th>Id</th>-->
                       <!--<th>Referência</th>-->
                        <th>Nome</th>
                        <th>Telefone</th>
						<th>Celular</th>
						<th>E-mail</th>
						<th>Atendente</th>
						<th>Tentativa</th>
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
                       <!--<th>Id</th>-->
                       <!--<th>Referência</th>-->
                        <th>Nome</th>
                        <th>Telefone</th>
						<th>Celular</th>
						<th>E-mail</th>
						<th>Atendente</th>
						<th>Tentativa</th>
                        <th>Ações</th>
        </tr>
    </thead>
	
    <tbody>
								<?php
								$sql =("SELECT * from clientes 
								WHERE clientesky='Nao' 
								AND (usuario_id='$televendedor'
								AND status='0')
								AND clientes.motivo != 'Finalizado'
								GROUP BY idClientes 
								ORDER BY idClientes ASC
								LIMIT 10");
								$query = mysql_query($sql)or die("$sql_error" . mysql_error());
								while ($retorno = mysql_fetch_assoc($query)) {
										echo '<tr>';
										/*echo '<td>'.$retorno["idClientes"].'</td>';*/
										/*echo '<td>'.$retorno["referencia"].'</td>';*/
										echo '<td>'.$retorno["nomeCliente"].'</td>';
										echo '<td>'.$retorno["telefone"].'</td>';
										echo '<td>'.$retorno["celular"].'</td>';
										echo '<td>'.$retorno["email"].'</td>';
										echo '<td>';
										
										
										/*Tentativa*/			
										if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
			
			
										$clienteatual = $retorno["idClientes"];/*para atualizar os status do Cliente*/
			
										$sql = mysql_query("SELECT status from clientes 
											WHERE idClientes = $clienteatual");
			
											while($exibe = mysql_fetch_assoc($sql)){
											$statusantigo = $exibe["status"];

								switch ($statusantigo) {
    case 0:?>
       <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 1</a><?
        break;
    case 1:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 2</a><?
        break;
    case 2:?>
        <a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 3</a><?
        break;
	case 3:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 4</a><?
	    break;
	case 4:?>
		<a href="<?php echo base_url()?>index.php/clientes/atualizar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-white"></i> 5</a><?
	break;
	case 5:?>
		<?php echo 'Última tentativa! Caso não consiga contato, favor finalizar o atendimento.';?>
		<p>
		<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
		<a href="<?php echo base_url()?>index.php/fimatendimento/adicionar?idClientes=<?php echo $retorno["idClientes"] ?>" class="btn btn-success"><i class="icon-plus icon-white"></i> Finalizar Atendimento</a>
		<?break;

}}}}/*Fim da tentativa*/

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
		<?php $NumeroLinhas = mysql_num_rows($query);
		echo 'Hoje temos '. $NumeroLinhas . ' novos leads!!';?>
            
        </tr>
    </tbody>
</table>
<?php } ?>
</div>
</div>

<!-- Fim dos leads novos-->


</div>


</div>


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

<?php }?>

<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var cliente = $(this).attr('cliente');
        $('#idCliente').val(cliente);

    });

});

</script>