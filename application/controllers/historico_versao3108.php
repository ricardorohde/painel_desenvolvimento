<?php

class Historico extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('historico_model','',TRUE);
            $this->data['menuHistorico'] = 'historico';//*verificar se tal parte é necessária. 
	}	
	
	
    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar historico.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('historico') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
				'descricaoHistorico' => set_value('descricaoHistorico'),
                'retorno' => set_value('retorno'),
                'dataRetorno' => set_value('dataRetorno'),
            );

            if ($this->historico_model->add('historico', $data) == TRUE) {
                $this->session->set_flashdata('success','Historico adicionado com sucesso!');
                redirect(base_url() . 'index.php/historico/adicionarHistorico');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'historico/adicionarHistorico';
        $this->load->view('tema/topo', $this->data);

    }

    public function visualizar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar historicos.');
           redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->historico_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->historico_model->getHistoricoByCliente($this->uri->segment(3));
        $this->data['view'] = 'historico/adicionarHistorico';
        $this->load->view('tema/topo', $this->data);

        
    }
	
}