<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Priorité ---------------------------------------------------
$config['priorite'] = array(
  'ajouter' => array(
    array(
	   'field' => 'priorite',
	   'label' => 'Priorité',
	   'rules' => 'required|max_length[30]|is_unique[priorite.priorite]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
	  ),
    array(
     'field' => 'description',
     'label' => 'Description',
     'rules' => 'required|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    ),
    array(
     'field' => 'alt',
     'label' => 'alt',
     'rules' => 'required|max_length[255]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    )
  ),
  'modifier' => array(
    array(
       'field' => 'priorite',
       'label' => 'Priorité',
       'rules' => 'required|max_length[255]|trim',
       'errors' =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    array(
     'field' => 'description',
     'label' => 'Description',
     'rules' => 'required|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    ),
    array(
     'field' => 'alt',
     'label' => 'alt',
     'rules' => 'required|max_length[255]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    )
  )
);

// Utilisation ---------------------------------------------------
$config['utilisation'] = array(
  'ajouter' => array(
    array(
	   'field' => 'utilisation',
	   'label' => 'Utilisation',
	   'rules' => 'required|max_length[30]|is_unique[utilisation.utilisation]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'is_unique' => 'Le champ <strong>{field}</strong> doit être unique',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
	  ),
    array(
     'field' => 'description',
     'label' => 'Description',
     'rules' => 'required|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    ),
    array(
     'field' => 'alt',
     'label' => 'alt',
     'rules' => 'required|max_length[255]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    )
  ),
  'modifier' => array(
    array(
      'field' => 'utilisation',
      'label' => 'Utilisation',
      'rules' => 'required|max_length[30]|trim',
       'errors' =>  array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    ),
    array(
     'field' => 'description',
     'label' => 'Description',
     'rules' => 'required|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
        )
    ),
    array(
     'field' => 'alt',
     'label' => 'alt',
     'rules' => 'required|max_length[255]|trim',
       'errors'	=>	array(
            'required' => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
        )
    )
  )
);
