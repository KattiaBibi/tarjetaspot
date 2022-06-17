<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'documentos';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_usuario', 'url', 'descripcion', 'es_publico'];

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
		$this->builder()->select();

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
		if (isset($filters['id_usuario']) && $filters['id_usuario'] !== '') {
			$this->builder()->where('id_usuario', $filters['id_usuario']);
		}

		return $this->builder();
	}
}
