<?php
      class Users extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model("user");
            //validando si alguien esta conectado
        }

        public function index(){
          $data["listadoUsers"]=$this->user->consultarTodos();
          $this->load->view("header");
          $this->load->view("users/index",$data);
          $this->load->view("footer");
        }
        public function nuevo(){
          $this->load->view("header");
          $this->load->view("users/nuevo");
          $this->load->view("footer");
        }

        public function editar($id){
          $data["user"]=$this->user->consultarPorId($id);
          $this->load->view("header");
          $this->load->view("users/editar",$data);
          $this->load->view("footer");
        }

        public function procesarActualizacion(){
            $id=$this->input->post("id");
            $datosUserEditado=array(
                "username"=>$this->input->post("username"),
                "password_use"=>$this->input->post("password_use"),
                "email"=>$this->input->post("email"),
                "is_verified"=>$this->input->post("is_verified"),
                "created_at"=>$this->input->post("created_at")
            );

            if($this->user->actualizar($id,$datosUserEditado)){
                //echo "INSERCION EXITOSA";
                redirect("users/index");
            }else{
                echo "ERROR AL ACTUALIZAR";
            }
        }

        public function guardarUser(){
            $datosNuevoUser=array(
                "username"=>$this->input->post("username"),
                "password_use"=>$this->input->post("password_use"),
                "email"=>$this->input->post("email"),
                "is_verified"=>$this->input->post("is_verified"),
                "created_at"=>$this->input->post("created_at")
            );

            if($this->user->insertar($datosNuevoUser)){
                $this->session->set_flashdata("confirmacion",
                 "User insertado exitosamente.");
            }else{
               $this->session->set_flashdata("error",
               "Error al procesar, intente nuevamente.");
            }
            redirect("users/index");
        }

        public function procesarEliminacion($id){
            if($this->user->eliminar($id)){
                redirect("users/index");
            }else{
                echo "ERROR AL ELIMINAR";
            }

        }

    }//cierre de la clase
?>
