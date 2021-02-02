<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    private $prop = [
        'menu' => 'Dashboard',
        'slug' => 'dashboard',
        'view' => 'dashboard',
    ];

    public function __construct()
    {
        $this->share($this->prop);
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function datatables()
    {
        try {
            $data = User::all();
            return DataTables::of($data)
                ->editColumn('status', function($data) {
                    if ($data->status == 'active') {
                        return '<button class="btn btn-xs btn-success" type="button">active</button>';
                    } else {
                        return '<button class="btn btn-xs btn-danger" type="button">inactive</button>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        } catch (\Exception $e) {
            abort(500);
            return null;
        }
    }
}
