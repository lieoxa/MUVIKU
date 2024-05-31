<?php

namespace App\Http\Controllers;

class UserPageController extends Controller
{
    public function jujutsu()
    {
        return view('user.serial');
    }
    public function formlogin()
    {
        return view('admin.login.login');
    }
    public function watchlist()
    {
        return view('user.watchlist');
    }
    public function op()
    {
        return view('user.op');
    }
    public function podcast()
    {
        return view('user.podcast');
    }
    public function toystory()
    {
        return view('user.toystory');
    }
    public function mario()
    {
        return view('user.mario');
    }
    public function spy()
    {
        return view('user.spy');
    }
    public function iron3()
    {
        return view('user.iron3');
    }
    public function century()
    {
        return view('user.century');
    }
    public function jawa()
    {
        return view('user.jawa');
    }
    public function pertaruhan()
    {
        return view('user.pertaruhan');
    }
    public function detailsrc()
    {
        return view('user.detailsrc');
    }
    public function jumanji()
    {
        return view('user.jumanji');
    }
    public function cars()
    {
        return view('user.cars');
    }
}
