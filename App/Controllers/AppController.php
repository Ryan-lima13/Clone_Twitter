<?php
    namespace App\Controllers;

    //os recursos do miniframework
    use MF\Controller\Action;
    use MF\Model\Container;
    
    class AppController extends Action{

        public function timeline(){
            session_start();
            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
                $this->render('timeline');

            }else{
                header('location: /?login=erro');
            }
            
        }
        public function tweetes(){
            session_start();
            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
               
                $tweetes = Container::getModel('tweetes');
                $tweetes->__set('tweetes',$_POST['tweetes']);
                $tweetes->__set('id_usuario', $_SESSION['id']);
                
                $tweetes->salvar();

            }else{
                header('location: /?login=erro');
            }
            
        }

    }
?>