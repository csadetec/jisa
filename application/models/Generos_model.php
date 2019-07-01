<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generos_model extends CI_Model {
	private $table_generos='jisa_generos';
	
	public function select(){
	
		return $this->db->get($this->table_generos)->result();
	}

	/*
	
	public function select_id($id_modalidade){
	
		$this->db->where('id_modalidade', $id_modalidade);
		return $this->db->get($this->table_modalidades)->row();
	}
	
	public function update($id_modalidade, $dados){
		$this->db->where('id_modalidade', $id_modalidade);
		return $this->db->update($this->table_modalidades, $dados);
	}

	public function insert($dados){
		$this->db->insert($this->table_modalidades, $dados);
		return $this->db->insert_id();
	}
/**/
}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */