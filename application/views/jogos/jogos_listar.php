<input class="form-control col-md-4" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group"
<?php 
/*/
  echo '<pre>';

  print_r($jogos);
  echo '</pre>';
  /**/
  if($jogos):
    $this->table->set_heading('DATA', 'LOCAL', 'EQUIPES', 'PONTOS', 'EDITAR', 'VISUALIZAR');
    foreach($jogos as $j):
      $this->table->add_row(set_data($j->data).' - '. $j->horas_inicial, $j->nome_local, 
        set_nome_equipe($j->nome_equipe_1, $j->nome_equipe_2, $j->nome_equipe_3, $j->nome_equipe_4, $j->nome_equipe_5), 
        set_nome_equipe($j->pontos_final_1, $j->pontos_final_2, $j->pontos_final_3, $j->pontos_final_4, $j->pontos_final_5),
        anchor('jogos/editar/'.$j->id_jogo, '<i class="fas fa-edit"></i>', array('title'=>'Editar dados do Jogo')),
         anchor('jogos/visualizar/'.$j->id_jogo, '<i class="fas fa-eye"></i>', array('title'=>'Visualizar Resultado do  Jogo'))
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

