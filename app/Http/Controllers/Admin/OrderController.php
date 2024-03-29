<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',

        ]);

        $image= $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'-'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider',0777 , true);
            }

            $image->move('uploads/slider',$imagename);
        } else
            {
                $imagename= 'default.png';

             }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Saved');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,png',

        ]);

        $image= $request->file('image');
        $slug = str_slug($request->title);
        $slider = Slider::find($id);
        if (isset($image))
        {
            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'-'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider',0777 , true);
            }

            $image->move('uploads/slider',$imagename);
        } else
        {
            $imagename= $slider->image;

        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('successMsg','Slider Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(file_exists('uploads/slider/'.$slider->image)){
            unlink('uploads/slider/'.$slider->image);
        }

        $slider->delete();
        return redirect()->back()->with('successMsg','Successfully Deleted');
    }
    //status
    public function status(Request $request,$id)
    {
        $slider = Order::find($id);
        $slider->status = $request->status;
        $slider->save();
        return redirect()->back()->with('successMsg','Status Successfully Updated');
    }
}
