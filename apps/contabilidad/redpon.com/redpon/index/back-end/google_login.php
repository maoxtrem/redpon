<?php
if (!defined('REDPON_OAUTH_ENDPOINT')) { http_response_code(403); exit; }
require_once __DIR__ . '/../../sesion/config.php';

$client_id = "381243423874-c4ughntomi1vi9qmltj907ubvihvq4sm.apps.googleusercontent.com";
$redirect_uri = "https://redpon.com/index/google_procesar.php";
$scope = "email profile";
$auth_url = "https://accounts.google.com/o/oauth2/v2/auth?"
          . http_build_query([
              'client_id' => $client_id,
              'redirect_uri' => $redirect_uri,
              'response_type' => 'code',
              'scope' => $scope,
              'access_type' => 'online',
              'prompt' => 'select_account'
          ]);
header("Location: " . $auth_url);
exit;