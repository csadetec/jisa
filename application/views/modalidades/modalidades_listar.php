<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<?php 
  if($modalidades):
    $this->table->set_heading('N°','Local', 'Equipes', 'Integrantes', 'Editar');
    foreach($modalidades as $key=>$m):
      $this->table->add_row($key+=1, $m->nome_modalidade, $m->qtd_equipes, $m->qtd_integrantes, anchor('modalidades/editar/'.$m->id_modalidade, '<i class="fas fa-edit"></i>', array('title'=>'Editar Modalidade')));
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  endif;
?>      

  