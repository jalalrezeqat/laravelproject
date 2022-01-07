<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;



class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
           
            $data =product::paginate(3);
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();
            return view('User.home',compact('data','count'));
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data =product::paginate(3);
            return view('User.home',compact('data'));
        
        }
    }

    public function search(Request $request)
    {
        $search=$request->search;
        if($search=='')
        {
            $data =product::paginate(3);
            return view('User.home',compact('data')); 
        }
        
        $data=product::where('titel','Like','%'.$search.'%')->get();

        return view('User.home',compact('data'));
    }

    public function addcart(Request $request ,$id )
    {
        if(Auth::id())
        {
            $user=auth()->user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_titel=$product->titel;
            $cart->price=$product->price;
            $cart->quantity=$request->quantity;
            $cart->save();

            return redirect()->back()->with('message','Product Updated Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

    public function showcart()
    {
        $user=auth()->user();
        $data=cart::where('phone',$user->phone)->get();
        $count=cart::where('phone',$user->phone)->count();
        return view('User.showcart',compact('count','data'));
    }

    public function deletecart($id)
    {
       $data=cart::find($id);
       $data->delete();
        return redirect()->back()->with('message','Product Deleted ');
    }

    public function confirmorder(Request $request)
    {
        $user=auth()->user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;

        foreach($request->productname as $key=>$productname)
        {
            $order=new order;
            $order->product_name=$request->productname[$key];
            $order->quantity=$request->quantity[$key];
            $order->price=$request->price[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;

            $order->status='not delivered';

            $order->save();
            
        }

        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Product Order Succeddfully');
    }
}
