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
            echo 'chegamos aqui';
        }
        
            
        

    }
?>