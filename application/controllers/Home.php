<?php
// include_once('easebuzz-lib/easebuzz_payment_gateway.php');

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	        public function __construct()
        {
                error_reporting(0);
               // session.auto_start = 0;
                parent::__construct();
                $this->load->library('session');
                // Your own constructor code

        }

	public function index()
	{

		$data['restaurant'] = $this->home_model->fetch_restaurants_categorywise();
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('home',$data);
		$this->load->view('includes/footer');
	}
	
		public function cancellation_and_refund()
	{
	    $this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('cancellation_and_refund');
		$this->load->view('includes/footer');

	}
	
			public function terms_and_conditions()
	{
	    $this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('terms_conditions');
		$this->load->view('includes/footer');

	}
	
	public function privacy_policy()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('privacy_policy');
		$this->load->view('includes/footer');
	}
	public function faq()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('faq');
		$this->load->view('includes/footer');
	}
	
		public function about()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('about');
		$this->load->view('includes/footer');
	}
	
	public function rate_review_order()
	{
	    $order_id=base64_decode($this->uri->segment(2));
	   // $data['restaurant'] = $this->home_model->fetch_restaurants();
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('rating');
		$this->load->view('includes/footer');

	}
	
	public function register_your_business()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('register-your-business');
		$this->load->view('includes/footer');
	}
	public function checkout()
	{
	           // include_once('easebuzz-lib/easebuzz_payment_gateway.php');

		$resto_id = $this->home_model->fetch_session_cart_resto_id();
		
		$data['resto_address'] = $this->home_model->fetch_resto_address($resto_id);
				$data['discounts'] = $this->home_model->fetch_resto_dicsounts($resto_id);


		$data['address'] = $this->home_model->fetch_primary_address($this->session->userdata('user_id'),'address');
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('checkout',$data);
		$this->load->view('includes/footer');
	}
	public function contact()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('contact');
		$this->load->view('includes/footer');
	}

	public function foods()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('foods');
		$this->load->view('includes/footer');
	}
	public function restaurants_registration()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('restaurants-registration');
		$this->load->view('includes/footer');
	}
	
	public function restaurants()
	{
  		$id =  base64_decode($this->uri->segment(2));
  		// echo $this->uri->segment(2);die;
//		$data['restaurant'] = $this->home_model->fetch_restaurants_categorywise($id);
		$data['category'] = $this->home_model->fetch_categories();


		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('restaurants',$data);
		$this->load->view('includes/footer');
	}

	public function user_registration()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('user-registration');
		$this->load->view('includes/footer');
	}

	public function menu()
	{
		$restaurant_id=base64_decode($this->uri->segment(2));
// 		$category_id=base64_decode($this->uri->segment(3));

		$data['restaurant'] = $this->home_model->fetch_restaurant_idwise($restaurant_id);
// 		$data['menus'] = $this->home_model->fetch_menu_categorywise($category_id,$restaurant_id);
		$data['category'] = $this->home_model->fetch_categories_resto_wise($restaurant_id);
// 		$data['session_cart'] = $this->home_model->fetch_session_cart_data();


		$data['discounts'] = $this->home_model->fetch_resto_dicsounts($restaurant_id);

		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('menu',$data);
		$this->load->view('includes/footer');
	}
	
	public function load_map()
	{
		$restaurant_id=base64_decode($this->uri->segment(2));
		$data['restaurant'] = $this->home_model->fetch_restaurant_idwise($restaurant_id);
// 		$this->load->view('includes/header');
// 		$this->load->view('includes/top_navbar');
		$this->load->view('map',$data);
// 		$this->load->view('includes/footer');
	}
	
	public function show_menu_categorywise()
	{
		$restaurant_id=$this->input->post('restaurant_id');
		$category_id=$this->input->post('category_id');
        		$veg=$this->input->post('veg');
		


		$menus = $this->home_model->fetch_menu_categorywise($category_id,$restaurant_id,$veg);
		
		$count=0;
		$json_data=array();
                              foreach ($menus as $value) {
                                  
                                
                                 if($value->variation=='on')
                                {
                                    $variation=1;
                                }
                                else
                                {
                                    $variation=0;
                                }
                                
                                
                                        $category_timing = $this->home_model->fetch_category_timing($value->menu_categoryid);
        
                                        date_default_timezone_set("Asia/Kolkata");
                                        if(!empty($category_timing))
                                        {
                                            foreach($category_timing as $val)
                                            {
                                                if(strtotime(date("H:i")) > strtotime($val->category_timing_from) && strtotime(date("H:i")) < strtotime($val->category_timing_to))
                                                {
                                                    $category_timing_status='';
                                                }
                                                else
                                                {
                                                    $category_timing_status='Not available at this moment';
                                                }
                                            }
                                        }
                                        else 
                                        {
                                            $category_timing_status='';
                                        }

                                
                                
                                if($category_timing_status=='')
                                {
                                    if($value->menu_status=='Available')
                                    {
                                        $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">₹   '. $value->menu_price.'</span> <a onclick="add('.$restaurant_id.','.$value->menu_id.','.$category_id.','.$variation.')" style="color:#fff" class="btn btn-small btn btn-secondary pull-right add">ADD</a> </div>';
                                    }
                                    else
                                    {
                                        $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right"><span class="label label-info">'.$value->menu_status.'</span></div>';
                                    }
                                }
                                else
                                {
                                    $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right"><span class="label label-info">'.$category_timing_status.'</span></div>';

                                }
                                
                                if($value->menu_logo=='')
                                {
                                    $img='';
                                }
                                else
                                {
                                    $img='<img src="../uploads/menu/'.$value->menu_logo.'" alt="Food logo">';
                                }
                                

                                 $count++;
                                 if($count%2==0){
                                     
                                     $div='<div class="food-item white">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" >'.$img.'</a>
                                    </div>
                                    <div class="rest-descr">
                                       <h6><a >'.$value->menu_name.'</a></h6>
                                       <p>'.$value->menu_foodtype.'</p>
                                       <p>'.$value->menu_description.'</p>
                                    </div>
                                 </div>
                                '.$adddiv.'
                              </div>
                           </div>';
                            array_push($json_data,$div);

                                 }
                                 else
                                 {
                                     
                                     $div='<div class="food-item">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" >'.$img.'</a>
                                    </div>
                                    <div class="rest-descr">
                                       <h6><a >'.$value->menu_name.'</a></h6>
                                       <p>'.$value->menu_foodtype.'</p>
                                       <p>'.$value->menu_description.'</p>
                                    </div>
                                 </div>
'.$adddiv.'                              </div>
                           </div>';
                            array_push($json_data,$div);

                                     
                                 }
                              }

				echo json_encode($json_data);

	}


    public function show_menu_veg_only()
	{
	    
	    
		$restaurant_id=$this->input->post('restaurant_id');
		$category_id=$this->input->post('category_id');
	    $veg=$this->input->post('veg');

            
		$menus = $this->home_model->fetch_menu_veg_only($category_id,$restaurant_id,$veg);
		
		$count=0;
		$json_data=array();
                              foreach ($menus as $value) {
                                  
                                
                                 if($value->variation=='on')
                                {
                                    $variation=1;
                                }
                                else
                                {
                                    $variation=0;
                                }
                                
                                                                        $category_timing = $this->home_model->fetch_category_timing($value->menu_categoryid);
        
                                        date_default_timezone_set("Asia/Kolkata");
                                        if(!empty($category_timing))
                                        {
                                            foreach($category_timing as $val)
                                            {
                                                if(strtotime(date("H:i")) > strtotime($val->category_timing_from) && strtotime(date("H:i")) < strtotime($val->category_timing_to))
                                                {
                                                    $category_timing_status='';
                                                }
                                                else
                                                {
                                                    $category_timing_status='Not available at this moment';
                                                }
                                            }
                                        }
                                        else 
                                        {
                                            $category_timing_status='';
                                        }

                                
                                if($category_timing_status=='')
                                {
                                    if($value->menu_status=='Available')
                                    {
                                        $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">₹   '. $value->menu_price.'</span> <a onclick="add('.$restaurant_id.','.$value->menu_id.','.$category_id.','.$variation.')" style="color:#fff"  class="btn btn-small btn btn-secondary pull-right add">ADD</a> </div>';
                                    }
                                    else
                                    {
                                        $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right"><span class="label label-info">'.$value->menu_status.'</span></div>';
                                    }
                                }
                                else
                                {
                                    $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right"><span class="label label-info">'.$category_timing_status.'</span></div>';

                                }
                                
                                if($value->menu_logo=='')
                                {
                                    $img='';
                                }
                                else
                                {
                                    $img='<img src="../uploads/menu/'.$value->menu_logo.'" alt="Food logo">';
                                }
                                

                                 $count++;
                                 if($count%2==0){
                                     
                                     $div='<div class="food-item white">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" >'.$img.'</a>
                                    </div>
                                    <div class="rest-descr">
                                       <h6><a >'.$value->menu_name.'</a></h6>
                                       <p>'.$value->menu_foodtype.'</p>
                                       <p>'.$value->menu_description.'</p>
                                    </div>
                                 </div>
                                '.$adddiv.'
                              </div>
                           </div>';
                            array_push($json_data,$div);

                                 }
                                 else
                                 {
                                     
                                     $div='<div class="food-item">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" >'.$img.'</a>
                                    </div>
                                    <div class="rest-descr">
                                       <h6><a >'.$value->menu_name.'</a></h6>
                                       <p>'.$value->menu_foodtype.'</p>
                                       <p>'.$value->menu_description.'</p>
                                    </div>
                                 </div>
'.$adddiv.'                              </div>
                           </div>';
                            array_push($json_data,$div);

                                     
                                 }
                              }

				echo json_encode($json_data);

	}
	
	
	public function show_menu_searchwise()
	{
		$restaurant_id=$this->input->post('restaurant_id');
		$category_id=$this->input->post('category_id');
		$query=$this->input->post('query');
	    $veg=$this->input->post('veg');
        


		$menus = $this->home_model->fetch_menu_searchwise($category_id,$restaurant_id,$query,$veg);
		
		$count=0;
		$json_data=array();
                              foreach ($menus as $value) {
                                  if($value->variation==0 || $value->variation=='')
                                {
                                    $variation=0;
                                }
                                else if($value->variation=='on')
                                {
                                    $variation=1;
                                }
                                
                                                                        $category_timing = $this->home_model->fetch_category_timing($value->menu_categoryid);
        
                                        date_default_timezone_set("Asia/Kolkata");
                                        if(!empty($category_timing))
                                        {
                                            foreach($category_timing as $val)
                                            {
                                                if(strtotime(date("H:i")) > strtotime($val->category_timing_from) && strtotime(date("H:i")) < strtotime($val->category_timing_to))
                                                {
                                                    $category_timing_status='';
                                                }
                                                else
                                                {
                                                    $category_timing_status='Not available at this moment';
                                                }
                                            }
                                        }
                                        else 
                                        {
                                            $category_timing_status='';
                                        }

                                
                                if($category_timing_status=='')
                                {
                                    if($value->menu_status=='Available')
                                    {
                                        $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">₹   '. $value->menu_price.'</span> <a onclick="add('.$restaurant_id.','.$value->menu_id.','.$category_id.','.$variation.')" style="color:#fff"  class="btn btn-small btn btn-secondary pull-right add">ADD</a> </div>';
                                    }
                                    else
                                    {
                                        $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right"><span class="label label-info">'.$value->menu_status.'</span></div>';
                                    }
                                }
                                else
                                {
                                    $adddiv='<div class="col-xs-12 col-sm-12 col-lg-4 pull-right"><span class="label label-info">'.$category_timing_status.'</span></div>';

                                }
                                
                                if($value->menu_logo=='')
                                {
                                    $img='';
                                }
                                else
                                {
                                    $img='<img src="../uploads/menu/'.$value->menu_logo.'" alt="Food logo">';
                                }
                                
                                 $count++;
                                 if($count%2==0){
                                     
                                     $div='<div class="food-item white">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" >'.$img.'</a>
                                    </div>
                                    <div class="rest-descr">
                                       <h6><a >'.$value->menu_name.'</a></h6>
                                       <p>'.$value->menu_foodtype.'</p>
                                       <p>'.$value->menu_description.'</p>
                                    </div>
                                 </div>
'.$adddiv.'                              </div>
                           </div>';
                            array_push($json_data,$div);

                                 }
                                 else
                                 {
                                     
                                     $div='<div class="food-item">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" >'.$img.'</a>
                                    </div>
                                    <div class="rest-descr">
                                       <h6><a >'.$value->menu_name.'</a></h6>
                                       <p>'.$value->menu_foodtype.'</p>
                                       <p>'.$value->menu_description.'</p>
                                    </div>
                                 </div>
'.$adddiv.'                              </div>
                           </div>';
                            array_push($json_data,$div);

                                     
                                 }
                              }

				echo json_encode($json_data);

	}

	
	
	public function show_cart()
	{
	    $session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                           $json_data1=array();
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                 
                                  $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }

                           $div='<div class="order-row bg-white" style="margin-top:-17px;margin-bottom:-44px;">
                              <div class="widget-body">
                                 <div class="title-row">'.$value->menu_name.$title_variation.'
                                 <a  onclick="delete_from_cart('.$value->restaurant_id.','.$value->menu_id.','.$value->id.')"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-2">
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="minusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <div class="col-xs-3">

                                       <input readonly style="text-align: center;" class="form-control plus_minus_qty" type="text" value="'.$value->qty.'" data-session="'.$value->id.'" data-menu="'.$value->menu_id.'" min="1" id="plus_minus_qty"> 
                                                                           </div>
                                                                                                               <div class="col-xs-2">

                                                                           
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="plusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-plus"></i></a>

                                    </div>
                                    <div class="col-xs-4">
                                       <p style="float: right;">₹   <b id="price'.$value->id.'">'.$value->menu_price.'</b></p>

                                    </div>
                                    
                                 </div>
                              </div>
                           </div>';
                           
                        //   $cgst=2.5/100 * $total;
                        //   $sgst=2.5/100 * $total;
                        
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;

                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }
                        
                        


                                $json_data=array('total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div,'delivery_charge'=>$charges);
                                                       array_push($json_data1,$json_data);

                              }
                        // $json_data=array('total'=>$total,'div'=>$divarr);
		
		echo json_encode($json_data1);

	}
	
	
	public function show_cart_div()
	{
	    $session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                           $json_data1=array();
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                  $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }

                           $div='<div class="mc-sin-pro fix">
															<div class="mc-pro-details fix">
																<a href="#">'.$value->menu_name.$title_variation.'</a>
																<span> - ₹   '.$value->menu_price.'</span>
															</div>
														</div>';
                           
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;

                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }
                        
                         


                                $json_data=array('total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div,'delivery_charge'=>$charges);
                                                       array_push($json_data1,$json_data);

                              }

		echo json_encode($json_data1);

	}

	
	

	public function add_to_cart()
	{
	    
	    if($this->input->post('delete_session')==1)
	    {
	        $session_cart = $this->home_model->fetch_session_cart_data();

            foreach ($session_cart as $value) 
            {
            	$result=$this->home_model->delete_data($value->id,'session_cart');
            }
	    }
	    
		$menu_id=$this->input->post('menu_id');
		
		$variation_id=$this->input->post('variation_id');
		
		if($variation_id==0)
		{
		        $check=$this->home_model->check_item_exist($this->input->post('restaurant_id'),$this->input->post('menu_id'));
		        $variation='';
		}
		else
		{
		    	$check=$this->home_model->check_item_exist_with_variation($this->input->post('restaurant_id'),$this->input->post('menu_id'),$variation_id);
		    	$variation=$this->home_model->fetch_variation_name($variation_id);
		}
		
		$cgst=$this->home_model->fetch_cgst($this->input->post('restaurant_id'));
		$sgst=$this->home_model->fetch_sgst($this->input->post('restaurant_id'));

        $menu_name=$this->home_model->fetch_menu_name($menu_id);
        $menu_variation_price=$this->home_model->fetch_variation_menu_price($variation_id,$menu_id);
        $menu_price=$this->home_model->fetch_menu_price($menu_id);



        if($variation=='')
        {
            $session_cgst=$cgst/100 * $menu_price;
            $session_sgst=$sgst/100 * $menu_price;
            $menu_name=$menu_name;
            $menu_price=$menu_price;
        }
        else if($variation!='')

        {
            $session_cgst=$cgst/100 * $menu_variation_price;
            $session_sgst=$sgst/100 * $menu_variation_price;
            $menu_name=$menu_name;
            $menu_price=$menu_variation_price;
        }

        if($check==0)
        {
		$data = array(
			'restaurant_id' => $this->input->post('restaurant_id'),
			'menu_id' => $this->input->post('menu_id'),
			'menu_name'=>$menu_name,
			'menu_price'=>$menu_price,
			'qty' => 1,
			'cgst' => $session_cgst,
			'sgst' => $session_sgst,
			'session_id'=>session_id(),
			'variation' => $variation
			);
		$result=$this->home_model->insert_data($data,'session_cart');
        }
        else
        {
            $result=$this->home_model->update_session_cart($this->input->post('restaurant_id'),$this->input->post('menu_id'));

        }
		
		
		
		$session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                           $json_data1=array();
                           
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                 
                                 $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                     $variation=$value->variation;
                                 }
                                 else
                                 {
                                     $title_variation='';
                                     $variation=0;
                                 }

                           $div='<div class="order-row bg-white" style="margin-top:-17px;margin-bottom:-44px;">
                              <div class="widget-body">
                                 <div class="title-row">'.$value->menu_name.$title_variation.'
                                 <a  onclick="delete_from_cart('.$value->restaurant_id.','.$value->menu_id.','.$value->id.')"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-2">
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="minusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <div class="col-xs-3">

                                       <input readonly class="form-control plus_minus_qty" style="text-align: center;" type="text" value="'.$value->qty.'" data-session="'.$value->id.'" data-menu="'.$value->menu_id.'" min="1" id="plus_minus_qty"> 
                                                                           </div>
                                                                                                               <div class="col-xs-2">

                                                                           
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="plusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-plus"></i></a>

                                    </div>
                                    <div class="col-xs-4">
                                       <p style="float: right;">₹   <b id="price'.$value->id.'">'.$value->menu_price.'</b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>';
