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
        $this->operateSquid('startSquid', 'Squid iniciado con éxito.', 'Error al iniciar Squid.');
    }

    public function stopSquid() {
        $this->operateSquid('stopSquid', 'Squid detenido con éxito.', 'Error al detener Squid.');
    }

    public function restartSquid() {
        try {
            // Detener Squid
            $stopResult = $this->Squid_model->stopSquid();

            // Iniciar Squid después de detenerlo
            $startResult = $this->Squid_model->startSquid();

            if ($stopResult && $startResult) {
                $this->session->set_flashdata('success', 'Squid reiniciado con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al reiniciar Squid.');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Error interno al reiniciar Squid.');
        }

        redirect('welcome/index');
    }

    private function operateSquid($method, $successMessage, $errorMessage) {
        try {
            // Ejecutar la operación en Squid
            $result = $this->Squid_model->$method();

            if ($result) {
                $this->session->set_flashdata('success', $successMessage);
            } else {
                $this->session->set_flashdata('error', $errorMessage);
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Error interno al operar con Squid.');
        }

        redirect('welcome/index');
    }
}