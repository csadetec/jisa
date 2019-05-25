<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	
	//Função Ler a planilha e salvo os lidos no banco de dados
	function renomear_titulo($titulo){
		
		switch($titulo):
			case 'R.A.':
				$titulo = 'ra';
				break;
			case 'Aluno':
				$titulo = 'nome_aluno';
				break;
			case 'Código do curso':
				$titulo = 'codcur';
				break;
			case 'Código da habilitação':
				$titulo = 'codper';
				break;
			case 'Matriz curricular':
				$titulo = 'matriz_curricular';
				break;
			case 'E-mail':
				$titulo = 'email';
				break;
			case 'Turma':
				$titulo = 'turma';
				break;
			default:
				$titulo = 'unset';
				break;
		endswitch;

		return $titulo;

	}


	function set_id_curso($codcur=0, $codper=0){
		if($codcur == 23 and $codper == 3):
			return 1;
		elseif($codcur == 23 and $codper == 2):
			return 2;
		elseif($codcur == 23 and $codper == 1):
			return 3;
		elseif($codcur == 22 and $codper == 9):
			return 4;
		elseif($codcur == 22 and $codper == 8):
			return 5;
		elseif($codcur == 22 and $codper == 7):
			return 6;
		elseif($codcur == 22 and $codper == 6):
			return 7;
		elseif($codcur == 22 and $codper == 5):
			return 8;
		elseif($codcur == 22 and $codper == 4):
			return 9;
		elseif($codcur == 22 and $codper == 3):
			return 10;
		elseif($codcur == 22 and $codper == 2):
			return 11;
		elseif($codcur == 22 and $codper == 1):
			return 12;
		endif;
	}

	

 ?>