<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gambar;
use App\Models\ProfilPererusahaan;
use App\Models\Tiket;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $logo   = ProfilPererusahaan::limit(1)->get();
        // $data   = Home::all();
        $gambar = Gambar::all();
        return view('halaman_depan.page.home', [
            'title' => 'Home',
            'logos' => $logo,
            // 'data'  => $data,
            'gambar' => $gambar,
        ]);
    }
    public function blog()
    {

        $berita = Berita::limit(6)->get();
        $logo = ProfilPererusahaan::limit(1)->get();
        return view('halaman_depan.page.blog', compact('berita'), [
            'title' => 'Blog',
            'logos' => $logo
        ]);
    }
    public function blogshow(string $id): View
    {

        $logos = ProfilPererusahaan::limit(1)->get();
        $post = Berita::findOrFail($id);
        $title = 'Blog';

        return view(
            'halaman_depan.page.blogshow',
            compact('post', 'logos', 'title')
        );
    }

    public function show(string $id): View
    {
        //get post by ID
        $post = Berita::findOrFail($id);

        //render view with post
        return view('halaman_admin.pages.posts.show', compact('post'));
    }
    public function tiket()

    {
        $logo = ProfilPererusahaan::limit(1)->get();
        $tiket = Tiket::limit(3)->get();

        return view('halaman_depan.page.tiket', [
            'title' => 'Tiket',
            'logos' => $logo,
            'tiket' => $tiket
        ]);
    }
    public function company(): View
    {
        $data = ProfilPererusahaan::all();
        $logo = ProfilPererusahaan::all();
        $gambar = Gambar::all();


        return view('halaman_depan.page.company', [
            'title'     => 'Company',
            'data'      => $data,
            'logos'     => $logo,
            'gambar'    => $gambar,
        ]);
    }
}
