<?php
/**
 * Created by PhpStorm.
 * User: JepreTarim
 * Date: 15/10/2020
 * Time: 12:33 PM
 */

namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allUsers()
    {
//        $user = User::paginate(10);
//        $resource = UserResource::collection($user);
        return DataTables::collection(User::all())->toJson();
//        return DataTables::of($resource)->make();
    }
}
