<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $registroUsuario = [
		'id_empresa' => [
			'label' => 'empresa',
			'rules' => 'permit_empty|is_not_unique[empresa.id]'
		],
		'nombres' => [
			'label' => 'nombres',
			'rules' => 'required|min_length[3]|max_length[100]'
		],
		'apellidos' => [
			'label' => 'apellidos',
			'rules' => 'required|min_length[3]|max_length[100]'
		],
		'email' => [
			'label' => 'email',
			'rules' => 'required|valid_email|max_length[30]|is_unique[usuario.email,id,{id}]',
			'errors' => [
				'is_unique' => 'El campo email ya esta siendo utilizado por otro usuario'
			]
		],
		'password' => [
			'label' => 'contraseña',
			'rules' => 'required|alpha_numeric|min_length[5]|max_length[30]'
		],
		'confirm_password' => [
			'label' => 'confirmar contraseña',
			'rules' => 'required|alpha_numeric|min_length[5]|max_length[30]|matches[password]'
		],
		'estado' => [
			'label' => 'estado',
			'rules' => 'required|in_list[0,1]'
		],
	];

	public $empresa = [
		'nombre' => [
			'label' => 'nombre',
			'rules' => 'required|max_length[100]'
		],
		'slug' => [
			'label' => 'slug',
			'rules' => 'required|max_length[100]|alpha_dash|is_unique[empresa.slug,id,{id}]'
		],
		'logo' => [
			'label' => 'logo',
			'rules' => 'uploaded[logo]|is_image[logo]|max_size[logo,2048]|max_dims[logo,300,300]',
			'errors' => [
				'uploaded' => 'El campo logo es un campo obligatorio',
				'is_image' => 'El campo logo debe ser una imagen'
			]
		],
		'background_color' => [
			'label' => 'color de fondo',
			'rules' => 'required|max_length[20]'
		],
		'estado' => [
			'label' => 'estado',
			'rules' => 'required|in_list[0,1]'
		]
	];

	public $acceso = [
		'email' => [
			'label' => 'email',
			'rules' => 'required'
		],
		'password' => [
			'label' => 'contraseña',
			'rules' => 'required'
		]
	];

	public $datosUsuario = [
		'slug' => [
			'label' => 'slug',
			'rules' => 'required|alpha_dash|max_length[255]|is_unique[datos_usuario.slug,id_usuario,{id_usuario}]'
		],
		'nombres' => [
			'label' => 'nombres',
			'rules' => 'required|min_length[3]|max_length[100]'
		],
		'apellidos' => [
			'label' => 'apellidos',
			'rules' => 'required|min_length[3]|max_length[100]'
		],
		'puesto' => [
			'label' => 'puesto',
			'rules' => 'required|max_length[255]'
		],
		'pagina_web' => [
			'label' => 'pagina web',
			'rules' => 'permit_empty|valid_url|max_length[255]'
		],
		'fecha_nacimiento' => [
			'label' => 'fecha nacimiento',
			'rules' => 'permit_empty|valid_date[Y-m-d]'
		],
		'genero' => [
			'label' => 'genero',
			'rules' => 'permit_empty|in_list[M,F]'
		],
		'foto_perfil' => [
			'label' => 'foto de perfil',
			'rules' => 'uploaded[foto_perfil]|is_image[foto_perfil]|max_size[foto_perfil,2048]|max_dims[foto_perfil,300,300]',
			'errors' => [
				'uploaded' => 'El campo foto de perfil es un campo obligatorio',
				'is_image' => 'El campo foto de perfil debe ser una imagen'
			]
		],
		'acerca_de_mi' => [
			'label' => 'acerca de mi',
			'rules' => 'permit_empty'
		],
		'inicio' => [
			'label' => 'inicio',
			'rules' => 'permit_empty'
		],
		'horarios_atencion' => [
			'label' => 'horarios de atención',
			'rules' => 'permit_empty'
		],
		'educacion' => [
			'label' => 'educación',
			'rules' => 'permit_empty'
		],
		'experiencia' => [
			'label' => 'experiencia',
			'rules' => 'permit_empty'
		],
		'servicios' => [
			'label' => 'servicios',
			'rules' => 'permit_empty'
		]
	];

	public $datosEmpresa = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'imagen' => [
			'label' => 'imagen',
			'rules' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
			'errors' => [
				'uploaded' => 'El campo imagen es un campo obligatorio',
				'is_image' => 'El campo imagen debe ser una imagen'
			]
		],
		'descripcion' => [
			'label' => 'descripcion',
			'rules' => 'required'
		]
	];

	public $imagen = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'imagen' => [
			'label' => 'imagen',
			'rules' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]',
			'errors' => [
				'uploaded' => 'El campo imagen es un campo obligatorio',
				'is_image' => 'El campo imagen debe ser una imagen'
			]
		],
		'descripcion' => [
			'label' => 'descripcion',
			'rules' => 'permit_empty'
		],
		'orden' => [
			'label' => 'orden',
			'rules' => 'required|max_length[3]|alpha_numeric'
		],
		'es_publico' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		]
	];

	public $video = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'video' => [
			'label' => 'video',
			'rules' => 'uploaded[video]|mime_in[video,video/mp4]|max_size[video,5000]',
			'errors' => [
				'uploaded' => 'El campo video es un campo obligatorio'
			]
		],
		'titulo' => [
			'label' => 'titulo',
			'rules' => 'required|max_length[100]'
		],
		'descripcion' => [
			'label' => 'descripcion',
			'rules' => 'permit_empty|max_length[255]'
		],
		'orden' => [
			'label' => 'orden',
			'rules' => 'required|max_length[3]|alpha_numeric'
		],
		'es_publico' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		],
		'es_principal' => [
			'label' => 'es principal',
			'rules' => 'required|in_list[0,1]'
		]
	];

	public $localizacion = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'id_tipo_localizacion' => [
			'label' => 'tipo localizacion',
			'rules' => 'required|is_not_unique[tipo_localizacion.id]'
		],
		'direccion' => [
			'label' => 'direccion',
			'rules' => 'required|max_length[550]'
		],
		'iframe' => [
			'label' => 'iframe',
			'rules' => 'required'
		],
		'link' => [
			'label' => 'link',
			'rules' => 'required|valid_url'
		],
		'link_como_llegar' => [
			'label' => 'link como llegar',
			'rules' => 'required|valid_url'
		],
		'es_publico' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		]
	];

	public $redSocial = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'id_tipo_red_social' => [
			'label' => 'id tipo red social',
			'rules' => 'required|is_not_unique[tipo_red_social.id]'
		],
		'url' => [
			'label' => 'url',
			'rules' => 'required|valid_url'
		],
		'es_publico' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		]
	];

	public $correoElectronico = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'id_tipo_correo_electronico' => [
			'label' => 'id tipo correo electronico',
			'rules' => 'required|is_not_unique[tipo_correo_electronico.id]'
		],
		'url' => [
			'label' => 'url',
			'rules' => 'required|valid_email'
		],
		'es_principal' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		],
		'es_publico' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		]
	];

	public $telefono = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'id_tipo_telefono' => [
			'label' => 'id tipo telefono',
			'rules' => 'required|is_not_unique[tipo_telefono.id]'
		],
		'prefijo' => [
			'label' => 'prefijo',
			'rules' => 'required|integer|max_length[10]'
		],
		'numero' => [
			'label' => 'numero',
			'rules' => 'required|alpha_numeric_punct|max_length[255]'
		],
		'es_wsp' => [
			'label' => 'es whatsapp',
			'rules' => 'required|in_list[0,1]'
		],
		'msg_wsp' => [
			'label' => 'mensaje whatsapp',
			'rules' => 'required|max_length[255]'
		],
		'es_principal' => [
			'label' => 'es principal',
			'rules' => 'required|in_list[0,1]'
		],
		'es_publico' => [
			'label' => 'es publico',
			'rules' => 'required|in_list[0,1]'
		],
	];

	public $apariencia = [
		'id_usuario' => [
			'label' => 'id usuario',
			'rules' => 'required|is_not_unique[usuario.id]'
		],
		'color_primario' => [
			'label' => 'color primario',
			'rules' => 'required|max_length[20]'
		],
		'banner' => [
			'label' => 'banner',
			'rules' => 'uploaded[banner]|is_image[banner]|max_size[banner,2048]',
			'errors' => [
				'uploaded' => 'El campo banner es un campo obligatorio',
				'is_image' => 'El campo banner debe ser una imagen'
			]
		],
	];
}
