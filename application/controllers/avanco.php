<?php

class Avanco extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))) {
            redirect('mapos/login');
        }

        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('avanco_model', '', TRUE);
        $this->data['menuEstoque'] = 'Avanço';
    }
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vAvanco')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar os avanços.');
           redirect(base_url());
        }

        $this->load->library('pagination');
        
        
        $config['base_url'] = base_url().'index.php/avanco/gerenciar/';
        $config['total_rows'] = $this->avanco_model->count('avanco');
        $config['per_page'] = 10;
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

		$this->data['results'] = $this->avanco_model->get('avanco','idavanco,tecnico_ids_sky,tecnico_nome,produto_ids,produto_nome,metrica_produto,dataavanco,quantidadeproduto','',$config['per_page'],$this->uri->segment(3));
       
	    $this->data['view'] = 'avanco/avanco';
       	$this->load->view('tema/topo',$this->data);

       
		
    }
	
	public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vAvanco')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar avanços.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        /*original: $this->data['result'] = $this->avanco_model->getById($this->uri->segment(3));*/
		$this->data['result'] = $this->avanco_model->getByIdSky($this->uri->segment(3));
        $this->data['results'] = $this->avanco_model->getAvancoByTecnico($this->uri->segment(3));
        $this->data['view'] = 'avanco/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aAvanco')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar avanços.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('avanco') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'tecnico_ids_sky' => set_value('tecnico_ids_sky'),
				'tecnico_nome' => set_value('tecnico_nome'),
                'produto_ids' => set_value('produto_ids'),
				'produto_nome' => set_value('produto_nome'),
				'metrica_produto' => set_value('metrica_produto'),
                'quantidadeproduto' => set_value('quantidadeproduto'),
            );

            if ($this->avanco_model->add('avanco', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Avanço adicionado com sucesso!');
                redirect(base_url() . 'index.php/avanco/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'avanco/adicionarAvanco';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eAvanco')){
           $this->session->set_flashdata('error','Você não tem permissão para editar avanços.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('avanco') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'tecnico_ids_sky' => $this->input->post('tecnico_ids_sky'),
				'tecnico_nome' => $this->input->post('tecnico_nome'),
                'produto_ids' => $this->input->post('produto_ids'),
				'produto_nome' => $this->input->post('produto_nome'),
				'metrica_produto' => $this->input->post('metrica_produto'),
                'quantidadeproduto' => $this->input->post('quantidadeproduto'),
            );

            if ($this->avanco_model->edit('avanco', $data, 'idavanco', $this->input->post('idavanco')) == TRUE) {
                $this->session->set_flashdata('success', 'Avanço editado com sucesso!');
                redirect(base_url() . 'index.php/avanco/editar/'.$this->input->post('idavanco'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $this->data['result'] = $this->avanco_model->getById($this->uri->segment(3));

        $this->data['view'] = 'avanco/editarAvanco';
        $this->load->view('tema/topo', $this->data);

    }
	
    function excluir(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dAvanco')){
           $this->session->set_flashdata('error','Você não tem permissão para excluir avanços.');
           redirect(base_url());
        }
       
        
        $id =  $this->input->post('id');
        if ($id == null){

            $this->session->set_flashdata('error','Erro ao tentar excluir avanço.');            
            redirect(base_url().'index.php/avanco/gerenciar/');
        }

        $this->db->where('avanco_id', $id);
        $this->db->delete('avanco_os');

        $this->avanco_model->delete('avanco','idavanco',$id);             
        

        $this->session->set_flashdata('success','Avanço excluido com sucesso!');            
        redirect(base_url().'index.php/avanco/gerenciar/');
    }
}

