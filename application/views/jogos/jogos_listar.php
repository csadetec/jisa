<?php echo anchor('jogos/cadastrar', '<i class="fas fa-plus"></i> Cadastrar Jogo', array('style'=>'float:right; margin-bottom:10px;', 'class'=>'btn btn-success')); ?>
<input class="form-control " type="search" placeholder="Pesquisar.." aria-label="Pesquisar.." id="myInput" data-list="list-group">
<div class="card mt-3"> 
  <?php if($jogos): ?>
  <ul id="myList" class="list-group list-group-flush">
    <?php foreach($jogos as $row): ?>
    <li class="list-group-item">
      <div class="row">
        <div class="col-6 col-lg-6 col-md-8 mt-1">      
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
        <div class="col-6 col-lg-6 col-md-4" style="float:right">          
          <?php
        
          $id_perfil = $this->session->userdata('id_perfil');
          if($id_perfil == '1' or $id_perfil == '3'):
             echo  anchor('jogos/editar/'.$row->id_jogo, '<i class="fas fa-edit"></i>'.'  j'.$row->id_jogo, array('class'=>'', 'title'=>'Editar Jogo', 'style'=>'float:right; border-radius:50%')).'<br>';              
          endif;
          /** */
          ?>
          <span style="float:right" ><?php echo set_data($row->data).' '.'<b>'.$row->horas_inicial.'</b>'?></span><br>
          <span style="float:right" ><?php echo $row->nome_local ?></span><br>
          <span style="float:right"><?php echo $row->nome_juiz ?></span><br>
          <span style="float:right"><?php  echo $row->obs?'OBS: '.$row->obs:''; ?></span><br>
                  
      </div>    
    </li>
    <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</div>
 

