<?php 
  echo '<pre>';
  //echo print_r($jogo);
  
  echo '</pre>';
?>
<div class="row mt-3">
  <?php
  if(isset($equipe_1)):
  ?>
  <div class="col-md-6">
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
  <div class="col-md-6">
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
<div class="row" style="margin-top: 20px;">
  <?php
  if(isset($equipe_3)):
  ?>
  <div class="col-md-6">
    <h4 id=""><?php echo strtoupper($jogo->nome_equipe_3)  ?></h4>
    <ul id="" class="list-group">
    <?php foreach($equipe_3 as $e): ?>
      <li class="list-group-item d-flex justify-content-between align-items-center" >
        <?php echo $e->nome_aluno ?>    
      </li>
    <?php endforeach; ?>
    </ul>
  </div>  
  <?php
  endif;
            

  if(isset($equipe_4)):
  ?>
  <div class="col-md-6">
    <h4 id=""><?php echo strtoupper($jogo->nome_equipe_4)  ?></h4>
    <ul id="" class="list-group">
    <?php foreach($equipe_4 as $e): ?>
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
<div class="row" style="margin-top: 20px">
<?php
  if(isset($equipe_5)):
  ?>
  <div class="col-md-6">
    <h4 id=""><?php echo strtoupper($jogo->nome_equipe_5)  ?></h4>
    <ul id="" class="list-group">
    <?php foreach($equipe_5 as $e): ?>
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

<h3>SÚMULA</h3>
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
    if($equipe_3):
      $fp = array(0=>'NÃO', 1=>'SIM');           
      $p =  range(0,200);           
      $pf = range(0,200);
      $this->table->add_row($jogo->nome_equipe_3, 
        form_dropdown('fair_play_3', $fp, @$jogo->fair_play_3, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_3')),  
        form_dropdown('pontos_equipe_3', $p, @$jogo->pontos_equipe_3, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_3')),  
        form_dropdown('pontos_final_3', $pf, @$jogo->pontos_final_3, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_final_3'))         
      );
    endif;
    if($equipe_4):
      $fp = array(0=>'NÃO', 1=>'SIM');           
      $p =  range(0,200);           
      $pf = range(0,200);
      $this->table->add_row($jogo->nome_equipe_4, 
        form_dropdown('fair_play_4', $fp, @$jogo->fair_play_4, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_4')),  
        form_dropdown('pontos_equipe_4', $p, @$jogo->pontos_equipe_4, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_4')),  
        form_dropdown('pontos_final_4', $pf, @$jogo->pontos_final_4, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_final_4'))         
      );
    endif;
    if($equipe_5):
      $fp = array(0=>'NÃO', 1=>'SIM');           
      $p =  range(0,200);           
      $pf = range(0,200);
      $this->table->add_row($jogo->nome_equipe_5, 
        form_dropdown('fair_play_5', $fp, @$jogo->fair_play_5, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_5')),  
        form_dropdown('pontos_equipe_5', $p, @$jogo->pontos_equipe_5, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_5')),  
        form_dropdown('pontos_final_5', $pf, @$jogo->pontos_final_5, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_final_5'))         
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
      <textarea name="obs" id="obs"  rows="3" class="form-control" placeholder="OBSERVAÇÕES"><?php echo @$jogo->obs ?></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
  <?php echo anchor('jogos/listar/', 'VOLTAR', array('class'=>'btn btn-info btn-block')); ?>
</form>  

<script>
  $(document).ready(function(){
   
    $("#pontos_equipe_1").click(init);
    $("#pontos_equipe_2").click(init);
    $("#pontos_equipe_3").click(init);
    $("#pontos_equipe_4").click(init);
    $("#pontos_equipe_5").click(init);

    $("#fair_play_1").click(init);
    $("#fair_play_2").click(init);
    $("#fair_play_3").click(init);
    $("#fair_play_4").click(init);
    $("#fair_play_5").click(init);
  
    function init(){
      var pontos_equipe_1 = $("#pontos_equipe_1").val();
      var pontos_equipe_2 = $("#pontos_equipe_2").val();
      var pontos_equipe_3 = $("#pontos_equipe_3").val();
      var pontos_equipe_4 = $("#pontos_equipe_4").val();
      var pontos_equipe_5 = $("#pontos_equipe_5").val();

      var fair_play_1 = $("#fair_play_1").val();
      var fair_play_2 = $("#fair_play_2").val();
      var fair_play_3 = $("#fair_play_3").val();
      var fair_play_4 = $("#fair_play_4").val();
      var fair_play_5 = $("#fair_play_5").val();

      var pontos_1;
      pontos_1 = pontos_equipe_1;
      pontos_1 = fair_play(pontos_1, fair_play_1);
      $("#pontos_final_1").val(pontos_1);

      var pontos_2;
      pontos_2 = pontos_equipe_2;
      pontos_2 = fair_play(pontos_2, fair_play_2);
      $("#pontos_final_2").val(pontos_2);


      var pontos_3;
      pontos_3 = pontos_equipe_3;
      pontos_3 = fair_play(pontos_3, fair_play_3);
      $("#pontos_final_3").val(pontos_3);

      var pontos_4;
      pontos_4 = pontos_equipe_4;
      pontos_4 = fair_play(pontos_4, fair_play_4);
      $("#pontos_final_4").val(pontos_4);

      var pontos_5;
      pontos_5 = pontos_equipe_5;
      pontos_5 = fair_play(pontos_5, fair_play_5);
      $("#pontos_final_5").val(pontos_5);

      function fair_play(p, f){
        if(f == 1){
          p  = parseInt(p);
          f = parseInt(f);
          return p+f;
        }
        return p;
      }
      /*
      function pontos_basico(p){
        if(p == 3){
          return 3;
        }
        return 1;
      }
      /**/

    }
  });
</script>
