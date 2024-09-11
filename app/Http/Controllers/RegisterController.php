<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Services\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\RegisterRepository;


class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    private $repo;

    public function __construct(RegisterRepository $repo){
        $this->repo = $repo;
    }
    public function __invoke(UserFormRequest $request)
    {
         return $this->repo->create_user($request->validated());
    }
}