//  $cgst=2.5/100 * $total;
//                           $sgst=2.5/100 * $total;
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;

                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }
                        
                        

                                $json_data=array('delivery_charge'=>$charges,'total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div,'restaurant_id'=>$this->input->post('restaurant_id'));
                                                                                 array_push($json_data1,$json_data);

                              }
                        // $json_data=array('total'=>$total,'div'=>$divarr);
		
		echo json_encode($json_data1);


	}
	public function delete_from_cart()
	{
		$id=$this->input->post('id');

		$result=$this->home_model->delete_data($id,'session_cart');
				// $this->session->set_flashdata('success','item deleted from cart.');
				
	$session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                           $json_data1=array();
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                 
                                  $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }

                           $div='<div class="order-row bg-white" style="margin-top:-17px;margin-bottom:-44px;">
                              <div class="widget-body">
                                 <div class="title-row">'.$value->menu_name.$title_variation.'
                                 <a   onclick="delete_from_cart('.$value->restaurant_id.','.$value->menu_id.','.$value->id.')"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-2">
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="miusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <div class="col-xs-3">

                                       <input style="text-align: center;" readonly class="form-control plus_minus_qty" type="text" value="'.$value->qty.'" data-session="'.$value->id.'" data-menu="'.$value->menu_id.'" min="1" id="plus_minus_qty"> 
                                                                           </div>
                                                                                                               <div class="col-xs-2">

                                                                           
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="plusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-plus"></i></a>

                                    </div>
                                    <div class="col-xs-4">
                                       <p style="float: right;">₹   <b id="price'.$value->id.'">'.$value->menu_price.'</b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>';
