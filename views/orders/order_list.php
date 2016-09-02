<h2>DID Orders</h2>

<?php
if(isset($objOrderList['error']))
{
?> 
    <div class="alert alert-danger">
        <strong>Danger!</strong> <?php print $objOrderList['error']?>
    </div>
<?php
}
else {
    if (!empty($objOrderList['orderList'])) {
        $intTotalResult = $objOrderList['total'];
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order Reference</th>
                    <th>Status</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
        <?php
        foreach ($objOrderList['orderList'] as $objValue) {
            ?>
            <tr class="vcenter">
                <td><a href="/?module=orders&action=overview&reference=<?php print $objValue->order_id ?>"><?php print $objValue->external_order_reference ?></a></td>
                <td><?php print $objValue->_items[0]->status ?></td>
                <td><?php print count($objValue->_items[0]); ?></td>
            </tr>
            <?php
        }
        ?>
            </tbody>
        </table>
        <?php
        $strUrl = 'module=orders';
        require_once 'views/pagination.php';
    }
    else {
        print '<div>The search returned no results</div>';
    }
}