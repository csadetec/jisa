<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipes_model extends CI_Model {

	private $table_equipes = 'jisa_equipes';
	private $table_turmas = 'jisa_turmas';
	private $table_modalidades = 'jisa_modalidades';
	
	public function select_por_modalidade_id($id_modalidade){
		$this->db->where('id_modalidade', $id_modalidade);
		return $this->db->get($this->table_equipes)->result();
		
		
	}
	public function select(){
		$this->db->select('e.id_equipe, e.nome_equipe, t.nome_turma, '
		.'(select count(id_equipe) from jisa_formacoes where id_equipe = e.id_equipe) as qtd'
		);
		$this->db->from($this->table_equipes.' as e');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma = t.id_turma');
		$this->db->order_by('e.nome_equipe');
		return $this->db->get()->result();
	}
	
	public function select_id($id=null){
		$this->db->select('e.id_equipe, e.nome_equipe, e.id_modalidade, e.id_turma, e.codcur, e.codper, t.nome_turma, e.id_genero, m.qtd_integrantes, m.nome_modalidade');
		$this->db->from($this->table_equipes.' as e');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma=t.id_turma');
		$this->db->join($this->table_modalidades.' as m', 'e.id_modalidade=m.id_modalidade');
		$this->db->where('e.id_equipe', $id);
		return $this->db->get()->row();
	}
	public function select_por_turma($id_turma=null){
		$this->db->select('e.id_equipe, e.nome_equipe, e.id_turma, '
		.'t.nome_turma'
		);
		$this->db->from($this->table_equipes. ' as e');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma = t.id_turma');
		$this->db->where('e.id_turma', $id_turma);
		return $this->db->get()->result();
	}
	public function insert($dados = null){
		$this->db->insert($this->table_equipes, $dados);
		return $this->db->insert_id();
	}

	function update($id, $dados){
		$this->db->where('id_equipe', $id);
		return $this->db->update($this->table_equipes, $dados);
	}

}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */