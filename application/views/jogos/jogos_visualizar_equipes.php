<div class="row" >
  <?php
  if(isset($equipe_1)):
  ?>
  <div class="col-lg-6 mt-5">
    <h4 style="margin-top: 20px"><?php echo strtoupper($jogo->nome_equipe_1)  ?></h4>
    <ul id="" class="list-group">
    <?php foreach($equipe_1 as $e): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center" >
        <?php echo $e->nome_aluno ?>    
      </li>
    <?php endforeach; ?>
    </ul>
  </div>  
  <?php
  endif;

  if(isset($equipe_2)):
  ?>
  <div class="col-lg-6 mt-5">
    <h4 style="margin-top: 20px"><?php echo strtoupper($jogo->nome_equipe_2)  ?></h4>
    <ul id="" class="list-group">
    <?php foreach($equipe_2 as $e): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center" >
        <?php echo $e->nome_aluno ?>    
      </li>
    <?php endforeach; ?>
    </ul>
  </div>  
  <?php
  endif;
?>                                                                             
</div>

<h3 class="mt-5">SÚMULA</h3>
<?php echo form_open_multipart($action, array('id'=>'form_jogo'));
  $this->table->set_heading('EQUIPE', 'F/P', 'P', 'PF');
    if($equipe_1):
      $fp = array(0=>'NÃO', 1=>'SIM');           
      $p =  range(0,200);           
      $pf = range(0,200);
      $this->table->add_row($jogo->nome_equipe_1, 
        form_dropdown('fair_play_1', $fp, @$jogo->fair_play_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_1')),  
        form_dropdown('pontos_equipe_1', $p, @$jogo->pontos_equipe_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_1')),  
        form_dropdown('pontos_final_1', $pf, @$jogo->pontos_final_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_final_1'))         
      );
    endif;
    if($equipe_2):
      $fp = array(0=>'NÃO', 1=>'SIM');           
      $p =  range(0,200);           
      $pf = range(0,200);
      $this->table->add_row($jogo->nome_equipe_2, 
        form_dropdown('fair_play_2', $fp, @$jogo->fair_play_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_2')),  
        form_dropdown('pontos_equipe_2', $p, @$jogo->pontos_equipe_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_2')),  
        form_dropdown('pontos_final_2', $pf, @$jogo->pontos_final_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_final_2'))         
      );
    endif;

    $template = array(
        'table_open'  => '<table  class="table table-striped">',
        'tbody_open' => '<tbody id="myTable">',
      );
      $this->table->set_template($template);
      echo $this->table->generate();
  ?>
  <div class="form-row mt-3">
    <div class="form-group col-12">
      <textarea name="obs" id="obs"  rows="2" class="form-control" placeholder="OBSERVAÇÕES"><?php echo @$jogo->obs ?></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
  <?php echo anchor('jogos/listar/', 'VOLTAR', array('class'=>'btn btn-info btn-block')); ?>
</form>  
<script src="<?php echo base_url("./assets/js/jogos_visualizar_equipes.js") ?> "></script>
