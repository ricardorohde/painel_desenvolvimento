<?php

class Historico extends CI_Controller {
    

    function __construct() {
        parent::__construct();
            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('historico_model','',TRUE);
            $this->data['menuHistorico'] = 'historico';
	}	
	

    function adicionar() {
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aHistorico')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar histórico.');
           redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('historico') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
				'dataCadastro' => set_value('dataCadastro'),
                'descricaoHistorico' => set_value('descricaoHistorico'),
                'retorno' => set_value('retorno'),
                'dataRetorno' => $this->input->post('dataRetorno'),
            );

            if ($this->historico_model->add('historico', $data) == TRUE) {
                $this->session->set_flashdata('success','Histórico adicionado com sucesso!');
                redirect(base_url() . 'index.php/historico/adicionar/');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['view'] = 'historico/adicionarHistorico';
        $this->load->view('tema/topo', $this->data);

    }

   
}