//  $cgst=2.5/100 * $total;
//                           $sgst=2.5/100 * $total;
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;

                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }
                        
                        


                                $json_data=array('delivery_charge'=>$charges,'total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div);
                                                                                 array_push($json_data1,$json_data);

                              }
                        // $json_data=array('total'=>$total,'div'=>$divarr);
		
		echo json_encode($json_data1);
			

	}

	public function process_user_registration()
	{
	    $otp= $this->input->post('otp');

		if($this->session->userdata('otp')!=$otp)
		{
			echo 0;
		}
		else
		{
    		$data = array(
    			'fname' => $this->input->post('fname'),
    			'lname' => $this->input->post('lname'),
    			'email' => $this->input->post('email'),
    			'mobileno' => $this->input->post('mobileno'),
    
    			);
    		$result=$this->home_model->insert_data($data,'users');
    		$this->session->set_flashdata('success','User registered successfully.');
    		
    		$result=$this->home_model->fetch_user_data_nowise($this->input->post('mobileno'));

			$userdata = array( 
			   'fname'  => $result->fname, 
			   'lname'     => $result->lname,
			   'mobileno'     => $result->mobileno, 
			   'email'     => $result->email, 
			   'address'     => $result->address, 
 			   'user_id'     => $result->user_id, 
			   'logged_in' => true
			);  

			$this->session->set_userdata($userdata);
			$this->session->unset_userdata('otp');


            echo 1;
		}
		
        

	}

	public function login()
	{
	    if($this->session->userdata('logged_in')==true)
	    {
	        redirect('home');
	    }
	    else
	    {
	                $this->load->library('facebook'); 

	                    $data['authURL'] =  $this->facebook->login_url(); 

    		$this->load->view('includes/header');
    		$this->load->view('includes/top_navbar');
    		$this->load->view('login',$data);
    		$this->load->view('includes/footer');
	    }
	}

	public function process_login()
	{
        // error_reporting(0);
		$mobileno= $this->input->post('mobileno');
		$password= md5($this->input->post('password'));			
		$result1=$this->home_model->login($mobileno,$password,'users');
		
// 		print_r($_POST);die;

		if($result1==false)
		{
			redirect('login');
		}
		else
		{
			$result=$this->home_model->fetch_user_data($mobileno,$password,'users');

			$userdata = array( 
			   'fname'  => $result->fname, 
			   'lname'     => $result->lname,
			   'mobileno'     => $result->mobileno, 
			   'email'     => $result->email, 
			   'address'     => $result->address, 
 			   'user_id'     => $result->user_id, 
			   'logged_in' => true
			);  

			$this->session->set_userdata($userdata);
			

			redirect('home');


		}
	}

	public function sign_out()
	{
		$this->session->sess_destroy();
        redirect('home');
	}

	public function process_order()
	{
		$payment=$this->input->post('payment');
		$total=$this->input->post('total');
		$charges=$this->input->post('charges');
		$cgst=$this->input->post('cgst');
		$sgst=$this->input->post('sgst');
// 		$delivery_address=$this->input->post('address');
		$ordertype=$this->session->userdata('ordertype');
		$totalall=$this->input->post('totalall');
		
		if($this->session->userdata('coupon')!='')
		{
		    $discount_amount=$this->session->userdata('discount_amount');
		    $coupon=$this->session->userdata('coupon');
		}
		else
		{
		   $discount_amount=0; 
		   $coupon='';
		}

        if($ordertype=='delivery')
        {
            $delivery_address=$this->input->post('address');
                  $charges=$this->input->post('charges');
        

            

        }
        else
        {
            $resto_id = $this->home_model->fetch_session_cart_resto_id();
		    $delivery_address = $this->home_model->fetch_resto_address($resto_id);
		    		$charges=0;


        }
        
        date_default_timezone_set('Asia/Kolkata');
        
        
        $discount_totalall=$totalall-$discount_amount;
        
        if($discount_totalall < 0)
        {
            $discount_totalall=0;
        }

		if($payment=='on_delivery')
		{
			$data = array(
			'user_id' => $this->session->userdata('user_id'),
			'amount' => $total,
			'charges' => $charges,
			'payment_type' => 'Cash on delivery',
			'status' => 'success',
			'cgst' => $cgst,
            'sgst' => $sgst,
            'discount_amount'=>$discount_amount,
            'coupon'=>$coupon,
            'totalall' => $discount_totalall,
            'delivery_address' => $delivery_address,
            'ordertype' => $ordertype,
            'order_created_at'=>date("Y-m-d H:i:s"),
			);
			
// 			print_r($_POST);
			
// 			print_r($data);die;
			

			$order_id=$this->home_model->insert_data($data,'orders');

			$session_cart = $this->home_model->fetch_session_cart_data();

            foreach ($session_cart as $value) 
            {
            	$data1 = array(
				'order_id' => $order_id,
				'restaurant_id' => $value->restaurant_id,
				'menu_id' => $value->menu_id,
				'menu_name' => $value->menu_name,
				'menu_price' => $value->menu_price,
				'qty' => $value->qty,
				'cgst'=>$value->cgst,
				'sgst'=>$value->sgst,
				'menu_variation'=>$value->variation

				);
				

				$result1=$this->home_model->insert_data($data1,'order_menus');

				$result=$this->home_model->delete_data($value->id,'session_cart');


            }
            
            
            //$msg_total=$totalall - $discount_amount;
            
            //order places user message
            
            if($ordertype=='delivery')
            {
                $msg=urlencode("Thank you for ordering from Menukart. Your cash on delivery order (order id: $order_id) of Rs. $discount_totalall is received. You will get a confirmation SMS once your order is accepted.");
            }
            else
            {
                $msg=urlencode("Thank you for ordering from Menukart. Your cash on delivery order (order id: $order_id) of Rs. $discount_totalall is received. You will get a confirmation SMS once your order is accepted.");
            }
            $mobileno=$this->session->userdata('mobileno');
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                              CURLOPT_URL => "http://sms.menukart.shop/api/sendhttp.php?authkey=ZTA0MjNhNjE5NGE&mobiles=".$mobileno."&message=".$msg."&sender=AMBICA&type=1&route=2",

            //   CURLOPT_URL => "http://49.50.67.32/smsapi/httpapi.jsp?username=MENUKT03&password=MENUKT@456&from=ALERTS&to=".$mobileno."&text=".$msg."&coding=0",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "Cookie: JSESSIONID=8AEF8783B90D09B957E38310C9D0317A"
              ),
            ));
            
            $response = curl_exec($curl);
        
            curl_close($curl);

            
            
            		$this->session->set_flashdata('success','Order placed successfully.');
            		$this->session->unset_userdata('ordertype');
            		$this->session->unset_userdata('discount_amount');
            		$this->session->unset_userdata('coupon');


			redirect('my-orders');

			
		}
		else if($payment=='easebuzz')
		{
        include_once('easebuzz-lib/easebuzz_payment_gateway.php');
		$MERCHANT_KEY = "V5NL6J8PGO";
        $SALT = "E3DQXG7Q9X";
       // $ENV = "test";    // setup test enviroment (testpay.easebuzz.in).
        $ENV = "prod";   // setup production enviroment (pay.easebuzz.in).
               // $sub_merchant_id = "S24714ZNJH";

        $payment_session_data=array(
            'total' => $total,
                'sgst' => $sgst,
                'cgst' => $sgst,
                'charges' => $charges,
                'delivery_address' => $delivery_address,
                'ordertype'=>$ordertype,
                            'discount_amount'=>$discount_amount,
            'coupon'=>$coupon,

            );
            
            $this->session->set_userdata($payment_session_data);
 
        $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);
			    $postData = array ( 
		        "txnid" => uniqid(),
		        "amount" => sprintf("%.2f",$discount_totalall), 
		        "firstname" => $this->session->userdata('fname'), 
		        "email" => $this->session->userdata('email'), 
		        "phone" => $this->session->userdata('mobileno'), 
		        "productinfo" => "Menukart Items", 
		        "surl" => "https://www.menukart.in/response", 
		        "furl" => "https://www.menukart.in/response", 
		        "udf1" => "aaaa", 
		        "udf2" => "aaaa", 
		        "udf3" => "aaaa", 
		        "udf4" => "aaaa", 
		        "udf5" => "aaaa", 
		        "address1" => "aaaa", 
		        "address2" => "aaaa", 
		        "city" => "aaaa", 
		        "state" => "aaaa", 
		        "country" => "aaaa", 
		        "zipcode" => "123123",
		        "sub_merchant_id"=>"S24714ZNJH",
		    );
		    
		    $url=$easebuzzObj->initiatePaymentAPI($postData); 
		    echo $url;
            $access_key = str_replace(' ', '', $url);
            echo $access_key; 


		}


	}

	public function response()
	{
	            include_once('easebuzz-lib/easebuzz_payment_gateway.php');

		    $SALT = "E3DQXG7Q9X";
		    $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
		    
		    $result = $this->input->post('response');
		    
        date_default_timezone_set('Asia/Kolkata');

		    if($result['status']=='success')
		     {
		         
		         

			     $data = array(
				'user_id' => $this->session->userdata('user_id'),
				'totalall' => $result['amount'],
				'charges' => $this->session->userdata('charges'),
				'cgst' => $this->session->userdata('cgst'),
				'sgst' => $this->session->userdata('sgst'),
				'amount' => $this->session->userdata('total'),
				'delivery_address'=>$this->session->userdata('delivery_address'),
				'payment_type' => 'Online Payment',
				'status' => 'success',
				'transaction_id' => $result['txnid'],
				'easepayid' => $result['easepayid'],
				'ordertype'=>$this->session->userdata('ordertype'),
				'discount_amount'=>$this->session->userdata('discount_amount'),
                'coupon'=>$this->session->userdata('coupon'),
            'order_created_at'=>date("Y-m-d H:i:s"),


				);

				$order_id=$this->home_model->insert_data($data,'orders');

				$session_cart = $this->home_model->fetch_session_cart_data();

	            foreach ($session_cart as $value) 
	            {
	            	$data1 = array(
					'order_id' => $order_id,
					'restaurant_id' => $value->restaurant_id,
					'menu_id' => $value->menu_id,
					'menu_name' => $value->menu_name,
					'menu_price' => $value->menu_price,
					'qty' => $value->qty,
					'cgst'=>$value->cgst,
				'sgst'=>$value->sgst,
								'menu_variation'=>$value->variation

					);

					$result1=$this->home_model->insert_data($data1,'order_menus');

					$result=$this->home_model->delete_data($value->id,'session_cart');


	            }
	                        $this->session->unset_userdata($payment_session_data);
	                                    		$this->session->unset_userdata('ordertype');
            		$this->session->unset_userdata('discount_amount');
            		            		$this->session->unset_userdata('coupon');


            $totalall=$result['amount'];
            
            
            
                 //order places user message
            if($this->session->userdata('ordertype')=='delivery')
            {
                $msg=urlencode("Thank you for ordering from Menukart. Your prepaid order (order id: $order_id) of Rs. $totalall is received. You will get a confirmation SMS once your order is accepted.");
            }
            else
            {
                $msg=urlencode("Thank you for ordering from Menukart. Your prepaid order (order id: $order_id) of Rs. $totalall is received. You will get a confirmation SMS once your order is accepted.");
            }
            $mobileno=$this->session->userdata('mobileno');
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                              CURLOPT_URL => "http://sms.menukart.shop/api/sendhttp.php?authkey=ZTA0MjNhNjE5NGE&mobiles=".$mobileno."&message=".$msg."&sender=AMBICA&type=1&route=2",

            //   CURLOPT_URL => "http://49.50.67.32/smsapi/httpapi.jsp?username=MENUKT03&password=MENUKT@456&from=ALERTS&to=".$mobileno."&text=".$msg."&coding=0",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "Cookie: JSESSIONID=8AEF8783B90D09B957E38310C9D0317A"
              ),
            ));
            
            $response = curl_exec($curl);
        
            curl_close($curl);


	            		$this->session->set_flashdata('success','order placed successfully.');

                    echo "1";
			}
			else
			{
						$this->session->set_flashdata('failed','Order not placed.');

                        echo "0";
			}


	}

	public function my_profile()
	{
	    if($this->session->userdata('logged_in')==true)
	    {
		$data['profile'] = $this->home_model->fetch_profile_data($this->session->userdata('user_id'),'users');
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('my-profile',$data);
		$this->load->view('includes/footer');
	    }
	    else
	    {
	        redirect('login');
	    }
	}
	
	public function edit_address()
	{
		$data['address'] = $this->home_model->fetch_address(base64_decode($this->uri->segment(2)),'address');
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('edit-address',$data);
		$this->load->view('includes/footer');
	}
    
    public function my_address()
	{
		$data['address'] = $this->home_model->fetch_address_data($this->session->userdata('user_id'),'address');
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('my-address',$data);
		$this->load->view('includes/footer');
	}
	
	public function add_address()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('address'),
			'user_id' => $this->session->userdata('user_id'),
			);
		$result=$this->home_model->insert_data($data,'address');
		$this->session->set_flashdata('success','Address added.');

		redirect('my-address');
        

	}
	
		public function add_new_address()
	{
	    
	    $data = array(
			'primary_address' => '0',
			);
		$result=$this->home_model->update_data($data,$this->session->userdata('user_id'),'address');
		
	    
		$data = array(
			'title' => $this->input->post('title'),
// 			'latitude' => $this->input->post('latitude'),
// 			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('address'),
			'user_id' => $this->session->userdata('user_id'),
			'primary_address' => '1',
			);
		$result=$this->home_model->insert_data($data,'address');
		$this->session->set_flashdata('success','Address added.');

	}
	
	public function update_address()
	{
		$data = array(
			'title' => $this->input->post('title'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('address'),
			'user_id' => $this->session->userdata('user_id'),
			);
		$result=$this->home_model->update_data1($data,$this->input->post('id'),'address');
		$this->session->set_flashdata('success','Address updated.');

		redirect('my-address');
        

	}
	
	public function make_primary()
	{
		$data = array(
			'primary_address' => '0',
			);
		$result=$this->home_model->update_data($data,$this->session->userdata('user_id'),'address');
		
		$data1 = array(
			'primary_address' => '1',
			);
		$result=$this->home_model->update_data1($data1,base64_decode($this->uri->segment(2)),'address');
		
		
				$this->session->set_flashdata('success','Address made primary.');

		redirect('my-address');

	}



	public function update_profile()
	{
	            if (!empty($_FILES['profileImage']['name'])) {
			$config['upload_path'] = './images/profile';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2000;
			$config['max_width'] = 1500;
			$config['max_height'] = 1500;
			$config['overwrite'] = TRUE;
			$config['file_name'] = date("Ymd-his").$_FILES['profileImage']['name'];
			

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('profileImage')) {
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
				
			
		$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'email' => $this->input->post('email'),
			// 'password' => md5($this->input->post('password')),
			'mobileno' => $this->input->post('mobileno'),
// 			'address' => $this->input->post('address'),
			'birthdate' => date("Y-m-d",strtotime($this->input->post('birthdate'))),
			'profileImage' => $picture,

			
			);
		$result=$this->home_model->update_data($data,$this->session->userdata('user_id'),'users');
				$this->session->set_flashdata('success','Profile Updated.');

		redirect('my-profile');


			}
		} else {

		$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'email' => $this->input->post('email'),
			// 'password' => md5($this->input->post('password')),
			'mobileno' => $this->input->post('mobileno'),
// 			'address' => $this->input->post('address'),
			'birthdate' => date("Y-m-d",strtotime($this->input->post('birthdate'))),

			
			);
		$result=$this->home_model->update_data($data,$this->session->userdata('user_id'),'users');
				$this->session->set_flashdata('success','Profile Updated.');

		redirect('my-profile');

		}
	    
	    

	}

	public function my_orders()
	{
	
	    $data['current_orders'] = $this->home_model->fetch_current_orders_data($this->session->userdata('user_id'),'orders');
		$data['orders'] = $this->home_model->fetch_orders_data($this->session->userdata('user_id'),'orders');
		$this->load->view('includes/header');
		$this->load->view('includes/top_navbar');
		$this->load->view('my-orders',$data);
		$this->load->view('includes/footer');
	
	}

	public function update_cart()
	{
	    
	    		$variation=$this->home_model->fetch_variation_from_session_cart($this->input->post('id'));

                                 if(!empty($variation))
                                 {
                                    $variation_id=$this->home_model->fetch_variation_id($variation);
                                    $price=$this->home_model->fetch_variation_menu_price($variation_id,$this->input->post('menu_id'));
                                 }
                                 else
                                 {
                                  	$price=$this->home_model->fetch_menu_price($this->input->post('menu_id'));
                                 }
	    
		$qty=$this->input->post('qty') + 1;
		$menu_price=$qty * $price;
		
		$restaurant_id=$this->home_model->get_restaurant_id($this->input->post('id'));
		
		$cgst=$this->home_model->fetch_cgst($restaurant_id);
		$sgst=$this->home_model->fetch_sgst($restaurant_id);

        $session_cgst=$cgst/100 * $menu_price;
        $session_sgst=$sgst/100 * $menu_price;

		
		$data = array(
			'qty' => $qty,
			'menu_price' => $menu_price,
			'cgst'=>$session_cgst,
			'sgst'=>$session_sgst

			);
		$result=$this->home_model->update_data1($data,$this->input->post('id'),'session_cart');

// 		$session_cart=$this->home_model->fetch_session_cart_data();
// 		$total=0;
//         foreach ($session_cart as $value) 
//         {
//         	$total=$total + $value->menu_price;
//         }
                           
//         $json_data=array('price'=>$menu_price,'total'=>$total);
//         echo json_encode($json_data);

$session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                           $json_data1=array();
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                 
                                  $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }

                           $div='<div class="order-row bg-white" style="margin-top:-17px;margin-bottom:-44px;">
                              <div class="widget-body">
                                 <div class="title-row">'.$value->menu_name.$title_variation.'
                                 <a  onclick="delete_from_cart('.$value->restaurant_id.','.$value->menu_id.','.$value->id.')"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-2">
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="minusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <div class="col-xs-3">

                                       <input readonly  style="text-align: center;" class="form-control plus_minus_qty" type="text" value="'.$value->qty.'" data-session="'.$value->id.'" data-menu="'.$value->menu_id.'" min="1" id="plus_minus_qty"> 
                                                                           </div>
                                                                                                               <div class="col-xs-2">

                                                                           
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="plusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-plus"></i></a>

                                    </div>
                                    <div class="col-xs-4">
                                       <p style="float: right;">₹  <b id="price'.$value->id.'">'.$value->menu_price.'</b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>';
