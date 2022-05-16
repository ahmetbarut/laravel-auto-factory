<?php

namespace AhmetBarut\LaravelAutoFactory\Controllers;

use AhmetBarut\LaravelAutoFactory\FakeModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AutoFactoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(config('auto-factory.middleware'));
    }
    
    public function index()
    {
        $dbName = config('database.connections.' . config("database.default") . '.database');

        return view('ahmetbarut-laravel-auto-factory::index')->with([
            'tables' => DB::select('SHOW TABLES'),
            'dbName' => $dbName,
        ]);
    }

    public function create($table)
    {
        $model = new FakeModel();

        return view('ahmetbarut-laravel-auto-factory::create')->with([
            'table' => $table,
            'columns' => $model->setTable($table)->getColumnsType(),
        ]);
    }

    public function store(Request $request, $table)
    {
        $model = new FakeModel();

        $count = $request->input('rows', 1);

        Cache::put('table', $table, 60);

        $rows = [];

        for ($i = 0; $i < $count; $i++) {
            $rows[] = $model->setTable($table)->factory()->create();
        }

        return $rows;
    }
}
