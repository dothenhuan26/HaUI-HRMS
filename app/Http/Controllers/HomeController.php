<?php

namespace App\Http\Controllers;

use App\Services\Api\AmazonS3Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $s3service;
    public function __construct(AmazonS3Service $s3Service)
    {
        $this->middleware('auth');
        $this->s3service = $s3Service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
