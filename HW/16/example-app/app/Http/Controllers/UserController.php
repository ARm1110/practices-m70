<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show( $id,$title, $category)
    {
       
        $data = [
            'title' => $title,
            'id' => $id,
            'category' => $category
        ];
        return view("category.$category.index", $data);
    }
}
