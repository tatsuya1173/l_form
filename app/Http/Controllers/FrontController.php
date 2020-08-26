<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // DBよりBookテーブルの値を全て取得
        $books = Age::all();
  
        // 取得した値をビュー「book/index」に渡す
        return view('/index', compact('index'));
    }
}
