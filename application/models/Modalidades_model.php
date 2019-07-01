<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades_model extends CI_Model {
	private $table_modalidades='jisa_modalidades';
	
	public function select(){
	
		$this->db->order_by('nome_modalidade', 'asc');
		return $this->db->get($this->table_modalidades)->result();
	}

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

}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */