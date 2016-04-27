$clienteligou = $_GET['idCliente'];
if(isset($clienteligou)){
echo 'o numero de id retornado é '. $clienteligou;} 
else {
echo 'não houve retorno de numero do codigo';}


										$sql = "SELECT historico.ligou, historico.idHistorico
										FROM historico
										WHERE clientes_id = '$clienteligou'
										ORDER BY idHistorico DESC
										LIMIT 1";
										$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													echo '<td>'.$retorno['idHistorico'] .'</td>';
													echo '<td>'.$retorno['ligou'] .'</td>';
													echo '<td>';
									
													$ligouantigo = $retorno["ligou"];
													$idligou = $retorno["idHistorico"];
								
													echo 'ligou antigo ' . $ligouantigo;
													$novoligou = mysql_query("UPDATE historico SET ligou = 'Sim' WHERE idHistorico='$idligou'");	
										}
										$sql = mysql_query("SELECT ligou from historico
										WHERE idHistorico=$idligou");
			
										while($exibe = mysql_fetch_assoc($sql)){
								
										$ligounovo = $exibe["ligou"];
										echo 'Ligou novo ' . $ligounovo;}?>

                                <a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
									