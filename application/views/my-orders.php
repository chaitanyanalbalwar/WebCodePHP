<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

<style type="text/css">
   
.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #2eca33;
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c";
    padding-left:10px;
}

#progressbar li.active4:before,
#progressbar li.active4:after {
    background: #5bc0de;
}

#progressbar li.active4:before {
    font-family: FontAwesome;
    content: "\f00c";
    padding-left:10px;
}


#progressbar li.active5:before,
#progressbar li.active5:after {
    background: gray;
}

#progressbar li.active5:before {
    font-family: FontAwesome;
    content: "\f00c";
    padding-left:10px;
}


#progressbar li.active1:before,
#progressbar li.active1:after {
    background: #b52400;
}

#progressbar li.active1:before {
    font-family: FontAwesome;
    content: "\f00c";
    padding-left:10px;
}

#progressbar li.active2:before,
#progressbar li.active2:after {
    background: #ff9900;
}

#progressbar li.active2:before {
    font-family: FontAwesome;
    content: "\f00c";
    padding-left:10px;
}

#progressbar li.active3:before,
#progressbar li.active3:after {
    background: gray;
}

#progressbar li.active3:before {
    font-family: FontAwesome;
    content: "\f0d1";
    padding-left:10px;
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
 

.panel-order .row {
   border-bottom: 1px solid #ccc;
}
.panel-order .row:last-child {
   border: 0px;
}
.panel-order .row .col-md-1  {
   text-align: center;
   padding-top: 15px;
}
.panel-order .row .col-md-1 img {
   width: 50px;
   max-height: 50px;
}
.panel-order .row .row {
   border-bottom: 0;
}
.panel-order .row .col-md-11 {
   border-left: 1px solid #ccc;
}
.panel-order .row .row .col-md-12 {
   padding-top: 7px;
   padding-bottom: 7px; 
}
.panel-order .row .row .col-md-12:last-child {
   font-size: 11px; 
   color: #555;  
   background: #efefef;
}
.panel-order .btn-group {
   margin: 0px;
   padding: 0px;
}
.panel-order .panel-body {
   padding-top: 0px;
   padding-bottom: 0px;
}
.panel-order .panel-deading {
   margin-bottom: 0;
}                    

</style>
<div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="<?php echo base_url();?>" class="active">Home</a></li>
                     <li>My Orders</li>
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

<div class="panel panel-default panel-order">
  <div class="panel-heading">
      <strong>Current Order</strong>
      <!-- <div class="btn-group pull-right">
          <div class="btn-group">
         <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
           Filter history <i class="fa fa-filter"></i>
         </button>
         <ul class="dropdown-menu dropdown-menu-right">
           <li><a href="#">Approved orders</a></li>
           <li><a href="#">Pending orders</a></li>
         </ul>
        </div>
      </div> -->
  </div>
<div class="panel-body">
   <?php foreach($current_orders->result() as $val){
   
   $order_menus=order_menus($val->order_id);
$user=name($val->user_id);

   ?>
   
   
   
   

   <div class="row">
     <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail"></div>
     <div class="col-md-11">
      <div class="row">
                   <span>Order ID</span> <span class="label label-info"><strong><?php echo $val->order_id;?></strong></span>
                   <a href="#vieworder" data-resto="<?php $i=0; foreach($order_menus as $val1){$i++;
if($i==1)
echo $val1->restaurant_name;
}?>
" data-id="<?php echo $val->order_id;?>" id="order_summary" class="btn btn-info  btn-sm fa fa-file order_summary" data-toggle="modal"></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>load-map/<?php $i=0; foreach($order_menus as $val1){$i++;if($i==1)echo base64_encode($val1->restaurant_id);?>" class="btn btn-success">Track Order</a>
<br>


        <div class="col-md-6">
         <div class="pull-right">
             
            <?php 
            if($val->order_status==0){?>
               <span class="label label-warning">Placed</span>
               <?php } else if($val->order_status==1){?>
               <span class="label label-success">Confirmed</span>
               <?php } else if($val->order_status==2){?>
               <span class="label label-danger">Cancelled</span>
               <?php } else if($val->order_status==3){?>
               <span class="label label-info">Delivered</span>
               <?php } else if($val->order_status==4){?>
               <span class="label label-info">Food is Ready</span>
               <?php } else if($val->order_status==5){?>
               <span class="label label-info">Dispatched</span>
               <?php } ?></span> 
            </div>
        
        
<h5>Restaurant :                 <?php $i=0; foreach($order_menus as $val1){$i++;
if($i==1)
echo $val1->restaurant_name;
}?>
</h5>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <!--<th>Rate</th>-->
        <!--<th>Amount</th>-->
      </tr>
    </thead>
    <tbody>
                <?php foreach($order_menus as $val1){
                if(!empty($val1->variation))
                                 {
                                     $title_variation=" (".$val1->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }
                ?>

      <tr>
        <td><?php echo $val1->menu_name.$title_variation; ?></td>
        <td><?php echo $val1->qty; ?></td>
        <!--<td><?php echo ($val1->menu_price/$val1->qty); ?></td>-->
        <!--<td><?php echo $val1->menu_price; ?></td>-->
      </tr>
               <?php } ?>

      </tbody>
