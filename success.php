
<?php

	include "header.php";

?>

     <br>
<header>
    <div class="container">
           <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <br><br>
                <h1 class="page-header"></h1>
                  <br>
            </div>
        </div>
           <div class="row">
               <div class="col-md-4"></div>
            <div class="col-md-4">
                  <p>You have successfully placed your order <?php echo('EFSOrder'.$_GET["orderid"]); ?> please check <a href="myOrder.php"> my order </a>for details</p>
                  <br>
            </div>
               <div class="col-md-4"></div>
        </div>
    </div>
    </header>
<?php

	include "footer.php";

?>
