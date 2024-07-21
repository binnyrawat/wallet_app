<ul class="transfer-list" id="pst_hr">
    @forelse ($users as $item)
        <li class="w-100">
            <div class="transfer-box">
                <div class="transfer-img">
                    <img class="img-fluid icon" src="{{$item->profile_img!=null ? asset('assets/uploads/profile_images/'.$item->profile_img) : asset('assets/images/person/p2.png')}}" alt="p1">
                </div>
                <div class="transfer-details">
                    <div>
                        <a href="person-transaction.html">
                            <h5 class="fw-semibold dark-text">{{$item->name}}</h5>
                        </a>
                        <h6 class="fw-normal light-text mt-2">{{!is_null($item->phone_number) ? '*******'.substr($item->phone_number,-3) : '-'}}</h6>
                    </div>
                    @php
                        $inputObj = new stdClass();
                        $inputObj->url = route('user.invite-members');
                        $inputObj->params = 'id='.$id.'&user_id='.$item->id;
                        $encLink = encryptLink($inputObj);
                    @endphp
                    @if($item->group_member!=null)
                        @if($item->group_member->status=='Pending')
                            <a href="javascript:void(0)" class="btn  btn-danger mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-user-plus sidebar-icon ">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg> &nbsp;Invited</a>
                        @elseif($item->group_member->status=='Active')
                        <a href="javascript:void(0)" class="btn btn-success mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-user-plus sidebar-icon ">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg> &nbsp;Active</a>
                        @else

                        @endif
                    @else
                    <a href="javascript:void(0)" onclick="ConfirmDialog('{{$encLink}}')" class="btn theme-btn mt-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user-plus sidebar-icon ">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="8.5" cy="7" r="4"></circle>
                            <line x1="20" y1="8" x2="20" y2="14"></line>
                            <line x1="23" y1="11" x2="17" y2="11"></line>
                        </svg> &nbsp;Invite</a>
                    @endif    
                </div>
            </div>
        </li>
    @empty
        <li  class="w-100">
            <div class="">
                <h3 class="text-center text-danger">NO USERS DATA</h3>
            </div>
        </li>
    @endforelse
    
</ul>
<div>
    {{$users->withQueryString()->links('pagination.default')}}
</div>