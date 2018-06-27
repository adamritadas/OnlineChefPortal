<?php

	include "header.php";

?>

    <header>
        <form>
      <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Order </h1>
                  <br>
            </div>
        </div>
   <div id="order">   
<hr></div></div>   
        </form>
        
        <script>
        function myfunc(data) {
            
        }
        </script>
        
<script src="http://ec2-54-213-240-49.us-west-2.compute.amazonaws.com/RESTHandler.php/orders/jsonp"></script>        
        
<script src="vendor/jquery/jquery.min.js"></script>
<script>
$( document ).ready(function(){

 $.ajax({
        type: 'GET',
        url: 'RESTHandler.php/orders',
        contentType: 'text/html',
        success: function (response) {
           var data= jQuery.parseJSON(response);
           $.each(data, function(i) {
               var orderid=data[i].orderid;
	       var orderprice=data[i].orderprice;
		var items=data[i].items;
                  $("#order").append("<div class='row'><div class='col-md-6'><a data-toggle='collapse' href='#detail"+orderid+"'>EFSOrder"+orderid+"</a></div><div class='col-md-3'><a class='button' href='editOrder.php?order"+orderid+"'>Edit</a></div><div class='col-md-3'><a id='cancel"+orderid+"' class='cancel' value='"+orderid+"' href='#'>Cancel</a></div><div id='detail"+orderid+"' class='collapse'><div>Total Bill:"+orderprice+"</div></div></div>"); 
    $.each(items, function(j) {
        var itemquantity=items[j].itemquantity;
        var itemname=items[j].itemname;
        var itemprice=items[j].itemprice;
             
        
                $('#detail'+orderid).append("<div class='col-md-6'>"+itemquantity+" "+itemname+"</div><div class='col-md-6'>"+itemprice+"</div>");
        
        

});
           });

        },
        error: function (data) {
           alert("error");
        }
    });
 });

 $(document).on( 'click', '.cancel', function (){

var orderid=$(this).attr('value');

  $.ajax({
        type: 'DELETE',
        url: 'RESTHandler.php/order/'+orderid,
        contentType: "text/html",
        success: function (response) {

            alert('Your order no. EFSOrder'+orderid+' has been successfully cancelled');
	    location.reload();

        },
        error: function (data) {
           alert("error");
        }
    });


 });</script>

    </header>
        <!-- Footer -->
<?php

	include "footer.php";

?>
