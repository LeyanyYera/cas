<?php
require_once 'CAS-1.3.8/CAS.php';

// Genera un log en /tmp/phpCAS.log. Se recomienda desactivarlo en producción
phpCAS::setDebug();

// Muestra errores al usuario. Se recomienda desactivarlo en producción
phpCAS::setVerbose(true);

// Instancia el cliente
$host_sso = '';
$port_sso = 443;
$path_sso = '';

phpCAS::client(CAS_VERSION_2_0, $host_sso, $port_sso, $path_sso);

phpCAS::setNoCasServerValidation();

// force CAS authentication
phpCAS::forceAuthentication();

// logout if desired
if (isset($_REQUEST['logout'])) {
    phpCAS::logout();
}
echo phpCAS::getUser();