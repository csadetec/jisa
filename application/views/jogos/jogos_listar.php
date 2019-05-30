
<input class="form-control " type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<div class="card mt-3"> 
  <?php if($jogos): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($jogos as $row): ?>
    <li class="list-group-item">
      <div class="row">
        <div class="col-6 col-lg-4 mt-1">      
          <?php $e = null; ?>   
          <?php echo anchor('jogos/visualizar/'.$row->id_jogo,
            set_equipe_pontos($row->nome_equipe_1, $row->pontos_final_1).
            set_equipe_pontos($row->nome_equipe_2, $row->pontos_final_2).
            set_equipe_pontos($row->nome_equipe_3, $row->pontos_final_3).
            set_equipe_pontos($row->nome_equipe_4, $row->pontos_final_4).
            set_equipe_pontos($row->nome_equipe_5, $row->pontos_final_5),

      
              array('class'=>'btn btn-outline-primary btn-block', /*'style'=>'float: right',*/ 'title'=>'Visualizar Jogo '.set_data($row->data).' '.$row->horas_inicial )); 
          ?>

        </div>
        <div class="col-6 col-lg-8" style="float:right">          
          <span style="float:right" >
            <?php
            $id_perfil = $this->session->userdata('id_perfil');
            if($id_perfil == '1' or $id_perfil == '3'):
              echo  anchor('jogos/editar/'.$row->id_jogo, '<i class="fas fa-edit"></i>', array('title'=>'Editar Turma', 'style'=>'border-radius:50%;' )); 
            endif;
            ?>
            <?php echo set_data($row->data).' '.'<b>'.$row->horas_inicial.'</b>'?>
          </span><br>
          <span style="float:right" ><?php echo $row->nome_local ?></span><br>
          <span style="float:right"><?php echo $row->nome_juiz ?></span><br>
          <span style="float:right"><?php  echo $row->obs?'OBS: '.$row->obs:''; ?></span>
          
      </div>    
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
 

