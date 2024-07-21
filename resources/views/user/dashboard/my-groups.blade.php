@extends('layout.master')
@section('section')
    <section class="pb-5 mb-5">
        <div class="custom-container pb-5">
            <div class="row align-items-center pb-4">
                <div class="col-lg-6 col-md-6 col-4">
                    <div class="title">
                        <h2 class="fw-normal">My Groups</h2>
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

                        <a href="{{ route('user.my-active-groups') }}"> <button type="button" class="btn theme-btn mt-0 px-3 me-2 py-2">
                           &nbsp;Groups Member</button></a>
                        <a href="{{ route('user.group-request') }}"> <button type="button" class="btn theme-btn mt-0 px-3 py-2">
                             &nbsp;Requests</button></a>

                </div>
            </div>
            <div class="row gy-3">
                @include('messages')
                @forelse ($groups as $item)
                    <div class="col-12">
                        <div class="transaction-box">
                            <div class="row">
                                <div class="col-lg-1 col-md-1 col-2">
                                    <div class="transaction-image color1">
                                        <img class="img-fluid icon" src="{{ asset('assets/images/svg/11.svg') }}"
                                            alt="bitcoins">
                                    </div>
                                </div>
                                <div class="col-lg-11 col-md-11 col-10">
                                    <div class="transaction-details w-100">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-lg-6 col-6  col-md-6 transaction-name">
                                                    <h3 class="text-dark"><b>{{ $item->group_name }}</b></h3>
                                                </div>
                                                @php
                                                    $expiry = getExpiry(
                                                        $item->start_date,
                                                        $item->no_of_week,
                                                        $item->time_duration,
                                                        1,
                                                    );
                                                    // echo strtotime($expiry);die;
                                                    $inputObj = new stdClass();
                                                    $inputObj->url = route('user.edit-group');
                                                    $inputObj->params = 'id=' . $item->id;
                                                    $editLink = encryptLink($inputObj);

                                                    $inputObjA = new stdClass();
                                                    // $inputObjA->url = route('user.add-member');
                                                    $inputObjA->url = route('user.my-group-member');
                                                    $inputObjA->params = 'id=' . $item->id;
                                                    $editLinkA = encryptLink($inputObjA);
                                                @endphp
                                                <div class="col-lg-6 col-6 col-md-6">
                                                    <a href="{{ $editLink }}"><i data-feather="edit"
                                                            class="me-2"></i></a>
                                                    {{-- <i data-feather="trash"></i> --}}
                                                    {{-- @if (strtotime($expiry) > time()) --}}
                                                        <a href="{{ $editLinkA }}" class="btn btn-sm btn-primary">                                                            Members</a>
                                                    {{-- @endif --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between pb-2">
                                            <h5 class="text-dark"><b>Start Date
                                                    :</b>&nbsp;{{ date('d, M Y', strtotime($item->start_date)) }}</h5>

                                            <h5 class="success-color amount-count"><b>₹{{ $item->group_amount + 0 }}</b></h5>
                                        </div>
                                        <div class="d-flex justify-content-between">

                                            <h5 class="text-dark"><b>Expire Date
                                                    :</b>&nbsp;{{ getExpiry($item->start_date, $item->no_of_week, $item->time_duration) }}
                                            </h5>

                                            <h5 class="success-color amount-count"> <span
                                                    class="light-text">{{ $item->no_of_members }}
                                                    People</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="mt-3">
                {{ $groups->links('pagination.default') }}
            </div>
        </div>
    </section>
@endsection
