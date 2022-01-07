<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Order;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            else 
            {
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');

        }
       
    }
    public function uploadproduct(Request $request)
    {
      $data=new product;
      $image=$request->file;
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->file->move('productimage',$imagename);
      $data->image=$imagename;
      $data->titel=$request->titel;
      $data->price=$request->price;
      $data->discription=$request->dicription;
      $data->quantity=$request->quantity;
      $data->save();

      return redirect()->back()->with('message','Product Added Successfully');

    }

    public function showproduct()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                $data=product::all();
                return view('admin.showproduct',compact('data'));
            }
            else 
            {
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');

        }
       
    }
    public function deleteproduct($id)
    {
       $data=product::find($id);
       $data->delete();
        return redirect()->back()->with('message','Product Deleted ');
    }

    public function updateview($id)
    {
       $data=product::find($id);
        return view('admin.updateview',compact('data'));
    }
    public function updateproduct(Request $request, $id)
    {
       $data=product::find( $id);
      
       $image=$request->file;
       if($image)
       {

            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage',$imagename);
            $data->image=$imagename;
       }
            $data->titel=$request->titel;
            $data->price=$request->price;
            $data->discription=$request->dicription;
            $data->quantity=$request->quantity;
            $data->save();
 
       return redirect()->back()->with('message','Product Updated Successfully');
     }
     public function showorder()
     {

        $order=order::all();
        return view('admin.showorder',compact('order'));
     }

     public function updatestatus($id)
     {
         $order=order::find($id);
         $order->status='Deliverd';
         $order->save();

         return redirect()->back();
     }
}
