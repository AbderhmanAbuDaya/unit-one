<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomePajenation;
use App\Http\Resources\HomeResource;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $homes=Home::query();
         if (\request()->has('range')) //range=5000-6000
         {
             $prices=explode('-',\request()->query('range'));
             $homes->whereBetween('price',$prices);
         }
         if (\request()->has('city'))
         {
             $homes->where('city',\request()->query('city'));
         }
         if (\request()->has('search'))
         {
             $ser=\request()->query('search');
             $homes->where('desc','like','%'.$ser.'%');
         }
      $homes=   $homes->paginate(10);

         return $this->response_api(200,'success',new HomePajenation($homes));

    }

    public function show($id)
    {
        return $this->response_api(200,'success',new HomeResource(Home::find($id)));
    }












    private function response_api($code,$message,$data)
    {
        return response([
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        ],$code);
    }
}
