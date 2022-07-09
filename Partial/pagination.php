<div id="pagination">
    <?php 
        $concatChar = '?page=';
        if ( isset($_GET['query']) ) {
            $concatChar = "?query=$search" . "&page=";
        }
     ?>

    <!-- $currentPage is from process_search.php -->
    <?php if ($currentPage != 1) { ?>
        <a href="index.php<?php echo $concatChar ?>1" name='quotation'> 
            &laquo;
        </a>  
        <a href="index.php<?php echo $concatChar; echo $currentPage-1 ?>"> 
            &lt;
        </a>    
    <?php } ?>    


<!-- Calculate the begin and end for the loop to show the correct page each case -->
   <?php 
   if ($currentPage == 1) {
        $begin = $currentPage;
        $end = $currentPage+2;
   } else if ($currentPage == $page) {
        $begin = $currentPage-2;
        $end = $currentPage;
   } else {
        $begin = $currentPage-1;
        $end = $currentPage+1;
   }    
    ?>

    <?php 
    $selected_style = "";
    for($i = $begin; $i <= $end; $i++) { ?>
        <?php if ($i == $currentPage ) $selected_style = "style='background-color: #000;color: white'"; ?>
        <a href="index.php<?php echo $concatChar; echo $i ?>" <?php echo $selected_style ?>> 
            <?php echo $i ?>
        </a> 
        <?php $selected_style = ""; ?>
    <?php } ?>


    <?php if ($currentPage != $page) { ?>
        <a href="index.php<?php echo $concatChar; echo $currentPage+1 ?>"> 
            &gt;
        </a>
        <a href="index.php<?php echo $concatChar; echo $page?>"> 
            &raquo;
        </a> 
    <?php } ?>
    

</div>  