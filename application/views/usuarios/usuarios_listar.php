<?php echo anchor('usuarios/cadastrar', '<i class="fas fa-plus"></i> Cadastrar Usuário', array('style'=>'float:right; margin-bottom:10px;', 'class'=>'btn btn-success')); ?>
<input class="form-control col-12 mt-3 mb-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"> 

<?php 
  if($usuarios):
    $this->table->set_heading('Nome', 'Usuário', 'Perfil', 'Editar');
    foreach($usuarios as $u):
      $this->table->add_row($u->nome, $u->usuario, $u->nome_perfil,
        anchor('usuarios/editar/'.$u->id_usuario, '<i class="fas fa-fw fa-edit"></i>'))
      ;
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped">',
       'tbody_open' => '<tbody id="myTable">',
    );
    $this->table->set_template($template);
    echo $this->table->generate();
  endif;
?>      
