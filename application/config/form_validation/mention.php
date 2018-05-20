
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['mention'] = array(

    'modifier'=> array(
        array(
            'field' => 'sociéte',
            'label' => 'Sociéte',
            'rules' => 'max_length[60]|trim', 
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'responsable',
            'label' => 'Responsable',
            'rules' => 'max_length[60]|trim',
            'errors'    =>  array(
                'required' => 'Le champ <strong>{field}</strong> est obligatoire',
                'max_length' => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
            )
        ),

        array(
            'field' => 'rcs',
            'label' => 'RCS',
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
    )
);