</table>
            
         


    <?php if($val->order_status==0 || $val->order_status==1){?>

     <!--<a data-placement="top" class="btn btn-danger  btn-xs fa fa-times" href="<?php echo base_url();?>cancel-order/<?php echo base64_encode($val->order_id); ?>" title="Cancel Order"></a>-->

      <?php } ?>
         <!-- <a data-placement="top" class="btn btn-info  btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a> -->
        </div>
        <div class="col-md-6">
            
            <p>Good choice</p>
            
        <div class="d-flex justify-content-center">
                <ul id="progressbar" class="text-center">
                     <?php if($val->order_status==0 ) {?>

                    <li class="active step0 "><span>Order Placed</span></li>
                    <li class="active5 step0 "><span>Order Confirmed</span></li>
                    <li class="active3 step0 "><span>Order Delivered</span></li>

               <?php }?>
               
               
               
                <?php if($val->order_status==1 || $val->order_status==4 || $val->order_status==5) {?>
                                    <li class="active step0 "><span>Order Placed</span></li>
                    <li class="active2 step0 "><span>Order Confirmed</span></li>
                                        <li class="active3 step0"><span>Order Delivered</span></li>


               <?php } ?>
               
               
               
               <?php if($val->order_status==2 ){?>
                    <li class="active step0 "><span>Order Placed</span></li>

                    <li class="active1 step0"><span>Order Cancelled</span></li>                    
                    <li class="active3 step0"><span>Order Delivered</span></li>

                    <?php }    ?>
                    
                    
                    
                    
                                   <?php if($val->order_status==3 ){?>
                    <li class="active step0 "><span>Order Placed</span></li>
                    <li class="active2 step0 "><span>Order Confirmed</span></li>
                    <li class="active4 step0"><span>Order Delivered</span></li>
                    <?php } ?>
                </ul>
                
                <!--<a href="<?php echo base_url();?>rate-review-order/<?php echo base64_encode($val->order_id);?>" data-resto="<?php echo $val1->restaurant_name;?>" data-id="<?php echo $val->order_id;?>" id="rating" class="btn btn-info  btn-sm fa fa-star rating" >&nbsp;Rate & Review Order</a>-->
        </div>
        
            </div>
        
                
        <div class="col-md-12">
         order made on: <?php echo date("d-m-Y h:i A",strtotime($val->order_created_at));?> 
        </div>
      </div>
     </div>
   </div>
<?php } ?>
    
</div>
<!-- <div class="panel-footer">Put here some note for example: bootdey si a gallery of free bootstrap snippets</div>
 -->
 </div>     
 </div>
                    <div class="row">
                   

<div class="panel panel-default panel-order">
  <div class="panel-heading">
      <strong>Order history</strong>
      <!-- <div class="btn-group pull-right">
          <div class="btn-group">
         <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
           Filter history <i class="fa fa-filter"></i>
         </button>
         <ul class="dropdown-menu dropdown-menu-right">
           <li><a href="#">Approved orders</a></li>
           <li><a href="#">Pending orders</a></li>
         </ul>
        </div>
      </div> -->
  </div>
