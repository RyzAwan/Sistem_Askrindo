<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Models\Target;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    //


    public function index(Request $request)
    {
        if (request()->wantsJson()) {
            $query = Transaction::query();
            return DataTables::of($query)->toJson();
        }
        return view('laporan', get_defined_vars());
    }


    public function dashboard(Request $request): View
    {
        $currentMonth = now()->month;
        $date = Carbon::now();
        $monthName = $date->format('F');

        $report = Transaction::whereMonth('productions_date', $currentMonth)->select(
            DB::raw('SUM(a1_deb) as a1_deb'),
            DB::raw('SUM(a1_amount) as a1_amount'),
            DB::raw('SUM(a2_deb) as a2_deb'),
            DB::raw('SUM(a2_amount) as a2_amount'),
            DB::raw('SUM(a3_deb) as a3_deb'),
            DB::raw('SUM(a3_amount) as a3_amount'),
            DB::raw('SUM(a4_deb) as a4_deb'),
            DB::raw('SUM(a4_amount) as a4_amount'),
            DB::raw('SUM(a5_deb) as a5_deb'),
            DB::raw('SUM(a5_amount) as a5_amount'),
        )->first();
        $target = Target::whereMonth('target_date', $currentMonth)->first();
        return view('dashboard', [
            'user' => $request->user(),
            'report' => $report,
            'target' => $target,
            'month' => $monthName,
            'year' => $date->format('Y'),
        ]);
    }

    public function users(Request $request)
    {
        if (request()->wantsJson()) {
            $query = User::query();
            return DataTables::of($query)->toJson();
        }
        return view('users');
    }

    public function create_user(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'string', 'in:admin,operator', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);


        return redirect("/users");
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'productions_date' => ['required', 'date'],
            'a1_deb' => ['required', 'numeric'],
            'a1_amount' => ['required', 'numeric'],
            'a2_deb' => ['required', 'numeric'],
            'a2_amount' => ['required', 'numeric'],
            'a3_deb' => ['required', 'numeric'],
            'a3_amount' => ['required', 'numeric'],
            'a4_deb' => ['required', 'numeric'],
            'a4_amount' => ['required', 'numeric'],
            'a5_deb' => ['required', 'numeric'],
            'a5_amount' => ['required', 'numeric'],
        ]);
        $validated["user_id"] = $request->user()->id;
        $trx = Transaction::create($validated);

        return Redirect::to('/laporan');
    }

    public function export() 
    {
        return Excel::download(new TransactionExport, 'reports.xlsx');
    }
}
