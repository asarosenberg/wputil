# Create a user session in WordPress assuming the role of user with id 1

<?php
$root = $_SERVER['DOCUMENT_ROOT']; 
require_once($root.'/wp-config.php'); 
require_once($root.'/wp-includes/pluggable.php'); 
$u = get_user_by('id',1); 
wp_set_auth_cookie($u->ID,1,1); 
wp_redirect(user_admin_url()); 
