<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Product;
use App\Images;
use App\User;
use DB;
use Session;
use File;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
   
    public function __construct()
    {

        $this->middleware('auth');
    }

        public function index()
    {
          $products=Product::where( 'user' , Auth::user()->id)->orderBy('created_at','desc')->paginate(3);
          
             return view('seller.profile', compact('products'));
    }
     public function create()
    {

         $product_id=Session::get('product_id');
         $images = Images::where([ 'product_id' => $product_id])->get();
    return view('seller.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'       =>  'max:191',
            'category'    =>  'required',
            'colors'      =>  'required',
            'description' =>  'max:191',
            'discount'    =>  'digits_between:1,2'
        ]);

        $colors_arr= $request->input('colors');
        $colors='';
        foreach ($colors_arr as  $color) {
            $colors.=$color.":";
        }
        $product_id=Session::get('product_id');
        if($product_id!=''){
        $product=Product::find($product_id);
        $product->user=Auth::user()->id;

        $product->title=$request->input('title');
        $product->description=$request->input('description');
        $product->details=$request->input('details');
        $product->price=$request->input('price');
        $product->discount=$request->input('discount');
        $product->colors=$colors;
        $product->category=$request->input('category');
        $product->brand=$request->input('brand');
             $product->save();
        
        Session::put('product_id', '');
        return redirect()->route('home.index')->with('success', 'Ad Uploaded Successfully');
      }else{
        return redirect()->route('home.addProduct')->with('error', 'Please upload at least one photo');
      }
    }

      function upload(Request $request)
    {
        $product_id=Session::get('product_id');
     $this->validate($request, [
      'file1'  => 'required|image|mimes:jpg,png,gif|max:2048'
     ]);

     $image = $request->file('file1');
    $new_name    = $image->getClientOriginalName();

    $image_resize = Image::make($image->getRealPath());              
    $image_resize->resize(600,600);

     // $new_name = date("Ymdhis") . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images'), $new_name);

     if($product_id!=''){
       
     }else{
        $prods=Product::where([
        'user' => Auth::user()->id,
        'colors' => 'khan'
                ])->get();
        foreach($prods as $prod) {
              $prod->delete();
          }

        $product = new Product([
                    'user'   => Auth::user()->id,
                    'title'    =>  'this is title',
                    'description'    =>  'this is title',
                    'details'    =>  'this is title',
                    'price'    =>  1,
                    'discount' => 1,
                    'category'    =>  'this is title',
                    'brand' => 'brand',
                    'visits'=>  0,
                    'colors'    =>  'khan',
                ]);
                $product->save();
                $product_id= DB::getPdo()->lastInsertId();
                Session::put('product_id', $product_id);

     }

      $image = new Images([
                    'url'    =>  $new_name,
                    'product_id'=> $product_id,
                ]);
                $image->save();
    $images = Images::where([
       'product_id' => $product_id
])->get();
    return view('seller.create', compact('images'));

     // return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }
    
    public function destroy($id)
    {
        $image = Images::find($id);
        File::delete('images/'.$image->url);
        $image->delete();
        return redirect()->route('home.addProduct');
    }
    
}
