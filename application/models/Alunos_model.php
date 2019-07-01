<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Alunos_model extends CI_Model {


 	private $table_alunos = 'jisa_alunos';
 	private $table_turmas = 'jisa_turmas';


 	public function truncate(){
 		return $this->db->truncate($this->table_alunos);
 	}
 	public function insert($dados){
 		
 		return $this->db->insert($this->table_alunos, $dados);
 		
 	}
 
 	public function update($id=0, $dados=null){
 		$this->db->set($dados);
 		$this->db->where('id_aluno', $id);
 		return $this->db->update($this->table_alunos);

 	}

  public function select(){

 	//	$this->db->where('turma !=', "");
  		$this->db->select('a.id_aluno, a.nome_aluno, '
  		.'t.nome_turma'
  		);

  		$this->db->from($this->table_alunos.' as a');
  		$this->db->join($this->table_turmas.' as t', 'a.id_turma = t.id_turma', 'left');
 		$this->db->order_by('t.nome_turma', 'asc');
 		$this->db->order_by('a.nome_aluno', 'asc');
 		
 		return $this->db->get()->result();
 	}
 	public function select_id($id=null){

 		$this->db->where('id_aluno', $id);
 		return $this->db->get($this->table_alunos)->row();
 	}
 
}
 
 /* End of file Alunos_model.php */
 /* Location: ./application/models/Alunos_model.php */ ?>