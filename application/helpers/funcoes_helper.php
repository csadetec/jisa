<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$aviso = null;


function rename_turma($turma){
    if($turma == 'M3CAM')return 'M3A';
    if($turma == 'M3CBM')return 'M3B';
    if($turma == 'M2CAM')return 'M2A';
    if($turma == 'M2CBM')return 'M2A';
    if($turma == 'M2CCM')return 'M2C';
   
    if($turma == 'M1CAM')return 'M1A';
    if($turma == 'M1CBM')return 'M1B';
    if($turma == 'M1CCM')return 'M1C';
    
   return '-';

}

/**/
function set_label($obs, $pontos){
    if($obs and $pontos){

        return '! '.$pontos ;
    }elseif($pontos){
         return '<i class="fas fa-eye"></i> '.$pontos;
    }

    return '<i class="fas fa-eye"></i>';
}
function set_title($obs){
    if($obs){
        return  $obs;
    }

    return 'Visualizar Jogo';
}
/**/

function set_nome_equipe($e1, $e2, $e3, $e4, $e5){
    $equipe = array($e1, $e2, $e3, $e4, $e5);
    $texto = null;
  
    foreach($equipe as $key=>$e):
        if($e):
            $texto .= $e.'<br>';
        //$texto .= $e.'<br>';
       
        endif;
    endforeach;
    $number  = strrpos($texto, '<br>');
    $texto = substr_replace($texto, '', $number);
    /*
    echo '<pre>';
    var_dump($texto);
    echo '</pre>';
    */
    return $texto;
    //print_r($texto);
   
}
function set_pontos($e1, $e2, $e3, $e4, $e5){
    $equipe = array($e1, $e2, $e3, $e4, $e5);
    $texto = null;
  
    foreach($equipe as $key=>$e):
        if($e):
            $texto .= $e.'-';
        //$texto .= $e.'<br>';
       
        endif;
    endforeach;
    $number  = strrpos($texto, '-');
    $texto = substr_replace($texto, '', $number);
    /*
    echo '<pre>';
    var_dump($texto);
    echo '</pre>';
    */
    return $texto;
    //print_r($texto);
   
}

function strclear($string){
    $search = array('á','é', 'ê', 'ú','ç','ã', 'í', 'ô');
    $replace= array('Á','É', 'Ê','U','Ç', 'Ã', 'Í', 'Ô');
    $string = str_replace($search, $replace, $string);
        $string = strtolower($string);

    return $string;
}


function set_data($data=''){
    if($data != "0000-00-00"):
        $data = strtotime($data);
        return date('d/m',$data);
    endif;
    return "";
}
if (!function_exists('set_msg')):

    function set_msg($aviso = null, $class = null) {
        //seta uma mensagem via session para ser lida posteriormente
        $CI = & get_instance();


        $CI->session->set_userdata('aviso', $aviso);
        $CI->session->set_userdata('class', 'alert alert-' . $class);
    }

endif;

if (!function_exists('get_msg')):

    //retorna uma mensagem definida pela função set_msg
    function get_msg($destroy = true) {
        $CI = & get_instance();

        $retorno = $CI->session->userdata();
        if ($destroy):
            $CI->session->unset_userdata('aviso');
            $CI->session->unset_userdata('class');

        endif;
        return $retorno;
    }

endif;


function verifica_login() {
    $CI = & get_instance();

    if ($CI->session->userdata('logged') != TRUE):
        set_msg('Acesso Restrito! Faça Login para continuar. ', 'warning');
        redirect('login');
    endif;
}



function verifica_admin() {
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    # 2 - juiz
    # 3 - coordenador
    # 4 - alunos

    if($id_perfil == 2 or $id_perfil == 3):
        redirect('locais/listar');
    elseif($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}

function verifica_admin_coordenador(){
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    # 2 - juiz
    # 4 - alunos

    if($id_perfil == 2):
        redirect('locais/listar');
    elseif($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}
function verifica_admin_coordenador_juiz(){
    $CI = & get_instance();
    $id_perfil = $CI->session->userdata('id_perfil');
    
    #4 - aluno

    if($id_perfil == 4):
        redirect('jogos/turmas');
    endif;
}




function limpar($string){
    $table = array(
        '/'=>'', '('=>'',')'=>'',
    );
    // Traduz os caracteres em $string, baseado no vetor $table
    $string = strtr($string, $table);
    $string = preg_replace('/[,;:`´^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ","_",$string);
    $string  = str_replace("---", "-", $string);
    $string  = str_replace("ç", "c", $string);
    return $string;
}

    //renomes os titulos
        function renomear_titulos($t){
            switch ($t) {
                case 'R.A.':
                    # code...
                    return 'ra';
                    break;
                case 'Aluno':
                    # code...
                    return  'nome_aluno';
                    break;
                case 'Turma':
                    # code...
                    return  'turma';
                    break;
                case 'Aluno':
                    # code...
                    return  'nome_aluno';
                    break;
                case 'Situação de matrícula':
                    # code...
                    return  'situacao_matricula';
                    break;
                case 'E-mail':
                    # code...
                    return 'email';
                    break;      
                
                default:
                    return 'error';
                    break;
            }

        }
    