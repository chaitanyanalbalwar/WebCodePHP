<!--header starts-->
<style>
        #custom-search-input{
    padding: 5px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
    
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
    height:45px;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    /*//border-left: solid 1px #ccc;*/
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    /*//border-left: solid 1px #ccc;*/
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}

</style>

        <!--  Start Header  -->
		<header id="header_area">
			<div class="header_top_area" id="header_top_area">
				<div class="container">
					<div class="row">
						 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
							<a class="logo"  href="https://www.menukart.in/"> 
														<img id="logo_pos" style="margin-top: -13px;width: 44%;" alt="" src="../images/ezgif-2-bff3321645bc.gif">

							</a> 
						</div><!--  End Col -->
						 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div id="custom-search-input">
                        <div class="input-group">
                            <span class="input-group-btn">
                        <button onclick="setLocation()"  class="btn btn-info btn-lg" type="button">
                            <i style="color:#FF4E02;font-size:15px" class="fa fa-map-marker">
                            <p id="location"> </p></i>
                            <input type="hidden" id="pincode" val="<?php echo $pincode;?>" name="pincode">
                        </button>
                    </span>
                    <input type="text" id="search_resto" class="form-control input-lg" placeholder="Search for products, brands & more" />
                    
                    

                </div>
                <div>
<div id="search_result"<div id="search_result" class="row" style="margin-left: -6px;width: 95%;flex-direction: column;margin-bottom: 30px;background-color: #fff;color: gray;display: none;z-index: 999;position: absolute;"> class="row" style="margin-left: -6px;/* z-index: 999; */width: 100%;flex-direction: column;margin-bottom: 30px;background-color: rgb(255, 255, 255);color: gray;display: none;">                        
                    </div>
                </div>
            </div>                        
            </div>						
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" style="margin-top:10px" id="login_cart">
                            
                            <!--<a style="margin-left:20px" href="<?php echo base_url();?>" class="btn btn-primary"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart</a>-->
                            <div style="margin-top:0px;float:right" class="menu_wrap">
								<div class="main-menu">
									<nav>
										<ul>
										    
										    <?php if($this->session->userdata('logged_in')!=true){?>
										    <li class="nav-item"> <a style="color: #fff;font-weight: bolder;font-size: 13px;" href="<?php echo base_url();?>login" class="">Login</a></li>

                            <?php } ?>

                             <?php if($this->session->userdata('logged_in')==true){?>
                             
                             <li class="nav-item"><a style="color: #fff;font-weight: bolder;font-size: 13px;" class="" href="#"><?php echo ucfirst($this->session->userdata('fname'))." ".ucfirst($this->session->userdata('lname')); ?> </a>
												<!-- Sub Menu -->
												<ul class="sub-menu">
													<li><a href="<?php echo base_url();?>my-orders">My Orders</a></li>
													<li><a href="<?php echo base_url();?>my-profile">My Profile</a></li>
													<li><a href="<?php echo base_url();?>my-address">My Address</a></li>
													<li><a href="<?php echo base_url();?>sign-out">Sign Out</a></li>
												</ul>
											</li>

                            <?php } ?>
                            <li class="nav-item">
											<div class="cart_menu_area">
<div class="cart_icon">
													<a href="#" style=""><i style="/* width: 82%; *//* border-color: #fff; *//* background-color: #fff; */color: #fff;" class="fa fa-bell fa-lg" aria-hidden="true"></i></a>
													<span class="cart_number1" style="color:white"></span>
												</div>
												
												
												<!-- Mini Cart Wrapper -->
												<div class="mini-cart-wrapper">
													<!-- Product List -->
														<div class="mc-sin-pro fix">
														    
														  <?php if($this->session->userdata('logged_in')==true){?>
                                                                    <p>No new notifications</p>
														<?php } else { ?>
														<p>Please login to get notified about best offers for you.</p>
														<?php } ?>
													
													</div>
													<!-- Sub Total -->
													<div class="mc-subtotal fix">
													</div>
													<!-- Cart Button -->
													<div class="mc-button">
													</div>
											</div>	
												</div>
												</li>
										    
                                    <li class="nav-item">
											<div class="cart_menu_area">
												<div class="cart_icon">
													<a href="#" style=""><i style="color:#fff" class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i></a>
													<span class="cart_number" style="color:white"></span>
												</div>
												
												
												<!-- Mini Cart Wrapper -->
												<div class="mini-cart-wrapper">
													<!-- Product List -->
														<div class="mc-sin-pro fix" id="showcartdiv">
														
													
													</div>
													<!-- Sub Total -->
													<div class="mc-subtotal fix">
														<h4>Subtotal <span id="total1" style="float:right"></span></h4>												
													</div>
													<!-- Cart Button -->
													<div class="mc-button">
														<a style="display:none" href="<?php echo base_url();?>checkout" id="checkout_btn" class="checkout_btn">checkout</a>
													</div>
											</div>	
											</div>
										</li>
                                    </ul>
                                    </nav>
                                    </div>
                                        
                                    </div>
                        </div>

					</div>
				</div>
			</div> <!--  HEADER START  -->
		</header>
		
		<style>
		    .header_height_mob{
		        height:232px;
		    }
		    		    .header_height_web{
		        height:75px;
		    }

		</style>
		
		       <!--  Start Header  -->
		<header id="header_area_for_mobile">
			<div class="header_top_area" id="header_top_area_for_mobile">
				<div class="container">
					<div class="row">
						 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
							<a class="logo"  href="#"> 
														<img id="logo_pos" style="margin-top: 5px;width: 40%;margin-left:100px" alt="" src="../images/ezgif-2-bff3321645bc.gif">

							</a> 
						</div><!--  End Col -->
						 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" style="margin-top:10px">
                        <div id="custom-search-input">
                        <div class="input-group">
                            <span class="input-group-btn">
                        <button onclick="setLocation()"  class="btn btn-info btn-lg" type="button">
                            <i style="color:#FF4E02;font-size:15px" class="fa fa-map-marker">
                            <p id="location"> </p></i>
                            <input type="hidden" id="pincode" val="<?php echo $pincode;?>" name="pincode">
                        </button>
                    </span>
                    <input type="text" id="search_resto" class="form-control input-lg" placeholder="Search for products, brands & more" />
                    
                    

                </div>
                <div>
