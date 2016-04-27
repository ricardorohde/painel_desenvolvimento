<?php

class Vendas extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('vendas_model','',TRUE);
            $this->data['menuVendas'] = 'vendas';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar assinaturas.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/vendas/gerenciar/';
        $config['total_rows'] = $this->vendas_model->count('assinaturas');
        $config['per_page'] = 20;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); 	
        
	    $this->data['results'] = $this->vendas_model->get('assinaturas','idPedido,referencia,dataCadastro,nomeCliente,nascimento,sexo,rg,cpf,estadocivil,telefone,celular,telComercial,email,cep,endereco,numero,complemento,bairro,cidade,uf,planosky,Bandeira,numeroCartao,Validade,ip_lead,optin','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'vendas/vendas';
       	$this->load->view('tema/topo',$this->data);
	  
       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar clientes.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('vendas') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
				'referencia' => set_value('referencia'),
                'nomeCliente' => set_value('nomeCliente'),
                'nascimento' => set_value('nascimento'),
                'sexo' => set_value('sexo'),
                'rg' => set_value('rg'),
                'cpf' => set_value('cpf'),
				'estadocivil' => set_value('estadocivil'),
                'telefone' => set_value('telefone'),
				'celular' => set_value('celular'),
				'telComercial' => set_value('telComercial'),
				'email' => set_value('email'),
				'cep' => set_value('cep'),
				'endereco' => set_value('endereco'),
				'numero' => set_value('numero'),
				'complemento' => set_value('complemento'),
				'bairro' => set_value('bairro'),
				'cidade' => set_value('cidade'),
				'uf' => set_value('uf'),
				'Bandeira' => set_value('Bandeira'),
				'numeroCartao' => set_value('numeroCartao'),
				'Validade' => set_value('Validade'),
				'ip' => set_value('ip'),
				'optin' => set_value('optin'),
            );

            if ($this->vendas_model->add('assinaturas', $data) == TRUE) {
                $this->session->set_flashdata('success','Assinatura adicionada com sucesso!');
                redirect(base_url() . 'index.php/vendas');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'vendas/adicionarVenda';
        $this->load->view('tema/topo', $this->data);

    }
	
	
    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eVenda')){
           $this->session->set_flashdata('error','Você não tem permissão para editar assinatura.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('vendas') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => $this->input->post('nomeCliente'),
                'nascimento' => $this->input->post('nascimento'),
				'sexo' => $this->input->post('sexo'),
                'rg' => $this->input->post('rg'),
				'cpf' => $this->input->post('cpf'),
                'estadocivil' => $this->input->post('estadocivil'),				
				'telefone' => $this->input->post('telefone'),
				'celular' => $this->input->post('celular'),
				'telComercial' => $this->input->post('telComercial'),
				'email' => $this->input->post('email'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('endereco'),
				'numero' => $this->input->post('numero'),
				'bairro' => $this->input->post('bairro'),
				'cidade' => $this->input->post('cidade'),
				'uf' => $this->input->post('uf'),
				'planosky' => $this->input->post('planosky'),
				'Bandeira' => $this->input->post('Bandeira'),
				'numeroCartao' => $this->input->post('numeroCartao'),
				'Validade' => $this->input->post('Validade'),
            );

            if ($this->vendas_model->edit('assinaturas', $data, 'idPedido', $this->input->post('idPedido')) == TRUE) {
                $this->session->set_flashdata('success','Assinatura editada com sucesso!');
                redirect(base_url() . 'index.php/vendas/editar/'.$this->input->post('idPedido'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->vendas_model->getById($this->uri->segment(3));
        $this->data['view'] = 'vendas/editarVenda';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vVenda')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar assinatura.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->vendas_model->getById($this->uri->segment(3));
        $this->data['view'] = 'vendas/visualizarVenda';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    public function excluir(){

            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dVenda')){
               $this->session->set_flashdata('error','Você não tem permissão para excluir assinatura.');
               redirect(base_url());
            }

            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Erro ao tentar excluir Assinatura.');            
                redirect(base_url().'index.php/vendas/gerenciar/');
            }

            $this->vendas_model->delete('assinaturas','idPedido',$id); 

            $this->session->set_flashdata('success','Assinatura excluida com sucesso!');            
            redirect(base_url().'index.php/vendas/gerenciar/');
    }
}