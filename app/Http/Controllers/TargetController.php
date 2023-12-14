<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class TargetController extends Controller
{

    public function index(Request $request)
    {
        if (request()->wantsJson()) {
            $query = Target::query();
            return DataTables::of($query)->toJson();
        }
        return view('target', get_defined_vars());
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'target_date' => ['required', 'date'],
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
        $dateTime = Carbon::createFromFormat('Y-m', $validated['target_date'])->startOfMonth();
        $validated["target_date"] = $dateTime;
        $trx = Target::create($validated);

        return Redirect::to('/target');
    }
}