<div class="panel-body">
   <?php
   $i=0;
   foreach($orders->result() as $val){
   $i++;
   if($i>=2){
   $order_menus=order_menus($val->order_id);
$user=name($val->user_id);

   ?>
   
   
   
   

   <div class="row">
     <div class="col-md-1"><img src="https://bootdey.com/img/Content/user_3.jpg" class="media-object img-thumbnail"></div>
     <div class="col-md-11">
      <div class="row">
                   <span>Order ID</span> <span class="label label-info"><strong><?php echo $val->order_id;?></strong></span>
                   <a href="#vieworder" data-id="<?php echo $val->order_id;?>" data-resto="<?php $i=0; foreach($order_menus as $val1){$i++;
if($i==1)
echo $val1->restaurant_name;
}?>
" id="order_summary" class="btn btn-info  btn-sm fa fa-file order_summary" data-toggle="modal"></a>
<br>


        <div class="col-md-6">
         <div class="pull-right">
             
            <?php 
            if($val->order_status==0){?>
               <span class="label label-warning">Placed</span>
               <?php } else if($val->order_status==1){?>
               <span class="label label-success">Confirmed</span>
               <?php } else if($val->order_status==2){?>
               <span class="label label-danger">Cancelled</span>
               <?php } else if($val->order_status==3){?>
               <span class="label label-info">Delivered</span>
               <?php } else if($val->order_status==4){?>
               <span class="label label-info">Food is Ready</span>
               <?php } else if($val->order_status==5){?>
               <span class="label label-info">Dispatched</span>
               <?php } ?></span> 
            </div>
        
       <h5>Restaurant :                 <?php $i=0; foreach($order_menus as $val1){$i++;
if($i==1)
echo $val1->restaurant_name;
}?>
</h5>
 

      <table class="table table-bordered">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <!--<th>Rate</th>-->
        <!--<th>Amount</th>-->
      </tr>
    </thead>
    <tbody>
                <?php foreach($order_menus as $val1){
                if(!empty($val1->variation))
                                 {
                                     $title_variation=" (".$val1->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }
                ?>

      <tr>
        <td><?php echo $val1->menu_name.$title_variation; ?></td>
        <td><?php echo $val1->qty; ?></td>
        <!--<td><?php echo ($val1->menu_price/$val1->qty); ?></td>-->
        <!--<td><?php echo $val1->menu_price; ?></td>-->
      </tr>
               <?php } ?>

      </tbody>
</table>
            
         


    <?php if($val->order_status==0 || $val->order_status==1){?>

     <!--<a data-placement="top" class="btn btn-danger  btn-xs fa fa-times" href="<?php echo base_url();?>cancel-order/<?php echo base64_encode($val->order_id); ?>" title="Cancel Order"></a>-->

      <?php } ?>
         <!-- <a data-placement="top" class="btn btn-info  btn-xs glyphicon glyphicon-usd" href="#" title="Danger"></a> -->
        </div>
        <div class="col-md-6">
                        <p>Good choice</p>

        <div class="d-flex justify-content-center">
                <ul id="progressbar" class="text-center">
                     <?php if($val->order_status==0 ) {?>

                    <li class="active step0 "><span>Order Placed</span></li>
                    <li class="active5 step0 "><span>Order Confirmed</span></li>
                    <li class="active3 step0 "><span>Order Delivered</span></li>

               <?php }?>
               
               
               
                <?php if($val->order_status==1 || $val->order_status==4 || $val->order_status==5) {?>
                                    <li class="active step0 "><span>Order Placed</span></li>
                    <li class="active2 step0 "><span>Order Confirmed</span></li>
                                        <li class="active3 step0"><span>Order Delivered</span></li>


               <?php } ?>
               
               
               
               <?php if($val->order_status==2 ){?>
                    <li class="active step0 "><span>Order Placed</span></li>

                    <li class="active1 step0"><span>Order Cancelled</span></li>                    
                    <li class="active3 step0"><span>Order Delivered</span></li>

                    <?php }    ?>
                    
                    
                    
                    
                                   <?php if($val->order_status==3 ){?>
                    <li class="active step0 "><span>Order Placed</span></li>
                    <li class="active2 step0 "><span>Order Confirmed</span></li>
                    <li class="active4 step0"><span>Order Delivered</span></li>
                    <?php } ?>
                </ul>
                            <!--<a href="<?php echo base_url();?>rate-review-order/<?php echo base64_encode($val->order_id);?>" data-resto="<?php echo $val1->restaurant_name;?>" data-id="<?php echo $val->order_id;?>" id="rating" class="btn btn-info  btn-sm fa fa-star rating" >&nbsp;Rate & Review Order</a>-->

        </div>
        
            </div>
        
                
        <div class="col-md-12">
         order made on: <?php echo date("d-m-Y h:i A",strtotime($val->order_created_at));?> 
        </div>
      </div>
     </div>
   </div>
<?php }} ?>
    
</div>
<!-- <div class="panel-footer">Put here some note for example: bootdey si a gallery of free bootstrap snippets</div>
 -->
 </div>                    


                     </div>
               </div>
            </section>
            <section class="app-section">
               <div class="app-wrap">
                  <div class="container">
                     <div class="row text-img-block text-xs-left">
                        <div class="container">
                           <div class="col-xs-12 col-sm-6 right-image text-center">
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
    <div id="vieworder" class="modal fade "> <!-- class modal and fade -->
      
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          
           <div class="modal-header"> <!-- modal header -->
            <button type="button" class="close" 
             data-dismiss="modal" aria-hidden="true">×</button>
			 
                    <h4 class="modal-title">View Order Summary - <span id="resto_name"></span></h4>
           </div>

                <div class="modal-body"> <!-- modal body -->
                                 <div class="row" >
                                    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody id="data">
        </tbody>
        </table>
                                    
                                 </div>

                                 <div class="row" id="rate">
                                    
                                    
                                 </div>
                                 
                                      <div class="modal-footer"> <!-- modal footer -->
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


      </div>

      </div> <!-- / .modal-content -->
      
    </div> <!-- / .modal-dialog -->
      
 </div><!-- / .modal -->
 
 
 
 
 <script>
 
 
 
 
     $(".order_summary").click(function(){
              var order_id = $(this).data('id');
                            var resto_name = $(this).data('resto');
$("#resto_name").html(resto_name);
                //$("#order_summary_view").empty(); 

              
                                $.ajax({
                                      url: "<?php echo base_url();?>home/order_summary_view",
                                      type: "POST",
                                      data:{order_id:order_id},
                                      dataType:'json',
                                      success:function(data){
                                          
                                          var data1=JSON.stringify(data); 

                                         var obj = JSON.parse(data1);
                                         
                                           $("#data").empty();
                                           $("#rate").empty();
                    
                                                
                                        for(var i=0;i<obj.length;i++)
                                        {
                                            
                                            $("#data").append(obj[i].data);
                                            $("#rate").html(obj[i].rate);
                    
                    
                                        }
                                      }
                                })
                                
     })
 </script>