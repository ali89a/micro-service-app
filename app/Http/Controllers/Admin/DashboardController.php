<?php

namespace App\Http\Controllers\Admin;

use App\services\DashboardService;
use Carbon\Carbon;
use App\Models\Admin;
use http\Env\Response;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Repository\Interfaces\AdminInterface;

class DashboardController extends Controller
{

    protected $adminRepo;

    public function __construct(AdminInterface $admin)
    {
        $this->adminRepo = $admin;
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
