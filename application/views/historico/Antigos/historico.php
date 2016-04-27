<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){ ?>
    <a href="<?php echo base_url();?>index.php/historico/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Histórico</a>    
<?php } ?>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Adicionar Histórico</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Data de Cadastro</th>
                        <th>Descrição Histórico</th>
                        <th>Retorno</th>
						<th>Data Retorno</th>
						<th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Histórico Cadastrado</td>
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
        <h5>Histórico</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
			<th>Data de Cadastro</th>
            <th>Descrição Histórico</th>
            <th>Retorno</th>
			<th>Data Retorno</th>
			<th>Ação</th>
        </tr>
    </thead>
	
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
			echo '<td>'.$r->dataCadastro.'</td>';//re
            echo '<td>'.$r->descricaoHistorico.'</td>'; 
            echo '<td>'.$r->retorno.'</td>';
			echo '<td>'.$r->dataRetorno.'</td>'; 
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){
                echo '<a href="'.base_url().'index.php/historico/visualizar/'.$r->idHistorico.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eHistorico')){
                echo '<a href="'.base_url().'index.php/historico/editar/'.$r->idHistorico.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Cliente"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dHistorico')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="'.$r->idHistorico.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Cliente"><i class="icon-remove icon-white"></i></a>'; 
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
<?php echo $this->pagination->create_links();}?>



 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/historico/excluir" method="post" >
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