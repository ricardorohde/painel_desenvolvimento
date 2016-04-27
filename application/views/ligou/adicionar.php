<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.validate.js"></script>

<?php /*echo 'pagina ligou!';*/
$historicoligou = $_GET['idHistorico'];
if(isset($historicoligou)){
/*echo 'o numero de id retornado é '. $clienteligou;*/} 
else {
echo 'não houve retorno de numero do codigo';}

									$sql = "SELECT historico.ligou, historico.idHistorico
											FROM historico
											WHERE idHistorico = '$historicoligou'";
									$query = mysql_query($sql)or die("$sql_error" . mysql_error());
										while ($retorno = mysql_fetch_assoc($query)) {
													echo '<tr>';
													/*echo '<td>'.$retorno['idHistorico'] .'</td>';
													echo '<td>'.$retorno['ligou'] .'</td>';*/
													echo '<td>';
									
													$ligouantigo = $retorno["ligou"];
								
													/*echo 'ligou antigo ' . $ligouantigo;*/
													$novoligou = mysql_query("UPDATE historico SET ligou = 'Sim' WHERE idHistorico='$historicoligou'");	
										}
										$sql = mysql_query("SELECT ligou from historico
										WHERE idHistorico=$historicoligou");
			
										while($exibe = mysql_fetch_assoc($sql)){
								
										$ligounovo = $exibe["ligou"];
									/*echo 'Ligou novo ' . $ligounovo;*/}
									
										header('Location: http://www.guarusatelite.com.br/painel/index.php/clientes');
										exit;
			
			
			
										
										/*if ($ligounovo = 'Sim'){
											echo 'Registrado com sucesso ';
										} 
										else {
										echo 'Não alterou! Chama o programador';
										}*/?>

                                <!--<a href="<?php echo base_url() ?>index.php/clientes" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>-->


									



