<?php
    class User extends CI_Model{
      public function __construct(){
        parent::__construct();
      }
      //funcion para insertar
      public function insertar($datos){
          return $this->db->insert("user",$datos);
      }
      //funcion para actualizar
      public function actualizar($id,$datos){
        $this->db->where("id",$id);
        return $this->db->update("user",$datos);
      }
      //funcion para sacar el detalle de un cliente
      public function consultarPorId($id){
        $this->db->where("id",$id);
        $user=$this->db->get("user");
        if($user->num_rows()>0){
          return $user->row();//cuando SI hay usuarios
        }else{
          return false;//cuando NO hay usuarios
        }
      }
      //funcion para consultar todos lo usuarios
      public function consultarTodos(){
          $listadoUsers=$this->db->get("user");
          if($listadoUsers->num_rows()>0){
            return $listadoUsers;//cuando SI hay usuarios
          }else{
            return false;//cuando NO hay usuarios
          }
      }

      public function eliminar($id){
        $this->db->where("id",$id);
        return $this->db->delete("user");
      }


   }//cierre de la clase



   //
 ?>
