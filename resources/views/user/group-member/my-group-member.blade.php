@extends('layout.master')
@section('section')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/base/jquery-ui.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
    <section>
        <div class="custom-container">
             <h3 class="fw-bolder">Group Members</h3>
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
        
    </section>

    @php
         $expiry = getExpiry(
            $groupData->start_date,
            $groupData->no_of_week,
            $groupData->time_duration,
            1,
        );

        $inputObjA = new stdClass();
        $inputObjA->url = route('user.add-member');
        // $inputObjA->url = route('user.my-group-member');
        $inputObjA->params = 'id=' . $groupData->id;
        $editLinkA = encryptLink($inputObjA);

    @endphp

    <section>
        <div class="custom-container">
           
            <div class="row">
                <div class="col-md-12">
                    @include('messages')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-end">
                    @if (strtotime($expiry) > time())
                        <a href="{{$editLinkA}}" class="btn btn-primary"> Add Members</a>
                    @endif
                </div>
            </div>
           
        </div>
        
    </section>

    <section>
        <div class="custom-container" id="search_result">
            <ul class="transfer-list" id="pst_hr">
                @forelse ($memberData as $item)
                    <li class="w-100">
                        <div class="transfer-box">
                            <div class="transfer-img">
                                <img class="img-fluid icon" src="{{$item->users->profile_img!=null ? asset('assets/uploads/profile_images/'.$item->users->profile_img) : asset('assets/images/person/p2.png')}}" alt="p1">
                            </div>
                            <div class="transfer-details">
                                <div>
                                    <a href="person-transaction.html">
                                        <h5 class="fw-semibold dark-text">{{$item->users->name}}</h5>
                                    </a>
                                    <h6 class="fw-normal light-text mt-2">{{!is_null($item->users->phone_number) ? '*******'.substr($item->users->phone_number,-3) : '-'}}</h6>
                                </div>
                                @php
                                    $inputObj = new stdClass();
                                    $inputObj->url = route('user.remove-group-members');
                                    $inputObj->params = 'id='.$groupData->id.'&user_id='.$item->user_id;
                                    $encLink = encryptLink($inputObj);
                                @endphp
                                 <a href="javascript:void(0)" data-id="{{$encLink}}" class="btn btn-danger mt-0 remove_member">
                                   Remove Member</a>  
                            </div>
                        </div>
                    </li>
                @empty
                    <li  class="w-100">
                        <div class="">
                            <h3 class="text-center text-danger">NO MEMBERS ADDED</h3>
                        </div>
                    </li>
                @endforelse
                
            </ul>
            <div>
                {{$memberData->withQueryString()->links('pagination.default')}}
            </div>
        </div>
    </section>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   

    <script>
        $(".remove_member").on('click',function(){
            var link  = $(this).data('id');
            $('<div></div>').appendTo('body')
                .html('<div><h6>Are you sure to remove this member from group</h6></div>')
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

    @endpush
@endsection
