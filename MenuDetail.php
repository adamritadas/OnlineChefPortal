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
                <h1 class="page-header">Menu Items </h1>
                  <br>
            </div>
        </div>
          
                  <div id="divPlaceOrder">
         		
          </div>
    
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
                $("#divPlaceOrder").append("<div class='row'><div class='col-md-4'>"+itemname+"</div><div class='col-md-4'>"+itemprice+"<span style='display:inline-block; width: 20px;'></span><input type='checkbox' id='chk"+itemid+"' class='checkitem' value='"+itemid+"' checked/><span style='display:inline-block; width: 10px;'></span><input type='number' id='num"+itemid+"' min='1' max='5' style='color:black; width:30px' value='1'/></div><div class='col-md-4'><a id='edit"+itemid+"' class='edit' value='"+itemid+"' href='#'>Edit</a><span style='display:inline-block; width: 10px;'></span><a id='cancel"+itemid+"' class='cancel' value='"+itemid+"' href='#'>Cancel</a></div></div>");        
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

 $(document).on( 'click', '.cancel', function (){

var itemid=$(this).attr('value');

  $.ajax({
        type: 'DELETE',
        url: 'RESTHandler.php/item/'+itemid,
        contentType: "text/html",
        success: function (response) {

            alert('Your item no. EFSOrder'+itemid+' has been successfully cancelled');
	    location.reload();

        },
        error: function (data) {
           alert("error");
        }
    });


 });
        
        $(document).on( 'click', '.edit', function ()
{
var itemid= $("#itemid").val();



  $.ajax({
        type: "POST",
        url: 'RESTHandler.php/item/'+itemid+'/'+quantity,
        contentType: "text/html",
        success: function (response) {
            alert("Order no EFSOrder"+itemid+" has been successfully updated");
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
