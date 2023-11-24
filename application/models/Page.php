<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends CI_Model {

    private $config_file = '/etc/squid/squid.conf';

    public function agregarPaginaPermitida($url) {
        $acls = $this->obtenerACLsPaginasPermitidas();
        $acls[] = "acl permitidas dstdomain $url";
        $this->guardarACLsPaginasPermitidas($acls);
        $this->recargarSquid();
    }

    public function quitarPaginaPermitida($url) {
        $acls = $this->obtenerACLsPaginasPermitidas();
        $acls = array_diff($acls, ["acl permitidas dstdomain $url"]);
        $this->guardarACLsPaginasPermitidas($acls);
        $this->recargarSquid();
    }

    private function obtenerACLsPaginasPermitidas() {
        $config = file_get_contents($this->config_file);
        preg_match_all('/acl permitidas dstdomain .*$/m', $config, $matches);
        return $matches[0];
    }

    private function guardarACLsPaginasPermitidas($acls) {
        $config = file_get_contents($this->config_file);
        $config = preg_replace('/acl permitidas dstdomain .*$/', implode("\n", $acls), $config);
        file_put_contents($this->config_file, $config);
    }

    private function recargarSquid() {
        exec('sudo service squid reload');
    }
}
}
