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
					echo '<tr>';
					echo '<td>'. 'a permissao é '. $exibe["permissoes_id"]. '!' . '</td>';
					$permissao = $exibe['permissoes_id'];
					};?>



<br><br>
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aVenda')){ ?>
    <a href="<?php echo base_url();?>index.php/vendas/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Assinatura</a>
<?php } ?>
</br></br>
<?php

if(!$results){?>
	<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Assinaturas</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Pedido</th>
            <th>Data</th>
            <th>Assinante</th>
            <th>Pacote</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="6">Nenhuma assinatura Cadastrada</td>
        </tr>
    </tbody>
</table>
</div>
</div>
<?php } else{?>


<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-tags"></i>
         </span>
        <h5>Assinaturas</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>Pedido</th>
            <th>Data</th>
            <th>Assinante</th>
            <th>Pacote</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            $dataCadastro = date(('d/m/Y'),strtotime($r->dataCadastro));
            echo '<tr>';
            echo '<td>'.$r->idPedido.'</td>';
            echo '<td>'.$dataCadastro.'</td>';
            echo '<td><a href="'.base_url().'index.php/vendas/visualizar/'.$r->idPedido.'">'.$r->nomeCliente.'</a></td>';
            echo '<td>'.$r->planosky.'</td>';
            
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/vendas/visualizar/'.$r->idPedido.'" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/vendas/editar/'.$r->idPedido.'" class="btn btn-info tip-top" title="Editar Assinatura"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dVenda')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" venda="'.$r->idPedido.'" class="btn btn-danger tip-top" title="Excluir Assinatura"><i class="icon-remove icon-white"></i></a>'; 
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
  <form action="<?php echo base_url() ?>index.php/vendas/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Assinatura</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idPedido" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir esta Assinatura?</h5>
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
        
        var venda = $(this).attr('venda');
        $('#idPedido').val(venda);

    });

});

</script>