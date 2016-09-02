<?php
require_once 'magictelecom_sdk/src/Controllers/AccountsController.php';

use MagicTelecomAPILib\APIException;
use MagicTelecomAPILib\Controllers\AccountsController;

class OrdersController {
    
    /**
     * This is the account number register on the API,
     * you can get this information in the Account section.
     */
    private $strAccountNumber = '75';
    
    /**
     * The account already has a trunk in the API this is the ID.
     */
    private $intTrunkId = 99;


    public function __construct()
    {
        $this->objAccountsController = new AccountsController();
    }
    
    /**
     * Create the cart with the API account 
     * number and return the cart ID.
     * 
     * @param string $strAccountNumber
     * @return APIException
     */
    protected function createCarts() {
        try {
            $objResponse = $this->objAccountsController->createCarts($this->strAccountNumber);

            $this->intCartId = (int) $objResponse->cart_id;
        } 
        catch (APIException $ex) {

            throw new Exception(
                "Failed to create a cart for account: {$this->strAccountNumber}: " .
                $ex->getCode() . ': ' . $ex->getMessage()
            );
        }
    }
    
    /**
     * 
     * Create the cart items on the API.
     * 
     * @param array $arrItemForm
     * @return APIException
     * 
     */
    protected function createItems($arrItemForm) {
        try {
            $this->objAccountsController->createItems(
                    $this->strAccountNumber, $this->intCartId, $arrItemForm);
        } 
        catch (APIException $ex) {
            throw new Exception(
                "Failed to create items for cart: {$this->intCartId}: " .
                $ex->getCode() . ': ' . $ex->getMessage()
            );
        }
    }
    
    /**
     * 
     * Checkout the cart on the API.
     * 
     * @param array $arrCartCheckoutForm
     * @return type
     * @throws APIException
     */
    protected function createCartCheckout($arrCartCheckoutForm) {
        try {
            $objOrder = $this->objAccountsController->createCartCheckout(
                    $this->strAccountNumber, $this->intCartId, $arrCartCheckoutForm);

            return $objOrder;
        } 
        catch (APIException $ex) {
            throw new Exception(
                "Failed to checkout cart: {$this->intCartId}: " .
                $ex->getCode() . ': ' . $ex->getMessage()
            );
        }
    }
    
    
    /**
     * 
     * This is an example how to buy a did location using the api.
     * 
     * @param string $strLocationHandle
     * @param string $strDidProductHandle
     * @param integer $intQuantity
     * @param string $strOrderReference
     * @return type
     */
    public function orderDidLocationsAction($strLocationHandle, $strDidProductHandle, $intQuantity, $strOrderReference)
    {
        $arrItemForm['item'] = array(
            'item_type' => 'LOCATION',
            'location_handle' => $strLocationHandle,
            'did_type_handle' => $strDidProductHandle,
            'quantity' => $intQuantity,
            'trunk_id' => $this->intTrunkId,
            'attributes' => 'sms,fax'
        );

        $this->createCarts();
                        
        $this->createItems($arrItemForm);
        
        /**
         * the external order reference can be the order id on your system 
         * or any other identification that you can use to link.
         */
        $arrCartCheckoutForm['checkout'] = array(
            'external_order_reference' => $strOrderReference, 
        );

        $objDidResult = $this->createCartCheckout($arrCartCheckoutForm);
        
        return $objDidResult;
    }

    
    /**
     * List all the orders for the account.
     * 
     * @return type
     */
    public function ordersListAction($intPage=1, $intLimit=10)
    {
        try {
                        
            $objOrders = $this->objAccountsController->getOrders($this->strAccountNumber, $intPage, $intLimit);

            $arrResponse = array();

            if ($objOrders->data->total > 0) {
                
                $arrResponse['total'] = $objOrders->data->total;
                $arrResponse['orderList'] = $objOrders->data->results;
            }
        } catch (APIException $e) {
            syslog(LOG_DEBUG, __METHOD__ . ' Invalid Response code - ' . $e->getCode());

            $arrResponse['error'] = "Error " . $e->getCode() . ": " . $e->getMessage();
        }
                
        return $arrResponse;
    }
    
    /**
     * Get the order on the API.
     * 
     * @return type
     */
    public function getOrderAction($intOrderId)
    {
        try {
                        
            $objOrder = $this->objAccountsController->getOrder($this->strAccountNumber, $intOrderId);

            $arrResponse = array();

            if (isset($objOrder->data)) {
                
                $arrResponse['orderInfo'] = $objOrder->data;
            }
        } catch (APIException $e) {
            syslog(LOG_DEBUG, __METHOD__ . ' Invalid Response code - ' . $e->getCode());

            $arrResponse['error'] = "Error " . $e->getCode() . ": " . $e->getMessage();
        }
                
        return $arrResponse;
    }
}

