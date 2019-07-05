<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes_model extends CI_Model {

	private $table_turmas = 'jisa_turmas'; 
    private $table_equipes = 'jisa_equipes';
    private $table_jogos = 'jisa_jogos';
	public function select(){
        //t.nome_turma, e.nome_equipe, e.id_turma, e.id_equipe from jisa_equipes as e inner join jisa_turmas as t on e.id_turma = t.id_turma order by t.nome_turma
		$this->db->select('t.nome_turma, e.nome_equipe, e.id_turma, e.id_equipe');
		$this->db->from($this->table_equipes.' as e');
		$this->db->join($this->table_turmas.' as t', 'e.id_turma = t.id_turma');
		$this->db->order_by('t.nome_turma', 'asc');
		return $this->db->get()->result();
	}
    
    public function update_jogos_turma_1($id_turma, $id_equipe){
        $this->db->where('id_equipe_1', $id_equipe)
    }
}

/* End of file Perfis_model.php */
/* Location: ./application/models/Perfis_model.php */