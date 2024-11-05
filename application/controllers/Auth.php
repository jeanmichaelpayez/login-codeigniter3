<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsuarioModel');
        $this->load->library('session');
    }

    public function login() {
        // Verificar si ya está logueado
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
            exit;
        }

        $nombre = $this->input->post('nombre');
        $contrasena = $this->input->post('contrasena');

        if ($nombre && $contrasena) {
            $usuario = $this->UsuarioModel->verificarContrasena($nombre, $contrasena);

            if ($usuario) {
                $this->session->set_userdata([
                    'usuario_id' => $usuario['id'],
                    'rol_id' => $usuario['rol_id'],
                    'logged_in' => true
                ]);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Credenciales incorrectas');
                redirect('auth/login');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
