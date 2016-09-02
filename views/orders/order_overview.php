<h2>Order Overview <?php print $reference; ?></h2>

<?php
if(isset($objOrderInfo['error']))
{
?> 
    <div class="alert alert-danger">
        <strong>Danger!</strong> <?php print $objOrderList['error']?>
    </div>
<?php
}
else {
    if (!empty($objOrderInfo['orderInfo'])) {

        foreach ($objOrderInfo['orderInfo']->_items as $objValue) {
            ?>
            <ol class="breadcrumb">
                <li><a href="/?action=search_dids&module=orders">Order List</a></li>
                <li class="active"><?php print $reference; ?></li>
            </ol>
            <table class="table">
                <tr>
                    <th>Status</th>
                    <td><?php print $objValue->status?></td>
                </tr>
                <tr>
                    <th>Item Type</th>
                    <td><?php print $objValue->item_type?></td>
                </tr>
            <?php 
                if($objValue->item_type=='LOCATION')
                {
            ?>
                <tr>
                    <th>Location</th>
                    <td><?php print $objValue->location_handle; ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><img src="template/images/icons/flags/69x40/<?php print $objValue->country_code; ?>.png" alt="<?php print $objValue->country_code; ?>" height="23" width="40"></td>
                </tr>
                <tr>
                    <th>Attributes</th>
                    <td><?php print $objValue->attributes; ?></td>
                </tr>
            <?php    
                }
                else {
            ?>
                <tr>
                    <th>Channels</th>
                    <td><?php print $objValue->channels; ?></td>
                </tr>
                <tr>
                    <th>Sip Uri</th>
                    <td><?php print $objValue->sip_uri; ?></td>
                </tr>
                <tr>
                    <th>Zone</th>
                    <td><?php print $objValue->trunk_handle; ?></td>
                </tr>
            <?php            
                }
            ?>
            </table>
            <?php
        }
        ?>
        <?php
    }
    else {
        print '<div>The search returned no results</div>';
    }
}