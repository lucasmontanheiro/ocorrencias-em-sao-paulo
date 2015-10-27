<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */

/*
 * This is needed for cookie based authentication to encrypt password in
 * cookie
 * http://www.question-defense.com/tools/phpmyadmin-blowfish-secret-generator
 */
$cfg['blowfish_secret'] = 'p^^jCMskjCUQhD3qyxkeiT3D[G%x$AsM9E-48'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */

/*
 * Servers configuration
 */
$i = 0;

// Change this to use the project and instance that you've created.
$host = '/cloudsql/notes-1040:production';
$type = 'socket';

/*
* First server
*/
$i++;
/* Authentication type */
$cfg['Servers'][$i]['auth_type'] = 'cookie';
/* Server parameters */
$cfg['Servers'][$i]['socket'] = $host;
$cfg['Servers'][$i]['connect_type'] = $type;
$cfg['Servers'][$i]['compress'] = false;
/* Select mysql if your server does not have mysqli */
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['AllowNoPassword'] = true;
/*
 * End of servers configuration
 */

/*
 * Directories for saving/loading files from server
 */
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

/*
* Other settings
*/
$cfg['PmaNoRelation_DisableWarning'] = true;
$cfg['ExecTimeLimit'] = 60;
$cfg['CheckConfigurationPermissions'] = false;
?>