 <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <!-- <ul class="row links">
                        <li class="col-xs-12 col-sm-3 link-item active"><span>1</span><a href="index.html">Choose Your Location</a></li>
                        <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                    </ul> -->
                </div>
            </div>

<div class="row" style="padding-top: 5px">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                  <?php if($this->session->flashdata('success')!=''){?>
                  <div class="alert alert-success alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
            </div>

               </div>
            <?php } else if($this->session->flashdata('failed')!=''){?>

                <div class="alert alert-warning alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Failed!</strong> <?php echo $this->session->flashdata('failed');?>
            </div>
         <?php } ?>

               </div>
               <div class="col-md-4"></div>
            </div>


            <div class="container m-t-30">
                                            <div class="row">

                            <div class="col-md-9">

                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                                        Account Info
                                    </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                                <?php if($this->session->userdata('logged_in')!=true){?>


                                   <p>Do you have already an account? <a href="#loginmodal" data-toggle="modal">Sign In Or Sign Up</a></p>
                                <!--<p>Create an account <a href="<?php echo base_url();?>user-registration">Sign Up</a></p>-->
                                
                                                            <?php } else { ?>
                                                            <h5>Logged in as <b><?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname')." | ".$this->session->userdata('mobileno');?></b></h5>
                                                            <?php } ?>



                            </div>
                            
                            
                            </div>
                        
                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                                      <?php if($this->session->userdata('ordertype')=='delivery'){ echo "Delivery Address";}else { echo "Pickup Address"; }?> &nbsp;&nbsp;<?php if($this->session->userdata('logged_in')==true && $this->session->userdata('ordertype')=='delivery'){?><a href="#DemoModal2" class="btn btn-lg btn-success" data-toggle="modal">Add New Address</a><?php } ?>


                                    </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">

                            <?php if($this->session->userdata('logged_in')==true && $this->session->userdata('ordertype')=='delivery'){?>
                       <p><b><?php echo $address->title;?></b> <?php if($address->primary_address==1){?><span class="label label-info"> <?php echo "Primary";?></span><?php } ?></p>
                       <p><?php echo $address->address;?></p>
                       <br>

                            <?php } else if($this->session->userdata('logged_in')==true) { ?>
                            <p><?php echo $resto_address;?></p>
                            <?php } ?>
                            
                            </div>
                            
                            
                            </div>
                            
                            <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                                Offers

                                    </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                            <?php if($this->session->userdata('logged_in')==true) { ?>

                            <div class="row">
                                <?php foreach($discounts as $val) {
                                if(strtotime(date("Y-m-d h:i:s a")) >= strtotime($val->discount_from) && strtotime(date("Y-m-d h:i:s a")) <= strtotime($val->discount_to)){

                                ?> 
                                <a onclick="myFunction(<?php echo $val->discount_id;?>)"><div class="col-md-3" >
                                    <input type="hidden" id="myInput<?php echo $val->discount_id;?>" value="<?php echo $val->discount_coupon;?>">
                                    <div class="card" style="padding:10px;">
                                        <h3 style="text-align:center"> <?php echo $val->discount_coupon;?></h3>
                                        <h1 style="text-align:center"><b><?php if($val->discount_type=='fixed') $type=''; else $type='%'; echo $val->discount_amount.$type." OFF";?></b></h3>
                                        
                                        <ul style="list-style-type:circle;margin-left: 10px;">
                                            <li>Min order amount <?php echo $val->applicable_amount_greater_than;?></li>
                                            <li>Max discount amount <?php echo $val->discount_max;?></li>

                                            <li>Applicable on <?php echo $val->discount_applicable_on;?></li>

                                        </ul>
                                        

                                    </div>
                                </div></a>
                                <?php }} ?>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="coupon" placeholder="Enter Coupon Code">
                                    <span id="msg"></span>
                                </div>
                            <button style="background-color: #FF4E02;border-color: #FF4E02;" id="redeem" class="btn btn-primary">REDEEM</button>

                            </div>
                            <?php } ?>

                            </div>
                            
                            
                            </div>


                        <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                                        Payment
                                    </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">

                                <?php if($this->session->userdata('logged_in')==true){?>

                                   <form action="<?php echo base_url();?>process-order" method="post">
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input id="cod_click"  name="payment" type="radio" class="custom-control-input" checked="checked" value="on_delivery"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on Delivery</span>
                                                     </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input id="easebuzz_click" name="payment" type="radio" class="custom-control-input" value="easebuzz"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Online Payment</span> </label>
                                            </li>
                                        </ul>
                                        <input type="hidden" id="form_totalall" name="totalall" value="">
                                        <input type="hidden" id="form_total" name="total" value="">
                                        <input type="hidden" id="charges" name="charges" value="">
                                        <input type="hidden" id="form_cgst" name="cgst" value="">
                                        <input type="hidden" id="form_sgst" name="sgst" value="">
                                        <input type="hidden" id="address" name="address" value="<?php echo $address->address;?>">




                                        <p class="text-xs-center"> <button type="submit" id="cod" class="btn btn-outline-success btn-block">Order Now</button> </p>

                                    </div>
                                
                        </form>                                            
                        <p class="text-xs-center"> <button style="display:none" id="ebz-checkout-btn" class="btn btn-outline-success btn-block">Order Now</button> </p>


                            <?php } ?>
                            
                            </div>
                            
                            
                            </div>
                            </div>
                            
                            
                            <div class="col-md-3">
                     <div class="sidebar-wrap" >
                        <div class="widget widget-cart" >
                           <div class="widget-heading">
                              <h3 class="widget-title text-dark">
                                 Your Cart
                              </h3>
                              <div class="clearfix"></div>
                           </div>
                            
                                                       <div style="overflow-y: scroll;height:500px">
                           
                           <div id="showdiv">
                               
                           </div>
                           <div class="widget-body" style="margin-top:25px">
                              <div class="price-wrap text-xs-center">
                                  
                                  <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="float:left">Cart Subtotal</td>
                                                        <td id="total">
                                                    
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="float:left">Discount Applied</td>
                                                        <td id="discount_amount">Rs 0</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="float:left">CGST</td>
                                                        <td id="cgst"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="float:left">SGST</td>
                                                        <td id="sgst"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="float:left">Charges</td>
                                                        <?php if($this->session->userdata('ordertype')=='delivery'){?>
                                                        <td id="delivery_charge"></td>
                                                        <?php }  else {?>
                                                        <td>Rs 0</td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <td style="float:left"><strong>Total</strong> </td>
                                                        <td><strong id="totalall"></strong></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                  
                                  
                                 <!--<p>TOTAL</p>-->
                                 <!--<h3 class="value">Rs <strong id="total"></strong></h3>-->
                                 <!--<p>Free Shipping</p>-->
                                                             </div>
                                                   
                                                      </div>
                                                      </div>

                        </div>
                     </div>
                     
                  </div>
                  
                            
                           
                            
                                <!--<div class="col-sm-6">-->
                                <!--    <div class="cart-totals margin-b-20">-->
                                <!--        <div class="cart-totals-title">-->
                                <!--            <h4>Cart Summary</h4> </div>-->
                                <!--        <div class="cart-totals-fields">-->
                                <!--            <table class="table">-->
                                <!--                <tbody>-->
                                <!--                    <tr>-->
                                <!--                        <td>Cart Subtotal</td>-->
                                <!--                        <td>-->
                                <!--                    
                                <!--                        </td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>CGST (2.5%)</td>-->
                                <!--                        <td><?php echo "Rs ".$cgst; ?></td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>SGST (2.5%)</td>-->
                                <!--                        <td><?php echo "Rs ".$sgst; ?></td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Delivery Charges</td>-->
                                <!--                        <td>Rs 40</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td class="text-color"><strong>Total</strong></td>-->
                                <!--                        <td class="text-color"><strong>Rs <?php echo $total+40+$cgst+$sgst;?></strong></td>-->
                                <!--                    </tr>-->
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                    <!--cart summary-->
                                    
                    </div>
                </div>
            </div>
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
            
            
             <!-- Modal Contents -->
    <div id="DemoModal2" class="modal fade "> <!-- class modal and fade -->
      
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          
           <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">×</button>
			 
                    <h4 class="modal-title">Add New Address</h4>
           </div>
	       <form action="#" method="post" id="addnewaddress">
	 
                <div class="modal-body"> <!-- modal body -->
                                 <div class="row">
                                        
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Title<span style="color:red">*</span></label>
                                       <input class="form-control" type="text" id="example-text-input" name="title" placeholder="Title" required="required" > 
                                    </div>
                                    </div>
                                    <div class="row">
                                    <!--<div class="form-group col-sm-6">-->
                                    <!--   <label for="exampleInputEmail1">Latitude</label>-->
                                    <!--   <input class="form-control" type="text" id="example-text-input-2" name="latitude" placeholder="Latitude" > -->
                                    <!--</div>-->
                                    <!--<div class="form-group col-sm-6">-->
                                    <!--   <label for="exampleInputEmail1">Longitude</label>-->
                                    <!--   <input name="longitude" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Longitude"> -->
                                    <!--</div>-->
                                    <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Address<span style="color:red">*</span></label>
                                       <textarea name="address" class="form-control" id="exampleTextarea" rows="3" required="required"></textarea>
                                    </div>
                                 
                                    </div>

     </div>
	 
     <div class="modal-footer"> <!-- modal footer -->
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
				
      </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->
      
 </div><!-- / .modal -->
 
 
 <!--Login Modal-->
   <!-- Modal Contents -->
    <div id="loginmodal" class="modal fade "> <!-- class modal and fade -->
      
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          
           <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">×</button>
			 
                    <h4 class="modal-title">Login</h4>
           </div>

                <div class="modal-body"> <!-- modal body -->
                                 <div class="row">
                                    
                                    <div class="form-group col-sm-12">
                                        <span id="msg"></span><br/>
                                       <label for="exampleInputEmail1">Mobile number</label>
                                       <input minlength="10" maxlength="10" name="mobileno" class="form-control" type="tel" value="" id="mobileno" placeholder="Mobile Number" required="required"> <small class="form-text text-muted">We"ll never share your mobile number with anyone else.</small> 
                                    </div>
                                 </div>
                                
                                
                                <!--<div class="row">-->
                                <!--    <div class="form-group col-sm-6">-->
                                <!--       <label for="exampleInputPassword1">Password</label>-->
                                <!--       <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required"> -->
                                <!--    </div>-->
                                    
                                <!-- </div>-->
                                 
                                 <div class="row" id="otp_div" style="display:none">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputPassword1">One Time Password</label>
                                       <input name="otp" type="text" class="form-control" id="otp" placeholder="OTP" required="required"> 
                                    </div>
                                    
                                 </div>
                                 
                                 <div class="row" id="timer_div" style="display:none">
                                    <div class="form-group col-sm-2">
                                        <div class="btn btn-success" id="timer"></div>
                                    </div>
                                    
                                 </div>

                                 
                                      <div class="modal-footer"> <!-- modal footer -->
         <button type="submit" style="display:none" id="resend_otp" onclick="resend_otp()" class="btn theme-btn">Resend OTP</button>

        <button type="submit" style="display:none" id="verify_otp" onclick="verify_otp()" class="btn theme-btn">Verify OTP</button>
                <button type="submit" id="send_otp" onclick="send_otp()" class="btn theme-btn">Send OTP</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>


      </div>

      </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->
      
 </div><!-- / .modal -->
 
 
                    <script 
                    src="https://ebz-static.s3.ap-south-1.amazonaws.com/easecheckout/easebuzz-checkout.js"></script> 
                    <script>
                    var easebuzzCheckout = new EasebuzzCheckout('V5NL6J8PGO', 'prod');
                    
                    
                    document.getElementById('ebz-checkout-btn').onclick = function(e){
                        
                        
                    var payment="easebuzz";
                    var total=$("#form_total").val();
                    var charges=$("#charges").val();
                    var cgst=$("#form_cgst").val();
                    var sgst=$("#form_sgst").val();
                    var address=$("#address").val();
                    var totalall=$("#form_totalall").val();
                    
                    
                    $.ajax({
                  url: "<?php echo base_url();?>home/process_order",
                  type: "POST",
                  data:{payment:payment,total:total,charges:charges,cgst:cgst,sgst:sgst,address:address,totalall:totalall},
                  success:function(data){
                      
                      var access_key=data.trim();

                     var options = {
                            access_key: access_key, // access key received via Initiate Payment
                            onResponse: (response) => {
                                
                                
                                $.ajax({
                                      url: "<?php echo base_url();?>home/response",
                                      type: "POST",
                                      data:{response:response},
                                      success:function(data){
                                        if(data==1)
                                        window.location="https://www.menukart.in/my-orders";
                                        else
                                        window.location="https://www.menukart.in/checkout";

                                        
                                      }
                                    })
                                
                                
                                
                            },
                            theme: "#123456" // color hex
                        }
                        easebuzzCheckout.initiatePayment(options);
                    
                     
                  }
                     
               })
         
                    
                        
                        
                        
                    }
                    </script>
                
 
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
            
            <script>
            
            function remove_discount()
            {
                var totalall=$("#form_totalall").val();
                
                $.ajax({
                  url: "<?php echo base_url();?>home/remove_coupon",
                  type: "POST",
                  success:function(data){
                        $("#discount_amount").html("Rs 0");
                        $("#totalall").html("Rs "+totalall);
                        $("#coupon").val('');
                        $("#msg").html('');
                  }
                });

            }
            
            $("#redeem").click(function()
            {
                var coupon=$("#coupon").val();
                var totalall=$("#form_totalall").val();
                var subtotal=$("#form_total").val();
                
                if(coupon!='')
                {
                
                $.ajax({
                  url: "<?php echo base_url();?>home/redeem_coupon",
                  type: "POST",
                  data:{coupon:coupon,subtotal:subtotal,totalall:totalall},
                  dataType:'json',
                  success:function(data){
                      
                    var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                        if(obj.status==1)
                        {
                            var remove='<a title="Remove" onclick="remove_discount()"><i style="font-size:20px;" class="fa fa-times-circle"></i></a>';
                            $("#discount_amount").html("Rs "+obj.discount_amount+"&nbsp;&nbsp;&nbsp;&nbsp;"+remove);
                            $("#totalall").html("Rs "+obj.totalall);
                            $("#msg").css('color','green');
                            $("#msg").html(obj.msg);
                        }
                        else
                        {
                            $("#msg").css('color','red');
                            $("#msg").html(obj.msg);

                        }
                            

                  }
                     
               })
                }
                else
                {
                  $("#msg").css('color','red');
                  $("#msg").html('Please Enter Coupon Code');
                }
                
            });
            
            
                $.ajax({
                  url: "<?php echo base_url();?>home/show_cart",
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#showdiv").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showdiv").append(obj[i].div);
                        $("#total").html("Rs "+obj[i].total);
                        $("#cgst").html("Rs "+obj[i].cgst);
                        $("#sgst").html("Rs "+obj[i].sgst);
                        $("#totalall").html("Rs "+obj[i].totalall);
                                                $("#delivery_charge").html("Rs "+obj[i].delivery_charge);

                        $("#form_total").val(obj[i].total);
                        $("#form_cgst").val(obj[i].cgst);
                        $("#form_sgst").val(obj[i].sgst);
                        $("#form_totalall").val(obj[i].totalall);
                                                $("#charges").val(obj[i].delivery_charge);

                        
                    }
                    
                     
                  }
                     
               })
         
         
         function add(restaurant_id,menu_id,category_id)
            {
                
                
               $.ajax({
                  url: "<?php echo base_url();?>home/add_to_cart",
                  data:{restaurant_id:restaurant_id,menu_id:menu_id},
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#showdiv").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showdiv").append(obj[i].div);
                        $("#total").html("Rs "+obj[i].total);
                        $("#cgst").html("Rs "+obj[i].cgst);
                        $("#sgst").html("Rs "+obj[i].sgst);
                        $("#totalall").html("Rs "+obj[i].totalall);
                                                                        $("#delivery_charge").html("Rs "+obj[i].delivery_charge);


                        $("#form_total").val(obj[i].total);
                        $("#form_cgst").val(obj[i].cgst);
                        $("#form_sgst").val(obj[i].sgst);
                        $("#form_totalall").val(obj[i].totalall);
                                                                        $("#charges").val(obj[i].delivery_charge);


                        showcartdiv();

                        
                    }
                     
                  }
                     
               })
            }

            function delete_from_cart(restaurant_id,menu_id,id)
            {
               $.ajax({
                  url: "<?php echo base_url();?>home/delete_from_cart",
                  data:{id:id},
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#showdiv").empty();
                       $("#total").empty();
                                               $("#cgst").empty();
                        $("#sgst").empty();
                        $("#totalall").empty();

                        $("#form_total").val('');
                        $("#form_cgst").val('');
                        $("#form_sgst").val('');
                        $("#form_totalall").val('');

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showdiv").append(obj[i].div);
                        $("#total").html(obj[i].total);
                        $("#cgst").html(obj[i].cgst);
                        $("#sgst").html(obj[i].sgst);
                        $("#totalall").html(obj[i].totalall);
                                                                        $("#delivery_charge").html("Rs "+obj[i].delivery_charge);

                        
                        $("#form_total").val("Rs "+obj[i].total);
                        $("#form_cgst").val("Rs "+obj[i].cgst);
                        $("#form_sgst").val("Rs "+obj[i].sgst);
                        $("#form_totalall").val("Rs "+obj[i].totalall);
                                                                        $("#charges").val(obj[i].delivery_charge);




                        
                    }
                                            showcartdiv();

                  

                  }
                     
               })
            }


            function plusqty(restaurant_id,menu_id,id,qty)
{
//   var qty=$(this).val();
//   var menu_id=$(this).attr('data-menu');
//   var id=$(this).attr('data-session');

   $.ajax({
                  url: "<?php echo base_url();?>home/update_cart",
                  data:{qty:qty,menu_id:menu_id,id:id},
                  type: "POST",
                  dataType:'json',
                  success:function(data)
                  {
                    var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#showdiv").empty();
                       $("#total").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showdiv").append(obj[i].div);
                        $("#total").html(obj[i].total);
                        $("#cgst").html(obj[i].cgst);
                        $("#sgst").html(obj[i].sgst);
                        $("#totalall").html(obj[i].totalall);
                                                                        $("#delivery_charge").html("Rs "+obj[i].delivery_charge);

                        
                        $("#form_total").val("Rs "+obj[i].total);
                        $("#form_cgst").val("Rs "+obj[i].cgst);
                        $("#form_sgst").val("Rs "+obj[i].sgst);
                        $("#form_totalall").val("Rs "+obj[i].totalall);
                                                                        $("#charges").val(obj[i].delivery_charge);


                        showcartdiv();


                        
                    }

                  }
                     
               })

}

  function minusqty(restaurant_id,menu_id,id,qty)
{
//   var qty=$(this).val();
//   var menu_id=$(this).attr('data-menu');
//   var id=$(this).attr('data-session');

   $.ajax({
                  url: "<?php echo base_url();?>home/update_cart1",
                  data:{qty:qty,menu_id:menu_id,id:id},
                  type: "POST",
                  dataType:'json',
                  success:function(data)
                  {
                    var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#showdiv").empty();
                       $("#total").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showdiv").append(obj[i].div);
                        $("#total").html(obj[i].total);
                        $("#cgst").html(obj[i].cgst);
                        $("#sgst").html(obj[i].sgst);
                        $("#totalall").html(obj[i].totalall);
                                                                        $("#delivery_charge").html("Rs "+obj[i].delivery_charge);

                        
                        $("#form_total").val("Rs "+obj[i].total);
                        $("#form_cgst").val("Rs "+obj[i].cgst);
                        $("#form_sgst").val("Rs "+obj[i].sgst);
                        $("#form_totalall").val("Rs "+obj[i].totalall);
                                                                        $("#charges").val(obj[i].delivery_charge);



                        showcartdiv();
                        
                    }

                  }
                     
               })

}


