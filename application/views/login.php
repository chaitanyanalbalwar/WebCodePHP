<div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
                     <li>Sign In</li>
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              <!--<form action="<?php echo base_url();?>process-login" method="post">-->
                                 <div class="row">
                                    
                                    <div class="form-group col-sm-6">
                                        <span id="msg"></span><br/>
                                       <label for="exampleInputEmail1">Mobile number</label>
                                       <input minlength="10" maxlength="10" name="mobileno" class="form-control" type="tel" value="" id="mobileno" placeholder="Mobile Number" required="required"> <small class="form-text text-muted">We"ll never share your mobile number with anyone else.</small> 
                                    </div>
                                 </div>
                                 
                                 <div class="row" id="otp_div" style="display:none">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">One Time Password</label>
                                       <input name="otp" type="text" class="form-control" id="otp" placeholder="OTP" required="required"> 
                                    </div>
                                    
                                 </div>
                                 
                                    <div class="row" id="timer_div" style="display:none">
                                    <div class="form-group col-sm-2">
                                        <div class="btn btn-success" id="timer"></div>
                                    </div>
                                    
                                 </div>

                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <button type="submit" id="send_otp" onclick="send_otp()" class="btn theme-btn">Send OTP</button> </p>
                                        <p> <button type="submit" style="display:none" id="resend_otp" onclick="resend_otp()" class="btn theme-btn">Resend OTP</button> </p>
                                        <p> <button type="submit" style="display:none" id="verify_otp" onclick="verify_otp()" class="btn theme-btn">Verify OTP</button> </p>

                                       <p><a href="<?php echo base_url();?>user-registration">Sign Up</a></p>
                                       
    <a href="<?php echo $authURL; ?>"><img src="<?php echo base_url('assets/images/fb-login-btn.png'); ?>">Login With Facebook</a>

                                       
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                     
                     
                     
                     <!-- WHY? -->
                     <div class="col-md-4">
                        <h4><a href="<?php echo base_url();?>login">Sign in</a></h4>
                        <p>Sign in to access your Orders, Offers and Wishlist.</p>
                        <hr>
                            <img src="images/Local.png" alt="" class="img-fluid">
                        <p></p>
                        <!-- end:Panel -->
                        <h4 class="m-t-20">Contact Customer Support</h4>
                        <p> If you"re looking for more help or have a question to ask, please </p>
                        <p> <a href="<?php echo base_url();?>contact" class="btn theme-btn m-t-15">contact us</a> </p>
                     </div>
                     <!-- /WHY? -->
                  </div>
               </div>
            </section>
            <section class="app-section">
               <div class="app-wrap">
                  <div class="container">
                     <div class="row text-img-block text-xs-left">
                        <div class="container">
                           <div class="col-xs-12 col-sm-6  right-image text-center">
                              <figure> <img src="images/app.png" alt="Right Image"> </figure>
                           </div>
                           <div class="col-xs-12 col-sm-6 left-text">
                              <h3>The Best Food Delivery App</h3>
                              <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                              <div class="social-btns">
                                 <a href="#" class="app-btn apple-button clearfix">
                                    <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                    <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                 </a>
                                 <a href="#" class="app-btn android-button clearfix">
                                    <div class="pull-left"><i class="fa fa-android"></i> </div>
                                    <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            
            
            
            <script>
                
                function send_otp()
            {
                
                var mobileno = $("#mobileno").val();
                                if(mobileno.length!=10)
                {
                                        $("#msg").css("color","red");
                    $("#msg").html("Enter 10 digit Mobile Number!");

                }
                else
                {

                
               $.ajax({
                  url: "<?php echo base_url();?>home/send_otp",
                  data:{mobileno:mobileno},
                  type: "POST",
                  //dataType:'json',
                  success:function(data){
                      
                      if(data==1)
                      {
                    $("#send_otp").css("display","none");
                    $("#verify_otp").css("display","block");
                    $("#otp_div").css("display","block");
                    $("#timer_div").css("display","block");

                    
                    $("#msg").css("color","green");
                    $("#msg").html("OTP sent!");
                    
                var timeLeft = 60;
                var elem = document.getElementById('timer');
                var timerId = setInterval(countdown, 1000);
                
                function countdown() {
                    if (timeLeft == -1) {
                        clearTimeout(timerId);
                        doSomething();
                    } else {
                        elem.innerHTML = '00:'+timeLeft;
                        timeLeft--;
                    }
                }
                
                    
                      }
                      else
                      {
                    // $("#send_otp").css("display","none");
                    // $("#verify_otp").css("display","block");
                    // $("#otp_div").css("display","block");
                    
                    window.location = "https://www.menukart.in/user-registration?no="+mobileno;

                      }
                     
                  }
                     
               })
                }
            }
            
            function doSomething() {

                                        $("#resend_otp").css("display","block");
                                        $("#verify_otp").css("display","none");
                                        $("#timer_div").css("display","none");



                }



   function verify_otp()
            {
                
                var mobileno = $("#mobileno").val();
                                var otp = $("#otp").val();

                
               $.ajax({
                  url: "<?php echo base_url();?>home/verify_otp",
                  data:{mobileno:mobileno,otp:otp},
                  type: "POST",
                  //dataType:'json',
                  success:function(data){
                      
                      if(data==1)
                      {
                    // $("#send_otp").css("display","none");
                    // $("#verify_otp").css("display","block");
                    // $("#otp_div").css("display","block");
                    
                    $("#msg").css("color","green");
                    $("#msg").html("OTP verified!");
                    location.reload();
                      }
                      else
                      {
                    // $("#send_otp").css("display","none");
                    // $("#verify_otp").css("display","block");
                    // $("#otp_div").css("display","block");
                    
                    $("#msg").css("color","red");
                    $("#msg").html("Wrong OTP entered!");

                      }
                     
                  }
                     
               })
            }
            
            
                function resend_otp()
            {
                
                var mobileno = $("#mobileno").val();
                                if(mobileno.length!=10)
                {
                                        $("#msg").css("color","red");
                    $("#msg").html("Enter 10 digit Mobile Number!");

                }
                else
                {

                
               $.ajax({
                  url: "<?php echo base_url();?>home/send_otp",
                  data:{mobileno:mobileno},
                  type: "POST",
                  //dataType:'json',
                  success:function(data){
                      
                      if(data==1)
                      {
                    $("#resend_otp").css("display","none");
                    $("#verify_otp").css("display","block");
                    $("#otp_div").css("display","block");
                    
                    $("#msg").css("color","green");
                    $("#msg").html("OTP sent!");
                    
                
                    
                      }
                      else
                      {
                    // $("#send_otp").css("display","none");
                    // $("#verify_otp").css("display","block");
                    // $("#otp_div").css("display","block");
                    
                    window.location = "https://www.menukart.in/user-registration?no="+mobileno;

                      }
                     
                  }
                     
               })
                }
            }
            

            </script>