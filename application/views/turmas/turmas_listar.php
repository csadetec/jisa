<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<?php 
  if($turmas):

    $this->table->set_heading('Turmas', 'Curso', /*'Código Curso', 'Código Período',*/ 'Editar', 'Visão');
    foreach($turmas as $t):
      $this->table->add_row($t->nome_turma,  $t->nome_curso,/*$t->codcur, $t->codper,  */
        anchor('turmas/editar/'.$t->id_turma, '<i class="fas fa-edit"></i>', array('title'=>'Editar Turma')),
        anchor('equipes/listar_por_turma/'.$t->id_turma, '<i class="fas fa-eye"></i>', array('title'=>'Visualizar Equipes'))

      );
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  endif;
?>      

  