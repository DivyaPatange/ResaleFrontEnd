<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Resale99 - </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
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
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-4 section-md-t3"></div>
              <div class="col-md-4 mt-5" style="border: 2px solid #1f5d8e;">
                <form action="" method="post" role="form" class="php-email-form">
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
                        <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="number" class="form-control form-control-lg form-control-a" placeholder="Enter Phone Number">
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#myModal">Submit</button>
                    </div>
                    <div class="col-md-12 text-center">
                      <p>We Wont Reveal Your Phone Number To Anyone Else Not Use It To Send You Spam.</p>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-4 section-md-t3"></div>
            </div>
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
</body>

</html>