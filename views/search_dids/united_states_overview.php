<h2>DID Coverage for <?php print $strCountryName; ?> 
    <div class="pull-right flag_120x70">
        <img src="template/images/icons/flags/120x70/<?php print strtolower($strIso2); ?>.png" alt="<?php print $strCountryName; ?>" height="70" width="120">
    </div>
</h2>
<p>Pricing above is for 1 DID. </p>
<p><strong>NRC:</strong> Non-Recurring Charge</p>
<p><strong>MRC:</strong> Monthly Recurring Charge</p>

<?php require_once 'views/search_dids/prefix_search_form.php'; ?>

<?php
    if(isset($objCountryLocationList))
    {
        if(isset($objCountryLocationList['error']))
        {
        ?> 
            <div class="alert alert-danger">
                <strong>Danger!</strong> <?php print $objCountryLocationList['error']?>
            </div>
        <?php
        }
        
        if(!empty($objCountryLocationList['locationList']))
        {
            $intTotalResult = $objCountryLocationList['total'];
        ?>

            <ol class="breadcrumb">
                <li><a href="/?module=search_dids&country=<?php print $country; ?>"><?php print $strCountryName; ?> </a></li>
                <li class="active"><?php print $objCountryLocationList['locationList'][0]->_region->name; ?></li>
            </ol>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Area code/NPA</th>
                        <th><abbr title="Non-Recurring Charge">NRC</abbr></th>
                        <th><abbr title="Monthly Recurring Charge">MRC</abbr></th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($objCountryLocationList['locationList'] as $objValue)
                    {?>
                        <tr class="vcenter">
                            <td><?php print $objValue->name?></td>
                            <td><?php print $objValue->dialcode?></td>
                            <td><?php print $objValue->_rates->STANDARD->initial_cost?></td>
                            <td><?php print $objValue->_rates->STANDARD->monthly_cost?></td>
                            <td>1</td>
                            <td>
                                <form action="/?module=orders&action=buy" method="post">
                                    <input type="hidden" name="quantity" value="1" />
                                    <input type="hidden" name="product" value="STANDARD" />
                                    <input type="hidden" name="location" value="<?php print $objValue->handle?>" />
                                    <button type="submit" class="btn btn-primary">Buy</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
            $strUrl = 'module=search_dids&country='.$country;
            require_once 'views/pagination.php';
        }
        else
        {
            print '<div>The DIDs search returned no results</div>';
        }
        
    }
    else
    {
        if(isset($objCountryRegionList['error']))
        {
        ?> 
            <div class="alert alert-danger">
                <strong>Danger!</strong> <?php print $objCountryLocationList['error']?>
            </div>
        <?php
        }
        else
        {
            if(!empty($objCountryRegionList['regionsList']))
            {
            ?>
                <ul class="result_list">
                    <?php 
                    foreach ($objCountryRegionList['regionsList'] as $objValue)
                    {
                    ?>
                        <li><a href="/?module=search_dids&country=<?php print $country;?>&region=<?php print strtolower($objValue->region_handle) ?>"><?php print $objValue->name; ?></a></li>    
                    <?php
                    }
                    ?>
                </ul>
            <?php
            }
            else {
            ?>
                <div><?php print "The DIDs search returned no results";?></div>
            <?php        
            }
        }
    }
