<div class="row">
  <div class="col-md-12">
    <h4 class="">ATENÇÃO!</h4>
    <h5>Após o upload do arquivo, será apagado todos as <b>EQUIPES</b>, <b>JOGOS</b> e os <b>ALUNOS</b> antigos.</h5>
    <hr>
  </div>
</div>

<div class="row mt-3">
  <div class="col-2">
    <!--
    <p>Segue o exemplo de como a planilha deve estar organizada</p>
    <img class="img-rounded" style="max-width:100%" src="<?php echo base_url('assets/imagens/tutorial_excel.png') ?> " alt="">
  -->
  </div>
  <div class="col-8">
    <div class="card card-register">
      <div class="card-header">Escolha o Arquivo EXCEL (.xls ou .xlsx)</div>
        <div class="card-body">
          <?php echo form_open_multipart($action);?>
            <div class="form-row">
              <div class="form-group col-md-12">
                <input type="file" name="userfile" id="userfile" class="form-control" placeholder="files" required="required" autofocus="autofocus" value="">
                  <!--<label for="userfile">Arquivo</label>-->
              </div>
            </div>           
            <input type="submit" class="btn btn-primary btn-block" value="<?php echo $btn_value ?> ">
            <a href="<?php echo base_url("jogos/listar/") ?> " class="btn btn-secondary btn-block" >CANCELAR</a>  
          </form>  
        </div>    
      </div>
    </div>
  </div>
</div>
