<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Administration ---------------------------------------------------

$config['admin'] = array(

    //Ajouter-------------------------------------------------------------------------------------
    'ajouter_rules' => array(
        // array(
        //     'field' => 'civilite',
        //     'label' => 'Civilité',
        //     'rules' => 'required|in_list[Mr, Mme, Mlle]|trim',
        //     'errors'	=>	array(
        //         'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        //         'in_list' => 'Le champ <strong>{field}</strong> doit être Mr, Mme ou Mlle'
        //     )
        // ),

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
            'field' => 'telephone',
            'label' => 'Téléphone',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'	=>	array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'	=>	array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'max_length[255]|trim',
            'errors'	=>	array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'code_postal',
            'label' => 'Code postal',
            'rules' => 'is_natural|exact_length[5]|trim',
            'errors'	=>	array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'max_length[60]|trim',
            'errors'	=>	array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'pays',
            'label' => 'Pays',
            'rules' => 'max_length[60]|trim',
            'errors'	=>	array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

    	array(
    		'field' => 'email',
    		'label' => 'Adresse e-mail',
    		'rules' => 'required|valid_email|is_unique[client.email]|trim|max_length[255]',
    		'errors'	=>	array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'valid_email' => 'Cette adresse e-mail n\'est pas valide',
                'is_unique' => 'L\'adresse e-mail est déjà utilisée, veuillez en utiliser une autre',
    		    'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
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
    		'label' => 'Verification du mot de passe',
    		'rules' => 'required|min_length[6]|max_length[30]|matches[mot_de_passe]|trim',
    		'errors'	=>	array(
    		    'required' => 'Le champ <strong>{field}</strong> est obligatoire',
    		    'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
    		    'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères',
    		    'matches' => 'Les mots de passe ne correspondent pas'
            )
    	)
    ),

    //Ajouter----------------------------------------------------------------------------------
    'modifier_rules'=> array(
        // array(
        //     'field' => 'civilite',
        //     'label' => 'Civilité',
        //     'rules' => 'in_list[Mr, Mme, Mlle]|trim',
        //     'errors'    =>  array(
        //         'in_list' => 'Le champ <strong>{field}</strong> doit être Mr, Mme ou Mlle'
        //     )
        // ),

        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'required|max_length[60]|trim',
            'errors'    =>  array(
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
            'field' => 'telephone',
            'label' => 'Téléphone',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'max_length[255]|trim',
            'errors'    =>  array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'code_postal',
            'label' => 'Code postal',
            'rules' => 'is_natural|exact_length[5]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'pays',
            'label' => 'Pays',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
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
                'is_unique' => 'L\'adresse e-mail est déjà utilisée, veuillez en utiliser une autre',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'mot_de_passe',
            'label' => 'Mot de passe',
            'rules' => 'min_length[6]|max_length[30]|trim',
            'errors'    =>  array(
                'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères'
            )
        ),

        array(
            'field' => 'mot_de_passe_check',
            'label' => 'Verification du mot de passe',
            'rules' => 'min_length[6]|max_length[30]|matches[mot_de_passe]|trim',
            'errors'    =>  array(
                'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères',
                'matches' => 'Les mots de passe ne correspondent pas'
            )
        )
    )
);

//Client------------------------------------------------------------------------------------------------

$config['client'] = array(

    //Ajouter-------------------------------------------------------------------------------------
    'ajouter_rules' => array(
        array(
            'field' => 'civilite',
            'label' => 'Civilité',
            'rules' => 'required|in_list[Mr,Mme,Mlle]|trim',
            'errors'    =>  array(
                
                'in_list' => 'Le champ <strong>{field}</strong> doit être Mr, Mme, Mlle ou Société'
            )
        ),

        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'required|max_length[60]|trim',
            'errors'    =>  array(
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
            'field' => 'telephone',
            'label' => 'Téléphone',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'required|max_length[255]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'adresse_complement',
            'label' => 'Complément d\'adresse',
            'rules' => 'max_length[255]|trim',
            'errors'    =>  array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'code_postal',
            'label' => 'Code postal',
            'rules' => 'required|is_natural|exact_length[5]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'required|max_length[60]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'pays',
            'label' => 'Pays',
            'rules' => 'required|max_length[60]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'email',
            'label' => 'Adresse e-mail',
            'rules' => 'required|valid_email|is_unique[client.email]|trim|max_length[255]',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'valid_email' => 'Cette adresse e-mail n\'est pas valide',
                'is_unique' => 'L\'adresse e-mail est déjà utilisée, veuillez en utiliser une autre',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'mot_de_passe',
            'label' => 'Mot de passe',
            'rules' => 'required|min_length[6]|max_length[30]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères'
            )
        ),

        array(
            'field' => 'mot_de_passe_check',
            'label' => 'Verification du mot de passe',
            'rules' => 'required|min_length[6]|max_length[30]|matches[mot_de_passe]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères',
                'matches' => 'Les mots de passe ne correspondent pas'
            )
        )
    ),

    //Modifier----------------------------------------------------------------------------------
    'modifier_rules'=> array(
        array(
            'field' => 'secteur',
            'label' => 'Secteur',
            'rules' => 'max_length[255]|trim', /*Voir pour rajouter un in_list avec les secteurs en DB*/
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        // array(
        //     'field' => 'civilite',
        //     'label' => 'Civilité',
        //     'rules' => 'in_list[Mr, Mme, Mlle]|trim',
        //     'errors'    =>  array(
        //         'in_list' => 'Le champ <strong>{field}</strong> doit être Mr, Mme ou Mlle'
        //     )
        // ),

        array(
            'field' => 'nom',
            'label' => 'Nom',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'prenom',
            'label' => 'Prénom',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'telephone',
            'label' => 'Téléphone',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'is_natural|exact_length[10]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'max_length[255]|trim',
            'errors'    =>  array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'code_postal',
            'label' => 'Code postal',
            'rules' => 'is_natural|exact_length[5]|trim',
            'errors'    =>  array(
                'is_natural' => 'Le champ <strong>{field}</strong> doit contenir uniquement des chiffres',
                'exact_length' => 'Le champ <strong>{field}</strong> doit contenir {param} chiffres'
            )
        ),

        array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'pays',
            'label' => 'Pays',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'mot_de_passe',
            'label' => 'Mot de passe',
            'rules' => 'min_length[6]|max_length[30]|trim',
            'errors'    =>  array(
                'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères'
            )
        ),

        array(
            'field' => 'mot_de_passe_check',
            'label' => 'Verification du mot de passe',
            'rules' => 'min_length[6]|max_length[30]|matches[mot_de_passe]|trim',
            'errors'    =>  array(
                'min_length' => 'Le champ <strong>{field}</strong> doit contenir au moins {param} caractères',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas contenir plus de {param} caractères',
                'matches' => 'Les mots de passe ne correspondent pas'
            )
        )
    )
);
