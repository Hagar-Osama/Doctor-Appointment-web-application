<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\EndUser\Interfaces\ProfileInterface;
use App\Http\Requests\AddProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profileInterface;

    public function __construct(ProfileInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;

    }

    public function index()
    {
        return $this->profileInterface->index();
    }

    public function update(AddProfileRequest $request)
    {
        return $this->profileInterface->update($request);
    }

    public function updateUserImage(Request $request)
    {
        return $this->profileInterface->updateUserImage($request);

    }


}
