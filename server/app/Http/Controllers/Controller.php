<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        @mkdir(public_path('assets'));
    }

    public function base64Upload(String $encode, String $filename): void
    {
        $data = explode(';base64,', $encode)[1];
        file_put_contents($filename, base64_decode($data));
    }

    public function randomString(int $length = 20): String
    {
        $str = bin2hex(random_bytes(32));

        return substr($str, 0, $length);
    }
}
