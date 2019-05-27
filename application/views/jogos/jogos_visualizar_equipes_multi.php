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
<div class="row" style="margin-top:20px">
  <div class="col-md-12">
    <?php echo form_open_multipart($action, array('id'=>'form_jogo'));?>
      <div class="form-row">
        <?php if($equipe_1): ?>   
        <div class="card mt-2">
          <div class="card-header">
            <?php echo $jogo->nome_equipe_1 ?>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-6">
                <label for="pontos_equipe_1">PLACAR</label>
                <?php
                  $options = range(0,200);
                  echo form_dropdown('pontos_equipe_1', $options, @$jogo->pontos_equipe_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_1'));
                ?>
              </div><!--col-md-12-->
              <div class="form-group col-6">
                <label for="fair_play_1">FAIR PLAY</label>
                  <?php
                  $options = array(0=>'NÃO', 1=>'SIM');
                  echo form_dropdown('fair_play_1', $options, @$jogo->fair_play_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_1'));
                  ?>
              </div><!-- col-md-6-->

             

            </div><!-- form-row -->
            <div class="form-row">
              <div class="form-group col-12">
                <label for="pontos_final_1">PONTOS</label>
                <input type="number" name="pontos_final_1" id="pontos_final_1" class="form-control" placeholder="<?php echo $placeholder_pontos_final ?>" required="required" value="<?php echo @$jogo->pontos_final_1 ?>" >
              </div><!--col-4-->
            </div> <!-- row -->
          </div> <!--card-body--->
        </div><!--card -->   


        <?php endif; ?>
      </div><!-- form-inline -->



      <div class="form-row">
        <div class="form-group col-12">
           <label for="obs">Observações</label>
            <textarea name="obs" id="obs"  rows="3" class="form-control"><?php echo @$jogo->obs ?></textarea>
        </div>
       
      </div>

      <button type="submit" class="btn btn-primary btn-block mt-4"><?php echo $btn_value ?></button>
      <?php echo anchor('jogos/listar/', 'VOLTAR', array('class'=>'btn btn-info btn-block')); ?>  
        
    
    </form>  
  </div>
</div>
<script>
  $(document).ready(function(){
   
    $("#pontos_equipe_1").click(script);
    $("#pontos_equipe_2").click(script);
    $("#pontos_equipe_3").click(script);
    $("#pontos_equipe_4").click(script);
    $("#pontos_equipe_5").click(script);

    $("#fair_play_1").click(script);
    $("#fair_play_2").click(script);
    $("#fair_play_3").click(script);
    $("#fair_play_4").click(script);
    $("#fair_play_5").click(script);
  
    function script(){
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
      pontos_1 = pontos_basico(pontos_equipe_1);
      pontos_1 = fair_play(pontos_1, fair_play_1);
      $("#pontos_final_1").val(pontos_1);

      var pontos_2;
      pontos_2 = pontos_basico(pontos_equipe_2);
      pontos_2 = fair_play(pontos_2, fair_play_2);
      $("#pontos_final_2").val(pontos_2);


      var pontos_3;
      pontos_3 = pontos_basico(pontos_equipe_3);
      pontos_3 = fair_play(pontos_3, fair_play_3);
      $("#pontos_final_3").val(pontos_3);

      var pontos_4;
      pontos_4 = pontos_basico(pontos_equipe_4);
      pontos_4 = fair_play(pontos_4, fair_play_4);
      $("#pontos_final_4").val(pontos_4);

      var pontos_5;
      pontos_5 = pontos_basico(pontos_equipe_5);
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
      
      function pontos_basico(p){
        if(p == 3){
          return 3;
        }
        return 1;
      }


    }
  });
</script>
