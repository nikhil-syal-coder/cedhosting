      <!-- Footer -->
      <?php ?>
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 


  <script>
 var count1=0;
 var count2=0;
 var count3=0;
 var count4=0;
 var count5=0;
 var count6=0;
 var count7=0;
 var count8=0;
 var count9=0;
 var count10=0;
 
 $('.bntn').attr('disabled', true);
    $(document).ready( function () {
    $('#myTable').DataTable();
} );


$(".select").focusout(function() {
    $categoryid = $(".select").val();
    if ($categoryid == "" || $categoryid == null) {
        $("#prodCategory").html("*Please Select Category");
        $("#prodCategory").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prodCategory").hide();
        $(this).css('border', 'solid 3px green');
        count1=1;
        act();
    }
})

$(".productname").focusout(function() {
    $pname = $(".productname").val();
    var ans1 = $pname.replace(/ /g, '');
    var ans2 = Number(ans1);
    if ($pname == "" || $pname == null) {
        $("#prodname").html("*Enter Product Name");
        $("#prodname").show();
        $(this).css('border', 'solid 3px red');
    } else if(!$pname.match(/^([a-zA-Z]+\s+[a-zA-Z])*[(a-zA-Z)]*(-[0-9]+(?!-)+)*$/)){
        $("#prodname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#prodname").show();
        $(this).css('border', 'solid 3px red');
    } else if (Number.isInteger(ans2)) {
        $("#prodname").html("*Product Name can be alpha-numeric/only alphabetic and one space between words allowed");
        $("#prodname").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#prodname").hide();
        $(this).css('border', 'solid 3px green');
        count2=1;
        act();
    }
})
// $('.mpriceid').attr('maxlength', 15);
// $('.apriceid').attr('maxlength', 15);
$(".mpriceid").keyup(function() {
    $mprice = $(".mpriceid").val();
    if($mprice.length>15){
        $('.mpriceid').attr('maxlength', 15);
        $("#lablemprice").html("*Price can be only integer of 15 digit");
        $("#lablemprice").show(); 
        $(this).css('border', 'solid 3px red');
    }

})
$(".apriceid").keyup(function() {
    $aprice = $(".apriceid").val();
    if($aprice.length>15){
        $('.mpriceid').attr('maxlength', 15);
        $("#lableaprice").html("*Price can be only integer of 15 digit");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    }

})
$(".mpriceid ").focusout(function() {

    $mprice = $(".mpriceid").val();
    $first = $mprice.substr(0, 1);
    $second = $mprice.substr(1, 1);
    if ($mprice == "" || $mprice == 0) {
        $("#lablemprice").html("*Enter Monthly Price");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$mprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lablemprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lablemprice").html("*In starting you cant have two zero");
        $("#lablemprice").show();
        $(this).css('border', 'solid 3px red');
    }   else {
        $("#lablemprice").hide();
        $(this).css('border', 'solid 3px green');
        count3=1;
        act();
    }
})