<div id="search_result"<div id="search_result" class="row" style="margin-left: -6px;width: 95%;flex-direction: column;margin-bottom: 30px;background-color: #fff;color: gray;display: none;z-index: 999;position: absolute;"> class="row" style="margin-left: -6px;/* z-index: 999; */width: 100%;flex-direction: column;margin-bottom: 30px;background-color: rgb(255, 255, 255);color: gray;display: none;">                        
                    </div>
                </div>
            </div>                        
            </div>						
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3" style="margin-top:10px;margin-left:100px" id="login_cart">
                            
                            <!--<a style="margin-left:20px" href="<?php echo base_url();?>" class="btn btn-primary"><i class="fa fa-shopping-bag " aria-hidden="true"></i> Cart</a>-->
                            <div style="margin-top:0px;float:left" class="menu_wrap">
								<div class="main-menu">
									<nav>
										<ul>
										    
										    <?php if($this->session->userdata('logged_in')!=true){?>
										    <li class="nav-item"> <a style="color: #fff;" href="<?php echo base_url();?>login" class="">Login</a></li>

                            <?php } ?>

                             <?php if($this->session->userdata('logged_in')==true){?>
                             
                             <li class="nav-item"><a style="color: #fff;" class="" href="#"><?php echo ucfirst($this->session->userdata('fname'))." ".ucfirst($this->session->userdata('lname')); ?> </a>
												<!-- Sub Menu -->
												<ul class="sub-menu">
													<li><a href="<?php echo base_url();?>my-orders">My Orders</a></li>
													<li><a href="<?php echo base_url();?>my-profile">My Profile</a></li>
													<li><a href="<?php echo base_url();?>my-address">My Address</a></li>
													<li><a href="<?php echo base_url();?>sign-out">Sign Out</a></li>
												</ul>
											</li>

                            <?php } ?>
                            <li class="nav-item">
											<div class="cart_menu_area">
<div class="cart_icon">
													<a href="#"><i style="/* width: 82%; *//* border-color: #fff; *//* background-color: #fff; */color: #fff;" class="fa fa-bell fa-lg" aria-hidden="true"></i></a>
													<span class="cart_number1" style="color:white"></span>
												</div>
												
												
												<!-- Mini Cart Wrapper -->
												<div class="mini-cart-wrapper">
													<!-- Product List -->
														<div class="mc-sin-pro fix">
														    
														  <?php if($this->session->userdata('logged_in')==true){?>
                                                                    <p>No new notifications</p>
														<?php } else { ?>
														<p>Please login to get notified about best offers for you.</p>
														<?php } ?>
													
													</div>
													<!-- Sub Total -->
													<div class="mc-subtotal fix">
													</div>
													<!-- Cart Button -->
													<div class="mc-button">
													</div>
											</div>	
												</div>
												</li>
										    
                                    <li class="nav-item">
											<div class="cart_menu_area">
												<div class="cart_icon">
													<a href="#"><i style="color:#fff" class="fa fa-shopping-bag fa-lg" aria-hidden="true"></i></a>
													<span class="cart_number" style="color:white"></span>
												</div>
												
												
												<!-- Mini Cart Wrapper -->
												<div class="mini-cart-wrapper">
													<!-- Product List -->
														<div class="mc-sin-pro fix" id="showcartdiv">
														
													
													</div>
													<!-- Sub Total -->
													<div class="mc-subtotal fix">
														<h4>Subtotal <span id="total1" style="float:right"></span></h4>												
													</div>
													<!-- Cart Button -->
													<div class="mc-button">
														<a style="display:none" href="<?php echo base_url();?>checkout" id="checkout_btn" class="checkout_btn">checkout</a>
													</div>
											</div>	
											</div>
										</li>
                                    </ul>
                                    </nav>
                                    </div>
                                        
                                    </div>
                        </div>

					</div>
				</div>
			</div> <!--  HEADER START  -->
		</header>
		
		<script>
		    		    if ($(window).width() < 600) {
		        
                                $("#header_area").css('display','none');
                                $("#header_area_for_mobile").css('display','block');

		                        $("#header_top_area_for_mobile").addClass('header_height_mob');
		                        $("#header_top_area_for_mobile").removeClass('header_height_web');
		    		    }
		    		    else
		    		    {
		    		            $("#header_area").css('display','block');
                                $("#header_area_for_mobile").css('display','none');
                                
                                $("#header_top_area").removeClass('header_height_mob');
		                        $("#header_top_area").addClass('header_height_web');

   
		    		    }
		</script>