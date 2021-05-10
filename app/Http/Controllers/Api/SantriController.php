<?php

/**
 * File UserController.php
 *
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Laravue
 * @version 1.0
 */

namespace App\Http\Controllers\Api;

use App\Http\Resources\PermissionResource;
use App\Http\Resources\SantriResource;
use App\Laravue\JsonResponse;
use App\Laravue\Models\Permission;
use App\Laravue\Models\Role;
use App\Laravue\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Api
 */
class SantriController extends BaseController
{
    const ITEM_PER_PAGE = 15;

    /**
     * Display a listing of the user resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|ResourceCollection
     */
    public function index(Request $request)
    {
        $searchParams = $request->all();
        $userQuery = User::query();
        $limit = Arr::get($searchParams, 'limit', static::ITEM_PER_PAGE);
        $role = Arr::get($searchParams, 'role', '');
        $keyword = Arr::get($searchParams, 'keyword', '');
        $norole = 'students';
        if (!empty($norole)) {
            $userQuery->whereHas('roles', function ($q) use ($norole) {
                $q->where('name', $norole);
            });
        }
        if (!empty($role)) {
            $userQuery->where(function ($query) use ($role) {
                $query->where('sekolah_sekarang', 'LIKE', $role);
            });
        }

        if (!empty($keyword)) {
            $userQuery->where('nama_belakang', 'LIKE', '%' . $keyword . '%');
            $userQuery->orWhere('no_pendaftaran', 'LIKE', '%' . $keyword . '%');
        }



        return SantriResource::collection($userQuery->paginate($limit));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        if ($request->hasFile('image')) {
            $imageName = $params['image']->getClientOriginalName();
            $image = $params['image'];
            $image->move('uploads/images/banner', $imageName);
            $user = User::create([
                'name' => $params['name'],
                'nama_tengah' => $params['nama_tengah'],
                'nama_belakang' => $params['nama_belakang'],
                'email' => $params['email'],
                'nis' => $params['nis'],
                'nisn' => $params['nisn'],
                'no_ijazah' => $params['no_ijazah'],
                'jenis_kelamin' => $params['jenis_kelamin'],
                'tempat_lahir' => $params['tempat_lahir'],
                'tgl_lahir' => $params['tgl_lahir'],
                'alamat' => $params['alamat'],
                'provinsi' => $params['provinsi'],
                'kabupaten' => $params['kabupaten'],
                'kelurahan' => $params['kelurahan'],
                'kode_pos' => $params['kode_pos'],
                'sekolah_asal' => $params['sekolah_asal'],
                'sekolah_sekarang' => $params['sekolah_sekarang'],
                'foto' => '/uploads/images/banner/' . $imageName,
            ]);
            $role = Role::findByName($params['role']);
            $user->syncRoles($role);
        } else {
            $user = User::create([
                'name' => $params['name'],
                'nama_tengah' => $params['nama_tengah'],
                'nama_belakang' => $params['nama_belakang'],
                'email' => $params['email'],
                'nis' => $params['nis'],
                'nisn' => $params['nisn'],
                'no_ijazah' => $params['no_ijazah'],
                'jenis_kelamin' => $params['jenis_kelamin'],
                'tempat_lahir' => $params['tempat_lahir'],
                'tgl_lahir' => $params['tgl_lahir'],
                'alamat' => $params['alamat'],
                'provinsi' => $params['provinsi'],
                'kabupaten' => $params['kabupaten'],
                'kelurahan' => $params['kelurahan'],
                'kode_pos' => $params['kode_pos'],
                'sekolah_asal' => $params['sekolah_asal'],
                'sekolah_sekarang' => $params['sekolah_sekarang'],
            ]);
            $role = Role::findByName($params['role']);
            $user->syncRoles($role);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return SantriResource|\Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return new SantriResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     * @return SantriResource|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        if ($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }
        if ($user->isAdmin()) {
            return response()->json(['error' => 'Admin can not be modified'], 403);
        }

        $currentUser = Auth::user();
        if (
            !$currentUser->isAdmin()
            && $currentUser->id !== $user->id
            && !$currentUser->hasPermission(\App\Laravue\Acl::PERMISSION_USER_MANAGE)
        ) {
            return response()->json(['error' => 'Permission denied'], 403);
        }

        $validator = Validator::make($request->all(), $this->getValidationRules(false));
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } else {
            $email = $request->get('email');
            $found = User::where('email', $email)->first();
            if ($found && $found->id !== $user->id) {
                return response()->json(['error' => 'Email has been taken'], 403);
            }

            $user->name = $request->get('name');
            $user->email = $email;
            $user->save();
            return new SantriResource($user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     * @return SantriResource|\Illuminate\Http\JsonResponse
     */
    public function updatePermissions(Request $request, User $user)
    {
        if ($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if ($user->isAdmin()) {
            return response()->json(['error' => 'Admin can not be modified'], 403);
        }

        $permissionIds = $request->get('permissions', []);
        $rolePermissionIds = array_map(
            function ($permission) {
                return $permission['id'];
            },

            $user->getPermissionsViaRoles()->toArray()
        );

        $newPermissionIds = array_diff($permissionIds, $rolePermissionIds);
        $permissions = Permission::allowed()->whereIn('id', $newPermissionIds)->get();
        $user->syncPermissions($permissions);
        return new SantriResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->isAdmin()) {
            return response()->json(['error' => 'Ehhh! Can not delete admin user'], 403);
        }

        try {
            $user->delete();
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 403);
        }

        return response()->json(null, 204);
    }

    /**
     * Get permissions from role
     *
     * @param User $user
     * @return array|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function permissions(User $user)
    {
        try {
            return new JsonResponse([
                'user' => PermissionResource::collection($user->getDirectPermissions()),
                'role' => PermissionResource::collection($user->getPermissionsViaRoles()),
            ]);
        } catch (\Exception $ex) {
            response()->json(['error' => $ex->getMessage()], 403);
        }
    }

    /**
     * @param bool $isNew
     * @return array
     */
    private function getValidationRules($isNew = true)
    {
        return [
            'name' => 'required',
            'email' => $isNew ? 'required|email|unique:users' : 'required|email',
            'roles' => [
                'required',
                'array'
            ],
        ];
    }
}
