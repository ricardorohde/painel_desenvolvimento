<div class="widget-box">
   
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
		<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Lead</a></li>
            <div class="buttons">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
                        echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientes/editar/'.$result->idClientes.'"><i class="icon-pencil icon-white"></i> Editar</a>'; 
                    } ?>
                    
            </div>
        </ul>


            <div class="accordion" id="collapse-group">
                            <div class="accordion-group widget-box">
                                <div class="accordion-heading">
                                    <div class="widget-title">
                                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                            <span class="icon"><i class="icon-list"></i></span><h5>Informações</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Id</strong></td>
                                                    <td><?php echo $result->idClientes ?></td>
                                                <tr>
                                                </tr>
                                                    <td style="text-align: right"><strong>Referência</strong></td>
                                                    <td><?php echo $result->referencia ?></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: right"><strong>Nome</strong></td>
                                                    <td><?php echo $result->nomeCliente ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Telefone</strong></td>
                                                    <td><?php echo $result->telefone ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Celular</strong></td>
                                                    <td><?php echo $result->celular ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Operadora</strong></td>
                                                    <td><?php echo $result->operadora ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>E-mail</strong></td>
                                                    <td><?php echo $result->email ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Cliente SKY?</strong></td>
                                                    <td><?php echo $result->clientesky ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                                    <td><?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Atendente</strong></td>
                                                    <td><?php echo $result->atendente ?></td>
                                                </tr>

												<tr>
                                                    <td style="text-align: right"><strong>Status</strong></td>
                                                    <td><?php echo $result->status ?></td>
                                                </tr>
												
												<tr>
                                                    <td style="text-align: right"><strong>IP Lead</strong></td>
                                                    <td><?php echo $result->ip_lead ?></td>
                                                </tr>

											</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            



          
			</div>
		</div>
	</div>
</div>
			
		 <!--Tab 2 Exibicao Historico-->
		 
<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){ ?>
    <a href="<?php echo base_url()?>index.php/historico/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Histórico</a>
<?php } ?>

<?php

if(!$results){?>

    <div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Histórico</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Data</th>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="5">Nenhum Histórico Adicionado</td>
        </tr>
    </tbody>
</table>
</div>
</div>



<?php }
else{ ?>

<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-wrench"></i>
         </span>
        <h5>Histórico</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr style="backgroud-color: #2D335B">
            <th>#</th>
            <th>Data</th>
            <th>#</th>
            <th>Descrição</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idHistorico.'</td>';
            echo '<td>'.$r->dataCadastro.'</td>';
            echo '<td>'.$r->descricaoHistorico.'</td>';
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
                echo '<a style="margin-right: 1%" href="'.base_url().'index.php/historico/adicionar/'.$r->idHistorico.'" class="btn btn-info tip-top" title="Adicionar Histórico"><i class="icon-pencil icon-white"></i></a>'; 
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



<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var historico = $(this).attr('historico');
        $('#idHistorico').val(historico);

    });

});

</script>