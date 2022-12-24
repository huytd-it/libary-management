<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DocGiaController extends Controller
{
    public function index()
    {



        return view(
            'doc-gia'

        );
    }
    public function getAll()
    {

        $docGia = DB::table('doc_gias as D')->get();

        return DataTables::of($docGia)->make(true);
    }
}
