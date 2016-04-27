<?php

class Tecnicos extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('tecnicos_model','',TRUE);
            $this->data['menuEstoque'] = 'tecnicos';
	}	
	
	function index(){
		$this->gerenciar();
	}

	function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vTecnico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar técnicos.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/tecnicos/gerenciar/';
        $config['total_rows'] = $this->tecnicos_model->count('tecnicos');
        $config['per_page'] = 25;
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
        
	    $this->data['results'] = $this->tecnicos_model->get('tecnicos','idtecnicos,idskytecnico,nometecnico,telefonetecnico,tecnicoativo','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'tecnicos/tecnicos';
       	$this->load->view('tema/topo',$this->data);
	  
       
		
    }
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aTecnico')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar técnicos.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('tecnicos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
				'idskytecnico' => set_value('idskytecnico'),
                'nometecnico' => set_value('nometecnico'),
                'telefonetecnico' => set_value('telefonetecnico'),
                'tecnicoativo' => set_value('tecnicoativo'),
            );

            if ($this->tecnicos_model->add('tecnicos', $data) == TRUE) {
                $this->session->set_flashdata('success','Técnico adicionado com sucesso!');
                redirect(base_url() . 'index.php/tecnicos/tecnicos/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'tecnicos/adicionarTecnicos';
        $this->load->view('tema/topo', $this->data);

    }

    function editar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eTecnico')){
           $this->session->set_flashdata('error','Você não tem permissão para editar técnicos.');
           redirect(base_url());
        }
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('tecnicos') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'idskytecnico' => $this->input->post('idskytecnico'),
                'nometecnico' => $this->input->post('nometecnico'),
				'telefonetecnico' => $this->input->post('telefonetecnico'),
                'tecnicoativo' => $this->input->post('tecnicoativo'),
		
            );

            if ($this->tecnicos_model->edit('tecnicos', $data, 'idtecnicos', $this->input->post('idtecnicos')) == TRUE) {
                $this->session->set_flashdata('success','Técnico editado com sucesso!');
                redirect(base_url() . 'index.php/tecnicos/tecnicos/');
				/*originial "redirect(base_url() . 'index.php/tecnicos/editar/'.$this->input->post('idtecnicos'));"*/
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->tecnicos_model->getById($this->uri->segment(3));
        $this->data['view'] = 'tecnicos/editarTecnicos';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vTecnico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar técnicos.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->tecnicos_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->tecnicos_model->getAvancoByTecnico($this->uri->segment(3));
        $this->data['view'] = 'tecnicos/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
	
    public function excluir(){

            if(!$this->permission->checkPermission($this->session->userdata('permissao'),'dTecnico')){
               $this->session->set_flashdata('error','Você não tem permissão para excluir técnico.');
               redirect(base_url());
            }

            
            $id =  $this->input->post('id');
            if ($id == null){

                $this->session->set_flashdata('error','Erro ao tentar excluir técnico.');            
                redirect(base_url().'index.php/tecnicos/gerenciar/');
            }

            //$id = 2;
            // excluindo OSs vinculadas ao cliente
            $this->db->where('tecnicos_id', $id);
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
            $this->db->where('tecnicos_id', $id);
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
            $this->db->where('tecnicos_id', $id);
            $this->db->delete('lancamentos');



            $this->tecnicos_model->delete('tecnicos','idtecnicos',$id); 

            $this->session->set_flashdata('success','Técnico excluido com sucesso!');            
            redirect(base_url().'index.php/tecnicos/gerenciar/');
    }
	
}