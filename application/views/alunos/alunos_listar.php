> 
<?php 
  if($alunos):
    $this->table->set_heading('Nome', 'Adicionar');
    foreach($alunos as $a):
      $this->table->add_row(
        $a->nome_aluno,              
       '<input type="checkbox" name="$id" value="$id">'
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

