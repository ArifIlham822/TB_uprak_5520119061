<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\Storage;
use App\Models\categorie;


class CategorieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function categories()
    {
        $user =Auth::user();
        $categories =categorie::all();
        return view('categories', compact('user', 'categories'));
    }
   
    public function submit_categories(Request $request)
    {
        $categories= new categorie();
        $categories->name = $request->get('name');
        $categories->description = $request->get('description');

        $categories->save();

        $notification = array(
            'message' => 'Data berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);
    }


    public function update_categorie(Request $req)
    {
        $categories = categorie::find($req->get('id'));

        $categories ->name =$req->get('name');
        $categories ->description = $req->get('description');

        $categories->save();

        return redirect()->route('admin.categories')->with($notification);
    }

    
    public function getdataCate($id)
    {
        $cate= categories::find($id);

        return response()->json($cate);
    }
    
    //delete
    public function delete_categorie(Request $req)
    {
        $categories = categorie::find($req->id);
        $categories->delete();
     
        $notification = array(
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);

    }
}
