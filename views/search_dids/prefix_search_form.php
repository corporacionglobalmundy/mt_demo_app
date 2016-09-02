<form class="form-horizontal" id="prefix_search_form" action="/?module=search_dids" method="get">
    <h3>Get locations by prefix</h3>
    <div class="row">
        <div class="col-xs-7">
            <input type="hidden" name="module" value="search_dids" />
            <input type="text" name="prefix" pattern="^[0-9]+$" class="form-control" placeholder="407" value="<?php if(isset($prefix)){print $prefix;} ?>" />
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    <p>Search for did numbers around the world by prefix.</p>
</form>

