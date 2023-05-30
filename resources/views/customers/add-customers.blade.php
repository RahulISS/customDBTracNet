@extends('layouts.default')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Users</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('customerlist')}}">Users List</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@if (isset($customer)) Edit @else Add @endif User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <!--end breadcrumb-->
           
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase">@if (isset($customer)) Edit @else Add @endif User</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            @if (isset($customer))
                            <form class="row g-3" action="{{route('update.customer',$customer->id)}}" method="post">
                            @else
                            <form class="row g-3" action="{{route('create.customer')}}" method="post">
                            @endif

                            @csrf
                                <div class="col-md-6">
                                    <label for="inputname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname', $customer->firstname ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputname" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname', $customer->lastname ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputname" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $customer->username ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputemail" class="form-label">Email (optional)</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $customer->email ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputname" class="form-label">SMS No. (optional)</label>
                                    <input type="text" class="form-control" id="smsnumber" name="smsnumber" value="{{ old('smsnumber', $customer->smsnumber ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputname" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $customer->password ?? '') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputname" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select" required>
                                        <option value='' disabled selected>Choose...</option>
                                        <option value="1" @if (isset($category)){{ $category->is_publish==1?"selected":''}}@endif>Active</option>
                                        <option value="0" @if (isset($category)){{ $category->is_publish==0?"selected":''}}@endif>Disable</option>
                                    </select>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5 mt-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
           
@endsection
@section('scripts')
    
    @if(\Session::get('success'))
    <script>
        $(document).ready(function(){
            Lobibox.notify('success', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                icon: 'bx bx-check-circle',
                delayIndicator: false,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: '{{ \Session::get("success") }}'
            });
        });
    </script>
    @endif
    {{ \Session::forget('success') }}
    @if(\Session::get('error'))
    <script>
        $(document).ready(function(){
            Lobibox.notify('error', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                delayIndicator: false,
                icon: 'bx bx-x-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: '{{ \Session::get("error") }}'
            });
        });
    </script>
    @endif
@stop

