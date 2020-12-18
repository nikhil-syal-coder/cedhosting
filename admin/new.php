<script>
///^(([a-zA-Z0-9 ]+[a-zA-Z0-9*(+*,)+]+))+$/
var count1=0;
var count2=0;
$("#add").attr("disabled",true);

$(document).ready(function() {

  $("#selectc").focusout(function() {
    $categoryid = $("#selectc").val();
    if ($categoryid == "") {
        $("#prodCategory").html("*Select Category");
        $("#prodCategory").show();
        $("#add").attr("disabled",true);
        $(this).css('border', 'solid 3px red');
        count1=0;
    } else {
      
        count1=1;
        //$("#add").attr("disabled",false);
        $("#prodCategory").hide();
        $(this).css('border', 'solid 3px green');
    }
    a();
  });

$("#scn").focusout(function() {
$proname = $(this).val();
if ($proname == "") {
    $("#subname").html("*Enter Category Name");
    $("#subname").show();
    $("#add").attr("disabled",true);
    $(this).css('border', 'solid 3px red');
    count2=0;
}
else if(!$proname.match(/^[a-zA-Z0-9]+[-/.]*$/))
{
    $("#subname").html("*Enter Valid Category Name");
    $("#subname").show();
    $("#add").attr("disabled",true);
    $(this).css('border', 'solid 3px red'); 
    count2=0;
}
//([a-zA-Z_]*[0-9])+([-/.])*( [a-zA-Z_]+)*(-[0-9]+(?!-)+)*$


else {
  
  count2=1;
    //$("#add").attr("disabled",false);
    $("#prodname").hide();
    $(this).css('border', 'solid 3px green');
}
a();
  });

$('#scn').bind("keypress keyup keydown", function (e){

var scn = $('#scn').val();
var regtwodots = /^(?!.*?\.\.).*?$/;
var lscn = scn.length;
if ((scn.indexOf(".") == 0) || !(regtwodots.test(scn))) {
  alert("invalid category name!!");
  
  $("#subname").html("*Enter Valid Category Name");
    $("#subname").show();
    $("#add").attr("disabled",true);
    $(this).css('border', 'solid 3px red'); 
    count2=0;
    $("#scn").val("");

  return;
}  else if(Number.isInteger(parseInt($('#scn').val()))) {
        alert('Please Enter Valid Category Name!!');
        $('#scn').val("");
        return false;
        }
        else
        return true;
});

  function a() {
    if((count1+count2==2)) {

      $("#add").attr("disabled",false);

    }

  }
});  



</script>