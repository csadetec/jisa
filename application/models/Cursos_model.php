<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_model extends CI_Model {

	private $table_cursos = 'jisa_cursos';


	public function select(){
		$this->db->order_by('nome_curso', 'asc');
			
		return $this->db->get($this->table_cursos)->result();
	}
	public function select_id($id_curso){
		$this->db->where('id_curso', $id_curso);
		return $this->db->get($this->table_cursos)->row();
	}

	
	public function select_codcur_codper($codcur=null, $codper=null){
		$this->db->select('id_curso');
		$this->db->from($this->table_cursos);
		$this->db->where('codcur', $codcur);
		$this->db->where('codper', $codper);
		return $this->db->get()->row();
	}

}

/* End of file Cursos_model.php */
/* Location: ./application/models/Cursos_model.php */