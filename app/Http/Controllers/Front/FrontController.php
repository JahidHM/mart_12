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
  public function products(Request $request){
     $product_categories = ProductCategory::orderBy('name', 'asc')->get();
     $products = product::query();
    //  $products = Product::where('show_on_home',1)->orderBy('id','asc');
     if($request->category!=null &&  $request->category != ""){
      $products = $products->where('product_category_id', $request->category);
     }
     if($request->min_price !== null && $request->max_price !== null ){
      $minPrice = $request->min_price;
      $maxPrice = $request->max_price;
      $products = $products->whereHas('product_variations', function($query) use ($minPrice,$maxPrice){
        $query->whereBetween('sale_price', [$minPrice, $maxPrice]);
      });
     }

     
       if ($request->sort != null && $request->sort != '') {
            if ($request->sort == 'price_asc') {
                $products = $products->orderByRaw('(SELECT MIN(sale_price) FROM product_variations WHERE product_variations.product_id = products.id) ASC');
            } elseif ($request->sort == 'price_desc') {
                $products = $products->orderByRaw('(SELECT MIN(sale_price) FROM product_variations WHERE product_variations.product_id = products.id) DESC');
            } elseif ($request->sort == 'name_asc') {
                $products = $products->orderBy('name', 'asc');
            } elseif ($request->sort == 'name_desc') {
                $products = $products->orderBy('name', 'desc');
            } elseif ($request->sort == 'rating_desc') {
                $products = $products->orderBy('average_rating', 'desc');
            } else {
                $products = $products->orderBy('id', 'asc');
            }
        }

        $products = $products->paginate(12);
       
                       
  return view('front.pages.products',compact('products','product_categories'));
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
