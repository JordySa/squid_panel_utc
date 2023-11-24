<?php
class Seguridades extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("usuario");
        $this->load->library('form_validation');
    }

    public function formularioLogin() {
        $this->load->view("seguridades/formularioLogin");
    }

    public function validarAcceso() {
        $username_user = $this->input->post("username_user");
        $password_user = $this->input->post("password_user");
        $usuario = $this->usuario->buscarUsuarioPorUsernamePassword($username_user,$password_user);

        if ($usuario) {
            if ($usuario->is_approved_user > 0) {
                $this->session->set_userdata("c0nectadoUTC", $usuario);
                $this->session->set_flashdata("bienvenida", "Saludos, bienvenido al sistema");
                redirect("/");
            } else {
                $this->session->set_flashdata("error", "Usuario no validado");
                redirect("seguridades/formularioLogin");
            }
        } else {
            $this->session->set_flashdata("error", "Username or Password Incorrect");
            redirect("seguridades/formularioLogin");
        }
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        redirect("seguridades/formularioLogin");
    }

    public function formularioRegistro() {
        $this->load->view("seguridades/formularioRegistro");
    }

    public function registrarUsuario() {
        $this->form_validation->set_rules('username_user', 'Username', 'required|is_unique[usuario.username_user]');
        $this->form_validation->set_rules('password_user', 'Password', 'required');
        $this->form_validation->set_rules('email_user', 'Email', 'required|valid_email|is_unique[usuario.email_user]');
        // Agregar reglas de validación adicionales según tus necesidades

        if ($this->form_validation->run() === FALSE) {
          $this->load->view('seguridades/formularioRegistro');
      } else {
          $username_user = $this->input->post("username_user");
          $email_user = $this->input->post("email_user");
      
          // Verificar si ya existe un usuario con el mismo nombre de usuario o correo electrónico
          if ($this->usuario->existeUsuario($username_user, $email_user)) {
              $this->session->set_flashdata("error", "Este usuario ya existe en la base de datos.");
              $this->load->view('seguridades/formularioRegistro');
          } else {
              // Los datos son únicos, procede con el registro
              $data = array(
                  "username_user" => $this->input->post("username_user"),
                  "password_user" => $this->input->post("password_user"),
                  "email_user" => $this->input->post("email_user"),
                  "first_name_user" => $this->input->post("first_name_user"),
                  "last_name_user" => $this->input->post("last_name_user"),
                  "role_user" => $this->input->post("role_user"),
                  "is_approved_user" => $this->input->post("is_approved_user")
              );
      
              $this->usuario->insertarUsuario($data);
      
              $this->session->set_flashdata("registro_exitoso", "Registro exitoso, puedes iniciar sesión ahora.");
              redirect("seguridades/formularioLogin");
          }
      }
    }
}