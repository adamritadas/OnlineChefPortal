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
                <h1 class="page-header">Edit Your Order </h1>
                  <p> Order no: EFSOrder<?= $_GET["id"] ?></p>
                  <br>
            </div>
        </div>
          <div id="divEdit">
                         </div>      
<div><input type='hidden' id='orderid' value='<?= $_GET["id"] ?>'/><input type='submit' class='btn btn-primary' id='BtnEdit' value='Edit Order'/></div>

        <hr>
      </div>
<script src="vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function(){
$.ajax({
        type: 'GET',
        url: 'RESTHandler.php/orderitems/'+$("#orderid").val(),
        contentType: "text/html",
        success: function (response) {        
           var data= JSON.parse(response);
           var items=data.items;
    
           $.each(items, function(i) {
               var itemid=items[i].itemid;
               var itemname=items[i].itemname;
	           var itemprice=items[i].itemprice;
               var itemquantity=items[i].itemquantity;
                $("#divEdit").append("<div class='row'><div class='col-md-6'>"+itemname+"</div><div class='col-md-6'>"+itemprice+"<span style='display:inline-block; width: 20px;'></span><input type='checkbox' class='checkitem' id='chk"+itemid+"'  value='"+itemid+"' checked/><span style='display:inline-block; width: 10px;'></span><input type='number' id='num"+itemid+"' min='1' max='5' style='color:black; width:30px' value='"+itemquantity+"'/></div></div>");        
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




$(document).on( 'click', '#BtnEdit', function ()
{
var orderid= $("#orderid").val();

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
        type: "POST",
        url: 'RESTHandler.php/order/'+orderid+'/items/'+itemid+'/'+quantity,
        contentType: "text/html",
        success: function (response) {
            alert("Order no EFSOrder"+orderid+" has been successfully updated");
		window.location.href = '/myOrder.php';
             
	},
        error: function (data) {
alert("error");
        }
    });

 });



</script>
    </header>
        <!-- Footer -->
<?php

	include "footer.php";

?>
