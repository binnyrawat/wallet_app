@extends('layout.master')
@section('section')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/base/jquery-ui.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
    <section class="pb-5 mb-5">
        <div class="custom-container pb-5">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6 col-md-6 col-4">
                    <div class="title">
                        <h2 class="fw-normal">Groups</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-8 " style="text-align:right;">
                    <a href="{{ route('user.create-group') }}"> <button type="button" class="btn theme-btn mt-0 px-3 me-2 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus service-icon">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> &nbsp;Create Group</button></a>

                        <a href="{{ route('user.create-group') }}"> <button type="button" class="btn theme-btn mt-0 px-3 me-2 py-2">
                           &nbsp;Groups Member</button></a>
                        <a href="{{ route('user.group-request') }}"> <button type="button" class="btn theme-btn mt-0 px-3 py-2">
                             &nbsp;Requests</button></a>

                </div>
            </div>
            <div class="row gy-3">
                @include('messages')
                @forelse ($memberData as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        Group :
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        {{$item->group_data->group_name}}
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        Amount :
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        ${{$item->group_data->group_amount}}
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        Duration :
                                    </div>
                                    <div class="col-md-8 mb-2">
                                        {{$item->group_data->no_of_week.' '.$item->group_data->time_duration}}
                                    </div>
                                    <div class="col-md-4">
                                        Created By :
                                    </div>
                                    <div class="col-md-8">
                                        {{$item->group_data->name}}
                                    </div>
                                    @php
                                        $inputObj = new stdClass();
                                        $inputObj->params = 'id='.$item->id;
                                        $inputObj->url = route('paypal.create');
                                        $encLink = encryptLink($inputObj);
                                    @endphp
                                    <div class="col-md-12"><button data-id="{{$encLink}}"  class="btn btn-sm btn-success join_group">Pay Now</button></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="text-danger text-center">NO REQUESTS</h4>
                    </div>
                @endforelse
            </div>
            <div class="mt-3">
                {{ $memberData->links('pagination.default') }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".join_group").on('click',function(){
            var link = $(this).data('id');
            var cs = $(this);
            $('<div></div>').appendTo('body')
                .html('<div><h6>Are you sure you want to pay for this group</h6></div>')
                .dialog({
                modal: true,
                title: 'Join Group',
                zIndex: 10000,
                autoOpen: true,
                width: 'auto',
                resizable: false,
                buttons: {
                    Yes: function() {
                        cs.attr('disabled','disabled').text('Processing...');
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
