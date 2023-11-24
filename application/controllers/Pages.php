<?php
class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("usuario");

        // Validando si alguien está conectado
        if ($this->session->userdata("c0nectadoUTC")) {
            // Si está conectado
            if ($this->session->userdata("c0nectadoUTC")->role_user == "admin") {
                // Si es administrador
            } else {
                redirect("/");
            }
        } else {
            redirect("seguridades/formularioLogin");
        }
    }



    public function index()
    {
      $data["listadoPagin"] = $this->usuario->obtenerTodos();
     
        $this->load->view("header");
        $this->load->view("usuarios/index",$data);
        $this->load->view("footer");
    }


    public function insertarUsuario()
    {
        $this->load->library('form_validation');
        $this->configurarReglasValidacion();

        if ($this->form_validation->run() === FALSE) {
            // La validación falló, vuelve a cargar la vista del formulario
            $this->load->view('usuarios/formularioRegister');
        } else {
            $data = array(
                "username_user" => $this->input->post("username_user"),
                "password_user" => $this->input->post("password_user"),
                "email_user" => $this->input->post("email_user"),
                "first_name_user" => $this->input->post("first_name_user"),
                "last_name_user" => $this->input->post("last_name_user"),
                "role_user" => $this->input->post("role_user"),
                "is_approved_user" => $this->input->post("is_approved_user")
            );

            if ($this->usuario->insertarUsuario($data)) {
                echo json_encode(array("respuesta" => "ok"));
            } else {
                echo json_encode(array("respuesta" => "error"));
            }
        }
    }

    private function configurarReglasValidacion()
    {
        $this->form_validation->set_rules('username_user', 'Username', 'required');
        $this->form_validation->set_rules('password_user', 'Password', 'required');
        $this->form_validation->set_rules('email_user', 'Email', 'required|valid_email|is_unique[usuario.email_user]');
        // Agrega otras reglas de validación según tus necesidades
    }

    // Otras funciones del controlador...
}