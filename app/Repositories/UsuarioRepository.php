<?php
namespace App\Repositories;
use App\Models\usuario;
use App\Interfaces\UsuarioInterface;

class UsuarioRepository extends BaseRepository implements UsuarioInterface {
    public function __construct(Usuario $usuario) {
        parent::__construct($usuario);
    }
    Public function findById(int $id_usuario)
    {
        return $this->model->find($id_usuario);
    }

    Public function findByNombre(string $nombre)
    {
        
      return $this->model->where('nombre', $nombre)->orderBy('nombre', 'asc')->get();
    }

    Public function findByCorreo(string $correo)
    {
        return $this->model->where('correo', $correo)->get();
    }

    public function findByPassword(string $password)
    {
        return $this->model->where('password', $password)->get();
    }

    public function findByEstado(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
    
    public function findByRol(int $id_rol)
    {
        return $this->model->where('id_rol', $id_rol)->get();
    }
}
