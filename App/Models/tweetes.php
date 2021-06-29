<?php
    namespace App\Models;

    use MF\Model\Model;
    
    class Tweete extends Model{
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
        public function salvar(){
            $query =" insert into tweete(id_usuario,tweete)values(:id_usuario,:tweete)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
            $stmt->bindValue(':tweete',$this->__get('tweete'));
            $stmt->execute();


		    return $this;
        }

        //recuperar




    }
?>