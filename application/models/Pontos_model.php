<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos_model extends CI_Model {

	private $table_pontos = 'jisa_pontos';
    private $table_jogos='jisa_jogos';
    private $table_equipes = 'jisa_equipes';
    private $table_modalidades='jisa_modalidades';
    private $table_turmas='jisa_turmas';
	private $pontos_change = 'jisa_pontos_change';




	public function truncate(){
		return $this->db->truncate($this->table_pontos);
	}



	public function select_pontos_equipes(){
		$this->db->select('p.nome_equipe, sum(p.pontos) as pontos, t.nome_turma, m.nome_modalidade');
		$this->db->from($this->table_pontos.' as p');
		$this->db->join($this->table_jogos.'  as j', 'p.id_jogo = j.id_jogo');
		$this->db->join($this->table_modalidades.' as m', 'j.id_modalidade = m.id_modalidade');
		$this->db->join($this->table_turmas.' as t', 'p.id_turma = t.id_turma');
		$this->db->group_by('nome_equipe');
		$this->db->order_by('nome_modalidade', 'asc');
		$this->db->order_by('pontos', 'desc');	
		
		return $this->db->get()->result();

	}

	public function select_pontos_turmas(){
		$this->db->select('p.id_turma, p.nome_turma, sum(p.pontos) as pontos');
		$this->db->from($this->table_pontos.' as p');
	//	$this->db->join($this->pontos_change. ' as c', 'p.id_turma = c.id_turma', 'left');
		$this->db->group_by('nome_turma');
		$this->db->order_by('pontos', 'desc');
		return $this->db->get()->result();

	}
	/*
	
	public function select_pontos_turma_id($id_turma=null){
		$this->db->select('p.id_turma, p.nome_turma, sum(p.pontos) as pontos');
		$this->db->from($this->table_pontos.' as p');
		$this->db->inner($this->pontos_change.' as c', ');
		
		$this->db->where('id_turma', $id_turma);
		return $this->db->get()->row();

	}
	/** */

	public function select_pontos_id_equipe_1(){
		$this->db->select('j.id_equipe_1 as id_equipe, t.id_turma, t.nome_turma, e.nome_equipe,'
		.'sum(j.pontos_final_1) as pontos, j.id_jogo');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_equipes.' as e', 'j.id_equipe_1=e.id_equipe');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma=t.id_turma');
		$this->db->group_by('j.id_equipe_1');
		return $this->db->get()->result();
	}
	public function select_pontos_id_equipe_2(){
		$this->db->select('j.id_equipe_2 as id_equipe, t.id_turma, t.nome_turma, e.nome_equipe,'
		.'sum(j.pontos_final_2) as pontos, j.id_jogo');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_equipes.' as e', 'j.id_equipe_2=e.id_equipe');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma=t.id_turma');
		$this->db->group_by('j.id_equipe_2');
		return $this->db->get()->result();
	}
	
	public function select_pontos_id_equipe_3(){
		$this->db->select('j.id_equipe_3 as id_equipe, t.id_turma, t.nome_turma, e.nome_equipe,'
		.'sum(j.pontos_final_3) as pontos, j.id_jogo');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_equipes.' as e', 'j.id_equipe_3=e.id_equipe');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma=t.id_turma');
		$this->db->group_by('j.id_equipe_3');
		return $this->db->get()->result();
	}
		
	public function select_pontos_id_equipe_4(){
		$this->db->select('j.id_equipe_4 as id_equipe, t.id_turma, t.nome_turma, e.nome_equipe,'
		.'sum(j.pontos_final_4) as pontos, j.id_jogo ');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_equipes.' as e', 'j.id_equipe_4=e.id_equipe');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma=t.id_turma');
		$this->db->group_by('j.id_equipe_4');
		return $this->db->get()->result();
	}
		public function select_pontos_id_equipe_5(){
		$this->db->select('j.id_equipe_5 as id_equipe, t.id_turma, t.nome_turma, e.nome_equipe,'
		.'sum(j.pontos_final_5) as pontos, j.id_jogo');
		$this->db->from($this->table_jogos.' as j');
		$this->db->join($this->table_equipes.' as e', 'j.id_equipe_5=e.id_equipe');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma=t.id_turma');
		$this->db->group_by('j.id_equipe_5');
		return $this->db->get()->result();
	}


	

	public function insert($dados){
		$this->db->insert($this->table_pontos, $dados);
		return $this->db->insert_id();
	}
	

}

/* End of file Pontos_model.php */
/* Location: ./application/models/Pontos_model.php */