<?php
class Reentrada_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idavanco','desc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id){
        $this->db->where('idavanco',$id);
        $this->db->limit(1);
        return $this->db->get('avanco')->row();
    }
	/*acrescentado em 21/01/2016*/
	function getByIdSky($id){
        $this->db->select('tecnicos.*, avanco.*');
        $this->db->from('tecnicos');
        $this->db->join('avanco','avanco.tecnico_ids_sky = tecnicos.idskytecnico');
        $this->db->where('avanco.tecnico_ids_sky',$id);
        return $this->db->get()->row();
    }/*fim do acrescimo de 21/01/2016*/

    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
	
	function count($table){
		return $this->db->count_all($table);
	}
	
	  public function getAvancoByTecnico($id){
        $this->db->where('tecnico_ids_sky',$id);
        $this->db->order_by('produto_ids','desc');
        $this->db->limit(10);
        return $this->db->get('avanco')->result();
    }
}