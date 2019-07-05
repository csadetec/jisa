<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turmas_model extends CI_Model {

	private $table_turmas = 'jisa_turmas'; 
	private $table_cursos = 'jisa_cursos';
	public function select(){
		$this->db->select('t.id_turma, t.nome_turma, c.nome_curso');
		$this->db->from($this->table_turmas.' as t');
		$this->db->join($this->table_cursos.' as c', 't.id_curso = c.id_curso');
		$this->db->order_by('t.nome_turma', 'asc');
		return $this->db->get()->result();
	}


	
	public function select_id($id_turma=null){
		$this->db->where('id_turma', $id_turma);
		return $this->db->get($this->table_turmas)->row();
	}


	public function insert($dados=null){
		$this->db->insert($this->table_turmas, $dados);
		return $this->db->insert_id();

	}
	

	public function update($id_turma, $dados){
		$this->db->where('id_turma', $id_turma);
		return $this->db->update($this->table_turmas, $dados);
	}

}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */