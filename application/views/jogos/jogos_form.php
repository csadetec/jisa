<?php 
  echo '<pre>';
//    print_r($modalidades);
 // print_r(@$jogo);
  //print_r($_POST);
  echo '</pre>';
?>
<div class="card card-register mt-5">
  <div class="card-header">Dados do Jogo</div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart($action, array('id'=>'form'));?>
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
                echo form_dropdown('id_modalidade', $options, @$jogo->id_modalidade, array('class'=>'form-control', 'required'=>'required', 'id'=>'id_modalidade'));
                              ?>
              </div>
              <input type="hidden" id="qtd_equipes" value="">
          </div>
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
          <a href="<?php echo base_url("jogos/listar/") ?> " class="btn btn-secondary btn-block" >VOLTAR</a>  
        </form>  
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('./assets/js/jogos_form.js?14') ?> "></script>