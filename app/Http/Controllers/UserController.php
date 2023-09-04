<?php

namespace App\Http\Controllers;
use App\Repository\UserRepositoryInterface;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * get list of all the posts.
     *
     * @param $request: Illuminate\Http\Request
     * @return json response
     */
    public function index(Request $request)
    {
        $users = $this->user->all();
        return response()->json(['users' => $users]);
    }

    /**
     * store post data to database table.
     *
     * @param $request: App\Http\Requests\CreatePostRequest
     * @return json response
     */
    public function store(CreateUserRequest $request)
    {

        try {
           //  $data = $request->only(['name','email','password']);
            $data = $request->validated();
            $user = $this->user->insert($data);
            return response()->json(['users' => $user]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * update post data to database table.
     *
     * @param $request: App\Http\Requests\UpdateUserRequest
     * @return json response
     */
    public function update($id, UpdateUserRequest $request)
    {
        try {
            // $data = $request->only(['name','email','password']);
            $data = $request->validated();
            $user = $this->user->update($id, $data);
            return response()->json(['users' => $user]);
        } catch (Exception $e) {
           return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * get single item by id.
     *
     * @param integer $id: integer post id.
     * @return json response.
     */
    public function show($id)
    {
        try {
            $user = $this->user->find($id);
            return response()->json(['user' => $user]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * delete post by id.
     *
     * @param integer $id: integer post id.
     * @return json response.
     */
    public function destroy($id)
    {
        try {
            $this->user->delete($id);
            return response()->json(['msg' => "Successfully deleted"], 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
