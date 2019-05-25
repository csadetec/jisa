<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("America/Sao_Paulo");
        setlocale(LC_ALL, 'pt_BR');



        $this->load->helper(array('form',  'url', 'funcoes_helper'));
        $this->load->library(array(/*'form_validation',*/ 'session'));
        //   $this->output->enable_profiler(TRUE);
    }

    public function index() {
       // phpinfo();
       // File and rotation
        $filename = './assets/imagens/alunos/EC18065.jpg';
      
        // File and rotation
   
        $degrees = 90;

        // Content type
        header('Content-type: image/jpeg');

        // Load
        $source = imagecreatefromjpeg($filename);

        // Rotate
        $rotate = imagerotate($source, $degrees, 0);

        // Output
        imagejpeg($rotate);

        // Free the memory
        imagedestroy($source);
        imagedestroy($rotate);       

         
    }

    public function table(){
        $this->load->view('testes', FALSE);
    }

    public function um(){
        function corrigeOrientacao($filename)
        {
            $exif = exif_read_data($filename);
            $rotation = null;
            echo '<pre>';
            print_r($exif);

            if (!empty($exif['Orientation'])) {
                switch ($exif['Orientation'])
                {
                    case 3:
                        $rotation = 180;
                        break;

                    case 6:
                        $rotation = -90;
                        break;

                    case 8:
                        $rotation = 90;
                        break;
                }
            }else{
                echo 'cade o Orientation';
            }

            if ($rotation !== null) {
                $target = imagecreatefromjpeg($filename);
                $target = imagerotate($target, $rotation, 0);

                //Salva por cima da imagem original
                imagejpeg($target, $filename);

                //libera da memória
                imagedestroy($target);
                $target = null;
            }
        }
        corrigeOrientacao('./assets/imagens/alunos/EC18065.jpg');
    }

    public function reduzir_tamanho_img(){
        function compress_image($source_url, $destination_url, $quality) {
            
            $info = getimagesize($source_url);

            if ($info['mime'] == 'image/jpeg')
                  $image = imagecreatefromjpeg($source_url);

            elseif ($info['mime'] == 'image/gif')
                  $image = imagecreatefromgif($source_url);

            elseif ($info['mime'] == 'image/png')
                  $image = imagecreatefrompng($source_url);

            imagejpeg($image, $destination_url, $quality);
            return $destination_url;

        }

        $source_image = './assets/imagens/alunos/2.jpg';
        $quality = 30;

        compress_image($source_image, $source_image, $quality);
    }


}
