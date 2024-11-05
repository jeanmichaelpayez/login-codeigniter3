<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Verifica si el usuario ha iniciado sesión
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Cargar la vista del dashboard
        $this->load->view('dashboard');
    }
}
?>
