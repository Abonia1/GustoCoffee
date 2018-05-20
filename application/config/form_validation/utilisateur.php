<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ajouter ---------------------------------------------------
$config['ajouter_utilisateur']= array(
    array(
	   'field' => 'nom',
	   'label' => 'Nom',
	   'rules' => 'required|max_length[60]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
	),
    
    array(
        'field' => 'prenom',
        'label' => 'Prénom',
        'rules' => 'required|max_length[60]|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    
    array(
        'field' => 'email',
        'label' => 'Adresse e-mail',
        'rules' => 'required|valid_email|is_unique[administrateur.email]|trim|max_length[255]',
        'errors'    =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'valid_email' => 'Cette adresse e-mail n\'est pas valide',
            'is_unique' => 'L\'adresse e-mail est déjà utilisée, veuillez en utiliser une autre',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    
    array(
        'field' => 'role',
        'label' => 'Rôle',
        'rules' => 'trim',
        'errors'	=>	array(
            //'in_list' => 'Le champ <strong>{field}</strong> n\'est pas un rôle utilisateur'
        )
    ),
    
    array(
        'field' => 'identifiant',
        'label' => 'Identifiant',
        'rules' => 'required|is_unique[administrateur.identifiant]|max_length[255]|trim',
        'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'L\'identifiant est déjà utilisé, veuillez en utiliser un autre'
        )
    ),

	array(
		'field' => 'mot_de_passe',
		'label' => 'Mot de passe',
		'rules' => 'required|min_length[6]|max_length[30]|trim',
		'errors'	=>	array(
		    'required' => 'Le champ <strong>{field}</strong> est obligatoire',
		    'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
		    'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères'
        )
	),

	array(
		'field' => 'mot_de_passe_check',
		'label' => 'Vérification mot de passe',
		'rules' => 'required|min_length[6]|max_length[30]|matches[mot_de_passe]|trim',
		'errors'	=>	array(
		    'required' => 'Le champ <strong>{field}</strong> est obligatoire',
		    'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
		    'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères',
		    'matches' => 'Les mots de passe ne correspondent pas'
        ) 
	)
);

// modifier ---------------------------------------------------
$config['modifier_utilisateur']= array(
    array(
       'field' => 'nom',
       'label' => 'Nom',
       'rules' => 'required|max_length[60]|trim',
       'errors' =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    
    array(
        'field' => 'prenom',
        'label' => 'Prénom',
        'rules' => 'required|max_length[60]|trim',
        'errors'    =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    
    array(
        'field' => 'email',
        'label' => 'Adresse e-mail',
        'rules' => 'required|valid_email|trim|max_length[255]',
        'errors'    =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'valid_email' => 'Cette adresse e-mail n\'est pas valide',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    
    array(
        'field' => 'role',
        'label' => 'Rôle',
        'rules' => 'trim',
        'errors'    =>  array(
            //'in_list' => 'Le champ <strong>{field}</strong> n\'est pas un rôle utilisateur'
        )
    ),
    
    array(
        'field' => 'identifiant',
        'label' => 'Identifiant',
        'rules' => 'required|max_length[255]|trim',
        'errors'    =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'L\'adresse e-mail est déjà utilisée, veuillez en utiliser une autre'
        )
    ),

    array(
        'field' => 'mot_de_passe',
        'label' => 'Mot de passe',
        'rules' => 'min_length[6]|max_length[30]|trim',
        'errors'    =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères'
        )
    ),

    array(
        'field' => 'mot_de_passe_check',
        'label' => 'Vérification mot de passe',
        'rules' => 'min_length[6]|max_length[30]|matches[mot_de_passe]|trim',
        'errors'    =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères',
            'matches' => 'Les mots de passe ne correspondent pas'
        ) 
    )
);