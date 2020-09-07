<div class="page-wrapper">
    
        <input type="hidden" id="get_resto_id" value="<?php echo base64_decode($this->uri->segment(2));?>">
    
            <!-- top Links -->
            <!-- <div class="top-links">
               <div class="container">
                  <ul class="row links">
                     <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="index.html">Choose Your Location</a></li>
                     <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                     <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                     <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                  </ul>
               </div>
            </div> -->
            <!-- end:Top links -->
            <!-- start: Inner page hero -->



            <section class="inner-page-hero bg-image" data-image-src="<?php echo base_url();?>images/profile-banner.jpg">

               <div class="profile">
                  <div class="container">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 profile-img">
                           <div class="image-wrap">
                              <figure><img src="../uploads/restaurant/<?php echo $restaurant->restaurant_logo;?>" alt="Profile Image"></figure>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 profile-desc">
                           <div class="pull-left right-text white-txt">
                              <p ><a href="#" style="color:#fff"><b style="font-size: 18px;	font-family: 'Quicksand';"><?php echo $restaurant->restaurant_name;?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accepting Orders</a></p>
                              <p><?php echo $restaurant->resto_type;?></p>
                              <p><?php echo preg_replace('/(?<!\d),|,(?!\d{3})/', ', ',ucwords(strtolower($restaurant->restaurant_address)));?> <a href="<?php echo base_url();?>load-map/<?php echo base64_encode($restaurant->restaurant_id);?>" class="btn btn-small btn-info">View on Map</a></p>
                              <ul class="nav nav-inline">
                                 <!--<li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min Rs <?php echo $restaurant->restaurant_food_min_price;?></a> </li>-->
                                 <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> <?php echo $restaurant->restauran_delivery_min_time;?> min</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"> <?php echo "₹ ".$restaurant->resto_offer;?> </a> </li>

                                 <li class="nav-item ratings">
                                    <a class="nav-link" href="#"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    </span> </a>
                                 </li>
                              </ul>
                           </div>
                           
                           <div class="col-md-8">
                             <div class="form-group has-search">
    <span class="form-control-feedback">
    <input type="text" class="form-control" id="search_menu" placeholder="Search for dishes...">

    </span>
  </div>
  </div>
  <?php if($restaurant->restaurant_foodtype=='Both (Vegetarian / Non Vegetarian)'){ ?>
  <div class="col-md-4" style="display:inline-block">
<div class="checkbox" style="
    /* border: 1px black; */
    display: inline-flex;
    height: 37px;
    width: 131px;
    background-color: #fff;
    /* margin: 10px; */
    padding: 7px;
">
  <input type="checkbox" class="form-control" id="veg_only" value="veg_only" style="width: 34px;height: 24px;"><label style="color: gray;font-size: 17px;/* display: inline-flex; */margin-right: 0px;margin-left: 6px;">Veg Only</label>
</div>
<!--<label style="color:#fff;"><input type="checkbox" class="form-control" id="veg_only" value="veg_only" style="-->
<!--    width: 40px;-->
<!--    height: 38px;-->
<!--    ">Veg Only</label>-->
    </div>
<?php } ?>
                           
                        </div>
                        <?php if(!empty($discounts)){?>
                        
                                                    

                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 profile-desc" style="transform:translateZ(0);transition:transform .2s ease-in-out;border:1px solid #bec0c8;position:relative">
                                                    <h1 style="color:#fff;font-size:20px;font-weight:500;background-color:#FF4E02;display:inline-block;padding-right:10px;padding-bottom:10px;text-transform:uppercase;position:absolute;top:-13px;left:-6px">Offer</h1>
                                                    <div style="padding:31px 40px 25px 25px">
                                                    <?php foreach($discounts as $val) {
                                                    		    if(strtotime(date("Y-m-d h:i:s a")) >= strtotime($val->discount_from) && strtotime(date("Y-m-d h:i:s a")) <= strtotime($val->discount_to)){

                                                    ?> 
                                                    
                                                    <p><i class="fa fa-tag" style="font-size: 15px;color:#fff"></i> <?php if($val->discount_type=='fixed') $type=''; else $type='%'; echo $val->discount_amount.$type." OFF";?> UPTO <?php echo $val->discount_max;?> | Use code <?php echo $val->discount_coupon;?></p>
                                                    
                                                    <?php }} ?>
                                                    </div>

</div>
<?php } else {?>
                                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 profile-desc">
</div>

<?php } ?>
                        
                     </div>
                  </div>
               </div>
            </section>
            <!-- end:Inner page hero -->
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
                     <li>Menus</li>
                  </ul>
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
                                 <?php } else if($this->session->flashdata('falied')!=''){?>


                <div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Failed!</strong> <?php echo $this->session->flashdata('falied');?>
            </div>
         <?php } ?>

               </div>
               <div class="col-md-4"></div>
            </div>
            
            <div class="container m-t-30">
               <div class="row">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                     <div class="sidebar clearfix m-b-20">
                        <div class="main-block">
                           <div class="sidebar-title white-txt">
                              <h6>Choose Category</h6>
                              <i class="fa fa-cutlery pull-right"></i> 
                           </div>
                           <ul style="overflow-y: scroll;height:300px">
                              <?php
                                 foreach ($category as $value) {              
                              ?>
                              <li><a onclick="fetch_menus(<?php echo base64_decode($this->uri->segment(2));?>,<?php echo $value->id;?>)"  class="scroll <?php if(base64_decode($this->uri->segment(3))==$value->id) echo "active"; else "";?>"><?php echo $value->category_name;?></a></li>
                              <?php } ?>
                           </ul>
                           <div class="clearfix"></div>
                        </div>
                        <!-- end:Sidebar nav -->
                        <!-- <div class="widget-delivery">
                           <form>
                              <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                 <label class="custom-control custom-radio">
                                 <input id="radio1" name="radio" type="radio" class="custom-control-input" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Delivery</span> </label>
                              </div>
                              <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                 <label class="custom-control custom-radio">
                                 <input id="radio2" name="radio" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Takeout</span> </label>
                              </div>
                           </form>
                        </div> -->
                     </div>
                     <!-- end:Left Sidebar -->
                     <div class="widget clearfix">
                        <!-- /widget heading -->
                     <!--    <div class="widget-heading">
                           <h3 class="widget-title text-dark">
                              Popular tags
                           </h3>
                           <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                           <ul class="tags">
                              <li> <a href="#" class="tag">
                                 Coupons
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Discounts
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Deals
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Amazon 
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Ebay
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Fashion
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Shoes
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Kids
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Travel
                                 </a> 
                              </li>
                              <li> <a href="#" class="tag">
                                 Hosting
                                 </a> 
                              </li>
                           </ul>
                        </div>
                      --></div>
                  </div>
                  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6" style="overflow-y: scroll;height:620px">
                     <div class="menu-widget m-b-30">
                        <div class="widget-heading">
                           <h3 class="widget-title text-dark">
                              POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular" aria-expanded="true">
                              <!--<i class="fa fa-angle-right pull-right"></i>-->
                              <!--<i class="fa fa-angle-down pull-right"></i>-->
                              </a>
                           </h3>
                           <div class="clearfix"></div>
                        </div>
                        <div id="show_menu_data">
                               
                           </div>
                        
                     </div>
                     <!-- end:Widget menu -->
                     
                     <!--/row -->
                  </div>
                  <!-- end:Bar -->
                  <div class="col-xs-12 col-md-12 col-lg-3">
                     <div class="sidebar-wrap">
                        <div class="widget widget-cart" >
                           <div class="widget-heading">
                              <h3 class="widget-title text-dark">
                                 Your Cart
                              </h3>
                              <div class="clearfix"></div>
                           </div>
                           <div id="showdiv1" class="cart_show" style="overflow-y: scroll;height:600px">
                                <div id="showdiv" class="cart_show">

                                </div>
                            <hr>
                           <div class="widget-delivery clearfix cart_show" >
                              <form>
                                 <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 b-t-0" title="Our executive will delivery your order">
                                    <label class="custom-control custom-radio">
                                    <input val="delivery" id="delivery" name="radio"  type="radio" class="custom-control-input" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Delivery</span> </label>
                                 </div>
                                 <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 b-t-0" title="You have to pickup order from outlet.">
                                    <label class="custom-control custom-radio">
                                    <input id="takeout" id="takeout" name="radio" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description" >Pickup</span> </label>
                                 </div>
                              </form>
                           </div>
                           <div class="widget-body cart_show">
                              <div class="price-wrap text-xs-center">
                                 <p>TOTAL : ₹  <strong id="total"></strong></p>
                                 <!--<sapn class="value"></sapn>-->
                                 
                                 
                                 
                                 <!--<p>Free Shipping</p>-->
                                 <a style="display:none"  href="<?php echo base_url();?>checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>
                              </div>
                           </div>
                           </div>
                           
                           <div class="widget-body cart_hide">
                               <h4>Cart Empty</h4>
                                <img src="../images/Cart_empty.png" style="width:100%">
                                <p>Good food is always cooking! Go ahead, order some yummy items from the menu.</p>
                           </div>
                           
                           
                           
                           
                        </div>
                     </div>
                  </div>
                  <!-- end:Right Sidebar -->
               </div>
               <!-- end:row -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <p style="color:gray;opacity:0.5">FSSAI Number : <?php echo $restaurant->fssai;?></p>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            
            <div>
    <img src="../images/MENU CART WEB DESIGN 2.png" style="width:100%;height:25px">

