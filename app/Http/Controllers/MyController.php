<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Redirect;
use App\Product;
use App\Images;
use App\User;
use App\Offer;
use App\Rattings;
use App\Wishlist;
use App\Sales;
use DB;
use Session;
use File;
use Auth; 
use Cart;
use DateTime;

class MyController extends Controller
{
	function index(){
    
		      $products=Product::orderBy('visits', 'desc')->get();
          $sales=Sales::select('product_id', DB::raw('count(*) as total'))
          ->groupBy('product_id')
          ->pluck('product_id');
          $top_sales=Product::whereIn('id',$sales)->orderBy('visits','desc')->take(30)->get();
          
                
         return view('welcome', compact('products','top_sales'));
	}

	public function view($slug,$id){
   

		  $product=Product::find($id);
      $product->visits++;
      $product->save();

		   // print_r($product);
		  $rattings=Rattings::where( 'product_id' , $id)->orderBy('created_at','desc')->paginate(3);
      $wishlist="false";
      if (Auth::check()){
      $wishlists=Wishlist::where('product_id',$id)->get();      
      foreach ($wishlists as $row) { //means user has added to wishlist this item
        if($row->user==Auth::user()->id){
          $wishlist="true";
          break;
        }
      }
		  }
      $relatedProducts=Product::where(['category'=>$product->category,'brand'=>$product->brand])->orderBy('visits','desc')->take(4)->get();
      
      if($product!="")
          return view('viewProduct', compact('product','relatedProducts','rattings','wishlist'));
        else
          return "No Product found";
	}
    public function mystore($category){
      if($category=="HotDeals"){
        $offers_list=Offer::select()->get();
        
        foreach ($offers_list as $offer) {
            $datetime1 = new DateTime($offer->created_at);//start time  '2016-11-30 03:55:06'
            $datetime2 = new DateTime();//end time
            $interval = $datetime1->diff($datetime2);
            $days=$interval->format('%d');
            if($days>6){
              $offer->delete();
            }
          }
        $offers=Offer::pluck('product_id');
        $offer="true";
         $products=Product::whereIn( 'id' , $offers)->orderBy('visits','desc')->paginate(6);
            
      }else{
		$products=Product::where( 'category' , $category)->orderBy('visits','desc')->paginate(6);
    
$offer="false";
  }
		$sales=Sales::select('product_id', DB::raw('count(*) as total'))
          ->groupBy('product_id')
          // ->take(2)
          ->pluck('product_id');
          $top_sales=Product::whereIn('id',$sales)
          ->where('category',$category)
          ->orderBy('visits','desc')->take(4)->get();
  
		    return view('store', compact('products','top_sales','offer'));		  
	}
	 public function review(Request $request)
    {
        $this->validate($request, [
            'name'   =>  'required|max:30',
            'email'    =>  'required|email',
            'comment'     =>  'required|max:191',
            'ratting' => 'required'
        ]);
        $ratting=new Rattings([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'ratting'=>$request->input('ratting'),
        'comment'=>$request->input('comment'),
        'product_id'=>$request->input('product_id'),
    ]);
             $ratting->save();
             return redirect()->route('view',['slug'=>$request->input('product_slug'),'id'=> $request->input('product_id')]); 


    }
    
    public function addToCart(Request $request){
        
        Cart::add($request->id, $request->name, $request->qnty, $request->price, ['color' => $request->color,'size' => $request->size,'url' => $request->url]);
        
        echo $this->viewShoppingCart();
       
   }
   public function load(){
    echo $this->viewShoppingCart();
   }

