<?php
class UsuarioModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerUsuario($nombre) {
        return $this->db->get_where('usuarios', ['nombre' => $nombre])->row_array();
    }

    public function verificarContrasena($nombre, $contrasena) {
        $usuario = $this->obtenerUsuario($nombre);
        
        // Comparar la contraseña directamente en texto plano
        if ($usuario && $usuario['contrasena'] === $contrasena) {
            return $usuario;
        } else {
            return false;
        }
    }
}
?>
