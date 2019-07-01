<?php echo anchor('locais/cadastrar', '<i class="fas fa-plus"></i> Cadastrar Locais', array('style'=>'float:right; margin-bottom:10px;', 'class'=>'btn btn-success')); ?>

<input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 
<?php 
  if($locais):
    $this->table->set_heading('Local', 'Editar');
    foreach($locais as $l):
      $this->table->add_row($l->nome_local, anchor('locais/editar/'.$l->id_local, '<i class="fas fa-edit"></i>', array('title'=>'Editar Local')));
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
      'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  endif;
?>      

  