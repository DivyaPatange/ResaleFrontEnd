function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

// Exterior View Photos
 $('body')
    .delegate('#upload_form input[type="file"]', 'change', inputChanged)
    .delegate('#upload_form .icon', 'click', removeField);

function inputChanged(e) {
  $current_count = $('#upload_form input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form .filelabel #icon"+lastChar).remove();
    $('#upload_form #frame'+lastChar).removeClass("hidden");
    $('#upload_form #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form .filelabel .title").text(labelVal);
  }
  if($("#upload_form .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="exterior_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField(){
    $(this).closest('.p_file').remove();
    return false;
}

// Living Room Photos
$('body')

  .delegate('#upload_form1 input[type="file"]', 'change', inputChanged1)
  .delegate('#upload_form1 .icon', 'click', removeField1);

function inputChanged1(e) {
  $current_count = $('#upload_form1 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form1 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form1 .filelabel #icon"+lastChar).remove();
    $('#upload_form1 #frame'+lastChar).removeClass("hidden");
    $('#upload_form1 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form1 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form1 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form1 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form1 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form1 .filelabel .title").text(labelVal);
  }
  if($("#upload_form1 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="living_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField1(){
    $(this).closest('.p_file').remove();
    return false;
}

// Bedroom Photos
$('body')
    .delegate('#upload_form2 input[type="file"]', 'change', inputChanged2)
    .delegate('#upload_form2 .icon', 'click', removeField2);

function inputChanged2(e) {
  $current_count = $('#upload_form2 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form2 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form2 .filelabel #icon"+lastChar).remove();
    $('#upload_form2 #frame'+lastChar).removeClass("hidden");
    $('#upload_form2 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form2 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form2 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form2 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form2 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form2 .filelabel .title").text(labelVal);
  }
  if($("#upload_form2 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="bedroom_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField2(){
    $(this).closest('.p_file').remove();
    return false;
}

// Bathroom Photos
$('body')
    .delegate('#upload_form3 input[type="file"]', 'change', inputChanged3)
    .delegate('#upload_form3 .icon', 'click', removeField3);

function inputChanged3(e) {
  $current_count = $('#upload_form3 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form3 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form3 .filelabel #icon"+lastChar).remove();
    $('#upload_form3 #frame'+lastChar).removeClass("hidden");
    $('#upload_form3 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form3 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form3 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form3 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form3 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form3 .filelabel .title").text(labelVal);
  }
  if($("#upload_form3 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="bathroom_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField3(){
    $(this).closest('.p_file').remove();
    return false;
}

// Kitchen Photos
$('body')
  .delegate('#upload_form4 input[type="file"]', 'change', inputChanged4)
  .delegate('#upload_form4 .icon', 'click', removeField4);

function inputChanged4(e) {
  $current_count = $('#upload_form4 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form4 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form4 .filelabel #icon"+lastChar).remove();
    $('#upload_form4 #frame'+lastChar).removeClass("hidden");
    $('#upload_form4 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form4 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form4 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form4 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form4 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form4 .filelabel .title").text(labelVal);
  }
  if($("#upload_form4 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="kitchen_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField4(){
    $(this).closest('.p_file').remove();
    return false;
}

// Floor Photos
$('body')
  .delegate('#upload_form5 input[type="file"]', 'change', inputChanged5)
  .delegate('#upload_form5 .icon', 'click', removeField5);

function inputChanged5(e) {
  $current_count = $('#upload_form5 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form5 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form5 .filelabel #icon"+lastChar).remove();
    $('#upload_form5 #frame'+lastChar).removeClass("hidden");
    $('#upload_form5 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form5 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form5 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form5 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form5 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form5 .filelabel .title").text(labelVal);
  }
  if($("#upload_form5 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="exterior_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField5(){
    $(this).closest('.p_file').remove();
    return false;
}


// Master Photos
$('body')
  .delegate('#upload_form6 input[type="file"]', 'change', inputChanged6)
  .delegate('#upload_form6 .icon', 'click', removeField6);

function inputChanged6(e) {
  $current_count = $('#upload_form6 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form6 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form6 .filelabel #icon"+lastChar).remove();
    $('#upload_form6 #frame'+lastChar).removeClass("hidden");
    $('#upload_form6 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form6 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form6 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form6 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form6 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form6 .filelabel .title").text(labelVal);
  }
  if($("#upload_form6 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="common_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField6(){
    $(this).closest('.p_file').remove();
    return false;
}


// Location Photos
$('body')
  .delegate('#upload_form7 input[type="file"]', 'change', inputChanged7)
  .delegate('#upload_form7 .icon', 'click', removeField7);

function inputChanged7(e) {
  $current_count = $('#upload_form7 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form7 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form7 .filelabel #icon"+lastChar).remove();
    $('#upload_form7 #frame'+lastChar).removeClass("hidden");
    $('#upload_form7 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form7 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form7 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form7 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form7 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form7 .filelabel .title").text(labelVal);
  }
  if($("#upload_form7 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="bathroom_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField7(){
    $(this).closest('.p_file').remove();
    return false;
}

// Other Photos
$('body')
  .delegate('#upload_form8 input[type="file"]', 'change', inputChanged8)
  .delegate('#upload_form8 .icon', 'click', removeField8);

function inputChanged8(e) {
  $current_count = $('#upload_form8 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form8 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form8 .filelabel #icon"+lastChar).remove();
    $('#upload_form8 #frame'+lastChar).removeClass("hidden");
    $('#upload_form8 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form8 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form8 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form8 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form8 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form8 .filelabel .title").text(labelVal);
  }
  if($("#upload_form8 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="master_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField8(){
  $(this).closest('.p_file').remove();
  return false;
}



function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

// Exterior View Photos
 $('body')
    .delegate('#upload_form9 input[type="file"]', 'change', inputChanged9)
    .delegate('#upload_form9 .icon', 'click', removeField9);

function inputChanged9(e) {
  $current_count = $('#upload_form9 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form9 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form9 .filelabel #icon"+lastChar).remove();
    $('#upload_form9 #frame'+lastChar).removeClass("hidden");
    $('#upload_form9 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form9 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form9 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form9 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form9 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form9 .filelabel .title").text(labelVal);
  }
  if($("#upload_form9 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="location_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField9(){
    $(this).closest('.p_file').remove();
    return false;
}

// Living Room Photos
$('body')

  .delegate('#upload_form10 input[type="file"]', 'change', inputChanged10)
  .delegate('#upload_form10 .icon', 'click', removeField10);

function inputChanged10(e) {
  $current_count = $('#upload_form10 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form10 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form10 .filelabel #icon"+lastChar).remove();
    $('#upload_form10 #frame'+lastChar).removeClass("hidden");
    $('#upload_form10 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form10 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form10 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form10 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form10 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form10 .filelabel .title").text(labelVal);
  }
  if($("#upload_form10 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="others_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField10(){
    $(this).closest('.p_file').remove();
    return false;
}

// Bedroom Photos
$('body')
    .delegate('#upload_form11 input[type="file"]', 'change', inputChanged11)
    .delegate('#upload_form11 .icon', 'click', removeField11);

function inputChanged11(e) {
  $current_count = $('#upload_form11 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form11 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form11 .filelabel #icon"+lastChar).remove();
    $('#upload_form11 #frame'+lastChar).removeClass("hidden");
    $('#upload_form11 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form11 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form11 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form11 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form11 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form11 .filelabel .title").text(labelVal);
  }
  if($("#upload_form11 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="site_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField11(){
    $(this).closest('.p_file').remove();
    return false;
}

// Bathroom Photos
$('body')
    .delegate('#upload_form12 input[type="file"]', 'change', inputChanged12)
    .delegate('#upload_form12 .icon', 'click', removeField12);

function inputChanged12(e) {
  $current_count = $('#upload_form12 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form12 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form12 .filelabel #icon"+lastChar).remove();
    $('#upload_form12 #frame'+lastChar).removeClass("hidden");
    $('#upload_form12 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form12 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form12 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form12 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form12 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form12 .filelabel .title").text(labelVal);
  }
  if($("#upload_form12 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="master_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField12(){
    $(this).closest('.p_file').remove();
    return false;
}

// Kitchen Photos
$('body')
  .delegate('#upload_form13 input[type="file"]', 'change', inputChanged13)
  .delegate('#upload_form13 .icon', 'click', removeField13);

function inputChanged13(e) {
  $current_count = $('#upload_form13 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form13 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form13 .filelabel #icon"+lastChar).remove();
    $('#upload_form13 #frame'+lastChar).removeClass("hidden");
    $('#upload_form13 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form13 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form13 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form13 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form13 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form13 .filelabel .title").text(labelVal);
  }
  if($("#upload_form13 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="location_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField13(){
    $(this).closest('.p_file').remove();
    return false;
}

// Floor Photos
$('body')
  .delegate('#upload_form14 input[type="file"]', 'change', inputChanged14)
  .delegate('#upload_form14 .icon', 'click', removeField14);

function inputChanged14(e) {
  $current_count = $('#upload_form14 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form14 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form14 .filelabel #icon"+lastChar).remove();
    $('#upload_form14 #frame'+lastChar).removeClass("hidden");
    $('#upload_form14 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form14 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form14 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form14 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form14 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form14 .filelabel .title").text(labelVal);
  }
  if($("#upload_form14 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="others_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField14(){
    $(this).closest('.p_file').remove();
    return false;
}


 // Floor Photos
 $('body')
 .delegate('#upload_form15 input[type="file"]', 'change', inputChanged15)
 .delegate('#upload_form15 .icon', 'click', removeField15);

function inputChanged15(e) {
 $current_count = $('#upload_form15 input[type="file"]').length;
 // console.log($current_count);
 $next_count = $current_count + 1;
 var labelVal = $(".title"+$current_count).text();
 var oldfileName = $(this).val();
 console.log(oldfileName);
 $("#upload_form15 .filelabel .title").text(labelVal);
 fileName = e.target.value.split( '\\' ).pop();
 if (oldfileName == fileName) {return false;}
 var className = $(this).attr("class");
 console.log(className);
 var lastChar = className.match(/(\d+)/);
 var inc  = 1 + +lastChar;
 console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
 var extension = fileName.split('.').pop();
 if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
   $("#upload_form15 .filelabel #icon"+lastChar).remove();
   $('#upload_form15 #frame'+lastChar).removeClass("hidden");
   $('#upload_form15 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
   $("#upload_form15 .filelabel i, .filelabel .title").css({'color':'#208440'});
   $("#upload_form15 .filelabel").css({'border':' 2px solid #208440'});
 }
 if(fileName ){
   if (fileName.length > 10){
     $("#upload_form15 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
   }
   else{
     $("#upload_form15 .filelabel .title"+$current_count).text(fileName);
   }
 }
 else{
   $("#upload_form15 .filelabel .title").text(labelVal);
 }
 if($("#upload_form15 .FileUpload"+inc).length > 0) {
   console.log('exist');
 }
 else{
 $(this).closest('.p_file').after(
 '<label class="filelabel p_file"><div class="icon">X</div>' +
 '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
 '<span class="title'+$next_count+'">Add File</span>' +
 '<input class="FileUpload'+$next_count+'" id="FileInput" name="exterior_photos[]" type="file"/>'+
 '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
 '</label>');
 }
}

function removeField15(){
   $(this).closest('.p_file').remove();
   return false;
}

  // Floor Photos
  $('body')
  .delegate('#upload_form16 input[type="file"]', 'change', inputChanged16)
  .delegate('#upload_form16 .icon', 'click', removeField16);

function inputChanged16(e) {
  $current_count = $('#upload_form16 input[type="file"]').length;
  // console.log($current_count);
  $next_count = $current_count + 1;
  var labelVal = $(".title"+$current_count).text();
  var oldfileName = $(this).val();
  console.log(oldfileName);
  $("#upload_form16 .filelabel .title").text(labelVal);
  fileName = e.target.value.split( '\\' ).pop();
  if (oldfileName == fileName) {return false;}
  var className = $(this).attr("class");
  console.log(className);
  var lastChar = className.match(/(\d+)/);
  var inc  = 1 + +lastChar;
  console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
  var extension = fileName.split('.').pop();
  if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
    $("#upload_form16 .filelabel #icon"+lastChar).remove();
    $('#upload_form16 #frame'+lastChar).removeClass("hidden");
    $('#upload_form16 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
    $("#upload_form16 .filelabel i, .filelabel .title").css({'color':'#208440'});
    $("#upload_form16 .filelabel").css({'border':' 2px solid #208440'});
  }
  if(fileName ){
    if (fileName.length > 10){
      $("#upload_form16 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
    }
    else{
      $("#upload_form16 .filelabel .title"+$current_count).text(fileName);
    }
  }
  else{
    $("#upload_form16 .filelabel .title").text(labelVal);
  }
  if($("#upload_form16 .FileUpload"+inc).length > 0) {
    console.log('exist');
  }
  else{
  $(this).closest('.p_file').after(
  '<label class="filelabel p_file"><div class="icon">X</div>' +
  '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
  '<span class="title'+$next_count+'">Add File</span>' +
  '<input class="FileUpload'+$next_count+'" id="FileInput" name="common_photos[]" type="file"/>'+
  '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
  '</label>');
  }
}

function removeField16(){
    $(this).closest('.p_file').remove();
    return false;
}

 // Floor Photos
 $('body')
 .delegate('#upload_form17 input[type="file"]', 'change', inputChanged17)
 .delegate('#upload_form17 .icon', 'click', removeField17);

function inputChanged17(e) {
 $current_count = $('#upload_form17 input[type="file"]').length;
 // console.log($current_count);
 $next_count = $current_count + 1;
 var labelVal = $(".title"+$current_count).text();
 var oldfileName = $(this).val();
 console.log(oldfileName);
 $("#upload_form17 .filelabel .title").text(labelVal);
 fileName = e.target.value.split( '\\' ).pop();
 if (oldfileName == fileName) {return false;}
 var className = $(this).attr("class");
 console.log(className);
 var lastChar = className.match(/(\d+)/);
 var inc  = 1 + +lastChar;
 console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
 var extension = fileName.split('.').pop();
 if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
   $("#upload_form17 .filelabel #icon"+lastChar).remove();
   $('#upload_form17 #frame'+lastChar).removeClass("hidden");
   $('#upload_form17 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
   $("#upload_form17 .filelabel i, .filelabel .title").css({'color':'#208440'});
   $("#upload_form17 .filelabel").css({'border':' 2px solid #208440'});
 }
 if(fileName ){
   if (fileName.length > 10){
     $("#upload_form17 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
   }
   else{
     $("#upload_form17 .filelabel .title"+$current_count).text(fileName);
   }
 }
 else{
   $("#upload_form17 .filelabel .title").text(labelVal);
 }
 if($("#upload_form17 .FileUpload"+inc).length > 0) {
   console.log('exist');
 }
 else{
 $(this).closest('.p_file').after(
 '<label class="filelabel p_file"><div class="icon">X</div>' +
 '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
 '<span class="title'+$next_count+'">Add File</span>' +
 '<input class="FileUpload'+$next_count+'" id="FileInput" name="bathroom_photos[]" type="file"/>'+
 '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
 '</label>');
 }
}
function removeField17(){
  $(this).closest('.p_file').remove();
  return false;
}

 // Floor Photos
 $('body')
 .delegate('#upload_form18 input[type="file"]', 'change', inputChanged18)
 .delegate('#upload_form18 .icon', 'click', removeField18);

function inputChanged18(e) {
 $current_count = $('#upload_form18 input[type="file"]').length;
 // console.log($current_count);
 $next_count = $current_count + 1;
 var labelVal = $(".title"+$current_count).text();
 var oldfileName = $(this).val();
 console.log(oldfileName);
 $("#upload_form18 .filelabel .title").text(labelVal);
 fileName = e.target.value.split( '\\' ).pop();
 if (oldfileName == fileName) {return false;}
 var className = $(this).attr("class");
 console.log(className);
 var lastChar = className.match(/(\d+)/);
 var inc  = 1 + +lastChar;
 console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
 var extension = fileName.split('.').pop();
 if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
   $("#upload_form18 .filelabel #icon"+lastChar).remove();
   $('#upload_form18 #frame'+lastChar).removeClass("hidden");
   $('#upload_form18 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
   $("#upload_form18 .filelabel i, .filelabel .title").css({'color':'#208440'});
   $("#upload_form18 .filelabel").css({'border':' 2px solid #208440'});
 }
 if(fileName ){
   if (fileName.length > 10){
     $("#upload_form18 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
   }
   else{
     $("#upload_form18 .filelabel .title"+$current_count).text(fileName);
   }
 }
 else{
   $("#upload_form18 .filelabel .title").text(labelVal);
 }
 if($("#upload_form18 .FileUpload"+inc).length > 0) {
   console.log('exist');
 }
 else{
 $(this).closest('.p_file').after(
 '<label class="filelabel p_file"><div class="icon">X</div>' +
 '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
 '<span class="title'+$next_count+'">Add File</span>' +
 '<input class="FileUpload'+$next_count+'" id="FileInput" name="master_photos[]" type="file"/>'+
 '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
 '</label>');
 }
}

function removeField18(){
   $(this).closest('.p_file').remove();
   return false;
}

 // Floor Photos
 $('body')
 .delegate('#upload_form19 input[type="file"]', 'change', inputChanged19)
 .delegate('#upload_form19 .icon', 'click', removeField19);

function inputChanged19(e) {
 $current_count = $('#upload_form19 input[type="file"]').length;
 // console.log($current_count);
 $next_count = $current_count + 1;
 var labelVal = $(".title"+$current_count).text();
 var oldfileName = $(this).val();
 console.log(oldfileName);
 $("#upload_form19 .filelabel .title").text(labelVal);
 fileName = e.target.value.split( '\\' ).pop();
 if (oldfileName == fileName) {return false;}
 var className = $(this).attr("class");
 console.log(className);
 var lastChar = className.match(/(\d+)/);
 var inc  = 1 + +lastChar;
 console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
 var extension = fileName.split('.').pop();
 if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
   $("#upload_form19 .filelabel #icon"+lastChar).remove();
   $('#upload_form19 #frame'+lastChar).removeClass("hidden");
   $('#upload_form19 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
   $("#upload_form19 .filelabel i, .filelabel .title").css({'color':'#208440'});
   $("#upload_form19 .filelabel").css({'border':' 2px solid #208440'});
 }
 if(fileName ){
   if (fileName.length > 10){
     $("#upload_form19 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
   }
   else{
     $("#upload_form19 .filelabel .title"+$current_count).text(fileName);
   }
 }
 else{
   $("#upload_form19 .filelabel .title").text(labelVal);
 }
 if($("#upload_form19 .FileUpload"+inc).length > 0) {
   console.log('exist');
 }
 else{
 $(this).closest('.p_file').after(
 '<label class="filelabel p_file"><div class="icon">X</div>' +
 '<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
 '<span class="title'+$next_count+'">Add File</span>' +
 '<input class="FileUpload'+$next_count+'" id="FileInput" name="location_photos[]" type="file"/>'+
 '<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
 '</label>');
 }
}

function removeField19(){
   $(this).closest('.p_file').remove();
   return false;
}

// Floor Photos
$('body')
.delegate('#upload_form20 input[type="file"]', 'change', inputChanged20)
.delegate('#upload_form20 .icon', 'click', removeField20);

function inputChanged20(e) {
$current_count = $('#upload_form20 input[type="file"]').length;
// console.log($current_count);
$next_count = $current_count + 1;
var labelVal = $(".title"+$current_count).text();
var oldfileName = $(this).val();
console.log(oldfileName);
$("#upload_form20 .filelabel .title").text(labelVal);
fileName = e.target.value.split( '\\' ).pop();
if (oldfileName == fileName) {return false;}
var className = $(this).attr("class");
console.log(className);
var lastChar = className.match(/(\d+)/);
var inc  = 1 + +lastChar;
console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
var extension = fileName.split('.').pop();
if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
  $("#upload_form20 .filelabel #icon"+lastChar).remove();
  $('#upload_form20 #frame'+lastChar).removeClass("hidden");
  $('#upload_form20 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
  $("#upload_form20 .filelabel i, .filelabel .title").css({'color':'#208440'});
  $("#upload_form20 .filelabel").css({'border':' 2px solid #208440'});
}
if(fileName ){
  if (fileName.length > 10){
    $("#upload_form20 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
  }
  else{
    $("#upload_form20 .filelabel .title"+$current_count).text(fileName);
  }
}
else{
  $("#upload_form20 .filelabel .title").text(labelVal);
}
if($("#upload_form20 .FileUpload"+inc).length > 0) {
  console.log('exist');
}
else{
$(this).closest('.p_file').after(
'<label class="filelabel p_file"><div class="icon">X</div>' +
'<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
'<span class="title'+$next_count+'">Add File</span>' +
'<input class="FileUpload'+$next_count+'" id="FileInput" name="others_photos[]" type="file"/>'+
'<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
'</label>');
}
}

function removeField20(){
  $(this).closest('.p_file').remove();
  return false;
}

// Floor Photos
$('body')
.delegate('#upload_form21 input[type="file"]', 'change', inputChanged21)
.delegate('#upload_form21 .icon', 'click', removeField21);

function inputChanged21(e) {
$current_count = $('#upload_form21 input[type="file"]').length;
// console.log($current_count);
$next_count = $current_count + 1;
var labelVal = $(".title"+$current_count).text();
var oldfileName = $(this).val();
console.log(oldfileName);
$("#upload_form21 .filelabel .title").text(labelVal);
fileName = e.target.value.split( '\\' ).pop();
if (oldfileName == fileName) {return false;}
var className = $(this).attr("class");
console.log(className);
var lastChar = className.match(/(\d+)/);
var inc  = 1 + +lastChar;
console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
var extension = fileName.split('.').pop();
if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
  $("#upload_form21 .filelabel #icon"+lastChar).remove();
  $('#upload_form21 #frame'+lastChar).removeClass("hidden");
  $('#upload_form21 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
  $("#upload_form21 .filelabel i, .filelabel .title").css({'color':'#208440'});
  $("#upload_form21 .filelabel").css({'border':' 2px solid #208440'});
}
if(fileName ){
  if (fileName.length > 10){
    $("#upload_form21 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
  }
  else{
    $("#upload_form21 .filelabel .title"+$current_count).text(fileName);
  }
}
else{
  $("#upload_form21 .filelabel .title").text(labelVal);
}
if($("#upload_form21 .FileUpload"+inc).length > 0) {
  console.log('exist');
}
else{
$(this).closest('.p_file').after(
'<label class="filelabel p_file"><div class="icon">X</div>' +
'<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
'<span class="title'+$next_count+'">Add File</span>' +
'<input class="FileUpload'+$next_count+'" id="FileInput" name="site_photos[]" type="file"/>'+
'<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
'</label>');
}
}

function removeField21(){
  $(this).closest('.p_file').remove();
  return false;
}

// Floor Photos
$('body')
.delegate('#upload_form22 input[type="file"]', 'change', inputChanged22)
.delegate('#upload_form22 .icon', 'click', removeField22);

function inputChanged22(e) {
$current_count = $('#upload_form22 input[type="file"]').length;
// console.log($current_count);
$next_count = $current_count + 1;
var labelVal = $(".title"+$current_count).text();
var oldfileName = $(this).val();
console.log(oldfileName);
$("#upload_form22 .filelabel .title").text(labelVal);
fileName = e.target.value.split( '\\' ).pop();
if (oldfileName == fileName) {return false;}
var className = $(this).attr("class");
console.log(className);
var lastChar = className.match(/(\d+)/);
var inc  = 1 + +lastChar;
console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
var extension = fileName.split('.').pop();
if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
  $("#upload_form22 .filelabel #icon"+lastChar).remove();
  $('#upload_form22 #frame'+lastChar).removeClass("hidden");
  $('#upload_form22 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
  $("#upload_form22 .filelabel i, .filelabel .title").css({'color':'#208440'});
  $("#upload_form22 .filelabel").css({'border':' 2px solid #208440'});
}
if(fileName ){
  if (fileName.length > 10){
    $("#upload_form22 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
  }
  else{
    $("#upload_form22 .filelabel .title"+$current_count).text(fileName);
  }
}
else{
  $("#upload_form22 .filelabel .title").text(labelVal);
}
if($("#upload_form22 .FileUpload"+inc).length > 0) {
  console.log('exist');
}
else{
$(this).closest('.p_file').after(
'<label class="filelabel p_file"><div class="icon">X</div>' +
'<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
'<span class="title'+$next_count+'">Add File</span>' +
'<input class="FileUpload'+$next_count+'" id="FileInput" name="location_photos[]" type="file"/>'+
'<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
'</label>');
}
}

function removeField22(){
  $(this).closest('.p_file').remove();
  return false;
}


// Floor Photos
$('body')
.delegate('#upload_form23 input[type="file"]', 'change', inputChanged23)
.delegate('#upload_form23 .icon', 'click', removeField23);

function inputChanged23(e) {
$current_count = $('#upload_form23 input[type="file"]').length;
// console.log($current_count);
$next_count = $current_count + 1;
var labelVal = $(".title"+$current_count).text();
var oldfileName = $(this).val();
console.log(oldfileName);
$("#upload_form23 .filelabel .title").text(labelVal);
fileName = e.target.value.split( '\\' ).pop();
if (oldfileName == fileName) {return false;}
var className = $(this).attr("class");
console.log(className);
var lastChar = className.match(/(\d+)/);
var inc  = 1 + +lastChar;
console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
var extension = fileName.split('.').pop();
if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
 $("#upload_form23 .filelabel #icon"+lastChar).remove();
 $('#upload_form23 #frame'+lastChar).removeClass("hidden");
 $('#upload_form23 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
 $("#upload_form23 .filelabel i, .filelabel .title").css({'color':'#208440'});
 $("#upload_form23 .filelabel").css({'border':' 2px solid #208440'});
}
if(fileName ){
 if (fileName.length > 10){
   $("#upload_form23 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
 }
 else{
   $("#upload_form23 .filelabel .title"+$current_count).text(fileName);
 }
}
else{
 $("#upload_form23 .filelabel .title").text(labelVal);
}
if($("#upload_form23 .FileUpload"+inc).length > 0) {
 console.log('exist');
}
else{
$(this).closest('.p_file').after(
'<label class="filelabel p_file"><div class="icon">X</div>' +
'<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
'<span class="title'+$next_count+'">Add File</span>' +
'<input class="FileUpload'+$next_count+'" id="FileInput" name="master_photos[]" type="file"/>'+
'<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
'</label>');
}
}

function removeField23(){
 $(this).closest('.p_file').remove();
 return false;
}

// Floor Photos
$('body')
.delegate('#upload_form24 input[type="file"]', 'change', inputChanged24)
.delegate('#upload_form24 .icon', 'click', removeField24);

function inputChanged24(e) {
$current_count = $('#upload_form24 input[type="file"]').length;
// console.log($current_count);
$next_count = $current_count + 1;
var labelVal = $(".title"+$current_count).text();
var oldfileName = $(this).val();
console.log(oldfileName);
$("#upload_form24 .filelabel .title").text(labelVal);
fileName = e.target.value.split( '\\' ).pop();
if (oldfileName == fileName) {return false;}
var className = $(this).attr("class");
console.log(className);
var lastChar = className.match(/(\d+)/);
var inc  = 1 + +lastChar;
console.log($(this).closest('.p_file').hasClass(".FileUpload"+inc));
var extension = fileName.split('.').pop();
if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
$("#upload_form24 .filelabel #icon"+lastChar).remove();
$('#upload_form24 #frame'+lastChar).removeClass("hidden");
$('#upload_form24 #frame'+lastChar).attr('src', URL.createObjectURL(e.target.files[0]));
$("#upload_form24 .filelabel i, .filelabel .title").css({'color':'#208440'});
$("#upload_form24 .filelabel").css({'border':' 2px solid #208440'});
}
if(fileName ){
if (fileName.length > 10){
  $("#upload_form24 .filelabel .title"+lastChar).text(fileName.slice(0,4)+'...'+extension);
}
else{
  $("#upload_form24 .filelabel .title"+$current_count).text(fileName);
}
}
else{
$("#upload_form24 .filelabel .title").text(labelVal);
}
if($("#upload_form24 .FileUpload"+inc).length > 0) {
console.log('exist');
}
else{
$(this).closest('.p_file').after(
'<label class="filelabel p_file"><div class="icon">X</div>' +
'<i class="fa fa-paperclip" id="icon'+$next_count+'"></i>' +
'<span class="title'+$next_count+'">Add File</span>' +
'<input class="FileUpload'+$next_count+'" id="FileInput" name="others_photos[]" type="file"/>'+
'<img  id="frame'+$next_count+'" style="max-width: 90px; max-height: 70px;" class="hidden">'+
'</label>');
}
}

function removeField24(){
$(this).closest('.p_file').remove();
return false;
} 

