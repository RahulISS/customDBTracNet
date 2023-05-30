@extends('layouts.default')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-3">
            <div class="col">
                <div class="card radius-10 bg-gradient-cosmic">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total no. of Customers</p>
                            <h4 class="my-1 text-white"></h4>
                            <p class="mb-0 font-13 text-white">&nbsp;</p>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total no. of Roles</p>
                            <h4 class="my-1 text-white"></h4>
                            <p class="mb-0 font-13 text-white">&nbsp;</p>
                        </div>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
            </div>
            
        </div><!--end row-->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        
        var table = $('#tablefilter').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'mobile', name: 'mobile'},
                {data: 'totalworry', name: 'totalworry'},
                {data: 'incompleteWorry', name: 'incompleteWorry'},
                {data: 'totalhappiness', name: 'totalhappiness'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        
    });

</script>
@stop