<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $approvals = auth()->user()->approvals->where('is_approved', false)->where('user_id', auth()->user()->id)->all();
        dump($approvals);

        return view('dashboard.index');
    }
}
