<?php
    class Usuario extends CI_Model{
      public function __construct(){
        parent::__construct();
      }

      //consulta para el Login de Usuario
      public function buscarUsuarioPorUsernamePassword($username_user,
                      $password_user){
            $this->db->where("username_user",$username_user);
            $this->db->where("password_user",$password_user);
            $usuarioEncontrado=$this->db->get("usuario");
            if($usuarioEncontrado->num_rows()>0){
              return $usuarioEncontrado->row();
            }else{//cuando las credenciales estan incorrectas
              return false;
            }
      }
      public function existeUsuario($username_user, $email_user)
{
    $this->db->where('username_user', $username_user);
    $this->db->or_where('email_user', $email_user);
    $query = $this->db->get('usuario');

    return $query->num_rows() > 0;
}

      public function insertarUsuario($data){
        
          return $this->db->insert("usuario",$data);
      }

      public function obtenerTodos(){
        $this->db->order_by("last_name_user","asc");
        $listado=$this->db->get("usuario");
        if($listado->num_rows()>0){
          return $listado;
        }else{
          return false;
        }
      }

      public function obtenerPorId($id_user){
        $this->db->where("id_user",$id_user);
        $usuario=$this->db->get("usuario");
        if($usuario->num_rows()>0){
          return $usuario->row();
        }else{
          return false;
        }
      }

      public function eliminar($id_user){
          $this->db->where("id_user",$id_user);
          return $this->db->delete("usuario");
      }

      public function actualizar($data, $id_user){
          $this->db->where("id_user",$id_user);
          return $this->db->update("usuario",$data);
      }

    }//cierre de la clase Usuario















    //
