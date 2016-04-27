<div class="widget-box">
   
    <div class="widget-content tab-content">
        <div id="tab1" class="tab-pane active" style="min-height: 300px">
		<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#tab1">Dados do Cliente</a></li>
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
                                            <span class="icon"><i class="icon-list"></i></span><h5>Interessado</h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse in accordion-body" id="collapseGOne">
                                    <div class="widget-content">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: right; width: 30%"><strong>Id</strong></td>
                                                    <td><?php echo $result->cep ?></td>
                                                <tr>
                                                </tr>
                                                    <td style="text-align: right"><strong>Referência</strong></td>
                                                    <td><?php echo $result->cidade ?></td>
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
                                                    <td><?php echo $result->bairro ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>E-mail</strong></td>
                                                    <td><?php echo $result->email ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Cliente SKY</strong></td>
                                                    <td><?php echo $result->documento ?></td>
                                                </tr>
												</tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Atendente</strong></td>
                                                    <td><?php echo $result->rua ?></td>
                                                </tr>
												 <tr>
                                                    <td style="text-align: right"><strong>Data de Cadastro</strong></td>
                                                    <td><?php echo date('d/m/Y',  strtotime($result->dataCadastro)) ?></td>
                                                </tr>
												<tr>
                                                    <td style="text-align: right"><strong>Status</strong></td>
                                                    <td><?php echo $result->estado ?></td>
                                                </tr>
												 <tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            



          
        </div>


        <!--Tab 2-->
        <div id="tab2" class="tab-pane" style="min-height: 300px">
			<a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                <span class="icon"></i></span><h6>Histórico</h6>
            </a>
            <?php if (!$results) { ?>
                
                        <table class="table table-bordered ">
                            <thead>
                                <tr style="backgroud-color: #2D335B">
                                    <th>Data</th>
                                    <th>Descricao</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="6"> </td>
                                </tr>
                            </tbody>
                        </table>
                
             <?php } else { ?>
			 
			 <?php
                foreach ($results as $r) {
                    $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                    $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                    echo '<tr>';
                    echo '<td>' . $r->idOs . '</td>';
                    echo '<td>' . $dataInicial . '</td>';

                    if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                        echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                        echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="icon-pencil icon-white"></i></a>'; 
                    }
                    
                    echo  '</td>';
                    echo '</tr>';
                } ?>


              

                        <table class="table table-bordered ">
                            <thead>
                                <tr style="backgroud-color: #2D335B">
                                    <th>#</th>
                                    <th>Data Inicial</th>
                                    <th>Data Final</th>
                                    <th>Descricao</th>
                                    <th>Defeito</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                foreach ($results as $r) {
                    $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                    $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                    echo '<tr>';
                    echo '<td>' . $r->idOs . '</td>';
                    echo '<td>' . $dataInicial . '</td>';
                    echo '<td>' . $dataFinal . '</td>';
                    echo '<td>' . $r->descricaoProduto . '</td>';
                    echo '<td>' . $r->defeito . '</td>';

                    echo '<td>';
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'vOs')){
                        echo '<a href="' . base_url() . 'index.php/os/visualizar/' . $r->idOs . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
                    }
                    if($this->permission->checkPermission($this->session->userdata('permissao'),'eOs')){
                        echo '<a href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="icon-pencil icon-white"></i></a>'; 
                    }
                    
                    echo  '</td>';
                    echo '</tr>';
                } ?>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
            

            <?php  } ?>
			
        <div id="tab2" class="tab-pane" style="min-height: 300px">
			<a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                <span class="icon"></i></span><h6>Tentativas</h6>
            </a>
                                            <tbody>

												<div class="buttons">
												<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
												echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientes/editar/'.$result->idClientes.'"><i class="icon-white"></i>1</a>'; 
												} ?>
                    							</div>
												
												<div class="buttons">
												<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
												echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientes/editar/'.$result->idClientes.'"><i class="icon-white"></i>2</a>'; 
												} ?>
                    							</div>
												
												<div class="buttons">
												<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
												echo '<a title="Icon Title" class="btn btn-mini btn-info" href="'.base_url().'index.php/clientes/editar/'.$result->idClientes.'"><i class="icon-white"></i>3</a>'; 
												} ?>
												
												</div>
												 <tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
			
			

        </div>
    </div>
</div>