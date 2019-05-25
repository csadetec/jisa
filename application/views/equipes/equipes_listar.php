
<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 

<?php 
  echo '<pre>';
 // print_r($equipes);
  echo '</pre>';
  if($equipes):
    $this->table->set_heading('Equipe', 'Turma', 'Editar', 'Atleta');
    foreach($equipes as $e):
      $this->table->add_row(
        $e->nome_equipe,  $e->nome_turma, 
        anchor('equipes/editar/'.$e->id_equipe, '<i class="fas fa-edit"></i>', array('title'=>'Editar dados da Equipe')),
        anchor('formacoes/adicionar/'.$e->id_equipe, '<i class="fas fa-user-plus"></i>', array('title'=>'Adicionar Alunos na Equipe'))
      );
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  else:
    ?>
    <div class="alert alert-info mt-5" role="alert">
      Sem Registros!
    </div>
    <?php
  endif;
?>      

