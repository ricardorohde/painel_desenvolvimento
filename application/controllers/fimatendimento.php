<?php

class Fimatendimento extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('fimatendimento_model','',TRUE);
            $this->data['menuClientes'] = 'clientes';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para finalizar atendimento.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/fimatendimento/gerenciar/';
        $config['total_rows'] = $this->fimatendimento_model->count('fimatendimento');
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
        
	    $this->data['results'] = $this->fimatendimento_model->get('fimatendimento','idFimatendimento,cliente_id,motivo,pacote','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'fimatendimento/fimatendimento';
       	$this->load->view('tema/topo',$this->data);
	  
       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para finalizar o atendimento.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('fimatendimento') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
					
            $data = array(
				'cliente_id' => set_value('cliente_id'),
                'motivo' => set_value('motivo'),
				'pacote' => set_value('pacote'),
            );

            if ($this->fimatendimento_model->add('fimatendimento', $data) == TRUE) {
                $this->session->set_flashdata('success','Finalizado com sucesso!');
                redirect(base_url() . 'index.php/fimatendimento/mudarmotivo');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
			       
        }
        $this->data['view'] = 'fimatendimento/adicionarFimatendimento';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar o fim do atendimento.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->fimatendimento_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->fimatendimento_model->getOsByHistorico($this->uri->segment(3));
        $this->data['view'] = 'fimatendimento/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
	public function mudarmotivo() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar o fim do atendimento.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->fimatendimento_model->getById($this->uri->segment(3));
        $this->data['view'] = 'fimatendimento/mudarmotivo';
        $this->load->view('tema/topo', $this->data);

        
    }


}
