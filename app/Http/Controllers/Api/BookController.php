<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function read(Request $request){

        $books = new Book();

        $data = $books->all();        

        return  response()->json($data);
    }

    public function create(Request $request){

        $book = new Book();

        $book->name = $request->input("name");
        $book->isbn = $request->input("isbn");
        $book->author = $request->input("author");
        $book->edition = $request->input("edition");

        $book->save();

        $message=["message" => "Resgistro Exitoso!!"];

        return response()->json($message);
    }


    
    public function update(){

        return true;
    }

        
    public function delete(){

        return true;
    }

    public function upgrade(){


            return true;

    }
}