//  $cgst=2.5/100 * $total;
//                           $sgst=2.5/100 * $total;
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;
                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }
                        
                        


                                $json_data=array('delivery_charge'=>$charges,'total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div);
                                                                                 array_push($json_data1,$json_data);

                              }
                        // $json_data=array('total'=>$total,'div'=>$divarr);
		
		echo json_encode($json_data1);


	}

    public function update_cart1()
	{
	    if($this->input->post('qty')==1)
	    {
	          $id=$this->input->post('id');
		      $result=$this->home_model->delete_data($id,'session_cart');
		      
		      $session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                           $json_data1=array();
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                 
                                  $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }

                           $div='<div class="order-row bg-white" style="margin-top:-17px;margin-bottom:-44px;">
                              <div class="widget-body">
                                 <div class="title-row">'.$value->menu_name.$title_variation.'
                                 <a  onclick="delete_from_cart('.$value->restaurant_id.','.$value->menu_id.','.$value->id.')"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-2">
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="minusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <div class="col-xs-3">

                                       <input readonly class="form-control plus_minus_qty" style="text-align: center;" type="text" value="'.$value->qty.'" data-session="'.$value->id.'" data-menu="'.$value->menu_id.'" min="1" id="plus_minus_qty"> 
                                                                           </div>
                                                                                                               <div class="col-xs-2">

                                        
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="plusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-plus"></i></a>

                                    </div>
                                    <div class="col-xs-4">
                                       <p style="float: right;">₹  <b id="price'.$value->id.'">'.$value->menu_price.'</b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>';
//  $cgst=2.5/100 * $total;
//                           $sgst=2.5/100 * $total;
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;

                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }

                                $json_data=array('delivery_charge'=>$charges,'total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div);
                                                                                 array_push($json_data1,$json_data);

                              }
                        // $json_data=array('total'=>$total,'div'=>$divarr);
		
		echo json_encode($json_data1);


	    }
	    else
	    {
	    
$variation=$this->home_model->fetch_variation_from_session_cart($this->input->post('id'));

                                 if(!empty($variation))
                                 {
                                    $variation_id=$this->home_model->fetch_variation_id($variation);
                                    $price=$this->home_model->fetch_variation_menu_price($variation_id,$this->input->post('menu_id'));
                                 }
                                 else
                                 {
                                  	$price=$this->home_model->fetch_menu_price($this->input->post('menu_id'));
                                 }
				$qty=$this->input->post('qty') - 1;

		$menu_price=$qty * $price;
		
		$restaurant_id=$this->home_model->get_restaurant_id($this->input->post('id'));
		
		$cgst=$this->home_model->fetch_cgst($restaurant_id);
		$sgst=$this->home_model->fetch_sgst($restaurant_id);

        $session_cgst=$cgst/100 * $menu_price;
        $session_sgst=$sgst/100 * $menu_price;

		
		$data = array(
			'qty' => $qty,
			'menu_price' => $menu_price,
			'cgst'=>$session_cgst,
			'sgst'=>$session_sgst

			);
		
		
		
		$result=$this->home_model->update_data1($data,$this->input->post('id'),'session_cart');

// 		$session_cart=$this->home_model->fetch_session_cart_data();
// 		$total=0;
//         foreach ($session_cart as $value) 
//         {
//         	$total=$total + $value->menu_price;
//         }
                           
//         $json_data=array('price'=>$menu_price,'total'=>$total);
//         echo json_encode($json_data);

$session_cart = $this->home_model->fetch_session_cart_data();
		
		
                           $count=0;
                           $total=0;
                           $cgst=0;
                           $sgst=0;
                    
                           $json_data1=array();
                              foreach ($session_cart as $value) {
                                 $total=$total + $value->menu_price;
                                 $cgst=$cgst + $value->cgst;
                                 $sgst=$sgst + $value->sgst;
                                 $count++;
                                 
                                  $title_variation='';
                                 
                                 if(!empty($value->variation))
                                 {
                                     $title_variation=" (".$value->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }

                           $div='<div class="order-row bg-white" style="margin-top:-17px;margin-bottom:-44px;">
                              <div class="widget-body">
                                 <div class="title-row">'.$value->menu_name.$title_variation.'
                                 <a  onclick="delete_from_cart('.$value->restaurant_id.','.$value->menu_id.','.$value->id.')"><i class="fa fa-trash pull-right"></i></a></div>
                                 <div class="form-group row no-gutter">
                                    <div class="col-xs-2">
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="minusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-minus"></i></a>
                                        </div>
                                    <div class="col-xs-3">

                                       <input readonly class="form-control plus_minus_qty" style="text-align: center;" type="text" value="'.$value->qty.'" data-session="'.$value->id.'" data-menu="'.$value->menu_id.'" min="1" id="plus_minus_qty"> 
                                                                           </div>
                                                                                                               <div class="col-xs-2">

                                        
                                        <a class="btn btn-info" style="background-color: #FF4E02;border-color: #FF4E02;" onclick="plusqty('.$value->restaurant_id.','.$value->menu_id.','.$value->id.','.$value->qty.')"><i class="fa fa-plus"></i></a>

                                    </div>
                                    <div class="col-xs-4">
                                       <p style="float: right;">₹  <b id="price'.$value->id.'">'.$value->menu_price.'</b></p>

                                    </div>
                                 </div>
                              </div>
                           </div>';
//  $cgst=2.5/100 * $total;
//                           $sgst=2.5/100 * $total;
                        if($this->session->userdata('ordertype')=='delivery')
                        {
                           $totalall=$total + $cgst + $sgst ;
                           if($totalall <= 100)
                            {
                            		$charges=25;
                            }
                            else if($totalall > 100 && $totalall <= 400 )
                            {
                                  $charges=15;
                            }
                            else if($totalall > 400 )
                            {
                                  $charges=0;
                            }
                            $totalall=$totalall + $charges;

                        }
                        else
                        {
                            $totalall=$total + $cgst + $sgst + 0;
                        }



                                $json_data=array('delivery_charge'=>$charges,'total'=>round($total,2),'cgst'=>round($cgst,2),'sgst'=>round($sgst,2),'totalall'=>round($totalall,2),'div'=>$div);
                                                                                 array_push($json_data1,$json_data);

                              }
                        // $json_data=array('total'=>$total,'div'=>$divarr);
		
		echo json_encode($json_data1);

	    }
	}


	public function cancel_order()
	{
		$id=base64_decode($this->uri->segment(2));
		$data=array('order_status'=>'2');
		$result=$this->home_model->cancel_order($data,$id,'orders');
		$this->session->set_flashdata('success','Order Cancelled.');
		redirect('my-orders');

	}
	
	public function send_otp()
	{
	    $mobileno=$this->input->post('mobileno');
        $data=$this->home_model->fetch_user_data_nowise($mobileno);
        if(!empty($data))
        {
        $otp=rand(1000,9999);
        $msg=urlencode("Your OTP for Menukart is $otp");
        
        

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        
              CURLOPT_URL => "http://sms.menukart.shop/api/sendhttp.php?authkey=ZTA0MjNhNjE5NGE&mobiles=".$mobileno."&message=".$msg."&sender=AMBICA&type=1&route=2",

    //   CURLOPT_URL => "http://49.50.67.32/smsapi/httpapi.jsp?username=MENUKT03&password=MENUKT@456&from=ALERTS&to=".$mobileno."&text=".$msg."&coding=0",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cookie: JSESSIONID=8AEF8783B90D09B957E38310C9D0317A"
      ),
    ));
    
    $response = curl_exec($curl);

    curl_close($curl);
    
    			$this->session->set_userdata('otp',$otp);
    			echo 1;


        }
        else
        {
            $otp=rand(1000,9999);
        $msg=urlencode("Your OTP for Menukart is $otp.Please sign up.");
        
        

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://sms.menukart.shop/api/sendhttp.php?authkey=ZTA0MjNhNjE5NGE&mobiles=".$mobileno."&message=".$msg."&sender=AMBICA&type=1&route=2",

    //   CURLOPT_URL => "http://49.50.67.32/smsapi/httpapi.jsp?username=MENUKT03&password=MENUKT@456&from=ALERTS&to=".$mobileno."&text=".$msg."&coding=0",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cookie: JSESSIONID=8AEF8783B90D09B957E38310C9D0317A"
      ),
    ));
    
    $response = curl_exec($curl);

    curl_close($curl);
    
    $this->session->set_userdata('otp',$otp);
            echo 0;
        }
	}
	
	public function send_otp_for_user_registration()
	{
	    $mobileno=$this->input->post('mobileno');
	    $data=$this->home_model->fetch_user_data_nowise($mobileno);
        if(empty($data))
        {
        
        $otp=rand(1000,9999);
        $msg=urlencode("Your OTP for Menukart is $otp.Please sign up.");
        
        

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://sms.menukart.shop/api/sendhttp.php?authkey=ZTA0MjNhNjE5NGE&mobiles=".$mobileno."&message=".$msg."&sender=AMBICA&type=1&route=2",

    //   CURLOPT_URL => "http://49.50.67.32/smsapi/httpapi.jsp?username=MENUKT03&password=MENUKT@456&from=ALERTS&to=".$mobileno."&text=".$msg."&coding=0",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Cookie: JSESSIONID=8AEF8783B90D09B957E38310C9D0317A"
      ),
    ));
    
    $response = curl_exec($curl);

    curl_close($curl);
    
    $this->session->set_userdata('otp',$otp);
    echo 1;
        }
        else
        {
            echo 0;
        }

    }
	
	public function verify_otp()
	{
        // error_reporting(0);
		$mobileno= $this->input->post('mobileno');
				$otp= $this->input->post('otp');


// 		print_r($_POST);die;

		if($this->session->userdata('otp')!=$otp)
		{
			echo 0;
		}
		else
		{
        $result=$this->home_model->fetch_user_data_nowise($mobileno);

			$userdata = array( 
			   'fname'  => $result->fname, 
			   'lname'     => $result->lname,
			   'mobileno'     => $result->mobileno, 
			   'email'     => $result->email, 
			   'address'     => $result->address, 
 			   'user_id'     => $result->user_id, 
			   'logged_in' => true
			);  

			$this->session->set_userdata($userdata);
			$this->session->unset_userdata('otp');

			

        echo 1;

		}
	}
	
	public function set_session()
	{
	    $this->session->set_userdata('ordertype',$this->input->post('ordertype'));
	    
	    echo $this->session->userdata('ordertype');
	}
	
	public function order_summary_view()
	{
	    $order_id=$this->input->post('order_id');
	            $result=$this->home_model->fetch_order($order_id);

              $order_menus=order_menus($order_id);

$data=array();
                     foreach($order_menus as $val1){
                if(!empty($val1->variation))
                                 {
                                     $title_variation=" (".$val1->variation.")";
                                 }
                                 else
                                 {
                                     $title_variation='';
                                 }


	  $html1='<tr>
        <td>'.$val1->menu_name.$title_variation.'</td>
        <td>'.$val1->qty.'</td>
        <td>'.$val1->menu_price/$val1->qty.'</td>
        <td>'.$val1->menu_price.'</td>
      </tr>';    
      
      
          $html='<table class="table">
    <tbody>
    <tr>
    <td>Sub Total</td>
    <td>₹   '.sprintf("%0.2f",$result->amount).'</td>
        </tr>
    <tr>
    <tr>
    <td>Discount Applied</td>
    <td>₹   '.sprintf("%0.2f",$result->discount_amount).'</td>
        </tr>
    <tr>

    <td>CGST</td>
    <td>₹   '.sprintf("%0.2f",$result->cgst).'</td>
    </tr>
    <tr>
    <td>SGST</td>
    <td>₹    '.sprintf("%0.2f",$result->sgst).'</td>
    </tr>
    <tr>
    <td>Charges</td>
    <td>₹    '.sprintf("%0.2f",$result->charges).'</td>
    </tr>
    <tr>
    <td>Total</td>
    <td>₹    '.sprintf("%0.2f",$result->totalall).'</td>
    </tr>
    </tbody>
    </table>
    ';
    
    $json_data=array('data'=>$html1,'rate'=>$html);
      
array_push($data,$json_data);

	       }     
    

    echo json_encode($data);
	    
	}
	
	public function show_resto_searchwise()
	{
		$query=$this->input->post('query');


		$resto = $this->home_model->fetch_resto_searchwise($query);
		
		$count=0;
		$json_data=array();
		
		
                              foreach ($resto as $value) {
                                  
                                  if($value->restaurant_on_off==1)
                                  {
                                      $url=base_url().'menu/'.base64_encode($value->restaurant_id);
                                      $status=' <p> 245 Reviews</p> <a href="'.base_url().'menu/'.base64_encode($value->restaurant_id).'" class="btn theme-btn-dash">View Menu</a> </div>';
                                  }
                                  else
                                  {
                                      $url="#";
                                      $status=' <p> 245 Reviews</p> <a href="#" class="btn theme-btn-dash">Restaurant Closed</a> </div>';
                                  }
                                     
                                     $div='<div class="bg-gray restaurant-entry" >
                                <div class="row" >
                                    <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                        <div class="entry-logo">
                                            <a class="img-fluid" href="#"><img src="../uploads/restaurant/'.$value->restaurant_logo.'" alt="Food logo"></a>
                                        </div>
                                        <div class="entry-dscr">
                                            <h5><a href="'.$url.'"><b>'.$value->restaurant_name.'</b></a>&nbsp;&nbsp;&nbsp; <a target="blank" title="View on map" href="https://www.menukart.in/load-map/'.base64_encode($value->restaurant_id).'">'.$value->city.'</a></h5><span>'.$value->resto_type.'</span><br><span>'.$value->restaurant_details.' </span>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-motorcycle"></i> '.$value->restauran_delivery_min_time.' min</li>
                                                <li class="list-inline-item"> ₹ '.$value->resto_offer.'</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                        <div class="right-content bg-white">
                                            <div class="right-review">
                                                <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
'.$status.'                                        </div>
                                    </div>
                                </div>
                            </div>';
                            array_push($json_data,$div);

                                
                                     
                                 
                              }

				echo json_encode($json_data);

	}

    public function show_resto()
	{
		$id=$this->input->post('id');


        $resto = $this->home_model->fetch_restaurants_categorywise($id);


		$count=0;
		$json_data=array();
                              foreach ($resto as $value) {
                                  if($value->restaurant_on_off==1)
                                  {
                                      $url=base_url().'menu/'.base64_encode($value->restaurant_id);
                                      $status=' <p> 245 Reviews</p> <a href="'.base_url().'menu/'.base64_encode($value->restaurant_id).'" class="btn theme-btn-dash">View Menu</a> </div>';
                                  }
                                  else
                                  {
                                      $url="#";
                                      $status=' <p> 245 Reviews</p> <a href="#" class="btn theme-btn-dash">Restaurant Closed</a> </div>';
                                  }
                                     
                                     $div='<div class="bg-gray restaurant-entry" >
                                <div class="row" >
                                    <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                        <div class="entry-logo">
                                            <a class="img-fluid" href="#"><img src="../uploads/restaurant/'.$value->restaurant_logo.'" alt="Food logo"></a>
                                        </div>
                                        <div class="entry-dscr">
                                            <h5><a href="'.$url.'"><b>'.$value->restaurant_name.'</b></a>&nbsp;&nbsp;&nbsp; <a target="blank" title="View on map" href="https://www.menukart.in/load-map/'.base64_encode($value->restaurant_id).'">'.$value->city.'</a></h5><span>'.$value->resto_type.'</span><br><span>'.$value->restaurant_details.' </span>
                                            <ul class="list-inline">
                                                <li class="list-inline-item"><i class="fa fa-motorcycle"></i> '.$value->restauran_delivery_min_time.' min</li>
                                                <li class="list-inline-item"> ₹ '.$value->resto_offer.'</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                        <div class="right-content bg-white">
                                            <div class="right-review">
                                                <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
'.$status.'                                        </div>
                                    </div>
                                </div>
                            </div>';
                            array_push($json_data,$div);

                                
                                     
                                 
                              }

				echo json_encode($json_data);

	}
	
	public function check_resto_exist()
	{
	    $check=$this->home_model->check_resto_exist();
	    echo $check;
	}

	public function fetch_variation()
	{
	    $variations=$this->home_model->fetch_variation($this->input->post('menu_id'));
	    $data=array();
	    $json_data1=array();
	    foreach($variations as $val)
	    {
	        $html='<div class="food-item white">
                     <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                           <div class="item-img pull-left">
                                <div class="radio">
                                  <label><input type="radio" value="'.$val->variation_id.'" id="variation_'.$this->input->post("menu_id").'" name="variation_id">  '.$val->name.'</label>
                                </div>
                           </div>
                           <div class="rest-descr">
                              <h6><a>'.$val->rate.' Rs</a></h6>
                           </div>
                        </div>
                     </div>
                  </div>';
                  
                  	    $btn='<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    <a onclick="add('.$this->input->post("restaurant_id").','.$this->input->post("menu_id").','.$this->input->post("category_id").',0)"  class="btn theme-btn add">Add to cart</a>';
	   $json_data=array('btn'=>$btn,'div'=>$html);

	   array_push($json_data1,$json_data);

	    }
	    

	    echo json_encode($json_data1);
	}
	
	public function check_pincode()
	{
	    $check_pincode=$this->home_model->check_pincode($this->input->post('pincode'));
	    echo $check_pincode;
	}
	
	public function detect_location()
	{
	    function getVisIPAddr()
	    {
	     if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
                    return $_SERVER['HTTP_CLIENT_IP']; 
                } 
                else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
                    return $_SERVER['HTTP_X_FORWARDED_FOR']; 
                } 
                else { 
                    return $_SERVER['REMOTE_ADDR']; 
                } 
	}
            
              
            // Store the IP address 
            $vis_ip = getVisIPAddr(); 

                

            $ipdat = @json_decode(file_get_contents( 
    "http://www.geoplugin.net/json.gp?ip=" . $vis_ip)); 
   
        //  $pincode= $ipdat->geoplugin_areaCode; 
         
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$vis_ip));
    
    if($query && $query['status'] == 'success')
    {
        
        $pincode= $query['zip'];
    }
    
    echo $pincode;

	}
	
	public function main_page_resto()
	{
		$id='';


        $resto = $this->home_model->fetch_restaurants_categorywise($id);

	    $data=array();
	    $json_data1=array();
	    foreach($resto as $val)
	    {
	        if($val->restaurant_on_off==1)
	        {
	        $html='<div class="col-lg-3 col-md-3 col-sm-6 mix sale bslr" style="display: inline-block;" data-bound="">
								<a href="'.base_url().'menu/'.base64_encode($val->restaurant_id).'"><div class="single_product">
									<div class="product_image">
										<img style="width: 100%;height: 160px;" src="uploads/restaurant/'.$val->restaurant_logo.'" alt=""/>
									</div>
									<div class="product_btm_text">
									</div>
								</div></a>
							</div>';
	        }
	        else
	        {
	         	        $html='<div class="col-lg-3 col-md-3 col-sm-6 mix sale bslr" style="display: inline-block;" data-bound="">
								<a href="#"><div class="single_product">
									<div class="product_image">
										<img style="width: 100%;height: 160px;" src="uploads/restaurant/'.$val->restaurant_logo.'" alt=""/>
									</div>
									<div class="product_btm_text">
									</div>
								</div></a>
							</div>';
   
	        }
                  

	   array_push($json_data1,$html);

	    }
	    

	    echo json_encode($json_data1);
	}
	
	public function main_page_resto1()
	{
		$id='';


        $resto = $this->home_model->fetch_restaurants_categorywise($id);

	    $data=array();
	    $json_data1=array();
	    foreach($resto as $val)
	    {
	        
	                $timing = $this->home_model->fetch_timing($val->restaurant_id);
	                
	                $time = rtrim($timing, "& ");

	        if($val->restaurant_on_off==1)
	        {

	        
	        $html='<div class="col-lg-3 col-md-3 col-sm-6 _1HEuF">
						<a href="'.base_url().'menu/'.base64_encode($val->restaurant_id).'"><div class="single_blog">
							 <div class="single_blog_img">
								<img style="width: 100%;height: 160px;" src="uploads/restaurant/'.$val->restaurant_logo.'" alt="">
							</div>
							<div class="blog_content">
							<h4 class="post_title"><a href="#">'.$val->restaurant_name.'</a>&nbsp;&nbsp;&nbsp; <a target="blank" title="View on map" href="https://www.menukart.in/load-map/'.base64_encode($val->restaurant_id).'">'.$val->city.'</a></h4>
						    <span>'.$val->resto_type.'</span>
                                <ul class="post-bar" style="color:gray">
									<li style="color:#ffffff;background-color:#FF4E02;padding:0px"><i style="color:#fff;padding:5px;" class="fa fa-star"> 4.3</i></li>
																		<li>'.$val->restauran_delivery_min_time.' Min</li>

									<li>₹   '.$val->resto_offer.'</li>
								</ul>
							</div>
						</div></a>
					</div>';
	        }
	        else
	        {
	           $html='<div class="col-lg-3 col-md-3 col-sm-6 _1HEuF">
						<a href="#"><div class="single_blog">
							 <div class="single_blog_img">
								<img style="width: 100%;height: 160px;" src="uploads/restaurant/'.$val->restaurant_logo.'" alt="">
							</div>
							<div class="blog_content">
							<h4 class="post_title"><a href="#">'.$val->restaurant_name.'</a>&nbsp;&nbsp;&nbsp; <a target="blank" title="View on map" href="https://www.menukart.in/load-map/'.base64_encode($val->restaurant_id).'">'.$val->city.'</a></h4>
						    <span>'.$val->resto_type.'</span>
                                <ul class="post-bar" style="color:gray">
									<li style="color:#ffffff;background-color:#FF4E02;padding:0px"><i style="color:#fff;padding:5px;" class="fa fa-star"> 4.3</i></li>
																		<li>'.$val->restauran_delivery_min_time.' Min</li>

									<li>₹   '.$val->resto_offer.'</li>
								</ul>
							</div>
						</div></a>
					</div>'; 
	        }
	        
	   array_push($json_data1,$html);

	    }
	    

	    echo json_encode($json_data1);
	}
	
	public function search_result()
	{
	    
	    $search_result = $this->home_model->fetch_search_result($this->input->post('pincode'),$this->input->post('query'));
        $search_result_from_menu = $this->home_model->fetch_search_result_from_menu($this->input->post('query'));

	    $json_data1=array();
	    foreach($search_result as $val)
	    {
	        	        $html='<div class="col-md-12"><b>
	        	        <a style="color:gray;font-size:12px;" href="'.base_url().'menu/'.base64_encode($val->restaurant_id).'">'.$val->restaurant_name.'</a></b></div>';
	                    array_push($json_data1,$html);
	    }
	    foreach($search_result_from_menu as $val)
	    {
	        	        $html='<div class="col-md-12" style="display:flex"><b>
	        	        <a style="color:gray" href="'.base_url().'menu/'.base64_encode($val->restaurant_id).'">'.$val->menu_name.'</a></b>
	        	        <p style="font-size:12px;color:gray;margin-left:5px"> in '.$val->restaurant_name.'<p>
	        	        </div>';
	                    array_push($json_data1,$html);
	    }
	    
	    echo json_encode($json_data1);
	    }
	    
	    
	    public function redeem_coupon()
	    {
	        $coupon=$this->input->post('coupon');
	        $subtotal=$this->input->post('subtotal');
	        $totalall=$this->input->post('totalall');
	        $resto_id = $this->home_model->fetch_session_cart_resto_id();
		    $discount = $this->home_model->fetch_discount_row($resto_id,$coupon);
            	
		    $ordertype_arr=explode(',',$discount->discount_ordertype);
		    
		    $menus_arr=explode(',',$discount->discount_menu);
            $categories_arr=explode(',',$discount->discount_category);

		    
		    $session_cart = $this->home_model->fetch_session_cart_data();

		    $session_cart1 = $this->home_model->fetch_session_cart_data1();

		    
		    if(!empty($discount))
		    {
		    
		    if(strtotime(date("Y-m-d h:i:s a")) >= strtotime($discount->discount_from) && strtotime(date("Y-m-d h:i:s a")) <= strtotime($discount->discount_to))
		    {
		        if($discount->discount_applicable_on=='all')
		        {
		            if(in_array($this->session->userdata('ordertype'),$ordertype_arr))
		            {
		                if($discount->discount_type=='fixed')
		                {
		                    if($discount->discount_all_days==1)
		                    {
    		                    if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
    		                    {
    		                        $discount_amount=$discount->discount_amount;
    		                        
    		                        if($discount_amount < $discount->discount_max)
    		                        {
    		                            $this->session->set_userdata('coupon',$coupon);
    		                            $this->session->set_userdata('discount_amount',$discount_amount);
    		                            $discount_totalall=$totalall - $discount_amount;
    		                            $discount_amount_val=$discount_amount;
    		                        }
    		                        else
    		                        {
    		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
    		                            $this->session->set_userdata('coupon',$coupon);
    		                            $discount_totalall=$totalall - $discount->discount_max;
    		                            $discount_amount_val=$discount->discount_max;

    		                        }
    		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
    		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    
    		                        
    		                    }
    		                    else
    		                    {
        		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
        		                    {
        		                        $discount_amount=$discount->discount_amount;
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
        		                        {
        		                            $discount_totalall=0;
        		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        
    
        		                    }
        		                    else
        		                    {
        		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    
        		                    }
    		                    }
		                    }
		                    else
		                    {
		                        $days_arr=explode(',',$discount->discount_days);
		                        if(in_array(strtolower(date('l')),$days_arr))
		                        {
    		                        if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
        		                    {
        		                        $discount_amount=$discount->discount_amount;
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        
        		                        
        		                    }
        		                    else
        		                    {
            		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
            		                    {
            		                        $discount_amount=$discount->discount_amount;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        
        
            		                    }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
        		                    }
		                        }
		                        else
		                        {
		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
		                        }
		                    }
		                    
		                }
		                else
		                {
		                    if($discount->discount_all_days==1)
		                    {
    		                     if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
    		                     {
    		                        $discount_amount=$discount->discount_amount/100 * $subtotal;
    		                        if($discount_amount < $discount->discount_max)
    		                        {
    		                            $this->session->set_userdata('discount_amount',$discount_amount);
    		                            $this->session->set_userdata('coupon',$coupon);
    		                            $discount_totalall=$totalall - $discount_amount;
    		                            $discount_amount_val=$discount_amount;
    		                        }
    		                        else
    		                        {
    		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
    		                            $this->session->set_userdata('coupon',$coupon);
    		                            $discount_totalall=$totalall - $discount->discount_max;
    		                            $discount_amount_val=$discount->discount_max;

    		                        }
    		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
    		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    
    
    		                    }
    		                    else
    		                    {
        		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
        		                    {
    		                            $discount_amount=$discount->discount_amount/100 * $subtotal;
    		                            if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        
    
        		                    }
        		                    else
        		                    {
        		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        		                    }
    		                    }
		                    }
		                    else
		                    {
		                        
		                        $days_arr=explode(',',$discount->discount_days);
		                        if(in_array(strtolower(date('l')),$days_arr))
		                        {
    		                        if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
        		                     {
        		                        $discount_amount=$discount->discount_amount/100 * $subtotal;
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        
        
        		                    }
        		                    else
        		                    {
            		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
            		                    {
        		                            $discount_amount=$discount->discount_amount/100 * $subtotal;
        		                            if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
            
        
            		                    }
            		                    else
            		                    {
            		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            		                    }
        		                    }
		                        }
		                        else
		                        {
		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
		                        }
		                        
		                    }
		                }
		                
		            }
		        }
		        
		      //  menu section start
		      
		      	else if($discount->discount_applicable_on=='menus')
		        {
		            if(in_array($this->session->userdata('ordertype'),$ordertype_arr))
		            {
		                if($discount->discount_type=='fixed')
		                {
		                    if($discount->discount_all_days==1)
		                    {
    		                    if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
    		                    {
    		                    
    		                    
        		                    $qty=0;
        		                    foreach ($session_cart as $value) 
        		                    {
        		                        if(in_array($value->menu_id,$menus_arr))
        		                        {
                                            $qty=$qty + $value->qty;
        		                        }
        		                    }

    		                        if($qty > 0)
    		                        {
        		                        $discount_amount=$discount->discount_amount * $qty;
        		                        
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    		                        }
    		                        else
    		                        {
    		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    		                        }
    		                        
    		                    }
    		                    else
    		                    {
        		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
        		                    {
        		                        $qty=0;
            		                    foreach ($session_cart as $value) 
            		                    {
            		                        if(in_array($value->menu_id,$menus_arr))
            		                        {
                                                $qty=$qty + $value->qty;
            		                        }
            		                    }
            		                    if($qty > 0)
    		                            {
            		                        $discount_amount=$discount->discount_amount * $qty;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    		                            }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
    
        		                    }
        		                    else
        		                    {
        		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    
        		                    }
    		                    }
		                    }
		                    else
		                    {
		                        $days_arr=explode(',',$discount->discount_days);
		                        if(in_array(strtolower(date('l')),$days_arr))
		                        {
    		                        if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
        		                    {
        		                        $qty=0;
            		                    foreach ($session_cart as $value) 
            		                    {
            		                        if(in_array($value->menu_id,$menus_arr))
            		                        {
                                                $qty=$qty + $value->qty;
            		                        }
            		                    }
            		                    
            		                    if($qty > 0)
    		                            {
            		                    
            		                        $discount_amount=$discount->discount_amount * $qty;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        		                           
    		                            }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
        		                        
        		                    }
        		                    else
        		                    {
            		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
            		                    {
            		                        $qty=0;
                		                    foreach ($session_cart as $value) 
                		                    {
                		                        if(in_array($value->menu_id,$menus_arr))
                		                        {
                                                    $qty=$qty + $value->qty;
                		                        }
                		                    }
                		                    if($qty > 0)
    		                                {
                		                        $discount_amount=$discount->discount_amount * $qty;
                		                        if($discount_amount < $discount->discount_max)
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount_amount);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount_amount;
                		                            $discount_amount_val=$discount_amount;
                		                        }
                		                        else
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount->discount_max;
                		                            $discount_amount_val=$discount->discount_max;
            
                		                        }
                		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
                		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
            
    		                                }
                		                    else
                		                    {
                		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            
                		                    }
            		                    }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
        		                    }
		                        }
		                        else
		                        {
		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
		                        }
		                    }
		                    
		                }
		                else
		                {
		                    if($discount->discount_all_days==1)
		                    {
    		                     if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
    		                     {
    		                         
    		                         $qty=0;
    		                         $menu_price=0;
        		                    foreach ($session_cart as $value) 
        		                    {
        		                        if(in_array($value->menu_id,$menus_arr))
        		                        {
                                            $qty=$qty + $value->qty;
                                            $menu_price=$menu_price + ($value->menu_price * $value->qty);
        		                        }
        		                    }
    		                         
    		                        if($menu_price > 0)
    		                        {
    		                         
        		                        $discount_amount=$discount->discount_amount/100 * $menu_price;
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    		                        }
    		                        else
    		                        {
    		                              $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    		                        }
    
    		                    }
    		                    else
    		                    {
        		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
        		                    {
        		                        $qty=0;
        		                        $menu_price=0;
            		                    foreach ($session_cart as $value) 
            		                    {
            		                        if(in_array($value->menu_id,$menus_arr))
            		                        {
                                                $qty=$qty + $value->qty;
                                                $menu_price=$menu_price + ($value->menu_price * $value->qty);
            		                        }
            		                    }
        		                         
        		                        if($menu_price > 0)
        		                        {
        		                            $discount_amount=$discount->discount_amount/100 * $menu_price;
        		                            if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        		                        }
        		                        else
        		                        {
        		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        		                        }
    
        		                    }
        		                    else
        		                    {
        		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        		                    }
    		                    }
		                    }
		                    else
		                    {
		                        
		                        $days_arr=explode(',',$discount->discount_days);
		                        if(in_array(strtolower(date('l')),$days_arr))
		                        {
    		                        if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
        		                     {
        		                        $qty=0;
        		                        $menu_price=0;
            		                    foreach ($session_cart as $value) 
            		                    {
            		                        if(in_array($value->menu_id,$menus_arr))
            		                        {
                                                $qty=$qty + $value->qty;
                                                $menu_price=$menu_price + ($value->menu_price * $value->qty);
            		                        }
            		                    }
        		                         
        		                        if($menu_price > 0)
        		                        {
            		                        $discount_amount=$discount->discount_amount/100 * $menu_price;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        		                        }
            		                    else
            		                    {
            		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            		                    }
        
        		                    }
        		                    else
        		                    {
            		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
            		                    {
            		                        $qty=0;
            		                        $menu_price=0;
                		                    foreach ($session_cart as $value) 
                		                    {
                		                        if(in_array($value->menu_id,$menus_arr))
                		                        {
                                                    $qty=$qty + $value->qty;
                                                    $menu_price=$menu_price + ($value->menu_price * $value->qty);
                		                        }
                		                    }
            		                         
            		                        if($menu_price > 0)
            		                        {
            		                            $discount_amount=$discount->discount_amount/100 * $menu_price;
            		                            if($discount_amount < $discount->discount_max)
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount_amount);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount_amount;
                		                            $discount_amount_val=$discount_amount;
                		                        }
                		                        else
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount->discount_max;
                		                            $discount_amount_val=$discount->discount_max;
            
                		                        }
                		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
                		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
                
            		                        }
                		                    else
                		                    {
                		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
                		                    }
            		                    }
            		                    else
            		                    {
            		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            		                    }
        		                    }
		                        }
		                        else
		                        {
		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
		                        }
		                        
		                    }
		                }
		                
		            }
		        }
		      
		      //menu end
            
            //  category section start
		      
		      	else if($discount->discount_applicable_on=='categories')
		        {
		            if(in_array($this->session->userdata('ordertype'),$ordertype_arr))
		            {
		                if($discount->discount_type=='fixed')
		                {
		                    if($discount->discount_all_days==1)
		                    {
    		                    if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
    		                    {
    		                    
    		                    
        		                    $qty=0;
        		                    foreach ($session_cart1 as $value) 
        		                    {
        		                        if(in_array($value->menu_categoryid,$categories_arr))
        		                        {
                                            $qty=$qty + $value->qty;
        		                        }
        		                    }

    		                        if($qty > 0)
    		                        {
        		                        $discount_amount=$discount->discount_amount * $qty;
        		                        
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    		                        }
    		                        else
    		                        {
    		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    		                        }
    		                        
    		                    }
    		                    else
    		                    {
        		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
        		                    {
        		                        $qty=0;
            		                    foreach ($session_cart1 as $value) 
            		                    {
            		                        if(in_array($value->menu_categoryid,$categories_arr))
            		                        {
                                                $qty=$qty + $value->qty;
            		                        }
            		                    }
            		                    if($qty > 0)
    		                            {
            		                        $discount_amount=$discount->discount_amount * $qty;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    		                            }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
    
        		                    }
        		                    else
        		                    {
        		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    
        		                    }
    		                    }
		                    }
		                    else
		                    {
		                        $days_arr=explode(',',$discount->discount_days);
		                        if(in_array(strtolower(date('l')),$days_arr))
		                        {
    		                        if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
        		                    {
        		                        $qty=0;
            		                    foreach ($session_cart1 as $value) 
            		                    {
            		                        if(in_array($value->menu_categoryid,$categories_arr))
            		                        {
                                                $qty=$qty + $value->qty;
            		                        }
            		                    }
            		                    
            		                    if($qty > 0)
    		                            {
            		                    
            		                        $discount_amount=$discount->discount_amount * $qty;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        		                           
    		                            }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
        		                        
        		                    }
        		                    else
        		                    {
            		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
            		                    {
            		                        $qty=0;
                		                    foreach ($session_cart1 as $value) 
                		                    {
                		                        if(in_array($value->menu_categoryid,$categories_arr))
                		                        {
                                                    $qty=$qty + $value->qty;
                		                        }
                		                    }
                		                    if($qty > 0)
    		                                {
                		                        $discount_amount=$discount->discount_amount * $qty;
                		                        if($discount_amount < $discount->discount_max)
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount_amount);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount_amount;
                		                            $discount_amount_val=$discount_amount;
                		                        }
                		                        else
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount->discount_max;
                		                            $discount_amount_val=$discount->discount_max;
            
                		                        }
                		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
                		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
            
    		                                }
                		                    else
                		                    {
                		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            
                		                    }
            		                    }
            		                    else
            		                    {
            		                         $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        
            		                    }
        		                    }
		                        }
		                        else
		                        {
		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
		                        }
		                    }
		                    
		                }
		                else
		                {
		                    if($discount->discount_all_days==1)
		                    {
    		                     if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
    		                     {
    		                         
    		                         $qty=0;
    		                         $menu_price=0;
        		                    foreach ($session_cart1 as $value) 
        		                    {
        		                        if(in_array($value->menu_categoryid,$categories_arr))
        		                        {
                                            $qty=$qty + $value->qty;
                                            $menu_price=$menu_price + ($value->menu_price * $value->qty);
        		                        }
        		                    }
    		                         
    		                        if($menu_price > 0)
    		                        {
    		                         
        		                        $discount_amount=$discount->discount_amount/100 * $menu_price;
        		                        if($discount_amount < $discount->discount_max)
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount_amount);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount_amount;
        		                            $discount_amount_val=$discount_amount;
        		                        }
        		                        else
        		                        {
        		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
        		                            $this->session->set_userdata('coupon',$coupon);
        		                            $discount_totalall=$totalall - $discount->discount_max;
        		                            $discount_amount_val=$discount->discount_max;
    
        		                        }
        		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
        		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
    		                        }
    		                        else
    		                        {
    		                              $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
    		                        }
    
    		                    }
    		                    else
    		                    {
        		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
        		                    {
        		                        $qty=0;
        		                        $menu_price=0;
            		                    foreach ($session_cart1 as $value) 
            		                    {
            		                        if(in_array($value->menu_categoryid,$categories_arr))
            		                        {
                                                $qty=$qty + $value->qty;
                                                $menu_price=$menu_price + ($value->menu_price * $value->qty);
            		                        }
            		                    }
        		                         
        		                        if($menu_price > 0)
        		                        {
        		                            $discount_amount=$discount->discount_amount/100 * $menu_price;
        		                            if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        		                        }
        		                        else
        		                        {
        		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        		                        }
    
        		                    }
        		                    else
        		                    {
        		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
        		                    }
    		                    }
		                    }
		                    else
		                    {
		                        
		                        $days_arr=explode(',',$discount->discount_days);
		                        if(in_array(strtolower(date('l')),$days_arr))
		                        {
    		                        if($discount->applicable_amount_greater_than==0 && $discount->applicable_amount_less_than==0)
        		                     {
        		                        $qty=0;
        		                        $menu_price=0;
            		                    foreach ($session_cart1 as $value) 
            		                    {
            		                        if(in_array($value->menu_categoryid,$categories_arr))
            		                        {
                                                $qty=$qty + $value->qty;
                                                $menu_price=$menu_price + ($value->menu_price * $value->qty);
            		                        }
            		                    }
        		                         
        		                        if($menu_price > 0)
        		                        {
            		                        $discount_amount=$discount->discount_amount/100 * $menu_price;
            		                        if($discount_amount < $discount->discount_max)
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount_amount);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount_amount;
            		                            $discount_amount_val=$discount_amount;
            		                        }
            		                        else
            		                        {
            		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
            		                            $this->session->set_userdata('coupon',$coupon);
            		                            $discount_totalall=$totalall - $discount->discount_max;
            		                            $discount_amount_val=$discount->discount_max;
        
            		                        }
            		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
            		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
        		                        }
            		                    else
            		                    {
            		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            		                    }
        
        		                    }
        		                    else
        		                    {
            		                    if($subtotal >= $discount->applicable_amount_greater_than && $subtotal <= $discount->applicable_amount_less_than)
            		                    {
            		                        $qty=0;
            		                        $menu_price=0;
                		                    foreach ($session_cart1 as $value) 
                		                    {
                		                        if(in_array($value->menu_categoryid,$categories_arr))
                		                        {
                                                    $qty=$qty + $value->qty;
                                                    $menu_price=$menu_price + ($value->menu_price * $value->qty);
                		                        }
                		                    }
            		                         
            		                        if($menu_price > 0)
            		                        {
            		                            $discount_amount=$discount->discount_amount/100 * $menu_price;
            		                            if($discount_amount < $discount->discount_max)
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount_amount);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount_amount;
                		                            $discount_amount_val=$discount_amount;
                		                        }
                		                        else
                		                        {
                		                            $this->session->set_userdata('discount_amount',$discount->discount_max);
                		                            $this->session->set_userdata('coupon',$coupon);
                		                            $discount_totalall=$totalall - $discount->discount_max;
                		                            $discount_amount_val=$discount->discount_max;
            
                		                        }
                		                        if($discount_totalall < 0)
    		                        {
    		                            $discount_totalall=0;
    		                        }
                		                        $json_data=array('status'=>'1','msg'=>'Coupon Applied Successfully!','discount_amount'=>$discount_amount_val,'totalall'=>$discount_totalall);
                
            		                        }
                		                    else
                		                    {
                		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
                		                    }
            		                    }
            		                    else
            		                    {
            		                           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
            		                    }
        		                    }
		                        }
		                        else
		                        {
		                            $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
		                        }
		                        
		                    }
		                }
		                
		            }
		        }
		      
		      //category end
		        
		        
		    }
		    
		    else
	    {
	           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
	    }
		    
	    }
	    else
	    {
	           $json_data=array('status'=>'0','msg'=>'Coupon not applied!');
	    }
	    
	    echo json_encode($json_data);
	    
	    }
	    
	    public function remove_coupon()
	    {
	        $this->session->unset_userdata('discount_amount');
            $this->session->unset_userdata('coupon');
            echo 1;
	    }
	    
	    
	
}