$(".apriceid").focusout(function() {
    $aprice = $(".apriceid").val();
    $first = $aprice.substr(0, 1);
    $second = $aprice.substr(1, 1);
    if ($aprice == "" || $aprice == 0) {
        $("#lableaprice").html("*Enter annual Price");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$aprice.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableaprice").html("*Price can be only integer and only one dot(.) allowed");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableaprice").html("*In starting you cant have two zero");
        $("#lableaprice").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableaprice").hide();
        $(this).css('border', 'solid 3px green');
        count4=1;
        act();
    }
})
$(".skuid").focusout(function() {
    $prosku = $(".skuid").val();
    if ($prosku == "") {
        $("#lablesku").html("*Select sku");
        $("#lablesku").show();
       $(this).css('border', 'solid 3px red');
    }  
    else if(!$prosku.match(/^[a-zA-z0-9]+[a-zA-Z0-9#-]+$/))
    {
        $("#lablesku").html("*Select Valid sku");
        $("#lablesku").show();
        $(this).css('border', 'solid 3px red'); 
    }
  
       else {
        $("#lablesku").hide();
        $(this).css('border', 'solid 3px green');
        count5=1;
        act();
    }



});


$(".webid").focusout(function() {
    $web = $(".webid").val();
    $first = $web.substr(0, 1);
    $second = $web.substr(1, 1);
    if ($web == "" || $web == 0) {
        $("#lableweb").html("*Enter web space.");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$web.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableweb").html("*Web Space can be only integer and only one dot(.) allowed");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableweb").html("*In starting you cant have two zero");
        $("#lableweb").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableweb").hide();
        $(this).css('border', 'solid 3px green');
        count6=1;
        act();
    }
})

$(".bandid").focusout(function() {
    $band = $(".bandid").val();
    $first = $band.substr(0, 1);
    $second = $band.substr(1, 1);
    if ($band == "" || $band == 0) {
        $("#lableband").html("*Enter  bandwidth.");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$band.match(/^[0-9]\d*(\.\d+)?$/)) {
        $("#lableband").html("*Bandwidth can be only integer and only one dot(.) allowed");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else if ($first == 0 && $second == 0) {
        $("#lableband").html("*In starting you cant have two zero");
        $("#lableband").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#lableband").hide();
        $(this).css('border', 'solid 3px green');
        count7=1;
        act();
    }
})



$(".domainid").focusout(function() {
    $domain = $(".domainid").val();
     $first = $domain.substr(0, 1);
     if($first.match(/^[a-zA-Z]+$/))
{
$pattern=/^[a-zA-Z]+$/;
}
else if($first.match(/^[0-9]+$/))
{
$pattern=/^[0-9]+$/;
}
    if ($domain == "" || $domain == null) {
        $("#labledomain").html("*Enter  No of domain.");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else if (!$domain.match($pattern)) {
        $("#labledomain").html("*Domain can be only Numeric and dot(.) not allowed");
        $("#labledomain").show();
        $(this).css('border', 'solid 3px red');
    } else {
        $("#labledomain").hide();
        $(this).css('border', 'solid 3px green');
        count8=1;
         act();
    }
})
$(".prolang").focusout(function() {
    $prolang = $(".prolang").val();
    if ($prolang == "") {
        $("#prodlang").html("*Select lang Space in G.B");
        $("#prodlang").show();
        $(this).css('border', 'solid 3px red');
    }  
    else if(!$prolang.match(/^([a-zA-Z0-9]+(,[a-zA-z0-9]+))+$/))
    {
        $("#prodlang").html("*Select Valid language");
        $("#prodlang").show();
       $(this).css('border', 'solid 3px red'); 

       if($prolang.match(/^[a-zA-Z0-9]+$/)){
        $("#prodlang").hide();
        $(this).css('border', 'solid 3px green');
        count9=1;
         act();
       }
    }
    else if($prolang<.5)
    {
        $("#prodlang").html("*Select Valid language");
        $("#prodlang").show();
         $(this).css('border', 'solid 3px red'); 
    }
    else {
        $("#prodlang").hide();
        $(this).css('border', 'solid 3px green');
        count9=1;
         act();
    }

});



$(".promail").focusout(function() {
    $promail = $(".promail").val();
    $first = $promail.substr(0, 1);
if($first.match(/^[a-zA-Z]+$/))
{
$pattern=/^[a-zA-Z]+$/;
}
else if($first.match(/^[0-9]+$/))
{
$pattern=/^[0-9]+$/;
}

    if ($promail == "") {
        $("#prodmail").html("*Select Mail");
        $("#prodmail").show();
       $(this).css('border', 'solid 3px red');
    }  
    else if(!$promail.match($pattern))
    {
        $("#prodmail").html("*Select Valid Mail box");
        $("#prodmail").show();
       $(this).css('border', 'solid 3px red'); 
    }
   else {
        $("#prodmail").hide();
        $(this).css('border', 'solid 3px green');
        count10=1;
         act();
    }



});

function act(){
    var count=count1+count2+count3+count4+count5+count6+count7+count8+count9+count10;
    console.log(count);
    if(count==10){
    $('.bntn').attr('disabled', false);
}
}
$("#add").attr("disabled",true);
$('#scn').bind("keypress keyup keydown", function (e){

var catname = $('#scn').val();
var regtwodots = /^(?!.*?\.\.).*?$/;
var lcatname = catname.length;
if ((catname.indexOf(".") == 0) || !(regtwodots.test(catname))) {
alert("invalid category name!!");

$("#subname").html("*Enter Valid Product Name");
$("#subname").show();
$("#add").attr("disabled",true);
$(this).css('border', 'solid 3px red');
count2=0;
$("#scn").val("");


}
else if(Number.isInteger(parseInt($('#scn').val()))) {
alert('Please Enter Security Answer in Correct Format');
$('#scn').val("");

}
else
$("#add").attr("disabled",false);
});

// });



$('.mpriceid').attr('maxlength', 15);
  </script>
</body>

</html>
