@extends('admin.index')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            {{-- Massage Alert Div --}}

            @if (session()->has('success'))
                <div class="alert alert-dismissable alert-success">
                    {!! session()->get('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif


            <div class="row">
                @if (Auth::check() && Auth::user()->role == 2)
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">$12.34</h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Potential growth</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">$17.34</h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Revenue current</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">$12.34</h3>
                                            <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-danger">
                                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Daily Income</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">$31.53</h3>
                                            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">Expense current</h6>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order Status</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-light"> # </th>
                                            <th class="text-light"> Name </th>
                                            <th class="text-light"> Email </th>
                                            <th class="text-light"> Role </th>
                                            <th class="text-light"> Status </th>
                                            <th class="text-light"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($user as $item)
                                            <tr>
                                                <td class="text-light">{{ $item->User->id }}</td>
                                                <td class="text-light">{{ $item->User->name }}</td>
                                                <td class="text-light">{{ $item->User->email }}</td>
                                                <td>
                                                    @if ($item->User->role == 0)
                                                        <span class="badge badge-sm text-white bg-warning">user</span>
                                                    @elseif($item->User->role == 1)
                                                        <span class="badge badge-sm text-white bg-success">Vendor</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->User->status == 0)
                                                        <span class="badge badge-sm text-white bg-success">Active</span>
                                                    @elseif($item->User->status == 1)
                                                        <span class="badge badge-sm text-white bg-danger">In-active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div>
                                                        @if ($item->User->role == 0)
                                                            <a class="badge badge-outline-success"
                                                                href="{{ route('approve.request', $item->User->id) }}">Approve</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif


                                        @if (Auth::check() && Auth::user()->role == 0)
                                            <div>
                                                <h1>User Dashboard</h1>
                                            </div>
                                        @elseif(Auth::check() && Auth::user()->role == 1)
                                            <div>
                                                <h1>Vendor Dashboard</h1>
                                            </div>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        @include('admin.component.footer')
    </div>
@endsection
