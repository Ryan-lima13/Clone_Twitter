<?php
    namespace App\Models;

    use MF\Model\Model;
    
    class Tweetes extends Model{
        private $id;
        private $id_usuario;
        private $tweete;
        private $date;

        public function __set($atributo,$valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        // salvar 

        //recuperar
        



    }
?>