<div class="row" style="margin-top:20px;">
  <?php
  if(isset($equipe_1)):
  ?>
  <div class="col-lg-6">
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
  <div class="col-lg-6">
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

<div class="row" style="margin-top:20px">

  <div class="col-md-12">
    <h2>Súmula</h2>
    <?php echo form_open_multipart($action, array('id'=>'form_jogo'));?>
    <div class="row">
      <div class="col-md-6">
        <?php if(isset($equipe_1)): ?>
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

      </div> <!-- col-md-6 -->
      <div class="col-md-6">
        <?php if(isset($equipe_2)): ?>
        <div class="card mt-2">
          <div class="card-header">
            <?php echo $jogo->nome_equipe_2 ?>
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-6">
                <label for="pontos_equipe_2">PLACAR</label>
                <?php
                  $options = range(0,200);
                  echo form_dropdown('pontos_equipe_2', $options, @$jogo->pontos_equipe_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'pontos_equipe_2'));
                ?>
              </div><!--col-4-->
              <div class="form-group col-6">
                <label for="fair_play_2">FAIR PLAY</label>
                  <?php
                  $options = array(0=>'NÃO', 1=>'SIM');
                  echo form_dropdown('fair_play_2', $options, @$jogo->fair_play_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'fair_play_2'));
                  ?>
              </div><!-- col-md-6-->
            </div><!-- form-row -->
            <div class="form-row">
               <div class="form-group col-12 ">
                <label for="pontos_final_2">PONTOS</label>
                <input type="number" name="pontos_final_2" id="pontos_final_2" class="form-control" placeholder="<?php echo $placeholder_pontos_final ?> required="required" value="<?php echo @$jogo->pontos_final_2 ?>"   >

              </div><!-- col-4 -->
            </div><!-- form-row -->
          </div> <!--card-body--->
        </div><!--card -->
        <?php endif; ?>

      </div> <!-- col-md-6 -->

    </div><!-- row -->
    <div class="form-row mt-3">
      <div class="form-group col-12">
        <textarea name="obs" id="obs"  rows="3" class="form-control" placeholder="OBSERVAÇÕES"><?php echo @$jogo->obs ?></textarea>
      </div>
    </div>
     
      <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
      <?php echo anchor('jogos/listar/', 'VOLTAR', array('class'=>'btn btn-info btn-block')); ?>
    </form>  
  </div> <!-- col-md-12 -->
</div><!-- row -->
<script src="<?php echo base_url("./assets/js/jogos_visualizar_equipes.js") ?> "></script>
