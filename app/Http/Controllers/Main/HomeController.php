<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreFile;
use App\Models\File;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'File'
        ];

        return view('Chat/upload', $data);
    }

    public function list_image()
    {
        $data = [
            'title' => 'List'
        ];

        return view('Chat/images_list', $data);
    }

    public function storeImage(StoreFile $request)
    {
        // Prepaing Path
        $path = $request->file('foto')->store('public/images');

        $store = new File;
        $store->nama_foto = $request->nama_foto;
        $store->foto = $path;
        $store->save();

        return redirect('/upload');
    }
}
