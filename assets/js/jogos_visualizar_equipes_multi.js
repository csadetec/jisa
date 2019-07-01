$(document).ready(function(){
   
    $("#pontos_equipe_1").change(init);
    $("#pontos_equipe_2").change(init);
    $("#pontos_equipe_3").change(init);
    $("#pontos_equipe_4").change(init);
    $("#pontos_equipe_5").change(init);

    $("#fair_play_1").change(init);
    $("#fair_play_2").change(init);
    $("#fair_play_3").change(init);
    $("#fair_play_4").change(init);
    $("#fair_play_5").change(init);
  
    function init(){
		console.log('cliclou')
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
      pontos_1 = posicaoPontos(pontos_equipe_1);
      pontos_1 = fair_play(pontos_1, fair_play_1);
      $("#pontos_final_1").val(pontos_1);

      var pontos_2;
      pontos_2 = posicaoPontos(pontos_equipe_2);
      pontos_2 = fair_play(pontos_2, fair_play_2);
      $("#pontos_final_2").val(pontos_2);


      var pontos_3;
      pontos_3 = posicaoPontos(pontos_equipe_3);
      pontos_3 = fair_play(pontos_3, fair_play_3);
      $("#pontos_final_3").val(pontos_3);

      var pontos_4;
      pontos_4 = posicaoPontos(pontos_equipe_4);
      pontos_4 = fair_play(pontos_4, fair_play_4);
      $("#pontos_final_4").val(pontos_4);

      var pontos_5;
      pontos_5 = posicaoPontos(pontos_equipe_5);
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
	
		function posicaoPontos($p){
			if($p == 1){
				return 5
			}else if($p == 2){
				return 4
			}else if($p == 3){
				return 3
			}else if($p == 4){
				return 2
			}
			return 1
		}

    }
  });