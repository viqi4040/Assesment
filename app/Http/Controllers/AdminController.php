<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\Division;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\UnionCouncil;
use App\Models\Household;
use App\Models\HouseholdMember;

class AdminController extends Controller
{
    public function viewPolioWorkers()
    {
        $polioWorkers = User::all()->where('role_id','2');
        $allUnionCouncils = UnionCouncil::all();

        return view('admin.view-polio-worker', compact('polioWorkers', 'allUnionCouncils'));
    }
	public function assignPolioWorkers(){
		$allProvince = Province::all();
		return view('admin.assign-polio-worker',compact('allProvince'));
	}
	
	public function assignPolioWorker(){
		$allUcs = UnionCouncil::all();
		return view('admin.assign-polio-workers',compact('allUcs'));
	}
	
	public function getDivisions(Request $request)
	{
		
		$provinceId = $request->input('province_id');

		// Query the database to get divisions based on the selected province
		$divisions = Division::where('province_id', $provinceId)->get();

		return response()->json($divisions);
	}
	public function getDistricts(Request $request)
	{
		
		$divisionId = $request->input('division_id');

		// Query the database to get divisions based on the selected province
		$districts = District::where('division_id', $divisionId)->get();

		return response()->json($districts);
	}
	public function getTehsils(Request $request)
	{
		
		$districtId = $request->input('district_id');

		// Query the database to get divisions based on the selected province
		$tehsils = Tehsil::where('district_id', $districtId)->get();

		return response()->json($tehsils);
	}
	public function getUnionCouncils(Request $request)
	{
		
		$tehsilId = $request->input('tehsil_id');

		// Query the database to get divisions based on the selected province
		$unionCouncils = UnionCouncil::where('tehsil_id', $tehsilId)->get();

		return response()->json($unionCouncils);
	}
	public function getHouseholds(Request $request)
	{
		
		$ucId = $request->input('union_council_id');

		// Query the database to get divisions based on the selected province
		$houseHolds = Household::where('union_council_id', $ucId)->get();
		
		return response()->json($houseHolds);
	}
	public function getHouseholdMembers(Request $request)
	{
		
		$householdId = $request->input('household_id');

		// Query the database to get divisions based on the selected province
		$HouseholdMembers = HouseholdMember::where('household_id', $householdId)->get();
		
		return response()->json($HouseholdMembers);
	}
	public function getUsers(Request $request)
	{
		$ucId = $request->input('uc_id');
		$users = User::where('union_council_id', $ucId)->get();

		return response()->json($users);
	}



	
   public function submitUsers(Request $request)
	{
		$request->validate([
			'users' => 'required|array',
			'uc' => 'required|exists:union_councils,id',
		]);

		// Convert the comma-separated string to an array
		$usersArray = $request->input('users');


		
		

		$unionCouncil = UnionCouncil::find($request->uc);
		$unionCouncil->users()->attach($usersArray);

		return redirect()->route('assignPolioWorker')->with('success', 'Worker assigned successfully');
	}


}
