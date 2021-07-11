String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};
$('input.Stylednumber').keyup(function() {
    var input = $(this).val().replaceAll(',', '');
    if (input.length < 1)
        $(this).val('0');
    else {
        var formatted = inrFormat(input);
        if (formatted.indexOf('.') > 0) {
        var split = formatted.split('.');
        formatted = split[0] + '.' + split[1].substring(0, 2);
        }
        $(this).val(formatted);
    }
});
function inrFormat(val) {
    var x = val;
    x = x.toString();
    var afterPoint = '';
    if (x.indexOf('.') > 0)
        afterPoint = x.substring(x.indexOf('.'), x.length);
    x = Math.floor(x);
    x = x.toString();
    var lastThree = x.substring(x.length - 3);
    var otherNumbers = x.substring(0, x.length - 3);
    if (otherNumbers != '')
        lastThree = ',' + lastThree;
    var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
    return res;
}

$('body').on('click', '.a', function () {
    $("#otherChargesDiv").fadeToggle(1000);  
})

$("input[name='posses_status']").change(function(){
    var posses_status = $(this).val();
    if(posses_status == "Under Construction")
    {
        $("#possesDiv1").show();
        $("#possesDiv2").hide();
    }
    else{
        $("#possesDiv2").show(); 
        $("#possesDiv1").hide();
    }
})

function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    $('#show_price').html(words_string);
}

$(document).mouseup(function (e) { 
    var total_price = $("#total_price").val();
    if(total_price != ""){
        if ($(e.target).closest("#total_price").length === 0) {
            x=total_price.toString();
            var lastThree = x.substring(x.length-3);
            var otherNumbers = x.substring(0,x.length-3);
            if(otherNumbers != '')
            lastThree = '' + lastThree;
            var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
            $("#show_rent1").val(res);
            $("#rent_1").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res);
            $("#rent_2").html('<i class="fa fa-inr text-dark">&nbsp;</i>'+res+' Negotiable');
            $("#show_rent2").val(res+' Negotiable');
            // format.format(4800)  
            $("#show_rent").show(1000); 
        } 
    }
}) 

$(document).on("change keyup blur", "#total_price", function() {
    var super_area = $('#super_build_up_area').val();
    var plot_area = $('#plot_area').val();
    var super_area1 = super_area.replace(/,/g, "");
    var total_price = $('#total_price').val();
    var total_price1 = total_price.replace(/,/g, "");
    // alert(plot_area);
    if(super_area != ""){
        var dec = (total_price1 / super_area1).toFixed(2); //its convert 10 into 0.10
        // alert(dec);
        $('#price_per_sq_ft').val(dec);
    }
    if(plot_area != ""){
        var dec = (total_price1 / plot_area).toFixed(2); //its convert 10 into 0.10
        // alert(dec);
        $('#price_per_sq_ft').val(dec);
    }
});

$("input[name='furnishing']").change(function(){
    var furnishing = $(this).val();
    if((furnishing == "Furnished") || (furnishing == "Semi-Furnished"))
    {
        $("#showFurnishedDiv").show();
    }
    else{
        $("#showFurnishedDiv").hide();
    }
})

$("input[name='car_parking[]']").change(function(){
    var car_parking = $(this).val();
    $("#show"+car_parking+"Div").toggle(1000);
})

$('body').on('click', 'input[name="listed_by"]', function () {
    var query = $(this).val();
    if(query == "Owner")
    {
        $("#brokerageDiv").hide(); 
    }else{
        $("#brokerageDiv").show();    
    }
})

$(document).ready(function(){
    var $plot_area = $('#plot_area'), $plot_length = $('#plot_length'), $plot_width = $('#plot_width');
    $plot_length.on('keypress', function(e){
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
      e.stopImmediatePropagation();
      return false;
    } }).on('keyup', function(e) {
      console.log('keyup');
      $plot_width.val(($plot_area.val() / $plot_length.val()).toFixed(2));
    });
})