$('#addnewaddress').validate({
    rules: {
        title: {
            required: true
        },
        address: {
            required: true
        }
    },
    messages: {
        title: {
            required: "Please Enter Title"
        },
        address: {
            required: "Please Enter Address"
        } 
    },
    submitHandler: function(form) {
      /*form.submit();*/
      var data = $('#addnewaddress').serialize();

      $.ajax({
          url: "<?php echo base_url();?>Home/add_new_address",
          type: "POST",
          data: data,
          success:function(response){
              location.reload();
          }
      });
    }
  });
  
    setTimeout(function() {
    $('.alert').fadeOut('slow');
}, 2000); // <-- time in milliseconds



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

                    
                    // $("#msg").css("color","red");
                    // $("#msg").html("Mobile number is not registered with us!");

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

                    // $("#msg").css("color","red");
                    // $("#msg").html("Mobile number is not registered with us!");

                      }
                     
                  }
                     
               })
                }
            }
            
             function showcartdiv()
               {
                   $.ajax({
                  url: "<?php echo base_url();?>home/show_cart_div",
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#showcartdiv").empty();
                                               $("#total1").empty();


                    $(".cart_number").html(obj.length);
                    if(obj.length)
                    {
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showcartdiv").append(obj[i].div);
                        $("#total1").html(obj[i].total);

 $(".checkout_btn").css("display","block");
                         $(".checkout_btn_hide").css("display","block");



                        
                    }
                    }
                    else
                    {
                        $("#showcartdiv").css("color","red");
                        $("#showcartdiv").append("Please add item into cart to proceed!");
                         $(".checkout_btn").css("display","none");
                                                 $(".checkout_btn_hide").css("display","none");


                    }
                    
                     
                  }
                     
               })

               }
               
               
                           $("#cod_click").click(function(){
                              
                              $("#ebz-checkout-btn").css("display","none");
                              $("#cod").css("display","block");
                               
                           });
                           
                            $("#easebuzz_click").click(function(){
                              
                              $("#ebz-checkout-btn").css("display","block");
                              $("#cod").css("display","none");
                               
                           });

function myFunction(id) {
  /* Get the text field */
  var copyText = document.getElementById("myInput"+id);
  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  $("#coupon").val(copyText.value);

}
            
            </script>
       