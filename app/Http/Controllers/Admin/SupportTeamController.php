<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportTeam;
use App\Models\Employee;

class SupportTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $support = SupportTeam::all();
        return view('admin.support_team.index', compact('support'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.support_team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'team_name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
            $this->validate($request,$rules);

        $support = new SupportTeam();
        $support->team_name = $request->team_name;
        $support->team_group = $request->team_group;
        $support->save();
        return to_route('support-team.index');
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
        $support = SupportTeam::where('support_team_id',$id)->get()->first();
        //dd($support->team_name);
        return view('admin.support_team.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $support = SupportTeam::where('support_team_id',$id)->first();
        //dd($support);
        $support->team_name = $request->team_name;
        $support->team_group = $request->team_group;
        $support->update();
        return to_route('support-team.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SupportTeam::where('support_team_id',$id)->delete();
        return back();
    }

    public function teamIndex(){
        $team = Employee::with('suppotrteam')->get()->toArray();
        return view('admin.support_team.teamindex', compact('team'));
    }
}
