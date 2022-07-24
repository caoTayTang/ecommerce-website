<div id="pagination">
    <?php 
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort']; 
            if (isset($_GET['query'])) {
                $concatChar = "?sort=$sort&query=$search&page=";
            } else {       
                $concatChar = "?sort=$sort&page=";
            }      
        }else if (isset($_GET['query'])) {
            $concatChar = "?query=$search&page=";
        }else $concatChar = "?page=";
     ?>

    <!-- $currentPage is from process_search.php -->

    <?php 
    
    if ($currentPage == 1) { 
        $special_style = "style='pointer-events: none; color: #caccd0;'";
    }else $special_style = ""; ?>
        <a href="index.php<?php echo $concatChar ?>1" name='quotation' <?php echo $special_style ?>> 
            &laquo;
        </a>  
        <a href="index.php<?php echo $concatChar; echo $currentPage-1 ?>" <?php echo $special_style ?>> 
            &lt;
        </a>  


<!-- Calculate the begin and end for the loop to show the correct page each case -->
   <?php 
   if ($currentPage == 1 && $currentPage == $page) {
        $begin = 1;
        $end = 1;
   } else if ($currentPage == 1) {
        if ($page == 2) {
            $begin = $currentPage;
            $end = $currentPage+1;
        } else {
            $begin = $currentPage;
            $end = $currentPage+2;
        }
   } else if ($currentPage == $page) {
       if ($page == 2 ) {
           $begin = $currentPage-1;
           $end = $currentPage;
       } else {
        $begin = $currentPage-2;
        $end = $currentPage;
       }
   } else {
        $begin = $currentPage-1;
        $end = $currentPage+1;
   }
    ?>

    <?php $selected_style = ""; ?>
    <?php for($i = $begin; $i <= $end; $i++) { ?>
        <?php if ($i == $currentPage ) $selected_style = "style='background-color: #000;color: white'"; ?>
        <a href="index.php<?php echo $concatChar; echo $i ?>" <?php echo $selected_style ?>> 
            <?php echo $i ?>
        </a> 
        <?php $selected_style = ""; ?>
    <?php } ?>


    <?php if ($currentPage == $page)
         $special_style = "style='pointer-events: none; color: #caccd0;'";
          else 
         $special_style="";?>

        <a href="index.php<?php echo $concatChar; echo $currentPage+1 ?>" <?php echo "$special_style" ?>> 
            &gt;
        </a>
        <a href="index.php<?php echo $concatChar; echo $page?>" <?php echo "$special_style" ?>> 
            &raquo;
        </a> 
    

</div>  
