<?php 
  echo '<pre>';
  /*
  print_r($juizes);
  
  print_r(@$jogo);
  print_r($_POST);
  /**/
  echo '</pre>';
?>
<div class="card card-register">
<div class="card-header">DADOS DO JOGO <span id="idJogo"><?php echo @$jogo->id_jogo?></span> <button id="btnExcluirJogo" style="float:right; margin-bottom: -9px; display:none" class="btn btn-danger"><i class="fas fa-trash"></i> Excluir Jogo</button></div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart($action, array('id'=>'form'));?>

          <!-- inputs data e horas -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="data">Data</label>
              <input type="date" name="data" id="data" class="form-control" placeholder="data" required="required" value="<?php echo @$jogo->data ?>" >
            </div>
            <div class="form-group col-md-6">
              <label for="horas_inicial">Horas</label>
              <input type="time" name="horas_inicial" id="horas_inicial" class="form-control" placeholder="Horas" required="required" value="<?php echo @$jogo->horas_inicial ?>" >
            </div>
          </div>
          
          <!-- inputs data e horas FIM -->

          <!-- input juiz, so aparace para ediçoes de jogos -->
          <?php if(@$disabled == 'disabled'): ?>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="id_juiz">JUIZ</label>
              <?php
                $options = null;
                $options[null] = 'SELECIONE';
                foreach($juizes as $row):
                  $options[$row->id_juiz] = $row->nome_juiz;
                endforeach;
                echo form_dropdown('id_juiz', $options, @$jogo->id_juiz, array('class'=>'form-control',  'id'=>'id_juiz'));
              ?>
            </div>
          </div>
          <?php endif; ?>

          <!-- input juiz FIM-->

          <!-- inputs locais e modalidades --> 

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="id_local">Local</label>
              <?php
                $options = null;
                $options[null] = 'SELECIONE';
                foreach($locais as $l):
                  $options[$l->id_local] = $l->nome_local;
                endforeach;
                echo form_dropdown('id_local', $options, @$jogo->id_local, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_local'));
              ?>
            </div>
            <div class="form-group col-md-6">
              <label for="id_modalidade">Modalidade</label>
              <?php
                $options = null;
                $options[null] = 'SELECIONE';
                foreach($modalidades as $m):
                  $options[$m->id_modalidade] = $m->nome_modalidade;
                endforeach;
                echo form_dropdown('id_modalidade', $options, @$jogo->id_modalidade, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_modalidade', @$disabled=>'true'));
                              ?>
              </div>
              <input type="hidden" id="qtd_equipes" value="">
          </div>

          <!-- inputs locais e modalidade FIM -->


          <!-- inputs de equipes --> 
          <div  class="form-row">
            <div id="div_1" class="form-group col-md-6">
               <label for="id_equipe_1">EQUIPE 1</label>
              <?php
                $options = null;
                $options[null] = 'SELECIONE';
                foreach($equipes as $e):
                  $options[$e->id_equipe] = $e->nome_equipe;
                endforeach;
                echo form_dropdown('id_equipe_1', $options, @$jogo->id_equipe_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_equipe_1', @$disabled=>'true'));
                
                //echo form_dropdown('id_equipe_1', $options, @$_POST['id_equipe_1']?@$_POST['id_equipe_1']:@$jogo->id_equipe_1, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_equipe_1'));
              ?>
            </div>
            <div id="div_2" class="form-group col-md-6">
              <label for="id_equipe_2">EQUIPE 2</label>
              <?php
                $options = null;
                $options[null] = 'SELECIONE';
                foreach($equipes as $e):
                  $options[$e->id_equipe] = $e->nome_equipe;
                endforeach;
                echo form_dropdown('id_equipe_2', $options, @$jogo->id_equipe_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_equipe_2', @$disabled=>'true'));
                
                //echo form_dropdown('id_equipe_2', $options, @$_POST['id_equipe_2']?@$_POST['id_equipe_2']:@$jogo->id_equipe_2, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_equipe_2'));
              ?>
            </div>
          </div>
          <div class="form-row">
            <div id="div_3" class="form-group col-md-6">
               <label for="id_equipe_3">EQUIPE 3</label>
              <?php
                $options = null;
                $options[0] = 'SELECIONE';
            
                foreach($equipes as $e):
                  $options[$e->id_equipe] = $e->nome_equipe;
                endforeach;
                echo form_dropdown('id_equipe_3', $options, @$jogo->id_equipe_3, array('class'=>'form-control',  'id'=>'id_equipe_3', @$disabled=>'true'));
                
                //echo form_dropdown('id_equipe_3', $options, @$_POST['id_equipe_3']?@$_POST['id_equipe_3']:@$jogo->id_equipe_3, array('class'=>'form-control',  'id'=>'id_equipe_3'));
              ?>
            </div>
            <div id="div_4" class="form-group col-md-6">
              <label for="id_equipe_4">EQUIPE 4</label>
              <?php
                $options = null;
                $options[0] = 'SELECIONE';
             
                foreach($equipes as $e):
                  $options[$e->id_equipe] = $e->nome_equipe;
                endforeach;
                echo form_dropdown('id_equipe_4', $options, @$jogo->id_equipe_4, array('class'=>'form-control',  'id'=>'id_equipe_4', @$disabled=>'true'));
                
                //echo form_dropdown('id_equipe_4', $options, @$_POST['id_equipe_4']?@$_POST['id_equipe_4']:@$jogo->id_equipe_4, array('class'=>'form-control',  'id'=>'id_equipe_4'));
              ?>
            </div>
          </div>
          <div  class="form-row">
            <div id="div_5" class="form-group col-md-6">
               <label for="id_equipe_5">EQUIPE 5</label>
              <?php
                $options = null;
                $options[0] = 'SELECIONE';
            
                foreach($equipes as $e):
                  $options[$e->id_equipe] = $e->nome_equipe;
                endforeach;
                echo form_dropdown('id_equipe_5', $options, @$jogo->id_equipe_5, array('class'=>'form-control', 'id'=>'id_equipe_5', @$disabled=>'true'));
                
                //echo form_dropdown('id_equipe_5', $options, @$_POST['id_equipe_5']?@$_POST['id_equipe_5']:@$jogo->id_equipe_5, array('class'=>'form-control', 'id'=>'id_equipe_5'));
              ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block"><?php echo $btn_value ?></button>
         
          <?php echo anchor('jogos/listar/', 'VOLTAR', array('class'=>'btn btn-secondary btn-block')); ?>


        </form>  
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('./assets/js/jogos_form.js?07062019') ?> "></script>