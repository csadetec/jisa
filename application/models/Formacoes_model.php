<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formacoes_model extends CI_Model {

  private $table_alunos = 'jisa_alunos';
  private $table_formacoes = 'jisa_formacoes';
  private $table_equipes = 'jisa_equipes';
  //private $table_turmas = 'jisa_turmas';
  private $table_cursos = 'jisa_cursos';

  public function truncate(){
    return $this->db->truncate($this->table_formacoes);
  }

	public function select_no_equipe($id_equipe=null){

  	$this->db->select('a.id_aluno, a.nome_aluno, '
  		.'a.turma'
  	);

  	$this->db->from($this->table_alunos.' as a');
  //	$this->db->join($this->table_cursos.' as c', 'a.id_curso = c.id_curso', 'left');
  	
    $this->db->where('a.id_aluno not in (select id_aluno from '.$this->table_formacoes.' where id_equipe = '.$id_equipe.')');
    $this->db->where('a.codcur in (select codcur from '.$this->table_equipes.' where id_equipe='.$id_equipe.')');
     $this->db->where('a.codper in (select codper from '.$this->table_equipes.' where id_equipe='.$id_equipe.')');

      $this->db->order_by('isnull(a.turma)', 'asc');
 		$this->db->order_by('a.turma', 'asc');
    $this->db->order_by('a.nome_aluno', 'asc');
 //   $this->db->limit(10);
 		
 		return $this->db->get()->result();
 	}

 	public function select_equipe($id_equipe=null){

  	$this->db->select('a.id_aluno, a.nome_aluno, '
  		.'a.turma, f.id_equipe, e.nome_equipe'
  	);

  	$this->db->from($this->table_alunos.' as a');
  	$this->db->join($this->table_formacoes.' as f', 'a.id_aluno = f.id_aluno');
  	$this->db->join($this->table_equipes.' as e', 'f.id_equipe = e.id_equipe');
    $this->db->where('f.id_equipe', $id_equipe);
 		
    $this->db->order_by('a.nome_aluno', 'asc');
 		return $this->db->get()->result();

 	}
	


  public function select_aluno_equipe($dados){
    $this->db->where($dados);
    return $this->db->get($this->table_formacoes)->row();
  }
	public function insert($dados = null){
		$this->db->insert($this->table_formacoes, $dados);
		return $this->db->insert_id();
	}

	public function delete($dados){
		$this->db->where($dados);
		return $this->db->delete($this->table_formacoes);
	}
}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */