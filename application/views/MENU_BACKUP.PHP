<div class="page-wrapper">
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
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                           <div class="image-wrap">
                              <figure><img src="<?php echo base_url();?>images/profile-image.jpg" alt="Profile Image"></figure>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                           <div class="pull-left right-text white-txt">
                              <h6><a href="#"><?php echo $restaurant->restaurant_name;?></a></h6>
                              <a class="btn btn-small btn-green">Open</a>
                              <p><?php echo $restaurant->types_of_food;?></p>
                              <ul class="nav nav-inline">
                                 <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min Rs <?php echo $restaurant->restaurant_food_min_price;?></a> </li>
                                 <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> <?php echo $restaurant->restauran_delivery_min_time;?> min</a> </li>
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
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- end:Inner page hero -->
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">Home</a></li>
                     <li>Menus</li>
                  </ul>
               </div>
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
                           <ul>
                              <?php
                                 foreach ($category as $value) {              
                              ?>
                              <li><a onclick="fetch_menus(<?php echo base64_decode($this->uri->segment(2));?>,<?php echo $value->id;?>)" href="#" class="scroll <?php if(base64_decode($this->uri->segment(3))==$value->id) echo "active"; else "";?>"><?php echo $value->category_name;?></a></li>
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
                  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                     <div class="menu-widget m-b-30">
                        <div class="widget-heading">
                           <h3 class="widget-title text-dark">
                              POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                           <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="1">
                           <?php 
                           $count=0;
                              foreach ($menus as $value) {
                                 $count++;
                                 if($count%2==0){

                               
                           ?>
                           <div class="food-item white">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" href="#"><img src="<?php echo base_url();?>images/food4.jpg" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                       <h6><a href="#"><?php echo $value->menu_name;?></a></h6>
<!--                                        <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
 -->                                    </div>
                                    <!-- end:Description -->
                                 </div>
                                 <!-- end:col -->
                                 <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">Rs <?php echo $value->menu_price;?></span> <a onclick="add(<?php echo base64_decode($this->uri->segment(2));?>,<?php echo $value->menu_id;?>,<?php echo base64_decode($this->uri->segment(3));?>)" href="#" class="btn btn-small btn btn-secondary pull-right add" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                              </div>
                              <!-- end:row -->
                           </div>
                        <?php } else { ?>
                           <div class="food-item">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" href="#"><img src="<?php echo base_url();?>images/food4.jpg" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                       <h6><a href="#"><?php echo $value->menu_name;?></a></h6>
<!--                                        <p> Burgers, American, Sandwiches, Fast Food, BBQ</p>
 -->                                    </div>
                                    <!-- end:Description -->
                                 </div>
                                 <!-- end:col -->
                                 <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">Rs <?php echo $value->menu_price;?></span> <a onclick="add(<?php echo base64_decode($this->uri->segment(2));?>,<?php echo $value->menu_id;?>,<?php echo base64_decode($this->uri->segment(3));?>)" href="#" class="btn btn-small btn btn-secondary pull-right" data-toggle="modal" data-target="#order-modal">&#43;</a> </div>
                              </div>
                              <!-- end:row -->
                           </div>
                        <?php }}?>
                           <!-- end:Food item -->
                          
                        </div>
                        <!-- end:Collapse -->
                     </div>
                     <!-- end:Widget menu -->
                     <div class="row m-t-30">
                        <div class="col-sm-12 col-xs-12">
                           <div class="panel">
                              <div class="panel-heading">
                                 <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false">Can I viverra sit amet quam eget lacinia?</a></h4>
                              </div>
                              <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                                 <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                              </div>
                           </div>
                           <!--//panel-->
                           <div class="panel">
                              <div class="panel-heading">
                                 <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2"><i class="ti-info-alt"></i>What is the ipsum dolor sit amet quam tortor?</a></h4>
                              </div>
                              <div class="panel-collapse collapse" id="faq2">
                                 <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                              </div>
                           </div>
                           <!--//panel-->
                           <div class="panel">
                              <div class="panel-heading">
                                 <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq3"><i class="ti-info-alt"></i>How does lorem ipsum work?</a></h4>
                              </div>
                              <div class="panel-collapse collapse" id="faq3">
                                 <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                              </div>
                           </div>
                           <!--//panel-->
                           <div class="panel">
                              <div class="panel-heading">
                                 <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq4"><i class="ti-info-alt"></i>Can I ipsum dolor sit amet nascetur ridiculus?</a></h4>
                              </div>
                              <div class="panel-collapse collapse" id="faq4">
                                 <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id.</div>
                              </div>
                           </div>
                           <!--//panel-->
                        </div>
                     </div>
                     <!--/row -->
                  </div>
                  <!-- end:Bar -->
                  <div class="col-xs-12 col-md-12 col-lg-3">
                     <div class="sidebar-wrap">
                        <div class="widget widget-cart">
                           <div class="widget-heading">
                              <h3 class="widget-title text-dark">
                                 Your Shopping Cart
                              </h3>
                              <div class="clearfix"></div>
                           </div>
                           <?php 
                           $count=0;
                           $total=0;
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $count++;
                                 if($count%2==0){
                                 
                           ?>
                           <div class="order-row bg-white">
                              <div class="widget-body">
                                 <div class="title-row"><?php echo $value->menu_name;?> 
                                 <a href="#" onclick="delete_from_cart(<?php echo $value->restaurant_id;?>,<?php echo $value->menu_id;?>,<?php echo $value->id;?>)"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <!-- <div class="col-xs-6">
                                    <input class="form-control" type="text" value="             <?php echo $value->menu_price;?>" id="example-number-input"> 

                                    </div> -->
                                    <div class="col-xs-8">

<div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="fa fa-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="1000">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="fa fa-plus"></span>
                </button>
                </span>
            </div>


<!--                                        <input class="form-control" type="number" value="<?php echo $value->qty;?>" id="example-number-input"> 
 -->                                    </div>

                                    <div class="col-xs-4">
                                    <p>  Rs           <b><?php echo $value->menu_price;?></b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } else { ?>
                           <div class="order-row bg-white">
                              <div class="widget-body">
                                 <div class="title-row"><?php echo $value->menu_name;?> 
                                 <a href="#" onclick="delete_from_cart(<?php echo $value->restaurant_id;?>,<?php echo $value->menu_id;?>,<?php echo $value->id;?>)"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <!-- <div class="col-xs-5">
                                       <input align="right" class="form-control" type="text" value="             <?php echo $value->menu_price;?>" id="example-number-input"> 

                                    </div> -->
                                    <div class="col-xs-8">

<div class="input-group">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                  <span class="fa fa-minus"></span>
                </button>
                </span>
                <input type="text" name="quant[1]" class="form-control input-number" value="<?php echo $value->qty;?>" min="1" max="1000">
                <span class="input-group-btn">
              <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                  <span class="fa fa-plus"></span>
                </button>
                </span>
            </div>

<!--                                        <input class="form-control" type="number" value="<?php echo $value->qty;?>" id="example-number-input"> 
 -->                                    </div>

 <div class="col-xs-4">
                                    <p>  Rs           <b><?php echo $value->menu_price;?></b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php } }?>
                           <!-- <div class="order-row">
                              <div class="widget-body">
                                 <div class="title-row">Carlsberg Beer <a href="#"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-8">
                                       <select class="form-control b-r-0">
                                          <option>Size SM</option>
                                          <option>Size LG</option>
                                          <option>Size XL</option>
                                       </select>
                                    </div>
                                    <div class="col-xs-4">
                                       <input class="form-control" value="4" id="quant-input"> 
                                    </div>
                                 </div>
                              </div>
                           </div> -->
                           <!-- end:Order row -->
                           <!-- <div class="widget-delivery clearfix">
                              <form>
                                 <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 b-t-0">
                                    <label class="custom-control custom-radio">
                                    <input id="radio4" name="radio" type="radio" class="custom-control-input" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Delivery</span> </label>
                                 </div>
                                 <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 b-t-0">
                                    <label class="custom-control custom-radio">
                                    <input id="radio3" name="radio" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Takeout</span> </label>
                                 </div>
                              </form>
                           </div> -->
                           <div class="widget-body">
                              <div class="price-wrap text-xs-center">
                                 <p>TOTAL</p>
                                 <h3 class="value"><strong>Rs <?php echo $total;?></strong></h3>
                                 <p>Free Shipping</p>
                                 <a href="<?php echo base_url();?>checkout" class="btn theme-btn btn-lg">Checkout</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end:Right Sidebar -->
               </div>
               <!-- end:row -->
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
         
         <script type="text/javascript">
            function fetch_menus(restaurant_id,category_id)
            {
                window.location ='<?php echo base_url();?>menu/'+btoa(restaurant_id)+'/'+btoa(category_id);
            }

            function add(restaurant_id,menu_id,category_id)
            {
               $.ajax({
                  url: "<?php echo base_url();?>home/add_to_cart",
                  data:{restaurant_id:restaurant_id,menu_id:menu_id},
                  type: "POST",
                  success:function(data){

                     //alert(data);

                     window.location ='<?php echo base_url();?>menu/'+btoa(restaurant_id)+'/'+btoa(category_id);


                  }
                     
               })
            }

            function delete_from_cart(restaurant_id,menu_id,id)
            {
               $.ajax({
                  url: "<?php echo base_url();?>home/delete_from_cart",
                  data:{id:id},
                  type: "POST",
                  success:function(data){

                     //alert(data);

                     //window.location ='<?php echo base_url();?>menu/'+btoa(restaurant_id)+'/'+btoa(menu_id);

                     location.reload();


                  }
                     
               })
            }



$('.btn-number').click(function(e){
    e.preventDefault();

    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

        </script>