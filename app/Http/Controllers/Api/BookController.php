<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function read(Request $request){

        $books = new Book();

        $data = $books->all();        

        return  response()->json($data,200);
    }

    public function create(Request $request){

        $book = new Book();

        $book->name = $request->input("name");
        $book->isbn = $request->input("isbn");
        $book->author = $request->input("author");
        $book->edition = $request->input("edition");

        $book->save();

        $message=["message" => "Resgistro Exitoso!!"];

        return response()->json($message,Response::HTTP_CREATED);
        
        // return response()->json($message,Response::201);
    }


    
    public function update(Request $request){


        $idBook = $request->query("id");

        $book = new Book();

        $bookParticular = $book->find($idBook);

        $bookParticular->name = $request->input("name");
        $bookParticular->isbn = $request->input("isbn");
        $bookParticular->author = $request->input("author");
        $bookParticular->edition = $request->input("edition");


        $bookParticular->save();

        $message=[
            "message" => "Actualización Exitosa!!",
            "idBook" => $request->query("id"),
            "nameBook"=>$bookParticular->name
        ];

        return $message;
    }

        

    public function delete(Request $request){

        $idBook = $request->query("id");

        $book = new Book();

        $bookParticular = $book->find($idBook);

        $bookParticular->delete();

        $message=[
            "message" => "Eliminación Exitosa!!",
            "idBook" => $request->query("id"),
        ];

        return $message;
    }


}
