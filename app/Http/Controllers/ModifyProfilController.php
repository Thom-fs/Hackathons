<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ModifyProfil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|mimes:jpg,png,jpeg'
        ]);

        $newPicture = '';

        if (isset($request->picture)) {


            $newPicture =  $request->picture->store('picture');
            $request->picture->move(public_path('picture'), $newPicture);
        }

        $post = [
            'picture' => $newPicture
        ];

        user::created($newPicture);

        // $request->validate([
        //     'file' => 'required|mimes:csv,txt,xlx,xls,pdf,jpeg,png,|max:2048'
        //     ]);
        //     $fileModel = new File;
        //     if($request->file()) {
        //         $fileName = time().'_'.$request->file->getClientOriginalName();
        //         $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
        //         $fileModel->name = time().'_'.$request->file->getClientOriginalName();
        //         $fileModel->file_path = '/storage/' . $filePath;
        //         $fileModel->save();
        //         return back()
        //         ->with('success','File has been uploaded.')
        //         ->with('file', $fileName);
        //     }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['message' => '', 'post' => $post], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //route a faire
    {
        $post = User::find($id);
        $post->firstname = $request->input('firstname');
        $post->lastname = $request->input('lastname');
        $post->email = $request->input('email');
        $post->password = $request->input('password');
        $post->linkedin = $request->input('linkedin');
        $post->github = $request->input('github');
        $post->website = $request->input('website');
        $post->portfolio = $request->input('portfolio');
        $post->bio = $request->input('portfolio');
        $post->picture = $request->input('picture');
        $post->save();

        return redirect()->back();
        // back to profil
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
