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
        public function tweet(){
            session_start();
            if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';

            }else{
                header('location: /?login=erro');
            }
            

        }
        
            
        

    }
?>