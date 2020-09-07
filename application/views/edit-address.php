
<div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
                     <li>Edit Address</li>
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

            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              <form action="<?php echo base_url();?>update-address" method="post">
                                 <div class="row">
                                        <input type="hidden" name="id" value="<?php echo $address->id;?>">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Title</label>
                                       <input class="form-control" type="text" id="example-text-input" name="title" placeholder="Title" required="required" value="<?php echo $address->title;?>"> 
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Latitude</label>
                                       <input class="form-control" type="text" id="example-text-input-2" name="latitude" placeholder="Latitude" value="<?php echo $address->latitude;?>"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Longitude</label>
                                       <input name="longitude" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Longitude" value="<?php echo $address->longitude;?>"> 
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label for="exampleTextarea">Address</label>
                                       <textarea name="address" class="form-control" id="exampleTextarea" rows="3" required="required"><?php echo $address->address;?></textarea>
                                    </div>
                                 
                                    </div>
                                   
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <button type="submit" class="btn theme-btn">Save</button> </p>
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
                       <h4>Registration is fast, easy, and free.</h4>
                        <p>Once you"re registered, you can:</p>
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