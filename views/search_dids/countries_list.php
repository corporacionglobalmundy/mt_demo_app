<h2>DID Coverage</h2>
<p>Magic Telecom provides DIDs in over 100 countries around the world at prices starting as low as $0.25 per number.</p>

<?php require_once 'views/search_dids/prefix_search_form.php'; ?>

<h3>Country overview</h3>
<p>Please click the country below to view the specific city coverage, pricing and verification required.</p>


<?php
    if(isset($objCountriesList['error']))
    {
    ?> 
        <div class="alert alert-danger">
          <strong>Danger!</strong> <?php print $objCountriesList['error']?>
        </div>
    <?php
    }
    else
    {
        if(!empty($objCountriesList['countriesList']))
        {
        ?>
            <ul class="result_list">
                <?php 
                foreach ($objCountriesList['countriesList'] as $objValue)
                {
                ?>
                    <li><a href="/?module=search_dids&country=<?php print strtolower($objValue->handle) ?>"><img src="template/images/icons/flags/<?php print $objValue->iso2; ?>.png" alt="<?php print $objValue->name; ?>" height="12" width="17"><?php print $objValue->name; ?></a></li>    
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
?>