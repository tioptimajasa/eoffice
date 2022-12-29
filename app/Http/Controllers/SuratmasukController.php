<?php

namespace App\Http\Controllers;


use App\Models\Nodin;
use App\Models\Struktur;
use App\Models\User;
use Routes\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;


class SuratmasukController extends Controller
{
    public function index()

    {
        return view('pages.suratmasuk.index');
    }   







}