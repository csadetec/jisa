<div class="row mt-5">
  <div class="col-md-3" style="background-color: #e3d2ff; padding:20px">
    <h4>TURMAS</h4>
    <ul>
      <li class=""><a class="" href="#" id="cadastrarTurma">Cadastrar Turma</a></li>
      <li class=""><a class="" href="#" id="listarTurmas">Listar Turmas</a></li>
      <li class=""><a class="" href="#" id="editarTurma">Editar Turma</a></li>
      <!--
      <li class=""><a class="" href="#">Visualizar Equipes da Turma</a></li>
      -->
    </ul>
    <h4>EQUIPES</h4>
    <ul>
      <li class=""><a class="" href="#" id="cadastrarEquipe">Cadastrar Equipe</a></li>
      <li class=""><a class="" href="#" id="listarEquipes">Listar Equipes</a></li>
      <li class=""><a class="" href="#" id="editarEquipe">Editar Equipe</a></li>
      <li class=""><a class="" href="#" id="adicionarIntegrantes">Adicionar Integrantes</a></li>
    </ul>
    <h4>JOGOS</h4>
    <ul>
      <li class=""><a class="" href="#" id="cadastrarJogo">Cadastrar Jogo</a></li>
      <li class=""><a class="" href="#" id="listarJogos">Listar Jogos</a></li>
      <li class=""><a class="" href="#" id="editarJogo">Editar Jogo</a></li>
      <li class=""><a class="" href="#" id="sumulaJogo">Preencher Súmula do Jogo</a></li>
    </ul>
    <h4>PONTOS</h4>
    <ul>
      <li class=""><a class="" href="#" id="listarPontos">Listar os Pontos</a></li>
    </ul>
  </div><!-- col-md-3 -->
  <div class="col-md-9">
    <div id="cadastrarTurma">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turmas.png?2019'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turma_cadastrar.png'); ?>" " alt="">
    </div>
    <div id="listarTurmas">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turmas.png'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turmas_lista.png'); ?>" " alt="">
    </div>
    <div id="editarTurma">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turmas.png'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turmas_lista.png'); ?>" " alt="">
      <h5>3° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/turma_editar.png'); ?>" " alt="">
    </div>

    <div id="cadastrarEquipe">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes.png?2019'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipe_cadastrar.png'); ?>" " alt="">
    </div>
    <div id="listarEquipes">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes.png?2019'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes_listar.png'); ?>" " alt="">
    </div>
    <div id="editarEquipe">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes.png?2019'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes_listar.png'); ?>" " alt="">
      <h5>3° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipe_editar.png'); ?>" " alt="">
    </div>
    <div id="adicionarIntegrantes">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes.png?2019'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/equipes_listar.png'); ?>" " alt="">
      <h5>3° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/integrantes_adicionar.png'); ?>" " alt="">
    </div>

    <div id="cadastrarJogo">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/jogos.png'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/jogo_cadastrar.png'); ?>" " alt="">
    </div>
    <div id="listarJogos">
      <h5>1° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/jogos.png'); ?>" " alt="">
      <h5>2° Passo</h5>
      <img class="img-fluid" src="<?php echo base_url('assets/imagens/tutorial/jogos_listar.png'); ?>" " alt="">
    </div>
  </div>
</div>
  

<script>
  $(document).ready(function(){
    $("a#cadastrarTurma").click(function(){
      hideAll();
      $("div#cadastrarTurma").show(1000);
      //console.log('clicou')
    });
    $("a#listarTurmas").click(function(){
      hideAll();
      $("div#listarTurmas").show(1000);
      //console.log('clicou')
    });
    $("a#editarTurma").click(function(){
      hideAll();
      $("div#editarTurma").show(1000);
      //console.log('clicou')
    });

    // instruçoes para equipe
    $("a#cadastrarEquipe").click(function(){
      hideAll();
      $("div#cadastrarEquipe").show(1000);
    });
    $("a#listarEquipes").click(function(){
      hideAll();
      $("div#listarEquipes").show(1000);
    });
    $("a#editarEquipe").click(function(){
      hideAll();
      $("div#editarEquipe").show(1000);
    });
    $("a#adicionarIntegrantes").click(function(){
      hideAll();
      $("div#adicionarIntegrantes").show(1000);
    });

    $("a#cadastrarJogo").click(function(){
      hideAll();
      $("div#cadastrarJogo").show(1000);
    });
    $("a#listarJogos").click(function(){
      hideAll();
      $("div#listarJogos").show(1000);
    });
    $("a#editarJogo").click(function(){
      hideAll();
      $("div#editarJogo").show(1000);
    });
   
    hideAll();

    function hideAll(){
      $("div#cadastrarTurma").hide();
      $("div#listarTurmas").hide();
      $("div#editarTurma").hide();

      $("div#cadastrarEquipe").hide();
      $("div#listarEquipes").hide();
      $("div#editarEquipe").hide();
      $("div#adicionarIntegrantes").hide();

      $("div#cadastrarJogo").hide();
      $("div#listarJogos").hide();
      $("div#editarJogo").hide();



    }

    
    $("#conteudo_site").removeClass('container');
    $("#conteudo_site").css('margin-top','70px');
/** */
  });
</script>