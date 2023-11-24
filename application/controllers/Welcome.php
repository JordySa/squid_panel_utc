<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cargar el modelo Squid_model
        $this->load->model('Squid_model');

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


    public function index() {
        // Obtener el estado actual de Squid
        $data['squid_status'] = $this->Squid_model->getSquidStatus();
        $this->load->view("header");
        $this->load->view('welcome_message', $data);
        $this->load->view("footer");
    }

    public function startSquid() {
        try {
            // Iniciar Squid
            $result = $this->Squid_model->startSquid();

            if ($result) {
                $this->session->set_flashdata('success', 'Squid iniciado con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al iniciar Squid.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Error interno al iniciar Squid.');
        }

        redirect('welcome/index');
    }

    public function stopSquid() {
        try {
            // Detener Squid
            $result = $this->Squid_model->stopSquid();

            if ($result) {
                $this->session->set_flashdata('success', 'Squid detenido con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al detener Squid.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Error interno al detener Squid.');
        }

        redirect('welcome/index');
    }
}