<?php

class Historico extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('historico_model','',TRUE);
            $this->data['menuClientes'] = 'clientes';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar clientes.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/historico/gerenciar/';
        $config['total_rows'] = $this->historico_model->count('historico');
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
        
	    $this->data['results'] = $this->historico_model->get('historico','idHistorico,dataCadastro,descricaoHistorico,retorno,dataRetorno','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'historico/historico';
       	$this->load->view('tema/topo',$this->data);
	  
       
		
    }
	
function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar Histórico.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('historico') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
			$dataRetorno = $this->input->post('dataRetorno');

            try {
                
                $dataRetorno = explode('/', $dataRetorno);
                $dataRetorno = $dataRetorno[2].'-'.$dataRetorno[1].'-'.$dataRetorno[0];


            } catch (Exception $e) {
               $dataRetorno = date('Y/m/d'); 
            }
			

			
            $data = array(
                'descricaoHistorico' => set_value('descricaoHistorico'),
                'retorno' => set_value('retorno'),
                'dataRetorno' => $dataRetorno,
				'horaRetorno' => set_value('horaRetorno'),
				'clientes_id' => set_value('clientes_id'),
            );

            if ($this->historico_model->add('historico', $data) == TRUE) {
                $this->session->set_flashdata('success','Histórico adicionado com sucesso!');
                redirect(base_url() . 'index.php/clientes/visualizar/'.$this->input->post('clientes_id'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
			          
        }
        $this->data['view'] = 'historico/adicionarHistorico';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para editar Histórico.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('historico') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
				'clientes_id' => $this->input->post('clientes_id'),				
                'descricaoHistorico' => $this->input->post('descricaoHistorico'),
                'retorno' => $this->input->post('retorno'),
                'dataRetorno' => $this->input->post('$dataRetorno'),
				'horaRetorno' => $this->input->post('horaRetorno'),		
				'ligou' => $this->input->post('ligou'),
            );

            if ($this->clientes_model->edit('historico', $data, 'idHistorico', $this->input->post('idHistorico')) == TRUE) {
                $this->session->set_flashdata('success','Histórico editado com sucesso!');
                redirect(base_url() . 'index.php/historico/editar/'.$this->input->post('idHistorico'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->historico_model->getById($this->uri->segment(3));
        $this->data['view'] = 'historico/editarHistorico';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar Histórico.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->historico_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->historico_model->getOsByHistorico($this->uri->segment(3));
        $this->data['view'] = 'historico/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    public function excluir(){

            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dHistorico')){
               $this->session->set_flashdata('error','Você não tem permissão para excluir histórico.');
               redirect(base_url());
            }

            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Erro ao tentar excluir cliente.');            
                redirect(base_url().'index.php/historico/gerenciar/');
            }

            //$id = 2;
            // excluindo OSs vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $os = $this->db->get('os')->result();

            if($os != null){

                foreach ($os as $o) {
                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('servicos_os');

                    $this->db->where('os_id', $o->idOs);
                    $this->db->delete('produtos_os');


                    $this->db->where('idOs', $o->idOs);
                    $this->db->delete('os');
                }
            }

            // excluindo Vendas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $vendas = $this->db->get('vendas')->result();

            if($vendas != null){

                foreach ($vendas as $v) {
                    $this->db->where('vendas_id', $v->idVendas);
                    $this->db->delete('itens_de_vendas');


                    $this->db->where('idVendas', $v->idVendas);
                    $this->db->delete('vendas');
                }
            }

            //excluindo receitas vinculadas ao cliente
            $this->db->where('clientes_id', $id);
            $this->db->delete('lancamentos');



            $this->historico_model->delete('historico','idHistorico',$id); 

            $this->session->set_flashdata('success','Histórico excluido com sucesso!');            
            redirect(base_url().'index.php/historico/gerenciar/');
    }
	
	
		public function ligou() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para alterar o histórico.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->historico_model->getById($this->uri->segment(3));
        $this->data['view'] = 'historico/ligou';
        $this->load->view('tema/topo', $this->data);

        
    }
}