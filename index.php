<?php

require_once __DIR__.'/app/autoload.php';

$module="";
extract($_GET);

require_once __DIR__.'/template/html/header.php';

switch ($module) {
    case 'search_dids':
        require_once __DIR__.'/modules/search_dids/search_dids.php';
        break;

    case 'orders':
        require_once __DIR__.'/modules/orders/orders.php';
        break;

    case 'account':
        require_once __DIR__.'/modules/account/account.php';
        break;

    default:
        require_once __DIR__.'/views/homepage.php';
}
require_once __DIR__.'/template/html/footer.php';