<?php
$intTotal = ceil($intTotalResult/$limit);
$intLimit = $limit;

$intPrevious = $page-1;
?>
<nav aria-label="Page navigation" class="text-center">
<ul class="pagination">
    <li <?php if($page==1){print 'class="disabled"'; $intPrevious = $page; }?>>
        <a href="/?<?php print $strUrl ?>&page=<?php print $intPrevious;?>&limit=<?php print $intLimit; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
<?php
for ($intI=1;  $intI<=$intTotal; $intI++)
{
    ?>
    <li <?php if($page==$intI){print 'class="active"';}?>>
        <a href="/?<?php print $strUrl ?>&page=<?php print $intI; ?>&limit=<?php print $intLimit; ?>"><?php print $intI; ?></a>
    </li>    
    <?php
}
    $intNext = $page+1;
?>
    <li <?php if($page==$intTotal){print 'class="disabled"'; $intNext = $page;}?>>
        <a href="/?<?php print $strUrl ?>&page=<?php print $intNext;?>&limit=<?php print $intLimit; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
</nav>