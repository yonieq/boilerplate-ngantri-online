<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\User\UserStoreRequest;
use App\Http\Requests\Master\User\UserUpdateeRequest;
use App\Http\Resources\PublicResource;
use App\Repositories\Master\UserRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    //
    private $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
        $user = $this->userRepo->getAll($request);

        return new PublicResource($user, 'Get', Response::HTTP_OK, 'Get data retrieved successfully');
    }

    public function store(UserStoreRequest $request)
    {
        try {
            $user = $this->userRepo->save($request);

            return new PublicResource($user, 'Post', Response::HTTP_CREATED, 'Data created successfully');
        } catch (\Throwable $th) {
            return new PublicResource($th, 'Post', Response::HTTP_INTERNAL_SERVER_ERROR, 'Data created failed');
        }
    }

    public function show($id)
    {
        try {
            $user = $this->userRepo->getById($id);

            return new PublicResource($user, 'Get', Response::HTTP_OK, 'Data retrieved successfully');
        } catch (\Throwable $th) {
            return new PublicResource($th, 'Get', Response::HTTP_INTERNAL_SERVER_ERROR, 'Data retrieved failed');
        }
    }

    public function update(UserUpdateeRequest $request, $id)
    {
        try {
            $user = $this->userRepo->edit($request, $id);

            return new PublicResource($user, 'Put', Response::HTTP_OK, 'Data updated successfully');
        } catch (\Throwable $th) {
            return new PublicResource($th, 'Put', Response::HTTP_INTERNAL_SERVER_ERROR, 'Data updated failed');
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->userRepo->delete($id);

            return new PublicResource($user, 'Delete', Response::HTTP_OK, 'Data deleted successfully');
        } catch (\Throwable $th) {
            return new PublicResource($th, 'Delete', Response::HTTP_INTERNAL_SERVER_ERROR, 'Data deleted failed');
        }
    }
}
