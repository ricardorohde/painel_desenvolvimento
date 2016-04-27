			<?php 
			$sql = "SELECT fimatendimento.cliente_id, fimatendimento.idFimatendimento
					FROM fimatendimento
					ORDER BY idFimatendimento DESC
					LIMIT 1";
			
			$query = mysql_query($sql)or die("$sql_error" . mysql_error());
					while ($retorno = mysql_fetch_assoc($query)) {
						$ultimocliente = $retorno['cliente_id'];
					}
			

			/*echo 'o cliente atual é ' . $ultimocliente;*/
			
			
			$sql = mysql_query("SELECT motivo from clientes 
			WHERE idClientes = $ultimocliente");
			
			while($exibe = mysql_fetch_assoc($sql)){
								$motivoantigo = $exibe["motivo"];
								
								/*echo 'motivo antigo ' . $motivoantigo;*/
								$novomotivo = mysql_query("UPDATE clientes SET motivo = 'Finalizado' WHERE idClientes=$ultimocliente");	
			}
			$sql = mysql_query("SELECT motivo from clientes 
			WHERE idClientes = $ultimocliente");
			
			while($exibe = mysql_fetch_assoc($sql)){
								
								$motivonovo = $exibe["motivo"];
								/*echo 'Motivo novo ' . $motivonovo;*/}?>

                                <a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
