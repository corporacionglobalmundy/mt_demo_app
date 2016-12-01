<div class="alert alert-info">
  <strong>Heads Up!</strong> Use the following prefixes to purchase new DIDs on this demo app. 
  These locations should always have numbers available in stock, so new DIDs will be provisioned right away. 
  
    <ul>
        <li><strong>1407</strong> Orlando (407), FL</li>
        <li><strong>1312</strong> Chicago Zone 01 (312), IL</li>
        <li><strong>1212</strong> New York City Zone 1 (212), NY</li>
        <li><strong>1760</strong> California City (760), CA</li>
        <li><strong>5255</strong> Mexico City</li>
        <li><strong>44203</strong> London (0203)</li>
        <li><strong>5511</strong> Sao Paulo</li>
    </ul>
</div>
<form class="form-horizontal" id="prefix_search_form" action="/?module=search_dids" method="get">
    <h3>Get locations by prefix</h3>
    <div class="row">
        <div class="col-xs-7">
            <input type="hidden" name="module" value="search_dids" />
            <input type="text" name="prefix" pattern="^[0-9]+$" class="form-control" placeholder="1407" value="<?php if(isset($prefix)){print $prefix;} ?>" />
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    <p>Search for did numbers around the world by prefix.</p>
</form>

