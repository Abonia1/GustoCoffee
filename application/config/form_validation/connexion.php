<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Login ---------------------------
$config['login_rules'] = [
	[
		'field' => 'identifiant',
		'label' => 'USERNAME OR EMAIL ADDRESS',
		'rules' => 'trim|required|max_length[255]' /* Replace max_length w/ valid_email is site not using usernames */
	],
	[
		'field' => 'mot_de_passe',
		'label' => 'PASSWORD',
		'rules' => [
            'trim',
            'required'
        ]
	]
];