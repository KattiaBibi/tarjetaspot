<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'usuario';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_empresa', 'email', 'password_hash', 'rol', 'estado'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField  				= 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function index($limit, $offset, $filters)
	{
		$this->builder()
			->select("
				usuario.id as id,
				usuario.id_empresa as id_empresa,
				empresa.nombre as nombre_empresa,
				usuario.email as email,
				datos_usuario.nombres,
				datos_usuario.apellidos,
				usuario.estado as estado")
			->join('datos_usuario', 'usuario.id = datos_usuario.id_usuario', 'inner')
			->join('empresa', 'usuario.id_empresa = empresa.id', 'left');

		return $this->getFilters($filters)
			->orderBy('id', 'desc')
			->get($limit, $offset)
			->getResult();
	}

	public function getTotalRowsFiltered($filters)
	{
		$this->builder()
			->select('COUNT(id) AS total_rows');

		return $this->getFilters($filters)
			->get()
			->getFirstRow()->total_rows;
	}

	private function getFilters($filters)
	{
		if (isset($filters['rol']) && $filters['rol'] !== '') {
			$this->builder()->where('rol', $filters['rol']);
		}

		return $this->builder();
	}

	public function show($id)
	{
		return $this->builder()
			->select('
				usuario.id as id,
				usuario.id_empresa as id_empresa,
				empresa.nombre as nombre_empresa,
				usuario.email as email,
				datos_usuario.nombres,
				datos_usuario.apellidos,
				usuario.estado as estado,
				usuario.created_at as created_at,
				usuario.updated_at as updated_at')
			->join('datos_usuario', 'usuario.id = datos_usuario.id_usuario', 'inner')
			->join('empresa', 'usuario.id_empresa = empresa.id', 'left')
			->where('usuario.id', $id)
			->get()
			->getFirstRow();
	}

	public function getForTarjetaDigital($id)
	{
		$resultSet = [];
		$usuario = model('UsuarioModel')->where('id', $id)->first();
		$resultSet['datosUsuario'] = model('DatosUsuarioModel')->where('id_usuario', $id)->first();
		$resultSet['empresa'] = model('EmpresaModel')->where('id', $usuario['id_empresa'])->first();
		$resultSet['datosEmpresa'] = model('DatosEmpresaModel')->where('id_usuario', $id)->first();
		$resultSet['imagenes'] = model('ImagenesModel')->index(0, 0, ['id_usuario' => $id]);
		$resultSet['localizaciones'] = model('LocalizacionesModel')->index(0, 0, ['id_usuario' => $id]);
		$resultSet['redesSociales'] = model('RedesSocialesModel')->index(0, 0, ['id_usuario' => $id]);
		$resultSet['telefonos'] = model('TelefonosModel')->index(0, 0, ['id_usuario' => $id]);
		$resultSet['correos'] = model('CorreosElectronicosModel')->index(0, 0, ['id_usuario' => $id]);
		$resultSet['videos'] = model('VideosModel')->index(0, 0, ['id_usuario' => $id]);
		$resultSet['apariencia'] = model('AparienciaModel')->where('id_usuario', $id)->first();

		return $resultSet;
	}

	public function getForAgendaProfesional($slugEmpresa)
	{

		$resultSet['empresa'] = model('EmpresaModel')
			->where('slug', $slugEmpresa)
			->where('estado', '1')
			->first();

		if ($resultSet['empresa']) {
			$resultSet['usuarios'] = $this->builder()
				->select("
				usuario.id as id,
				datos_usuario.nombres,
				datos_usuario.apellidos,
				usuario.estado as estado,
				datos_usuario.slug as slug,
				datos_usuario.puesto as puesto,
				datos_usuario.url_foto_de_perfil as url_foto_de_perfil")
				->join('datos_usuario', 'usuario.id = datos_usuario.id_usuario', 'inner')
				->join('empresa', 'usuario.id_empresa = empresa.id', 'left')
				->where('usuario.id_empresa', $resultSet['empresa']['id'])
				->where('usuario.rol', 'usuario')
				->where('usuario.estado', '1')
				->where('empresa.estado', '1')
				->orderBy('datos_usuario.apellidos', 'asc')
				->get()
				->getResult('array');

			if ($resultSet['usuarios']) {
				foreach ($resultSet['usuarios'] as &$usuario) {
					$usuario['telefonos'] =  model('TelefonosModel')->index(0, 0, ['id_usuario' => $usuario['id']]);
				}
			}
		}

		return $resultSet;
	}
}
