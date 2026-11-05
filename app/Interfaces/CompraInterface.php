<?php

namespace App\Interfaces;

interface CompraInterface extends BaseInterface
{
  public function findById(int $id_compra);

  public function findByTotal(float $total);

  public function findByEstado(string $estado);

  public function findByUsuario(int $id_usuario);

  public function findByProveedor(int $id_proveedor);

}
