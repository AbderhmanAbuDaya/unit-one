<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\Models\Home;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Weidner\Goutte\GoutteFacade;

class HomeController extends Controller
{
//    private $result=array();
//    public function getHomes()
//    {
//        $client = new Client();
//// create a crawler object from this link
//        $crawler = $client->request('GET', 'https://summerhomes.com/');
////        echo '<pre>';
////        print_r($crawler);
////        echo '</pre>';
//// filter all li elements that have class “css-ye6x8s” and loop over them
//        $crawler->filter('.swiper-slide')->each(function ($node) {
//          $this->result[]=  $node->filter('.box-item > a')->extract(['href']);
//        });
//        print_r($this->result);
////        echo '<pre>';
////        print_r($crawler);
////        echo '</pre>';
//    }

public function index()
{
    if (request()->ajax()) {
        $homes = Home::withTrashed()->get();
        return datatables()->of($homes)
            ->editColumn('actions', function ($home) {
                return view('homes.actions', compact('home'));
            })

            ->editColumn('cover_image', function ($home) {
                return view('homes.image',compact('home'));
            })
            ->make(true);
    }
    return view('dashboard');
}

public function create()
{

    return view('homes.add',[
        'home'=>new Home()
    ]);
}

    public function store(HomeRequest $request)
    {
        $image_path='';
        if ($request->hasFile('cover_image'))
        {
            $file=$request->file('cover_image');
            $image_path=$file->store('/homes','uploads');
        }
        Home::create([
            'title'=>$request->post('title'),
            'price'=>$request->post('price'),
            'cover_image'=>$image_path,
            'city'=>$request->post('city'),
            'desc'=>$request->post('desc'),
            'sales_agent'=>$request->post('sales_agent'),
            'sales_agent_phone'=>$request->post('sales_agent_phone'),
            'link'=>$request->post('link')
        ]);

        return redirect()->route('homes.index')->with(['success'=>'add success']);

    }
    public function edit($id)
    {
        return view('homes.edit',[
            'home'=>Home::find($id)
        ]);
    }
    public function update(HomeRequest $request,$id)
    {
        $home=Home::find($id);
        $image_path='';
        if ($request->hasFile('cover_image'))
        {
            $image_path = $home->cover_image;
            if(File::exists('assets/images/'.$image_path))
                File::delete('assets/images/'.$image_path);

            $file=$request->file('cover_image');
            $image_path=$file->store('/homes','uploads');
        }
        $home->update([
            'title'=>$request->post('title'),
            'price'=>$request->post('price'),
            'cover_image'=>$image_path,
            'city'=>$request->post('city'),
            'desc'=>$request->post('desc'),
            'sales_agent'=>$request->post('sales_agent'),
            'sales_agent_phone'=>$request->post('sales_agent_phone'),
            'link'=>$request->post('link')
        ]);

        return redirect()->route('homes.index')->with(['success'=>'edit success']);
    }

    public function destroy($id)
    {
        $home=Home::find($id);
        $home->delete();
        return redirect(route('homes.index'))
            ->with('success', 'Home add in  trashed');
    }
    public function restore(Request $request,  $home = null )
    {

        if ($home) {
            $home = Home::onlyTrashed()->findOrFail($home);
            $home->restore();

            return redirect()->route('homes.index')
                ->with('success', "Event ($home->title) restored.");
        }

        Home::onlyTrashed()->restore();
        return redirect()->route('homes.index')
            ->with('success', "All trashed homes restored.");
    }
}
