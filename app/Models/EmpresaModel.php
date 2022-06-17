<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'empresa';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nombre', 'slug', 'logo', 'background_color', 'estado'];

	// Dates
	protected $useTimestamps        = false;
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

	public function searchByNombre($search, $page)
	{
		$resultSet = [];
		$limit = 10;
		$page = (!empty($page)) ? $page : 1;
		$offset = ($page - 1) * $limit;

		if (!empty(trim($search))) {

			$resultSet['results'] = $this->builder()
				->select("empresa.id as id, empresa.nombre as text")
				->like('empresa.nombre', $search, 'both', null, true)
				->get($limit, $offset)
				->getResult();

			$countFiltered = $this->builder()
				->select("COUNT(empresa.id) AS count_filtered")
				->like('empresa.nombre', $search, 'both', null, true)
				->get()
				->getFirstRow()->count_filtered;

			$resultSet['pagination'] = ['more' => ($page * $limit) < $countFiltered];
		} else {
			$resultSet['results'] = [];
			$resultSet['pagination'] = ['more' => false];
		}

		return $resultSet;
	}
}
