<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos_change_model extends CI_Model {

	private $pontos_change = 'jisa_pontos_change';
   
	public function select_id_turma($id_turma=null){
		$this->db->where('id_turma', $id_turma);
		return $this->db->get($this->pontos_change)->row();
	}

	public function insert($dados){
		$this->db->insert($this->pontos_change, $dados);
		return $this->db->insert_id();
	}
	
	public function update($id_turma, $dados){
		$this->db->where('id_turma', $id_turma);
		return $this->db->update($this->pontos_change, $dados);
	}

}

/* End of file Pontos_model.php */
/* Location: ./application/models/Pontos_model.php */