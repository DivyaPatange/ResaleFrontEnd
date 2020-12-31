<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Resale99 | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    
.btn{
  padding: 10px 50px 10px 50px
}
.services .icon-box1 {
    padding:6px;
    background:#0d2735;
    box-shadow: 0 5px 26px 0 rgba(68, 88, 144, 0.14);
    transition: all 0.3s ease-in-out;
    text-align: center;
    border: 1px solid #fff;
    height: 542px;
    color:white;
}
.services{
    background: url(assets/img/banner1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    width:100%;
}
.hidden{
  display: none;
}
.services .icon-box {
    padding: 11px;
    position: relative;
    overflow: hidden;
    margin: 0 0 40px 0;
    background:white;
    /* box-shadow: 0 5px 26px 0 rgba(68, 88, 144, 0.14); */
    transition: all 0.3s ease-in-out;
    text-align: center;
    border: 1px solid #1f64bb70;
}
.modal-header {
   
    border-bottom: 2px solid #007bff;
   
}
.modal-backdrop.show{
  opacity:0;
}
/*.mybutton{*/
    
/*    color: black;*/
/*     background-color:white; */
/*    border-color: #007bff;*/
/*}*/
/*.btn-primary:hover {*/
/*    color:black;*/
/*    background-color:white;*/
/*    border-color: #0062cc;*/
/*}*/
.form-control {
    
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #007bff;
    border-radius: .25rem;
   
}

/*otp*/


 ::selection {
	 color: #8e44ad;
}
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
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container">

      <div class="logo float-left">
        <!-- <p class="text-white p-0 m-0">Sale By  Anything On </p> -->
        <h1 class="text-light p-0 m-0"><a href="index.html"><span style="font-family: 'boxicons';">resale99.com</span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image
         logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
    </div>
  </header><!-- End Header -->

  <main id="">

    <!-- ======= Services Section ======= -->
    <section class="services p-0">
      <div class="container">
       
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 mt-5">
               <div class="icon-box mt-5">
                <img src="{{ asset('assets/img/user.png') }}" class="img-fluid" style="height:70px;width:70px;">
                <h4 class="mt-2">Login/Sign Up</h4><br>
                <p>Please Provide Your Mobile Number Or Email To <br> Login / Sign Up On Resale99.</p>
                 <div class="mt-5">
                  <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myModal">
                    <img src="{{ asset('assets/img/telephone.png') }}" class="img-fluid pr-4" >Continue With Phone</button><br><br>
                  <a href="{{ url('/auth/google') }}"><button type="button" class="btn btn-outline-dark">
                    <img src="{{ asset('assets/img/google.png') }}" class="img-fluid pr-3">Continue With Google</button></a><br><br>
                    <a href="{{ url('/auth/facebook') }}"><button type="button" class="btn btn-outline-dark">
                  <img src="{{ asset('assets/img/facebook.png') }}" class="img-fluid pr-2">Continue With Facebook</button></a><br>
                 <br><br>
                 </div>
                  <h6><u>Or</u></h6>
                  <h6>Lofin With Gmail</h6>
              </div>
            </div>
            <div class="col-lg-3"></div>
          </div>
        
      </div>
    </section>
    <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Resale99.com</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body text-center p-4">
             <h5>Login With Phone</h5>
              <img src="{{ asset('assets/img/telephone.png') }}" class="img-fluid" ><br>
               <p>We Send To Text You The OTP To Authanticate<br> Your Account.</p>
                <form id="mobile-auth" class="mt-4" method="POST">
                  <div class="form-group">
                    <label for="">Enter Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name"  name="name"><br>
                    <span id="nameErr" class="hidden mob text-danger">
                      <i class="fa fa-check pwd-valid">&nbsp;</i>Please Enter Name.
                    </span>  
                  </div>
                  <div class="form-group">
                    <label for="">Enter Phone Number:</label>
                    <input type="number" class="form-control" id="phone-number" placeholder="Enter phone Number"  name="phone-number"><br>
                    <span id="mobile-valid" class="hidden mob text-success">
                      <i class="fa fa-check pwd-valid">&nbsp;</i>Valid Mobile No
                    </span>  
                    <span id="folio-invalid" class="hidden mob-helpers text-danger">
                      <i class="fa fa-times mobile-invalid">&nbsp;</i>Invalid mobile No
                    </span>
                  </div>
                  <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                </form>
                
                <p>We Wont Reveal Your Phone Number To Anyone Else<br> Not Use It To Send You Spam.</p>
            </div>
        
            
          </div>
        </div>
      </div>
      
      
       <!-- The Modal -->
      <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Resale99.com</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body text-center p-4">
             <h5>OTP Verification</h5>
             <img src="{{ asset('assets/img/pincode (1).png') }}" class="img-fluid" ><br><br>
               <p>A text message with a 6-digit verification <br>code was just send to your <br>mobile number.</p><br>
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
                <i class="fa fa-times mobile-invalid">&nbsp;</i>Please fill out otp.
              </span>
    				</div>
            <div id="referral_name"></div>
    			
    			</form><br>
          
		       </div>
               <p>A one time password send to your mobile number.</p>
            </div>
        </div>
        </div>
      </div>
      
      
      </main><!-- End #main -->

  
  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
<!--otp-->
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
            $('#myModal').delay(1000).fadeOut(450);
            setTimeout(function() {
              $("#myModal1").modal('show');
              $("#myModal").modal('hide');
            }, 1000);
            
          }

      }

    });



});


</script>
</body>

</html>