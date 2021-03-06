<?php
    namespace App\Controllers;

    //os recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;
    
    class AppController extends Action{

        public function timeline(){
            $this->ValidarAutenticacao();
            // recuperar os tweets
            $tweet = Container::getModel('Tweet');
            $tweet->__set('id_usuario', $_SESSION['id'] );
            $tweets = $tweet->getAll();
                
            $this->view->tweets = $tweets;
            $this->render('timeline');
                

            
            
        }
        public function tweet(){
            
            $this->ValidarAutenticacao(); 
              
            $tweet = Container::getModel('Tweet');
            $tweet->__set('tweet',$_POST['tweet']);
            $tweet->__set('id_usuario',$_SESSION['id']);
            $tweet->salvar();

            header('location:/timeline');
               

            
            

        }

        public function ValidarAutenticacao(){
            session_start();

            if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
                header('Location: /?login=erro');
            }


        }
        public function quemSeguir(){
            $this->ValidarAutenticacao(); 
            echo '<br><br><br>';
            
            $pesquisaPor = isset(($_GET['pesquisarPor'])) ? $_GET
            ['pesquisarPor']:'';
            
            $usuarios = array();
            
            if($pesquisaPor != ''){
                $usuario = Container::getModel('Usuario');
                $usuario->__set('id',$_SESSION['id']);
                $usuario->__set('nome',$pesquisaPor);
                $usuarios = $usuario->getAll();
                
            }
            $this->view->usuarios = $usuarios;

            
            
            
           $this->render('quemSeguir');
        }
        
        public function acao(){
            $this->ValidarAutenticacao(); 
            // acao 
            $acao = isset($_GET['acao']) ? $_GET['acao'] :'';
            $id_usuario_seguindo = isset($_GET['id_usuario']) ? $_GET['id_usuario'] :'';

            $usuario = Container::getModel('Usuario');
            $usuario->__set('id',$_SESSION['id']);
            if($acao == 'seguir'){
                $usuario->seguirUsuario($id_usuario_seguindo);

            }else if($acao =='deixar_de_seguir'){
                $usuario->deixarSeguirusuario($id_usuario_seguindo);

            }
            header('location: /quem_seguir');


            



        }
            
        

    }
?>