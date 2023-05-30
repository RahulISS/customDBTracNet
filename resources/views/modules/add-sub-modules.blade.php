@extends('layouts.default')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Sub Modules</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('modulelist')}}">Module List</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@if (isset($module)) Edit @else Add @endif Sub Module</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <br>
            <!--end breadcrumb-->
           
            <div class="row">
                <div class="col-xl-5 mx-auto">
                    <h6 class="mb-0 text-uppercase">@if (isset($module)) Edit @else Add @endif Sub Module</h6>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            @if (isset($module))
                            <form class="row g-3" action="{{route('update.module',$module->id)}}" method="post">
                            @else
                            <form class="row g-3" action="{{route('create.submodule')}}" method="post">
                            @endif

                            @csrf
                           
                                <div class="col-md-12">
                                    <label for="inputname" class="form-label">Sub Module Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $module->name ?? '') }}" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputState" class="form-label">Module</label>
                                    <select id="module" name="module" class="form-select" required>
                                        <option value='' disabled selected>Choose...</option>
                                        @foreach($modulelist as $row)
                                        <option value="{{$row->id}}" @if (isset($projects)){{ $projects->timezone_id==$row->_id?"selected":''}}@endif>{{$row->name}}</option>
                                        @endforeach
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

