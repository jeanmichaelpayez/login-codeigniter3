<?php
class AuthMiddleware {
    private $CI;

    public function __construct() {
        $this->CI =& get_instance();

        // Cargar la librería de sesión y el helper de URL
        if (!isset($this->CI->session)) {
            $this->CI->load->library('session');
        }
        $this->CI->load->helper('url');
        $this->CI->load->model('UsuarioModel');
    }

    public function check() {
        // Obtener el controlador y método actuales
        $controller = $this->CI->router->fetch_class();
        $method = $this->CI->router->fetch_method();

        // Verificar si el usuario está logueado y si no está en la página de login
        if (!$this->CI->session->userdata('logged_in') && !($controller == 'auth' && $method == 'login')) {
            redirect('auth/login');
            exit;
        }

        // Obtener permisos y verificar acceso
        $rol_id = $this->CI->session->userdata('rol_id');
        if ($rol_id) {
            $permisos = $this->CI->UsuarioModel->obtenerPermisos($rol_id);
            $acceso_permitido = false;

            foreach ($permisos as $permiso) {
                if ($permiso['nombre'] == $controller . '_' . $method) {
                    $acceso_permitido = true;
                    break;
                }
            }

            if (!$acceso_permitido && !($controller == 'auth' && $method == 'login')) {
                show_error('No tienes permiso para acceder a esta página.', 403);
            }
        }
    }
}
?>
