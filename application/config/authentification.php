<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Authentication Config
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

/*
| -----------------------------------------------------------------
|						LEVELS AND ROLES
| -----------------------------------------------------------------
| This definition sets the levels and roles that will be used for authentication.
|
| Keep in mind that if you use key numbering higher than 255,
| the auth_level field of the users table will need to be changed
| to smallint, or another integer datatype that handles larger numbers.
|
| No user level should ever be set with a key of 0.
|
*/

$config['levels_and_roles'] = [
	'1' => 'prospect',
    '2' => 'sous_client',
    '3' => 'client',
    '7' => 'commercial',
    '8' => 'comptabilite',
	'9' => 'administrateur'
];


$config['champs'] = [
    'administrateur' => array(
        'id', 'identifiant', 'mot_de_passe'
    ),
    'client' => array(
        'nom', 'prenom', 'email', 'statut', 'id', 'mot_de_passe'
    ),
    'commercial' => array(
        'id', 'identifiant', 'mot_de_passe'
    )
];


$config['where'] = [
    'administrateur' => 'identifiant',
    'commercial' => 'identifiant',
    'client' => 'email'
];



$config['max_chars_for_password'] = 20;
