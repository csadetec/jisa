 <input class="form-control col-12 mt-3" type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<?php 
/*/
  echo '<pre>';

  print_r($jogos);
  echo '</pre>';
  /**/
  if($jogos):
    $this->table->set_heading('Data', 'Juiz', 'Local', 'Equipes', 'Súmula');
    foreach($jogos as $j):
      $pontos = set_pontos($j->pontos_final_1, $j->pontos_final_2, $j->pontos_final_3, $j->pontos_final_4, $j->pontos_final_5);

      $this->table->add_row(set_data($j->data).'<br>'. $j->horas_inicial, $j->nome_juiz, $j->nome_local, 
        set_nome_equipe($j->nome_equipe_1, $j->nome_equipe_2, $j->nome_equipe_3, $j->nome_equipe_4, $j->nome_equipe_5)
        , anchor('jogos/visualizar/'.$j->id_jogo, set_label($j->obs, $pontos), array('title'=>set_title($j->obs)))
      );
    
    endforeach;
    $template = array(
      'table_open'  => '<table  class="table table-striped mt-5">',
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

