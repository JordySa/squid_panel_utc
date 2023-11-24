<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Squid_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSquidStatus() {
        try {
            $output = shell_exec('service squid status');

            if (strpos($output, 'running') !== false) {
                return 'running';
            } else {
                return 'stopped';
            }
        } catch (Exception $e) {
            return 'error';
        }
    }

    public function startSquid() {
        try {
            shell_exec('service squid start');
            // Puedes agregar lógica adicional según tus necesidades
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function stopSquid() {
        try {
            shell_exec('service squid stop');
            // Puedes agregar lógica adicional según tus necesidades
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}