</div>

            
            <!-- end:Container -->
            <section class="app-section">
               <div class="app-wrap">
                  <div class="container">
                     <div class="row text-img-block text-xs-left">
                        <div class="container">
                           <div class="col-xs-12 col-sm-6 hidden-xs-down right-image text-center">
                              <figure> <img src="<?php echo base_url();?>images/app.png" alt="Right Image"> </figure>
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
            <!--Dont delete important hidden id-->
            <!--<input type="hidden" id="menu_restaurant_id" value="">-->
            
            
            
            <div class="modal fade" id="ordermodal" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
               <div class="modal-body cart-addon" id="menu_variation">
                  
               </div>
               <div class="modal-footer" id="menu_variation_btn">
               </div>
            </div>
         </div>
      </div>

            
         
         <script type="text/javascript">
         
                         var get_resto_id=$("#get_resto_id").val();

         $('input[type="checkbox"]'). click(function()
         {
            if($(this). is(":checked"))
            {
                var veg='Vegetarian';
                var get_resto_id=$("#get_resto_id").val();
                 var category_id=0;
                 $.ajax({
                          url: "<?php echo base_url();?>home/show_menu_veg_only",
                          data:{restaurant_id:get_resto_id,category_id:category_id,veg:veg},
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_menu_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_menu_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })

            }
            else if($(this). is(":not(:checked)"))
            {
                 var get_resto_id=$("#get_resto_id").val();
                 var category_id=0;
                 var veg='';
                 $.ajax({
                          url: "<?php echo base_url();?>home/show_menu_categorywise",
                          data:{restaurant_id:get_resto_id,category_id:category_id,veg:veg},
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_menu_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_menu_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })

            }
         });

         
         
        //  $("#menu_restaurant_id").val('');
         
         $("#search_menu").keyup(function(){
            var query=$("#search_menu").val();
            
                             if($("#veg_only").prop("checked") == true)
                 {
                     var veg="Vegetarian";
                 }
                 else
                 {
                     var veg="";
                 }

            
            if(query!='')
            {
            
            var get_resto_id=$("#get_resto_id").val();
            var category_id=0;
            $.ajax({
                  url: "<?php echo base_url();?>home/show_menu_searchwise",
                  data:{restaurant_id:get_resto_id,category_id:category_id,query:query,veg:veg},
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#show_menu_data").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        $("#show_menu_data").append(obj[i]);
                        // $("#total").html(obj[i].total);

                        
                    }
                    
                     
                  }
                     
               })
               
            }
            else
            {
                var get_resto_id=$("#get_resto_id").val();
                 var category_id=0;
                 $.ajax({
                          url: "<?php echo base_url();?>home/show_menu_categorywise",
                          data:{restaurant_id:get_resto_id,category_id:category_id,veg:veg},
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_menu_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_menu_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })
        
                    }
        
                 });
                 
               
                var get_resto_id=$("#get_resto_id").val();
                 var category_id=0;
                 if($("#veg_only").prop("checked") == true)
                 {
                     var veg="Vegetarian";
                 }
                 else
                 {
                     var veg="";
                 }
                 $.ajax({
                          url: "<?php echo base_url();?>home/show_menu_categorywise",
                          data:{restaurant_id:get_resto_id,category_id:category_id,veg:veg},
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_menu_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_menu_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })
        
                  
         
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
                        $("#total").html(obj[i].total);
                        

                        
                    }
                        //                     var btn='<a style="display:none;text-align: center;width: 60%;margin-top: 50px;display: block;margin-left: 55px;" href="https://www.menukart.in/checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>';
                        
                        // $("#showdiv").append(btn);

                    
                     
                  }
                     
               })
         
            function fetch_menus(restaurant_id,category_id)
            {
                  if($("#veg_only").prop("checked") == true)
                 {
                     var veg="Vegetarian";
                 }
                 else
                 {
                     var veg="";
                 }

                $.ajax({
                  url: "<?php echo base_url();?>home/show_menu_categorywise",
                  data:{restaurant_id:get_resto_id,category_id:category_id,veg:veg},
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#show_menu_data").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        $("#show_menu_data").append(obj[i]);
                        // $("#total").html(obj[i].total);

                        
                    }
                    
                     
                  }
                     
               })
         
                // window.location ='<?php echo base_url();?>menu/'+btoa(restaurant_id)+'/'+btoa(category_id);
            }

            function add(restaurant_id,menu_id,category_id,variation)
            {
                if(variation==1)
                {
                    $.ajax({
                  url: "<?php echo base_url();?>home/fetch_variation",
                  data:{menu_id:menu_id,restaurant_id:restaurant_id,menu_id:menu_id,category_id:category_id},
                  type: "POST",
                      dataType:'json',
                                  success:function(data){
                
                                     var data1=JSON.stringify(data); 
                
                                     var obj = JSON.parse(data1);
                                     
                                     $("#menu_variation").empty();
                                    $("#menu_variation_btn").empty();
                                            
                                    for(var i=0;i<obj.length;i++)
                                    {
                                        $('#ordermodal').modal('show');
                                        $("#menu_variation").append(obj[i].div);
                                        $("#menu_variation_btn").html(obj[i].btn);
                                    }
                                  
                  }
                    });


                }
                else if(variation==0)
                
                {

                    var variation_val=$("input[name='variation_id']:checked").val();
                    if(variation_val!='')
                    {
                        variation_id=variation_val;
                    }
                    else
                    {
                        variation_id=0;
                    }
                    $('#ordermodal').modal('hide');

                $.ajax({
                  url: "<?php echo base_url();?>home/check_resto_exist",
                  data:{restaurant_id:restaurant_id},
                  type: "POST",
                  success:function(data){

                    if(data=='' || data==restaurant_id)
                    {
                         $.ajax({
                                  url: "<?php echo base_url();?>home/add_to_cart",
                                  data:{restaurant_id:restaurant_id,menu_id:menu_id,variation_id:variation_id},
                                  type: "POST",
                                  dataType:'json',
                                  success:function(data){
                
                                     var data1=JSON.stringify(data); 
                
                                     var obj = JSON.parse(data1);
                                     
                                       $("#showdiv").empty();
                
                                            
                                    for(var i=0;i<obj.length;i++)
                                    {
                                        
                                        $("#showdiv").append(obj[i].div);
                                        $("#total").html(obj[i].total);
                                        $("#menu_restaurant_id").val(obj[i].restaurant_id);
                                        
                                        $("input[name='variation_id']").prop("checked", false);

                                        
                                    }
                                    
                        //                                                     var btn='<a style="display:none;text-align: center;width: 60%;margin-top: 50px;display: block;margin-left: 55px;" href="https://www.menukart.in/checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>';
                        
                        // $("#showdiv").append(btn);
                
                                        showcartdiv();

                                     
                                  }
                                     
                               })
                    }
                    else
                    {
                            $.confirm({
                                title: 'Items already in cart!',
                                content: 'Your cart contains items from other restaurant. Would you like to reset your cart for adding items from this restaurant?',
                                alignMiddle	:true,
                                    bootstrapClasses: {
                                        container: 'container',
                                        containerFluid: 'container-fluid',
                                        row: 'row',
                                    },
                                columnClass: 'col-md-6',

                                buttons: {
                                    NO: function () {
                                        
                                    },
                                    YES: {
                                                    text: 'YES, START AFRESH',
                                                                btnClass: 'btn-success',


                                    
                                    
                                    action:function () {
                                        
                                        $.ajax({
                          url: "<?php echo base_url();?>home/add_to_cart",
                          data:{restaurant_id:restaurant_id,menu_id:menu_id,delete_session:1},
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#showdiv").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                
                                $("#showdiv").append(obj[i].div);
                                $("#total").html(obj[i].total);
                                $("input[name='variation_id']").prop("checked", false);

        
                                
                            }
                        //                                     var btn='<a style="display:none;text-align: center;width: 60%;margin-top: 50px;display: block;margin-left: 55px;" href="https://www.menukart.in/checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>';
                        
                        // $("#showdiv").append(btn);
                                
                                showcartdiv();

                             
                          }
                             
                       })
                       
                                        
                                    },
                                    }
                                    
                                    
                                }
                            });
        

                    }
                     
                  }
                     
               })
                }

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

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        
                        $("#showdiv").append(obj[i].div);
                        $("#total").html(obj[i].total);

                        
                    }
                        //                     var btn='<a style="display:none;text-align: center;width: 60%;margin-top: 50px;display: block;margin-left: 55px;" href="https://www.menukart.in/checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>';
                        
                        // $("#showdiv").append(btn);

                    
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

                    }
                    
                        //                     var btn='<a style="display:none;text-align: center;width: 60%;margin-top: 50px;display: block;margin-left: 55px;" href="https://www.menukart.in/checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>';
                        
                        // $("#showdiv").append(btn);

                                                showcartdiv();


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

                        
                    }
                        // var btn='<a style="display:none;text-align: center;width: 60%;margin-top: 50px;display: block;margin-left: 55px;" href="https://www.menukart.in/checkout" class="btn theme-btn btn-lg checkout_btn_hide">Checkout <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>';
                        
                        // $("#showdiv").append(btn);
                                            showcartdiv();

                  }
                     
               })

}

            $("#takeout").click(function(){
            
            var takeout="Pickup";
                    $.ajax({
                  url: "<?php echo base_url();?>home/set_session",
                  data:{ordertype:takeout},
                  type: "POST",
                  success:function(data){

                     
                  

                  }
                     
               })                
            });
            
            $("#delivery").click(function(){
            
                
var delivery="delivery";
                    $.ajax({
                  url: "<?php echo base_url();?>home/set_session",
                  data:{ordertype:delivery},
                  type: "POST",
                  success:function(data){

                     
                  

                  }
                     
               })                });



var delivery="delivery";
                    $.ajax({
                  url: "<?php echo base_url();?>home/set_session",
                  data:{ordertype:delivery},
                  type: "POST",
                  success:function(data){

                     
                  

                  }
                     
               })  
               
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
                         $(".cart_show").css("display","block");
$(".cart_hide").css("display","none");



                        
                    }
                    }
                    else
                    {
                        $("#showcartdiv").css("color","red");
                        $("#showcartdiv").append("Please add item into cart to proceed!");
                        $(".checkout_btn").css("display","none");
                        $(".checkout_btn_hide").css("display","none");
                        $(".cart_show").css("display","none");
$(".cart_hide").css("display","block");



                    }
                    
                     
                  }
                     
               })

               }
        </script>