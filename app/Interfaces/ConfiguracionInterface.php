<?php

namespace App\Interfaces;

interface ConfiguracionInterface extends BaseInterface
{
    public function findById( int $id_configuracion);

    public function findByNombreEmpresa(string $nombreEmpresa);

    public function findByNit(string $nit);

    public function findByDireccion(string $direccion);

    public function findByTelefono(string $telefono);

    public function findByEmail(string $email);

    public function findByPaginaWeb(string $paginaWeb);

    public function findByMoneda(string $moneda);

    public function findByZonaHoraria(string $zonaHoraria);

    public function findByFormatoHora(string $formatoHora);

    public function findByIntentosMaximos(int $intentosMaximos);

    public function findByTiempoInactividad(int $tiempoInactividad);

    public function findByProductosVencer(bool $productosVencer);

    public function findByProductosAgotados(bool $productosAgotados);

    public function findByBajoStock(bool $bajoStock);

    public function findByMovimientosStock(bool $movimientosStock);

    public function findByVentasDia(bool $ventasDia);
    
    public function findByRespaldo(bool $respaldo);
    
    public function findByVersionSistema(string $versionSistema);

    public function findByLicencia(string $licencia);
    
}
