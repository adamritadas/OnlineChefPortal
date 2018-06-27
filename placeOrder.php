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
                <h1 class="page-header">Place Your Order </h1>
                  <p>Chef Pankaj</p>
                  <br>
            </div>
        </div>
          
                  <div id="divPlaceOrder">
         		
          </div>
<input type="submit" class="btn btn-primary" id="BtnPlaceOrder" value="Place Order" />
    
        <hr>
      </div>
<script src="vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
$.ajax({
        type: 'GET',
        url: 'RESTHandler.php/items',
        contentType: "text/html",
        success: function (response) {        
           var items= JSON.parse(response);
           $.each(items, function(i) {
               var itemid=items[i].itemid;
               var itemname=items[i].itemname;
	       var itemprice=items[i].itemprice;
                $("#divPlaceOrder").append("<div class='row'><div class='col-md-6'>"+itemname+"</div><div class='col-md-6'>"+itemprice+"<span style='display:inline-block; width: 20px;'></span><input type='checkbox' id='chk"+itemid+"' class='checkitem' value='"+itemid+"' checked/><span style='display:inline-block; width: 10px;'></span><input type='number' id='num"+itemid+"' min='1' max='5' style='color:black; width:30px' value='1'/></div></div>");        
});

        },
        error: function (data) {
           alert("error");
        }
    });
 });

$(document).on( 'click', '.checkitem', function ()
{
var id=this.value;
        if(this.checked) {
$('#num'+id).removeAttr('disabled');
        
}
else{
$('#num'+id).attr("disabled","disabled");
}

});


$(document).on( 'click', '#BtnPlaceOrder', function ()
{

var itemid="";
var quantity="";
 $('.checkitem').each(function() {

        if(this.checked) {
var id=this.value;
itemid= itemid+ id+"-";

quantity=quantity+($('#num'+id).val())+"-";

        }
   });

  $.ajax({
        type: "PUT",
        url: "RESTHandler.php/items/"+itemid+"/"+quantity,
        contentType: "text/html",
        success: function (response) {
                var data=JSON.parse(response);
		window.location.href = '/success.php?orderid='+data.ID;
             
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
