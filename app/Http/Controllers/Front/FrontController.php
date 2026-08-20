<?php



namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
        public function index(){
          $product_categories = ProductCategory::where('show_on_home',1)->orderBy('name','asc')->get();
        return view('front.home',compact('product_categories'));
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
  return view('front.pages.products');
    }
     public function products_single(){
  return view('front.pages.products_single');
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
