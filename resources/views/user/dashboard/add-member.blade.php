@extends('layout.master')
@section('section')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/base/jquery-ui.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
    <section>
        <div class="custom-container" id="app">
            <div class="theme-form search-head">
                <div class="form-group">
                    <div class="form-input">
                        <input type="text" class="form-control search" id="searchInput" placeholder="Search here...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-search search-icon">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                </div>
            </div>
           
        </div>
    </section>

    <section>
        <div class="custom-container">
            <div class="">
                <h3>Group : {{$groupData->group_name}}</h3>
                <h3>Members : {{$groupData->no_of_members}}</h3>
                <h3>Amount : ₹{{$groupData->group_amount}}</h3>
            </div>
        </div>
        @php
            $inputObjA = new stdClass();
            // $inputObjA->url = route('user.add-member');
            $inputObjA->url = route('user.my-group-member');
            $inputObjA->params = 'id=' . $groupData->id;
            $editLinkA = encryptLink($inputObjA);
        @endphp
    </section>
    <section>
        <div class="custom-container">
            <div class="row">
                <div class="col-md-12">
                    @include('messages')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                 <a href="{{$editLinkA}}" class="btn btn-primary"> Group Members</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="custom-container" id="search_result">
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
                                    $inputObj->params = 'id='.$groupData->id.'&user_id='.$item->id;
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
                                    @elseif($item->group_member->status=='Member')
                                        <a href="javascript:void(0)" class="btn  btn-success mt-0">
                                        Group Member</a>    
                                    @elseif($item->group_member->status=='Active')
                                    @php
                                        $inputObj = new stdClass();
                                        $inputObj->url = route('user.add-member-to-group');
                                        $inputObj->params = 'id='.$groupData->id.'&user_id='.$item->id;
                                        $encLink = encryptLink($inputObj);
                                    @endphp
                                    <a href="javascript:void(0)" class="btn btn-success mt-0 add_member" data-id="{{$encLink}}">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user-plus sidebar-icon ">
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="8.5" cy="7" r="4"></circle>
                                            <line x1="20" y1="8" x2="20" y2="14"></line>
                                            <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg> &nbsp;Add To Group</a>
                                    @else
                                        <a href="javascript:void(0)" onclick="ConfirmDialog('{{$encLink}}')" class="btn btn-danger mt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user-plus sidebar-icon ">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                                <line x1="23" y1="11" x2="17" y2="11"></line>
                                            </svg> &nbsp;Rejected</a>
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
        </div>
    </section>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function ConfirmDialog(link) {
        $('<div></div>').appendTo('body')
            .html('<div><h6>Are you sure to invite this member</h6></div>')
            .dialog({
            modal: true,
            title: 'Invite Member',
            zIndex: 10000,
            autoOpen: true,
            width: 'auto',
            resizable: false,
            buttons: {
                Yes: function() {
                    window.location.href = link;
                    $(this).dialog("close");
                },
                No: function() {
                    $(this).dialog("close");
                }
            },
            close: function(event, ui) {
                $(this).remove();
            }
            });
        };
    </script>

    <script>
        $(".add_member").on('click',function(){
            var link  = $(this).data('id');
            $('<div></div>').appendTo('body')
                .html('<div><h6>Are you sure to add this member to group</h6></div>')
                .dialog({
                modal: true,
                title: 'Add Member To Group',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        window.location.href = link;
                        $(this).dialog("close");
                    },
                    No: function() {
                        $(this).dialog("close");
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
        });
    </script>

    <script>
        // Debounce function
        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                const context = this;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        // Function to send request
        function sendRequest(value) {
            fetch("{{route('user.search-members')}}?search="+value+"&id="+"{{$groupData->id}}")
                .then(response => response.text())
                .then(data => {
                    document.getElementById('search_result').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        // Debounced version of sendRequest
        const debouncedSendRequest = debounce(sendRequest, 500); // 500ms delay

        // Event listener for input
        document.getElementById('searchInput').addEventListener('input', function(event) {
            debouncedSendRequest(event.target.value);
        });
    </script>
    @endpush
@endsection
