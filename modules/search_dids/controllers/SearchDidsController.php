<?php

namespace MT\DemoApp\modules\search_dids\controllers;

use MagicTelecomAPILib\APIException;
use MagicTelecomAPILib\Controllers\DidsController;
use MagicTelecomAPILib\Controllers\DidsProductsController;

class SearchDidsController
{
    public function __construct()
    {
        $this->objDidsController = new DidsController();

        $this->objDidsProductsController = new DidsProductsController();
    }


    /**
     * Get the list of all countries that offers did.
     *
     * @return type
     */
    public function defaultAction()
    {
        try {

            $objCountries = $this->objDidsController->getCountries(1, 100);

            $arrResponse = array();

            if ($objCountries->data->total > 0) {

                foreach ($objCountries->data->results as $objVale)
                {
                    $strIndex = strtolower($objVale->handle);

                    $arrResponse["countriesList"][$strIndex] = $objVale;
                }
            }
        } catch (APIException $e) {
            syslog(LOG_DEBUG, __METHOD__ . ' Invalid Response code - ' . $e->getCode());

            $arrResponse['error'] = "Error " . $e->getCode() . ": " . $e->getMessage();
        }

        return $arrResponse;
    }


    /**
     * Get the list of the regions for a country.
     *
     * @return type
     */
    public function didRegionsAction($strIso2)
    {
        try {

            $arrResponse = array();

            if ($strIso2 ==='US')
            {
                $objLocations = $this->objDidsController->getRegions($strIso2, 1, 100);

                if($objLocations->data->total > 0)
                {
                    $arrResponse['regionsList'] =  $objLocations->data->results;
                }
            }
        } catch (APIException $e) {

            syslog(LOG_DEBUG, __METHOD__ . ' Invalid Response code - ' . $e->getCode());

            $arrResponse['error'] = "Error " . $e->getCode() . ": " . $e->getMessage();
        }

        return $arrResponse;
    }


    /**
     * Preper the filter for did searchs by country.
     *
     * @param string $strIso2
     * @param integer $intPage
     * @param integer $intLimit
     * @return type
     */
    public function searchDidByCountry($strIso2, $intPage, $intLimit)
    {
        $strFilter = 'country_iso2::'.$strIso2;

        $arrResponse = $this->searchDidResponse($strFilter, $intPage, $intLimit);

        return $arrResponse;
    }

    /**
     * Preper the filter for did searchs.
     *
     * @param string $strSearch
     * @param integer $intPage
     * @param integer $intLimit
     * @return type
     */
    public function searchDidWithFilter($strSearch, $intPage, $intLimit)
    {
        if (preg_match("/^[0-9]+$/", $strSearch))
        {
            $strFilter ='prefix::'.$strSearch;
        }
        else
        {
            $strFilter ='country_iso2::US|region_handle::'.$strSearch;
        }

        $arrResponse = $this->searchDidResponse($strFilter, $intPage, $intLimit);

        return $arrResponse;
    }


    /**
     * Get the list of locations with did availeble.
     *
     * @return type
     */
    private function searchDidResponse($strFilter, $intPage=1, $intLimit=10)
    {
        try {

            $arrResponse = array();

            $objLocations = $this->objDidsProductsController->getLocations($intPage, $intLimit, $strFilter);

            if($objLocations->data->total > 0)
            {
                $arrResponse['total'] = $objLocations->data->total;
                $arrResponse['locationList'] = $objLocations->data->results;
            }

        } catch (APIException $e) {

            syslog(LOG_DEBUG, __METHOD__ . ' Invalid Response code - ' . $e->getCode());

            $arrResponse['error'] = "Error " . $e->getCode() . ": " . $e->getMessage();
        }

        return $arrResponse;
    }

}
