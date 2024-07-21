<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupValidate;
use App\Models\Group;
use App\Models\GroupMember;
use App\Services\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('user.dashboard.dashboard');
    }

    public function myGroups(GroupService $groupService){
        $data['groups'] = $groupService->allGroups(Auth::id());
        return view('user.dashboard.my-groups',$data);
    }

    public function createGroup(){
        return view('user.dashboard.create-group');
    }

    public function storeGroup(GroupValidate $request){
       $groupObj = new Group();
       $groupObj->group_name = $request->group_name;
       $groupObj->group_amount = $request->group_amount;
       $groupObj->no_of_week = $request->no_of_week;
       $groupObj->time_duration = $request->time_duration;
       $groupObj->no_of_members = $request->no_of_members;
       $groupObj->start_date = $request->start_date;
       $groupObj->user_id = Auth::id();
       $groupObj->save();
       return redirect()->route('user.my-groups')->with('success','Group created successfully...');
    }

    public function editGroup(){
        $id = $this->memberObj['id'];
        $data['groupData'] = Group::find($id);
        $inputObj = new \stdClass();
        $inputObj->url = route('user.update-group');
        $inputObj->params = 'id='.$id;
        $editLink = encryptLink($inputObj);
        $data['updateLink'] = $editLink;
        return view('user.dashboard.edit-group',$data);
    }

    public function updateGroup(GroupValidate $request){
        $id = $this->memberObj['id'];
        $groupObj = Group::find($id);
        $groupObj->group_name = $request->group_name;
        $groupObj->group_amount = $request->group_amount;
        $groupObj->no_of_week = $request->no_of_week;
        $groupObj->time_duration = $request->time_duration;
        $groupObj->no_of_members = $request->no_of_members;
        $groupObj->start_date = $request->start_date;
        $groupObj->save();
        return redirect()->route('user.my-groups')->with('success','Group updated successfully...');
    }

    public function addMember(GroupService $groupService){
        $id = $this->memberObj['id'];
        $data['groupData'] = Group::find($id);
        $data['users'] = $groupService->allUsersWithMember(Auth::id(),$id);
        return view('user.dashboard.add-member',$data);
    }

    public function inviteMembers(){
        $id = $this->memberObj['id'];
        $userId = $this->memberObj['user_id'];
        $groupObj = new GroupMember();
        $groupObj->group_id = $id;
        $groupObj->user_id = $userId;
        $groupObj->status = 'Pending';
        $groupObj->save();
        return redirect()->back()->with('success','Group updated successfully...');
    }

    public function searchMembers(Request $request,GroupService $groupService){
        $search = $request->search;
        $id = $request->id;
        if(!empty($search)){
            $searchData = $groupService->searchAllUsersWithMember(Auth::id(),$id,$search);
        }else{
            $searchData = $groupService->allUsersWithMember(Auth::id(),$id);
        }
        $data['users'] = $searchData;
        $data['id'] = $id;
        return view('user.dashboard.search-members',$data);
    }

}
