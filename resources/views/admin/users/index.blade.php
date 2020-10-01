@extends('admin.layout.master')
@section('title', 'Admin | Users List')
@section('nav', 'User')
@section('nav_sub', 'List')
@section('main')

<div class="row">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="table-responsive mb-4 mt-4">
                <table id="zero-config" class="table table-hover text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Authorization</th>
                            <th>Status</th>
                            <th><a href="{{route('user-create')}}" class="btn btn-primary">Add new</a></th>
                            <th class="no-content"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->getRoleName->name}}</td>
                            <td><input class="status" type="checkbox" currentId="{{$item->id}}" data-toggle="toggle" data-on="Enabled" data-off="Disabled" @if($item->status==1)
                                checked
                                @endif
                                ></td>
                            <td>
                                <a href="#" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg></a>
                                <a href="{{route('user-destroy', ['id'=> $item->id])}}" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    $(".status").on('change', function() {
        let currentId = $(this).attr('currentId');
        let currentStatus = $(this).prop('checked');
        currentStatus = (currentStatus == true) ? 1 : 0;
        axios.post(
            `{{route('user-status')}}`, {
                currentId: currentId,
                currentStatus: currentStatus,
            }
        )
    })
</script>

@endsection
