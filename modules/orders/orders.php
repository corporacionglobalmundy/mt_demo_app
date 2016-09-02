<?php

require_once 'magictelecom_sdk/src/Configuration.php';
require_once 'magictelecom_sdk/src/CustomAuthUtility.php';
require_once 'magictelecom_sdk/src/APIHelper.php';
require_once 'magictelecom_sdk/src/APIException.php';

require_once 'magictelecom_sdk/vendor/apimatic/unirest-php/src/Unirest/Unirest.php';
require_once 'magictelecom_sdk/vendor/apimatic/unirest-php/src/Unirest/Method.php';
require_once 'magictelecom_sdk/vendor/apimatic/unirest-php/src/Unirest/Request.php';
require_once 'magictelecom_sdk/vendor/apimatic/unirest-php/src/Unirest/Response.php';

require_once 'modules/orders/controllers/OrdersController.php';

$action = "";

extract($_POST);
extract($_GET);

$objOrdersController = new OrdersController();

if (!isset($page) || $page==0 || !isset($limit) || $limit==0)
{
    $page = 1;
    $limit= 10;
}

switch ($action) {
    case 'buy':
        $strOrderReference = strtotime(date('Y-m-d H:i:s'));
        
        if (!isset($location) || is_null($location) || !isset($product) || is_null($product) || !isset($quantity) || is_null($quantity) )
        {
            $objOrderList['error'] = 'The request cannot be process one of the parameter are missing.';
            
            require_once 'views/orders/order_list.php';
            
            return;
        }
        
        $objOrderResult = $objOrdersController->orderDidLocationsAction($location, $product, $quantity, $strOrderReference);
        
        header("Location: /?module=orders&action=overview&reference=".$objOrderResult->order_id);
    break;

    case 'overview':
        $objOrderInfo = $objOrdersController->getOrderAction($reference);
        
        require_once 'views/orders/order_overview.php';
    break;  

    default:
        $objOrderList = $objOrdersController->ordersListAction($page, $limit);
        
        require_once 'views/orders/order_list.php';
}