   public  function remove($row_id)
 {
    Cart::remove($row_id);   
    echo $this->cart();
 }
   public function viewShoppingCart(){

     $output='<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty">'.Cart::content()->count().'</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">';
        foreach(Cart::content() as $row) {
            $url=($row->options->has("url") ? $row->options->url : "");
       $output.=' 
       <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="'.asset('/images/'.$url).'" alt="">
                                                </div>
                                                <div class="product-body">
                                                <h3 class="product-name"><a href="'.route("view", ['slug'=>str_slug($row->name),'id'=>$row->id]).'">'.$row->name.'</a></h3>
                                                    <h5 class="product-price"><span class="qty">Qty '.$row->qty.'</span>$'.$row->price.'</h5>
                                                    <h5><span>size:'.($row->options->has("size") ? $row->options->size : "-").'</span>  color:'.($row->options->has("color") ? $row->options->color : "-").'</h5>
                                                </div>
                                                
                                                <form method="get" class="delete_form" action="'.action("MyController@remove", $row->rowId).'">
      
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="delete remove_inventory"><i class="fa fa-close"></i></button>
     </form>
                                            </div>
                                                   ';
                                        }
                                        $output.='</div>
                                        <div class="cart-summary">
                                            <small>'.Cart::count().' Item(s) selected</small>
                                            <h5>SUBTOTAL: $'.Cart::subtotal().'</h5>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="'.route("cart").'">View Cart</a>
                                            <a href="'.route("checkout").'">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>';

      return $output;
   }
   public function removeProduct($id){
    $product = Product::find($id);
    $images=Images::where('product_id',$id)->get();
      
    foreach ($images as  $image) {
      File::delete('images/'.$image->url); 
      $image->delete();
    }
    $product->delete();
      return redirect()->route('home.index')->with('success', 'Ad deleted Successfully');
   }
   public function setOffer(Request $request){
        $offer=new Offer([
        'product_id'=>$request->id,
    ]);
             $offer->save();
       
   }
   public function removeOffer(Request $request){
        
        $offers=Offer::where('product_id',$request->id)->get();
        foreach ($offers as  $offer) {
        $offer->delete();
      }
       

   }
   //    Wishlist
   public function addToWishlist($slug,$id){

         if (Auth::check()){
          $wishlist=new Wishlist([
            'product_id'=>$id,
            'user' => Auth::user()->id
          ]);
          $wishlist->save();
         }
         return redirect()->route('view',['slug'=> $slug,'id'=>$id]); 
  }
  public function removeFromWishlist($slug,$id){
         if (Auth::check()){
          $wishlists=Wishlist::where(['product_id'=>$id,'user'=>Auth::user()->id])->get();
          foreach ($wishlists as $wishlist) {
            $wishlist->delete();
          }
         }
         return redirect()->route('view',['slug'=> $slug,'id'=>$id]); 
  }
  public function viewWishlist(){
    if (Auth::check()){
          $wishlist=Wishlist::select('product_id')->where('user',Auth::user()->id); // at first attemp
         $products=Product::whereIn('id', $wishlist)->get();
          $output='<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-heart-o"></i>
                                        <span>Your Wishlist</span>
                                        <div class="qty">'.count($products).'</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">';
        foreach($products as $row) {
            $url=$row->images->first()->url;
          
       $output.=' 
       <div class="product-widget">
          <div class="product-img">
              <img src="'.asset('/images/'.$url).'" alt="">
          </div>
          <div class="product-body">
              <h3 class="product-name"><a href="'.route("view", ['slug'=>$row->slug,'id'=>$row->id]).'">'.$row->title.'</a></h3>
              <h4 class="product-price">$'.$row->price*(1-$row->discount/100).' <del class="product-old-price">$'.$row->price.'</del></h4>
              
              
          </div>
          
      </div>';
                                        
   }
                                        $output.='</div>
                                        
                                        
                                    </div>';

      
    }
    echo $output;
  }
  public function search(Request $request){
    $search=$request->search;
    if( $request->category=="All Categories"){
      $products=Product::where('title','LIKE','%'.$search.'%')->paginate(11);
      // echo count(Product::where('category','Laptops')->get());
    }else{
      $products=Product::where('title','LIKE','%'.$search.'%')->where('category',$request->category)->paginate(11);
      
    }
    $offer="false";
    $sales=Sales::select('product_id', DB::raw('count(*) as total'))
          ->groupBy('product_id')
          // ->take(2)
          ->pluck('product_id');
          $top_sales=Product::whereIn('id',$sales)
          ->where('category',$request->category)
          ->orderBy('visits','desc')->take(4)->get();
    return view('store', compact('products','top_sales','offer'));
  }
//  sort the products
  public function sortProducts(){
    $categories=array();
    if(isset($_GET['Laptops']))   // means Laptops is selected
array_push($categories,"Laptops");
  if(isset($_GET['Cameras']))   // means Cameras is selected
array_push($categories,"Cameras");
  if(isset($_GET['Smartphones']))    // means Smartphones is selected
array_push($categories,"Smartphones");
if(isset($_GET['Accessories']))    // means Accessories is selected
array_push($categories,"Accessories");


 $brands=array();
    if(isset($_GET['SONY']))   // means sony is selected
array_push($brands,"SONY");
  if(isset($_GET['LG']))   // means LG is selected
array_push($brands,"LG");
  if(isset($_GET['SAMSUNG']))    // means SAMSUNG is selected
array_push($brands,"SAMSUNG");
if(isset($_GET['DELL']))    // means SAMSUNG is selected
array_push($brands,"DELL");

$lower=1;
$upper=100000;
if(isset($_GET['price1'])){
$lower=1;$upper=500;  
if(isset($_GET['price2']))
  $upper=1000;
if(isset($_GET['price3']))
  $upper=100000;
} 
if(isset($_GET['price2'])){
$lower=500;$upper=1000;  
if(isset($_GET['price1']))
  $lower=1;
if(isset($_GET['price3']))
  $upper=100000;
}
if(isset($_GET['price3'])){
$lower=1000;$upper=100000;  
if(isset($_GET['price2']))
  $lower=500;
if(isset($_GET['price1']))
  $lower=1;
}  

    //whereIn('category',$categories)->
if(count($brands)>0 && count($categories)==0 )
    $products=Product::whereIn('brand',$brands)->whereBetween('price', [$lower, $upper]) ->paginate(60);
else if( count($brands)==0 && count($categories)>0 )
    $products=Product::whereIn('category',$categories)->whereBetween('price', [$lower, $upper]) ->paginate(60);
else if( count($brands)>0 && count($categories)>0 )
  $products=Product::whereIn('brand',$brands)->whereIn('category',$categories)->whereBetween('price', [$lower, $upper]) ->paginate(60);
else
    $products=Product::whereBetween('price', [$lower, $upper]) ->paginate(60);


$offer="false";  
 $sales=Sales::select('product_id', DB::raw('count(*) as total'))
          ->groupBy('product_id')
          // ->take(2)
          ->pluck('product_id');
          $top_sales=Product::whereIn('id',$sales)
          ->orderBy('visits','desc')->take(4)->get();

        return view('store', compact('products','top_sales','offer'));  
  }

//  check out
public function checkout(){
  return view('checkout');
}
public function placeOrder(Request $request){
foreach(Cart::content() as $row) {
$sale=new Sales([
'product_id'=>$row->id
]);
$sale->save();
}
Cart::destroy();
return redirect()->route('welcome')->with('success','Your Order is placed.');
}
//  subscribe
public function subscribe(Request $request){
   $this->validate($request, [
            'email'    =>  'required|email'
        ]);
    //     $ratting=new Rattings([
    //     'name'=>$request->input('name'),
    //     'email'=>$request->input('email'),
    //     'ratting'=>$request->input('ratting'),
    //     'comment'=>$request->input('comment'),
    //     'product_id'=>$request->input('product_id'),
    // ]);
    //          $ratting->save();
             return redirect()->route('welcome')->with('success','Thank You for SUBSCRIPTION');
}
// cart
public function cart(){
  $cartItems=Cart::content();
  return view('cart',compact('cartItems'));
}
} //  class ends