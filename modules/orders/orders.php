<?php

use MT\DemoApp\modules\orders\controllers\OrdersController; 
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
            $objOrderResult['error'] = 'The request cannot be process one of the parameter are missing.';

            require_once 'views/orders/order_list.php';

            return;
        }

        try {
            $objOrderResult = $objOrdersController->orderDidLocationsAction($location, $product, $quantity, $strOrderReference);

            header("Location: /?module=orders&action=overview&reference=".$objOrderResult->order_id);
        }
        catch (Exception $ex) {
                        
            $objOrderResult['error'] = $ex->getMessage();
            
            require_once 'views/orders/order_list.php';

            return;
        }
        
    break;

    case 'overview':
        $objOrderInfo = $objOrdersController->getOrderAction($reference);

        require_once 'views/orders/order_overview.php';
    break;

    default:
        $objOrderList = $objOrdersController->ordersListAction($page, $limit);

        require_once 'views/orders/order_list.php';
}
