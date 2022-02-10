<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
   
    public function register() 
    {
        return view('image.register');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name_image' => 'required|min:3',
            'image' => 'required'
        ], [
            'image.required' => 'image required',
            'name_image.required' => 'Title image required'
        ]);
        
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $input['image'] = $imageName;
        $request->image->move(public_path('uploads'), $imageName);

        Image::create($input);
        return redirect(route('home'));

        
    }

        public function destroy($id)
        {
                $image = Image::findOrFail($id);
                $image->delete();
    
                return redirect(route('home'));
        }

        public function update(Request $request, Image $image)
        {
            $request->validate([
                'name_image' => 'required|min:3',
                'image' => 'required'
            ], [
                'image.required' => 'image required',
                'name_image.required' => 'Title image required'
            ]);

            if ($request->hasFile('image')) {
                $imagem = $request->file('image');
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                Storage::disk('image')->put($imageName,  File::get($imagem));
                $input['image'] = $imageName;
            }
            
        }
}
