<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Squid_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSquidStatus() {
        try {
            $output = shell_exec('service squid status');

            return (strpos($output, 'running') !== false) ? 'running' : 'stopped';
        } catch (Exception $e) {
            return 'error';
        }
    }

    public function startSquid() {
        try {
            shell_exec('service squid start');
            // Puedes agregar lógica adicional según tus necesidades
            return 'success';
        } catch (Exception $e) {
            return 'error';
        }
    }

    public function stopSquid() {
        try {
            shell_exec('service squid stop');
            // Puedes agregar lógica adicional según tus necesidades
            return 'success';
        } catch (Exception $e) {
            return 'error';
        }
    }

    public function restartSquid() {
        try {
            // Detener Squid
            $stopResult = $this->stopSquid();

            // Iniciar Squid después de detenerlo
            $startResult = $this->startSquid();

            if ($stopResult === 'success' && $startResult === 'success') {
                return 'success';
            } else {
                return 'error';
            }
        } catch (Exception $e) {
            return 'error';
        }
    }
    public function modificarPuerto() {
        // Validar si se ha enviado el formulario
        if ($this->input->post()) {
            // Obtener el nuevo puerto ingresado por el usuario
            $nuevoPuerto = $this->input->post('nuevo_puerto');
    
            // Validar y aplicar lógica para modificar el puerto según tus necesidades
            // Puedes utilizar el modelo Squid_model para realizar la modificación
    
            // Ejemplo: $this->Squid_model->modificarPuerto($nuevoPuerto);
    
            $this->session->set_flashdata('success', 'Puerto modificado con éxito.');
            redirect('welcome/index');
        } else {
            // Mostrar la vista del formulario para modificar el puerto
            $this->load->view("header");
            $this->load->view('modificar_puerto_form');
            $this->load->view("footer");
        }
    }
}