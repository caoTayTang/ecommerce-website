<div id="pagination">
    <?php 
        $concatChar = '?';
        if ( isset($_GET['query']) ) {
            $concatChar = "?query=$search&";
        }
     ?>
    <?php for($i = 1; $i <= $page; $i++) { ?>
        <a href="index.php<?php echo $concatChar ?>page=<?php echo $i ?>"> 
            <?php echo $i ?>
        </a> 
    <?php } ?>
</div>  