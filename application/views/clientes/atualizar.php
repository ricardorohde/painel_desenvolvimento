			<?php $clienteatual = $_GET["idClientes"];/*para atualizar os status do Cliente*/
			echo 'o cliente atual é ' . $clienteatual;
			
			
			$sql = mysql_query("SELECT status from clientes 
			WHERE idClientes = $clienteatual");
			
			while($exibe = mysql_fetch_assoc($sql)){
								$statusantigo = $exibe["status"];
								
								echo 'status antigo ' . $statusantigo;
								$novostatus = mysql_query("UPDATE clientes SET status = status+1 WHERE idClientes=$clienteatual");	
			}
			$sql = mysql_query("SELECT status from clientes 
			WHERE idClientes = $clienteatual");
			
			while($exibe = mysql_fetch_assoc($sql)){
								
								$statusnovo = $exibe["status"];
								echo 'status novo ' . $statusnovo;}
								
				header('Location: http://www.guarusatelite.com.br/painel/index.php/clientes');
				exit;
			
			
			?> 