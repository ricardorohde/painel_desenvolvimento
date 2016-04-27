historico_model
    function getById($id){
        $this->db->where('idHistorico',$id);
        $this->db->limit(1);
        return $this->db->get('historico')->row();
    }