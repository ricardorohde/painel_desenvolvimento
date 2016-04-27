<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Telstar</title>
			<meta charset="UTF-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			
				<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
				<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" />
				<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-style.css" />
				<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matrix-media.css" />
				<link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
				<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.css" /> 
				<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
				
			<script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
	</head>
	
	
	<body>

	<!--Header-part-->
		<div id="header">
			<h1><a href="">Telstar</a></h1>
		</div>
	<!--close-Header-part--> 

	<!--top-Header-menu-->
	<div id="user-nav" class="navbar navbar-inverse">
		<ul class="nav">
			<li class=""><a title="" href="<?php echo base_url();?>index.php/mapos/minhaConta"><i class="icon icon-star"></i> <span class="text">Minha Conta</span></a></li>
			<li class=""><a title="" href="<?php echo base_url();?>index.php/mapos/sair"><i class="icon icon-share-alt"></i> <span class="text">Sair do Sistema</span></a></li>
		</ul>
	</div>
	
	<!--start-top-serch-->
	<div id="search">
		<form action="<?php echo base_url()?>index.php/mapos/pesquisar">
			<input type="text" name="termo" placeholder="Pesquisar..."/>
			<button type="submit"  class="tip-bottom" title="Pesquisar"><i class="icon-search icon-white"></i></button>
		</form>
	</div>
	<!--close-top-serch--> 

	<!--sidebar-menu-->
	<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i> Menu</a>
		<ul>
			<li class="<?php if(isset($menuPainel)){echo 'active';};?>"><a href="<?php echo base_url()?>"><i class="icon icon-home"></i> <span>Menu Inicial</span></a></li>
			
			<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){ ?>
			<li class="submenu <?php if(isset($menuClientes)){echo 'active open';};?>">
			<a href="#"><i class="icon icon-group"></i> <span>Televendas</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
				<ul>
					<li><a href="<?php echo base_url()?>index.php/clientes">Retornos e Novos Leads</a></li>
					<li><a href="<?php echo base_url()?>index.php/atendimento">Em Atendimento</a></li>
					<li><a href="<?php echo base_url()?>index.php/finalizados">Finalizados</a></li>
					<!-- Inativo<li><a href="<?php echo base_url()?>index.php/financeiro">Todos os Leads</a></li>
					<li><a href="<?php echo base_url()?>index.php/arquivos">Pesquisar</a></li> Inativo-->
				</ul>	
							
			</li>		


			<?php } ?>
		<!-- Inativo	
			<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){ ?>
			<li class="submenu <?php if(isset($menuVendas)){echo 'active open';};?>">
			<a href="#"><i class="icon icon-group"></i> <span>Cadastro de Vendas</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
			<ul>
				<li><a href="<?php echo base_url()?>index.php/vendas">Monitoramento de Vendas</a></li>
				<li><a href="<?php echo base_url()?>index.php/os">Cadastrar Nova Venda</a></li>
				<li><a href="<?php echo base_url()?>index.php/retornosexternos">Finalizados</a></li>
				<li><a href="<?php echo base_url()?>index.php/retornosexternos">Todos Vendas - Mês Atual</a></li>
			</ul>
			</li>
			<?php } ?>Inativo-->
    

			<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){ ?>
				<li class="submenu <?php if(isset($menuVendas)){echo 'active open';};?>">
				<a href="#"><i class="icon icon-shopping-cart"></i> <span>Assinaturas</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
				<ul>
					<li><a href="<?php echo base_url()?>index.php/vendas">Assinaturas</a></li>
					<li><a href="<?php echo base_url()?>index.php/vendas/adicionar">Cadastrar Assinatura</a></li>
					<li><a href="<?php echo base_url()?>index.php/vendas/finalizadas">Finalizadas Mês</a></li>
				</ul>
				</li>
			<?php } ?>   
			
			<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vTecnico')){ ?>
				<li class="submenu <?php if(isset($menuEstoque)){echo 'active open';};?>">
				<a href="#"><i class="icon icon-list-alt"></i> <span> Estoque</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
				<ul>
					<li><a href="<?php echo base_url()?>index.php/avanco">Avanço</a></li>
					<li><a href="<?php echo base_url()?>index.php/baixa">Baixa</a></li>						
					<li><a href="<?php echo base_url()?>index.php/produtos">Produtos</a></li>					
					<li><a href="<?php echo base_url()?>index.php/reentrada">Reúso</a></li>					
					<li><a href="<?php echo base_url()?>index.php/relatorios">Relatórios</a></li>
					<li><a href="<?php echo base_url()?>index.php/tecnicos">Técnicos</a></li>	
				</ul>
				</li>
			<?php } ?>
		
		
		<!-- Inativo
			<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){ ?>
				<li class="submenu <?php if(isset($menuVendas)){echo 'active open';};?>">
				<a href="#"><i class="icon icon-list-alt"></i> <span>Desempenho</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
				<ul>
					<li><a href="<?php echo base_url()?>index.php/cadastrar">Meta</a></li>
					<li><a href="<?php echo base_url()?>index.php/vendasanalise">Vendedores</a></li>
					<li><a href="<?php echo base_url()?>index.php/cadastrar">Pesquisar</a></li>

				</ul>
				</li>
			<?php } ?>        
			   Inativo-->
			<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')  || $this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente') || $this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao') || $this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){ ?>
				<li class="submenu <?php if(isset($menuConfiguracoes)){echo 'active open';};?>">
				<a href="#"><i class="icon icon-cog"></i> <span>Configurações</span> <span class="label"><i class="icon-chevron-down"></i></span></a>
				<ul>
				
				<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
					<li><a href="<?php echo base_url()?>index.php/usuarios">Usuários</a></li>
				<?php } ?>
			
				<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cEmitente')){ ?>
					<li><a href="<?php echo base_url()?>index.php/mapos/emitente">Emitente</a></li>
				<?php } ?>
				
				<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
					<li><a href="<?php echo base_url()?>index.php/permissoes">Permissões</a></li>
				<?php } ?>
				
				<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cBackup')){ ?>
					<li><a href="<?php echo base_url()?>index.php/mapos/backup">Backup</a></li>
				<?php } ?>
 
				</ul>
				</li>
			<?php } ?>
    
   			

		</ul>
	</div>
	<!--END - sidebar-menu-->
	

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url()?>" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> Principal</a> <?php if($this->uri->segment(1) != null){?><a href="<?php echo base_url().'index.php/'.$this->uri->segment(1)?>" class="tip-bottom" title="<?php echo ucfirst($this->uri->segment(1));?>"><?php echo ucfirst($this->uri->segment(1));?></a> <?php if($this->uri->segment(2) != null){?><a href="<?php echo base_url().'index.php/'.$this->uri->segment(1).'/'.$this->uri->segment(2) ?>" class="current tip-bottom" title="<?php echo ucfirst($this->uri->segment(2)); ?>"><?php echo ucfirst($this->uri->segment(2));} ?></a> <?php }?></div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
          <?php if($this->session->flashdata('error') != null){?>
                            <div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php echo $this->session->flashdata('error');?>
                           </div>
                      <?php }?>

                      <?php if($this->session->flashdata('success') != null){?>
                            <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php echo $this->session->flashdata('success');?>
                           </div>
                      <?php }?>
                          
                      <?php if(isset($view)){echo $this->load->view($view);}?>


      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2015-2016 &copy; Guarusatélite - SKY HDTV é ISSO.</div>
</div>
<!--end-Footer-part-->


<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/matrix.js"></script> 


</body>
</html>