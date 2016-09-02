<?php
$module="";

extract($_GET);

require 'template/html/header.php';

switch ($module) {
    case 'search_dids':
        require 'modules/search_dids/search_dids.php';
        break;

    case 'orders':
        require 'modules/orders/orders.php';
        break;

    case 'account':
        require 'modules/account/account.php';
        break;
    
    default:
        require 'views/default.php';
}
require 'template/html/footer.php';

