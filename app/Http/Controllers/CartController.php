<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Session;

class CartController extends Controller
{

    public function addToCart($id, Request $request) {
      if(Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
        }

        //if movie in cart already has quantity, add to it. if none, assign to quantity
        if(isset($cart[$id])) {
            $cart[$id] += $request->quantity;
        } else {
            $cart[$id] = $request->quantity;
        }

        //put the cart in a session
        Session::put('cart', $cart); //this is the traditional session

        // dd(Session::get('cart'));
        $movie = Movie::find($id);
        Session::flash("success_cart", "$request->quantity of $movie->name has been successfully added to your cart");
        
        // return redirect("/catalog");
        // return array_sum(Session::get('menu'));
         return redirect('/movies');

     }  

     public function showCart() {
        $movie_cart = [];
        if(Session::has('cart')) {
            $cart = Session::get('cart');
            $total = 0;
            foreach($cart as $id=>$quantity) {
                $movie = Movie::find($id);

                $movie->quantity=$quantity;
                $movie->subtotal = $movie->price * $quantity;

                $total += $movie->subtotal;
                $movie_cart[] = $movie;
                // we push $movie array (array pushing)
            }
            // dd($movie);
        }
        return view('cart.cart_content', compact('movie_cart'));
    }

     public function deleteCart($id) {
        // var_dump($id);+
        // we want to remove the specific id in the session 'cart'
        Session::forget("cart.$id"); //this is the same as cart('$id')
        return redirect('/mycart');
    }

    public function clearCart() {
        Session::forget("cart");
        return redirect("/mycart");
    }

    public function updateCart($id, Request $request) {
        $cart = Session::get('cart');
        $cart[$id] = $request->new_qty;
        Session::put('cart', $cart);
        return redirect("/mycart");
    }

}
