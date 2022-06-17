<?php

namespace App\Models;

use CodeIgniter\Model;

class CorreosElectronicosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'correos_electronicos';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_usuario', 'id_tipo_correo_electronico', 'url', 'es_principal', 'es_publico'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

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
			->select('
			correos_electronicos.id as id,
			correos_electronicos.id_tipo_correo_electronico as id_tipo_correo_electronico,
			tipo_correo_electronico.descripcion as descripcion_tipo_correo_electronico,
			correos_electronicos.url as url,
			correos_electronicos.es_principal as es_principal,
			correos_electronicos.es_publico as es_publico')
			->join('tipo_correo_electronico', 'correos_electronicos.id_tipo_correo_electronico = tipo_correo_electronico.id', 'inner');

		return $this->getFilters($filters)
			->orderBy('id', 'desc')
			->get($limit, $offset)
			->getResult('array');
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
		if (isset($filters['id_usuario']) && $filters['id_usuario'] !== '') {
			$this->builder()->where('id_usuario', $filters['id_usuario']);
		}

		return $this->builder();
	}
}
