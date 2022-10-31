<?php

namespace App\Http\EndUser\Repositories;

use App\Http\EndUser\Interfaces\ProfileInterface;
use App\Http\Traits\FilesTraits;
use App\Models\User;
use Exception;

class ProfileRepository implements ProfileInterface
{

    private $userModel;
    use FilesTraits;


    public function __construct(User $user)
    {
        $this->userModel = $user;

    }

    public function index()
    {
        if(auth()->check()) {
            return view('profile.index');
        }
        return redirect()->back();

    }

    public function update($request)
    {
        try {
            $this->userModel::where('id', auth()->user()->id)
            ->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'address' => $request->address,
                'description' => $request->description
            ]);
            session()->flash('message', 'User Profile Updated Successfully');
            return redirect()->back();

        }catch(Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function updateUserImage($request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->File('file');
        $imageName = $image->hashName();
        $this->uploadFile($image, 'profile/'. auth()->user()->name, $imageName );
        $this->userModel::where('id', auth()->user()->id)
        ->update([
            'image' => $imageName
        ]);
        session()->flash('message', 'User Profile Image Updated Successfully');
        return redirect()->back();

    }




}
