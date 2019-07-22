<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Ajouter ---------------------------------------------------
$config['stock'] = array(

    'ajouter'=> array(


    array(
     'field'     =>          'product',
     'label'     =>          'Nom de produit',
     'rules'     =>          'required|trim|strip_tags',
       'errors'    => array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères',

      )
  ),
   
    
     array(
	   'field'     =>          'menu',
	   'label'     =>          'menu',
	   'rules'     =>          'required|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier',
            
      )
	),
    array(
     'field'     =>          'price',
     'label'     =>          'prix',
     'rules'     =>          'required|trim|strip_tags',
       'errors'    => array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',

    
      )
  ),
     

),


//     array(
// 	   'field'     =>          'product_code',
// 	   'label'     =>          'Code de Produit',
//      'rules'     =>          'required|integer|trim',
//        'errors'    => array(
//             'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
//             'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
	  
//       )
// 	),
   
	
//     array(
// 	   'field'     =>          'product_name',
// 	   'label'     =>          'Nom',
// 	    'rules'     =>          'trim|required|max_length[255]',
//        'errors'    => array(
//             'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
//             'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères'
//       )
// 	),

//      array(
//      'field'     =>          'quantity',
//      'label'     =>          'Quantity',
//      'rules'     =>          'required|integer|trim',
//        'errors'    => array(
//             'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
//             'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
    
//       )
//   ),

//       array(
//      'field'     =>          'trans_date',
//      'label'     =>          'TransDate',
//      'rules'     =>          'required|date|trim',
//        'errors'    => array(
//             'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
//             'date'     => 'Le champ <strong>{field}</strong> doit contenir un date'
    
//       )
//   )
    
    


// Modifier ---------------------------------------------------
'modifier'=> array(

    array(
     'field'     =>          'product',
     'label'     =>          'Nom de produit',
     'rules'     =>          'required|trim|strip_tags',
       'errors'    => array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'max_length'    => 'Le champ <strong>{field}</strong> ne doit pas dépasser {param} caractères',

            
      )
  ),
   
    
     array(
	   'field'     =>          'menu',
	   'label'     =>          'menu',
	   'rules'     =>          'required|trim',
       'errors'	   =>	array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',
            'integer'     => 'Le champ <strong>{field}</strong> doit contenir un nombre entier'
      )
	),
    array(
     'field'     =>          'price',
     'label'     =>          'prix',
     'rules'     =>          'required|trim|strip_tags',
       'errors'    => array(
            'required'      => 'Le champ <strong>{field}</strong> est obligatoire',

    
      )
  ),
     

)
);