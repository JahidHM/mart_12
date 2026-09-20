<?php



namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
        public function index(){
          $product_categories = ProductCategory::where('show_on_home',1)->orderBy('name','asc')->get();
           $products = Product::where('show_on_home',1)->orderBy('name','asc')->get();
        return view('front.home',compact('product_categories', 'products'));
    }
     public function about(){
        return view('front.pages.about');
    }
 public function faq(){
  return view('front.pages.faq ');
 }
 public function contact(){
  return view('front.pages.contact');
 }
 public function blog(){
  return view('front.pages.blog');
 }
  public function products(){
     $products = Product::where('show_on_home',1)->orderBy('name','asc')->get();
  return view('front.pages.products',compact('products'));
    }
public function products_single($slug) {
  
    $product = Product::where('slug', $slug)->first();
    $related_products = product::where('product_category_id', $product->product_category_id)->where('id','!=',$product->id)
    ->orderBy('id','asc')->take(4)->get();
    return view('front.pages.products_single', compact('product','related_products'));
}
    public function cart(){
      return view('front.pages.cart');
    }
    public function checkout(){
      return view('front.pages.checkout');
    }
    public function privacy(){
      return view('front.pages.privacy');
    }
     public function terms(){
      return view('front.pages.terms');
    }
   

}
