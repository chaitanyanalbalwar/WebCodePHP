<div class="page-wrapper">
            <!-- top Links -->
            <!-- <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="index.html">Choose Your Location</a></li>
                        <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>

            --> <!-- end:Top links -->

            <!-- start: Inner page hero -->
  <!--          <div class="inner-page-hero bg-image" data-image-src="<?php echo base_url();?>images/profile-banner.jpg">-->
                <!-- end:Container -->
  <!--              <div class="row" style="margin-bottom:-50px;margin-top: -68px;">-->
  <!--                  <div class="col-md-4">-->
                        
  <!--                  </div>-->
                    
  <!--                  <div class="col-md-4">-->
  <!--                  <div class="form-group has-search">-->
  <!--  <span class="form-control-feedback">-->
  <!--  <input style="margin-top:50px" type="text" class="form-control" id="search_resto" placeholder="Search for Restaurants..."></span>-->
  <!--</div>    -->
  <!--                  </div>-->

  <!--                  <div class="col-md-4">-->
                        
  <!--                  </div>-->

  <!--              </div>-->
                
                
  <!--          </div>-->
            <div class="breadcrumb" style="margin-bottom:10x">
               <div class="container">
                  <ul>
                     <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
                     <li>Restaurants</li>
                  </ul>
               </div>
            </div>
            
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                            <div class="sidebar clearfix m-b-20">
                                <div class="main-block">
                                    <div class="sidebar-title white-txt">
                                        <h6>Choose Category</h6> <i class="fa fa-cutlery pull-right"></i> </div>
                                    <!-- <div class="input-group">
                                        <input type="text" class="form-control search-field" placeholder="Search your favorite food"> <span class="input-group-btn"> 
                                 <button class="btn btn-secondary search-btn" type="button"><i class="fa fa-search"></i></button> 
                                 </span> </div> -->
                                    <form>
                                        <ul style="overflow-y: scroll;height:500px">
                                            <?php
                                            foreach ($category as $value) {
                                            
                                            ?>
                                            <li>
                                                <!-- <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $value->category_name;?></span> </label> -->

                                                    <label class="custom-control custom-radio">
                                                <input onclick="fetch_resto(<?php echo $value->id;?>)" id="radio1" name="radio" type="radio" class="custom-control-input" <?php if(base64_decode($this->uri->segment(2))==$value->id) echo "checked"; else "";?>> <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $value->category_name;?></span> </label>
                                            </li>
                                        <?php } ?>
                                            
                                        </ul>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- end:Sidebar nav -->
                               <!--  <div class="widget-delivery">
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
                            
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9" id="show_resto_data" style="overflow-y: scroll;height:600px">

                        </div>
                    </div>
                </div>
            </section>
            <div>
    <img src="../images/MENU CART WEB DESIGN 2.png" style="width:100%;height:25px">

</div>

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
            
            <div>
    							                        <img src="../public/img/landing/Easy 4 Step Order.png" style="width:100%">

</div>


<div>
    <img src="../images/MENU CART WEB DESIGN 2.png" style="width:100%;height:25px">

</div>

        
        <script type="text/javascript">
        
        
        
            $.ajax({
                          url: "<?php echo base_url();?>home/show_resto",
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_resto_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_resto_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })
        
            
        
            $("#search_resto").keyup(function(){
            var query=$("#search_resto").val();
            
            if(query!='')
            {
            
            $.ajax({
                  url: "<?php echo base_url();?>home/show_resto_searchwise",
                  data:{query:query},
                  type: "POST",
                  dataType:'json',
                  success:function(data){

                     var data1=JSON.stringify(data); 

                     var obj = JSON.parse(data1);
                     
                       $("#show_resto_data").empty();

                            
                    for(var i=0;i<obj.length;i++)
                    {
                        $("#show_resto_data").append(obj[i]);
                        // $("#total").html(obj[i].total);

                        
                    }
                    
                     
                  }
                     
               })
               
            }
            else
            {
                 $.ajax({
                          url: "<?php echo base_url();?>home/show_resto",
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_resto_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_resto_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })
        
                    }
        
                 });

        
            function fetch_resto(id)
            {
                $.ajax({
                          url: "<?php echo base_url();?>home/show_resto",
                          data:{id:id},
                          type: "POST",
                          dataType:'json',
                          success:function(data){
        
                             var data1=JSON.stringify(data); 
        
                             var obj = JSON.parse(data1);
                             
                               $("#show_resto_data").empty();
        
                                    
                            for(var i=0;i<obj.length;i++)
                            {
                                $("#show_resto_data").append(obj[i]);
                                // $("#total").html(obj[i].total);
        
                                
                            }
                            
                             
                          }
                             
                       })
        
    
                // window.location ='<?php echo base_url();?>restaurants/'+btoa(id);
            }
        </script>