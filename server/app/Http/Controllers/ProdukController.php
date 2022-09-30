<?php

namespace App\Http\Controllers;

use App\Models\Produk as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        @mkdir(public_path(Model::fotoPath));
    }

    public function index(Request $req)
    {
        $builder = new Model;

        if ($search = $req->q) {
            $builder = $builder->where(function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhere('stok', 'like', "%$search%")
                    ->orWhere('harga', 'like', "%$search%");
            });
        }

        $recordsTotal = $builder->count();

        if ($limit = $req->_limit) {
            $page = $req->page ?: 1;
            $builder = $builder->limit($limit)->skip(($page - 1) * $limit);
        }

        $data = $builder->get();

        return response($data)
            ->header('Access-Expose-Headers', '*')
            ->header('X-Total-Count', $recordsTotal);
    }

    public function store(Request $req)
    {
        $schema = Validator::make($req->all(), Model::rules());

        if ($schema->fails()) {
            return response($schema->errors()->all(), 400);
        }

        $data = $schema->validated();

        if ($foto = $req->foto) {
            $fotoName = $this->randomString() . '.jpg';
            $this->base64Upload($foto, public_path(Model::fotoPath . $fotoName));
            $data['foto'] = $fotoName;
        }

        $item = Model::create($data);

        return response($item);
    }

    public function update(Request $req, $id)
    {
        $schema = Validator::make($req->all(), Model::rules());

        if ($schema->fails()) {
            return response($schema->errors()->all(), 400);
        }

        $data = $schema->validated();
        $item = Model::find($id);

        if ($foto = $req->foto) {
            $fotoName = $this->randomString() . '.jpg';
            $this->base64Upload($foto, public_path(Model::fotoPath . $fotoName));
            $data['foto'] = $fotoName;

            @unlink(public_path(Model::fotoPath . $item->foto));
        } else {
            unset($data['foto']);
        }

        if ($item) $item->update($data);

        return response($item);
    }

    public function destroy($id)
    {
        $item = Model::find($id);
        @unlink(public_path(Model::fotoPath . $item->foto));

        return response($item);
    }
}
