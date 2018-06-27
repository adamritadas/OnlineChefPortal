<?php

	include "header.php";

?>

    <br>
    <!-- Page Content -->

    <header>
        
      <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order from Chef </h1>
                  <p>Select your Chef</p>
                  <br>
            </div>
        </div>
        <!-- /.row -->

        <!-- Chefs Row -->
        <div class="row">
            <div class="col-md-4">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef1.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef2.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef3.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Chefs Row -->
        <div class="row">
            <div  class="col-md-4 portfolio-item">
                <a  href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef4.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef5.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef6.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
        </div>

        <!-- Chefs Row -->
        <div class="row">
            <div class="col-md-4 portfolio-item">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef7.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef8.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
            <div class="col-md-4 portfolio-item">
                <a href="placeOrder.php">
                    <img class="img-circle img-responsive img-hover img-portfolio img-centered" src="img\Chefs\Chef9.jpg" alt="">
                </a>
                <h3>Project Name</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

      </div>
        
        <!-- jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>
         <script language="JavaScript">
		$(document).ready(function() {
			$('#loadCart').click(function() { $.ajax({
        url: 'order.php',
        type: 'GET',
        data: {
            view : "all"
        }
    }).done(function(data){
                 alert(JSON.stringify(data));
    });
                                            }
                                 );});</script>
    </header>


        <!-- Footer -->
<?php

	include "footer.php";

?>
