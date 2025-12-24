<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user-dashboard.dashboard', [
            'totalResumes' => auth()->user()->resumes()->count(),
            'avgAtsScore' => 85,
            'jobsApplied' => 12,
            'unreadMessages' => 3,
            'resumeMonths' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'resumeCounts' => [5, 8, 6, 10, 7, 9],
            'atsMonths' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            'atsScores' => [75, 80, 78, 85, 82, 90],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
