<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> Resale99 - </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
  .hidden{
  display: none;
}
    /*otp input */
 .passcode-wrapper {
   display: flex;
   justify-content: space-between;
   align-items: center;
   width: auto;
  margin: 25px 0px 28px 0px;
}
 .passcode-wrapper input {
   width: 50px;
   height: 50px;
   padding: 0;
   margin-right: 5px;
   text-align: center;
   border: 1px solid gray;
   border-radius: 5px;
}
 .passcode-wrapper input:last-child {
   margin-right: 0;
}
 .passcode-wrapper input::-webkit-inner-spin-button, .passcode-wrapper input::-webkit-outer-spin-button {
   -webkit-appearance: none;
   appearance: none;
   margin: 0;
}
 .passcode-wrapper input:focus, .passcode-wrapper input.focus {
   border-color: green;
   outline: none;
   box-shadow: none;
}
 
/*otp/*/
/*form*/
    .myimg
    {
        width:100%;
        height:300px;
    }
    p{
      font-size: 13px;
    }
    input .form-control{
      font-size: 13px;
    }
    .php-email-form .form-control.form-control-a {
    font-size: 13px;
    height: auto;
    }
    label{
      font-size: 13px;
    }
    /*form*/

    /* modal */
    .modal-backdrop.show {
        opacity: 0;
    }
    /* modal */
    
  </style>
  

</head>

<body>
<main id="main">
  <!-- ======= Contact Single ======= -->
    <section class="contact mt-5">
      <div class="container">
            <div class="row">
              <div class="col-md-4 m-auto" style="border: 2px solid #1f5d8e;">
                <form method="post" role="form" class="php-email-form">
                  <div class="row m-3">
                    <div class="col-md-12 mb-3">
                      <div class="mb-3 text-center">
                        <h6>Login With Phone</h6>
                         <img src="assets/img/telephone.png" class="img-fluid m-3">
                        <p>We Send To Text You The OTP To Authanticate Your Account.</p>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control form-control-lg form-control-a" placeholder="Enter Name">
                        <span id="nameErr" class="hidden mob text-danger">
                          <i class="fa fa-check pwd-valid">&nbsp;</i>Please Enter Name.
                        </span>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="number" name="phone-number" id="phone-number" class="form-control form-control-lg form-control-a" placeholder="Enter Phone Number">
                        <span id="mobile-valid" class="hidden mob text-success">
                          <i class="fa fa-check pwd-valid">&nbsp;</i>Valid Mobile No
                        </span>  
                        <span id="folio-invalid" class="hidden mob-helpers text-danger">
                          <i class="fa fa-times mobile-invalid">&nbsp;</i>Invalid mobile No
                        </span>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="button" class="btn btn-primary m-3 btn-submit">Submit</button>
                    </div>
                    <div class="col-md-12 text-center">
                      <p>We Wont Reveal Your Phone Number To Anyone Else Not Use It To Send You Spam.</p>
                    </div>
                  </div>
                </form>
              </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->
 <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Resale99.com</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body text-center">
             <h6>OTP Verification</h6>
             <img src="assets/img/pincode (1).png" class="img-fluid m-3">
               <p>A text message with a 6-digit verification code was just send to your mobile number.</p><br>
              <div class="col-md-8 offset-md-2">
                <form class="text-center">
                  <div class="form-group">
                    <label for="password" class="">Enter 4 Digit Password</label>
                    <div class="passcode-wrapper">
                      <input id="codeBox1" type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)">
                      <input id="codeBox2" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
                      <input id="codeBox3" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
                      <input id="codeBox4" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">
                    </div>  
                    <span id="otpErr" class="hidden mob-helpers text-danger">
                      <i class="fa fa-times mobile-invalid">&nbsp;</i>Please fill out OTP.
                    </span>
                  </div>
                  <div id="referral_name"></div>
                </form>
              </div>
              <p>A one time password send to your mobile number.</p>
            </div>
          </div>
        </div>
      </div>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function getCodeBoxElement(index) {
  return document.getElementById('codeBox' + index);
}
function onKeyUpEvent(index, event) {
  const eventCode = event.which || event.keyCode;
  if (getCodeBoxElement(index).value.length === 1) {
	 if (index !== 4) {
		getCodeBoxElement(index+ 1).focus();
	 } else {
		getCodeBoxElement(index).blur();
		// Submit code
    // var value = getCodeBoxElement(index).value;
		// console.log(value);
    var lang = [];
   for(index = 1; index < 5; index++)
   {
    lang.push(getCodeBoxElement(index).value);
   }
   var name = $("input[name=hidden_name]").val();
    var mobile_no = $("input[name=hidden_no]").val();
  //  var value = getCodeBoxElement(index).value;
		console.log(lang);
    $.ajax({
      type:'POST',
      url:"{{ route('otp.save') }}",
      data:{name:name, mobile_no:mobile_no, lang:lang},
      success:function(data){
        if(data.info)
        {
          swal({
          text: "Invalid OTP!",
          icon: "error",
          button: "OK!",
        });
        }
        if(data.error)
        {
          swal({
          text: "Something went wrong!",
          icon: "error",
          button: "OK!",
        });
        }
        if(data.success){
          swal({
            title: "Thank You!",
            text: "OTP is Verified!",
            icon: "success",
          });
          setTimeout(() => {
            window.location.href = "/";
                    }, 2000);
        }
          

      }

      });
	 }
   
  }
  if (eventCode === 8 && index !== 1) {
	 getCodeBoxElement(index - 1).focus();
  }
}
function onFocusEvent(index) {
  for (item = 1; item < index; item++) {
	 const currentElement = getCodeBoxElement(item);
  //  alert(currentElement.value);
	 if (!currentElement.value) {
		  currentElement.focus();
		  break;
	 }
  }
}
</script>
<!--otp-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(".btn-submit").click(function(e){
    e.preventDefault();
    var name = $("#name").val();
    var mobile_no = $("input[name=phone-number]").val();
    var filter = /^\d*(?:\.\d{1,2})?$/;
    // alert(name);
    // console.log(name='');
    if(name=="" || name==null)
    {
      $("#nameErr").removeClass("hidden");
    }
    if (filter.test(mobile_no)) {
      if(mobile_no.length==10){
            // alert("valid");
        $("#mobile-valid").removeClass("hidden");
        $("#folio-invalid").addClass("hidden");
      } 
      else 
      {
        // alert('Please put 10  digit mobile number');
        $("#folio-invalid").removeClass("hidden");
        $("#mobile-valid").addClass("hidden");
        return false;
      }
    }
    else {
      // alert('Not a valid number');
      $("#folio-invalid").removeClass("hidden");
      $("#mobile-valid").addClass("hidden");
      return false;
    }
    $.ajax({

      type:'POST',

      url:"{{ route('mobileNo.submit') }}",

      data:{name:name,mobile_no:mobile_no},

      success:function(data){
        console.log(data);
          if(data.success)
          {
            $('#referral_name').html(data.mobile_no);
            $('#myModal').delay(1000).fadeIn(450);
            setTimeout(function() {
              $("#myModal").modal('show');
            }, 1000);
            
          }

      }

    });



});


</script>
</body>

</html>