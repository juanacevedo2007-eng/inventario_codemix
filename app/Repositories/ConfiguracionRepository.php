<?php 

namespace App\Repositories;
use App\Models\Configuracion;
use App\Interfaces\ConfiguracionInterface;

class ConfiguracionRepository extends BaseRepository implements ConfiguracionInterface
{
    public function __construct(Configuracion $configuracion)
    {
        parent::__construct($configuracion);
    }

   public function findById( int $id_configuracion)
    {
        return $this->model->find($id_configuracion);
    }

    public function findByNombreEmpresa(string $nombreEmpresa)
    {
        return $this->model->where('nombre_empresa', $nombreEmpresa)->get();
    }

    public function findByNit(string $nit)
    {
        return $this->model->where('nit', $nit)->get();
    }

    public function findByDireccion(string $direccion)
    {
        return $this->model->where('direccion', $direccion)->get();
    }

    public function findByTelefono(string $telefono)
    {
        return $this->model->where('telefono', $telefono)->get();
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->get();
    }

    public function findByPaginaWeb(string $paginaWeb)
    {
        return $this->model->where('pagina_Web', $paginaWeb)->get();
    }

    public function findByMoneda(string $moneda)
    {
        return $this->model->where('moneda', $moneda)->get();
    }

    public function findByZonaHoraria(string $zonaHoraria)
    {
        return $this->model->where('zona_horaria', $zonaHoraria)->get();
    }

    public function findByFormatoHora(string $formatoHora)
    {
        return $this->model->where('formato_hora', $formatoHora)->get();
    }

    public function findByIntentosMaximos(int $intentosMaximos)
    {
        return $this->model->where('intentos_maximos', $intentosMaximos)->get();
    }

    public function findByTiempoInactividad(int $tiempoInactividad)
    {
        return $this->model->where('tiempo_inactividad', $tiempoInactividad)->get();
    }

    public function findByProductosVencer(bool $productosVencer)
    {
        return $this->model->where('productos_vencer', $productosVencer)->get();
    }

    public function findByProductosAgotados(bool $productosAgotados)
    {
        return $this->model->where('productos_agotados', $productosAgotados)->get();
    }

    public function findByBajoStock(bool $bajoStock)
    {
        return $this->model->where('bajo_stock', $bajoStock)->get();
    }

    public function findByMovimientosStock(bool $movimientosStock)
    {
        return $this->model->where('movimientos_stock', $movimientosStock)->get();
    }

    public function findByVentasDia(bool $ventasDia)
    {
        return $this->model->where('ventas_dia', $ventasDia)->get();
    }
    
    public function findByRespaldo(bool $respaldo)
    {
        return $this->model->where('respaldo', $respaldo)->get();
    }
    
    public function findByVersionSistema(string $versionSistema)
    {
        return $this->model->where('version_sistema', $versionSistema)->get();
    }

    public function findByLicencia(string $licencia)
    {
        return $this->model->where('licencia', $licencia)->get();
    }
}
