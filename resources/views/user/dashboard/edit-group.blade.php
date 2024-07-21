@extends('layout.master')
@section('section')
    <section>
        <div class="custom-container pb-5">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6 col-md-6 col-4">
                    <div class="title">
                        <h2 class="fw-normal">Edit Group</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-8 " style="text-align:right;">
                    <a href="{{ route('user.my-groups') }}"> <button type="button" class="btn theme-btn mt-0 px-3 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus service-icon">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> &nbsp;My Groups</button></a>
                </div>

            </div>
            <div class="row gy-3">
                @include('messages')
                <div class="col-12">
                    <div class="transaction-box">
                        <form class="auth-form" action="{{$updateLink}}" name="group_frm" id="group_frm" method="post">
                            @csrf
                            <div class="custom-container">
                                <div class="form-group">
                                    <label for="group_name" class="form-label">Group Name</label>
                                    <div class="form-input">
                                        <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter Group Name" maxlength="150" value="{{$groupData->group_name}}" required>
                                    </div>
                                </div>
            
            
                                <div class="form-group">
                                    <label for="group_amount" class="form-label">Select Amount</label>
                                    <select id="group_amount" name="group_amount" class="form-select" required>
                                        <option value="" selected="">Select Amount</option>
                                        @foreach (getGroupAmount() as $item)
                                            <option value="{{$item}}" {{$item == $groupData->group_amount ? 'selected':''}}>₹{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_of_week" class="form-label">No. Of Week/Year/Month</label>
                                            <div class="form-input">
                                                <input type="number" class="form-control" id="no_of_week" name="no_of_week" placeholder="Enter No. Of Week/Year/Month" value="{{$groupData->no_of_week}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="time_duration" class="form-label">Time Duration</label>
                                            <select id="time_duration" name="time_duration" class="form-select" required>
                                                <option value="" selected="">Select Time Duration</option>
                                                <option value="Week" {{"Week" == $groupData->time_duration ? 'selected':''}}>Week</option>
                                                <option value="Month" {{"Month" == $groupData->time_duration ? 'selected':''}}>Month</option>
                                                <option value="Year" {{"Year" == $groupData->time_duration ? 'selected':''}}>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_of_members" class="form-label">Number of Member</label>
                                            <select id="no_of_members" name="no_of_members" class="form-select" required>
                                                <option value="" selected="">Select Member</option>
                                                @foreach (getNoOfMembers() as $item)
                                                    <option value="{{$item}}" {{$item == $groupData->no_of_members ? 'selected':''}}>{{$item}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <div class="form-input">
                                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="" value="{{$groupData->start_date}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
            
            
                                <button type="submit" class="btn theme-btn w-100">Create Group</button>
            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script> 
        $("#group_frm").validate({
            rules: {
                no_of_week:{required:true,number:true}
            },
            messages: {
                
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            
            },
            highlight: function(element, errorClass) {
                $(element).css({ border: '1px solid #f00' });
            },
            unhighlight: function(element, errorClass) {
                $(element).css({ border: '1px solid #c1c1c1' });
            },
            submitHandler: function(form,event) {
                document.group_frm.submit();
                $('button[type="submit"]').attr('disabled','disabled').text('Processing...');
            }
        });
    </script>
    @endpush
@endsection
