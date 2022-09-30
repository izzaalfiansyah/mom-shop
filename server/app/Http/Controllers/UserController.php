<?php

namespace App\Http\Controllers;

use App\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = Model::all();

        return response($data);
    }

    public function store(Request $req)
    {
        $schema = Validator::make($req->all(), Model::rules());

        if ($schema->fails()) {
            return response($schema->errors()->all(), 400);
        }

        $data = $schema->validated();
        $data['password'] = Hash::make($req->password);
        $item = Model::create($data);

        return response($item);
    }

    public function update(Request $req, $id)
    {
        $schema = Validator::make($req->all(), Model::rules($id));

        if ($schema->fails()) {
            return response($schema->errors()->all(), 400);
        }

        $data = $schema->validated();

        if ($req->password) {
            $data['password'] = Hash::make($req->password);
        } else {
            unset($data['password']);
        }

        $item = Model::find($id);
        if ($item) $item->update($data);

        return response($item);
    }

    public function destroy($id)
    {
        $item = Model::find($id);
        if ($item) $item->destroy();

        return response($item);
    }

    public function login(Request $req)
    {
        $schema = Validator::make($req->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($schema->fails()) {
            return response($schema->errors()->all(), 400);
        }

        $data = Model::where('username', $req->username)->get();

        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                if (Hash::check($req->password, $item->password)) {
                    return response($item);
                }
            }

            return response(['password salah']);
        } else {
            return response(['username tidak ditemukan']);
        }
    }
}
