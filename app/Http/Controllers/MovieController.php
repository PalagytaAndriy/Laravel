<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }


        $movie = new Movie;
        $movie->title = $request->title;
        $movie->published = false;
        $movie->poster_link = $imageName;
        $movie->save();

        return response()->json($movie, 201);
    }


    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->published = true;
        $movie->save();

        return response()->json($movie, 200);
    }

}
