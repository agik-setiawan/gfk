$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
  options.async = true;
});
$(document).ready(function() {
  $("#gedungothers").hide();
  $("#labelnmgedung").hide();
  
  

  calculatesum();
  calculatesumit();
  if($('#itdisp').val()>0){
    $('#dispit').removeClass('hidden');
  }else{
    $('#dispit').addClass('hidden');
    $('.totaldispit').val(0);

  }
});

$("#itdisp").on("change", function () {
  if($(this).val()>0){
    $('#dispit').removeClass('hidden');
  }else{
    $('#dispit').addClass('hidden');
    $('.totaldispit').val(0);

  }


});

$("#dispmain").on("change",'.totaldisp', function () {
  calculatesum();
});
$("#dispit").on("change",'.totaldispit', function () {
  calculatesumit();
});

function calculatesum() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".totaldisp").each(function() {
    //add only if the value is number
    if(!isNaN(this.value) && this.value.length!=0) {
      // var _totitem = $(this).attr('id').substring(0,11);
      // calculateitem(_totitem);
      sum += parseFloat(this.value);
    }

  });
  //.toFixed() method will roundoff the final sum to 2 decimal places

  $("#sumdisp").html(sum+"<sup style='font-size: 20px'>%</sup>");
  $("#totaldisptmp").val(sum);
};
function calculatesumit() {
  var sum = 0;
  //iterate through each textboxes and add the values
  $(".totaldispit").each(function() {
    //add only if the value is number
    if(!isNaN(this.value) && this.value.length!=0) {
      // var _totitem = $(this).attr('id').substring(0,11);
      // calculateitem(_totitem);
      sum += parseFloat(this.value);
    }

  });
  //.toFixed() method will roundoff the final sum to 2 decimal places

  $("#sumdispit").html(sum+"<sup style='font-size: 20px'>%</sup>");
  $("#totaldispittmp").val(sum);
};
function resetpdisp(){
  $("#desctemp").val("");
  $("#totalunitf").val("");
  //  var x = document.getElementById("totalunitcheckf").checked;
  // if(x==true){
  //   document.getElementById("totalunitcheckf").checked = false;
  // }

};
function valdisp(id){
 var str = id;
  var pos = str.indexOf("-");
  var indexsub = pos + 3;
  var rid = id.substring(0,indexsub);
var totalunit = $("#"+rid+"totalunit").val();
  var valcheck = rid+"totalunit_repeat";
  var numberNotChecked = $('input[class="unchk"]:checked').length; 
  $("#"+valcheck).val(numberNotChecked);
  if(totalunit){
  //customvalidator(id);
  }
};

function audcond(id,descdata){

  // resetpdisp();


  var str = id;
  var pos = str.indexOf("-");
  var indexsub = pos + 3;
  var rid = id.substring(0,indexsub);

  var desc = rid+"description";
  var desctid = rid+"desctemp";
  var tuntid = rid+"totalunit";
  var tuntcid = rid+"totalunitcheck";

  

   var check = descdata.indexOf($("#"+desc).val());
   if($("#"+desc).val()=="Others"){
     $("#"+desctid).show();
     $("#"+tuntid).hide();
    // $("#"+tuntid).removeClass("has-success has-error has-warning");
     $("#"+tuntid).val("0");
    //$("#"+desctid).val("");
     $("#"+tuntcid).show();
     $("#"+tuntcid).prop("checked", true)
    //  $(".unchk").prop("checked", false)

   }else if(check>=0){
     $("#"+desctid).hide();
     $("#"+tuntid).hide();
     //$("#"+tuntid).messages.push(message.replace(/\{value\}/g, ''));
     $("#"+tuntid).val("0");
     $("#"+desctid).val("");
      $("#"+tuntcid).show();
      $("#"+tuntcid).prop("checked", true)

  }else{
      $("#"+desctid).hide();
      $("#"+desctid).val("");
     $("#"+tuntid).show();
      $("#"+tuntcid).hide();
      $("#"+tuntid).val("");
     $("#"+tuntcid).prop("checked", false)


  }



};
