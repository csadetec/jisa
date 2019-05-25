 <input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<?php 

  if(isset($turmas)):
    $this->table->set_heading('Turma', 'Pontos');
    foreach($turmas as $t):
      $this->table->add_row($t->nome_turma, $t->pontos);
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  endif;
  if(isset($equipes)):
    $this->table->set_heading('Equipes', 'Turma', 'Modalidade', 'Pontos');
    foreach($equipes as $e):
      $this->table->add_row($e->nome_equipe, $e->nome_turma, $e->nome_modalidade, $e->pontos);
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  endif;
?>      

  