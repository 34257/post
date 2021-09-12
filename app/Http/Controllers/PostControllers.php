<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
class PostControllers extends Controller
{

    public function index(){
        $data['posts'] = Posts::all();
        return view('home',$data);
    }
    public function insert(Request $req){
        // if($req->method==POST){
            $req->validate([
                'title' =>'required',
                'image' =>'mimes:jpg,png,jpeg,gif',
                'desc' =>'required'
            ]);

            $filename = $req->image->getClientOriginalName();
            $req->image->move(public_path("/photos"),$filename);

            $p = new Posts();
            $p->title = $req->title;
            $p->desc = $req->desc;
            $p->image = $filename;
            $p->user_id =Auth::id();
            $p->save();

            // Posts::create($validateData);
            return redirect()->back();
        // }

    }
    public function edit($id){
        $data['p'] = Posts::find($id);
        return view('edit',$data);
    }
    public function update(Request $req,$id){
        // if($req->method==POST){
            $req->validate([
                'title' =>'required',
                // 'image' =>'required|mimes:jpg,png,jpeg,gif',
                'desc' =>'required'
            ]);
           
            $p =  Posts::find($id);
            $p->title = $req->title;
            $p->desc = $req->desc;
            if($req->hasfile('image')){
                $destination = 'public_path("/photos")'.$p->image;
                if(File::exists($destination)){
                    File::delete($destination);
                }

                $filename = $req->image->getClientOriginalName();
                $req->image->move(public_path("/photos"),$filename);
            }

            $p->update();

            // Posts::create($validateData);
            return redirect()->back();
        // }

    }
 
    
}