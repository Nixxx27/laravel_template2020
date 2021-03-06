@extends('admin.layouts.base')

@section('content')
    @if (auth()->user()->can('Create Permission'))
        <div class="row text-center">
            <div class="col-sm-12 col-lg-12">
                <a href="{{ route('admin.permissions.create') }}" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background">
                        <h4 class="widget-content-light"><strong>Add New</strong> Permission</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-primary animation-expandOpen"><i
                                    class="fa fa-plus"></i></span></div>
                </a>
            </div>
        </div>
    @endif
    <div class="block full">
        <div class="block-title">
            <h2><i class="fa fa-users sidebar-nav-icon"></i>&nbsp;<strong>Permissions</strong></h2>
        </div>
        <div class="alert alert-info alert-dismissable permission-empty {{$permissions->count() == 0 ? '' : 'johnCena' }}">
            <i class="fa fa-info-circle"></i> No permissions found.
        </div>
        <div class="table-responsive {{$permissions->count() == 0 ? 'johnCena' : '' }}">
            <table id="permissions-table"
                   class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr role="row">
                    <th class="text-center">
                        ID
                    </th>
                    <th class="text-left">
                        Permission Group
                    </th>
                    <th class="text-left">
                        Name
                    </th>
                    <th class="text-center">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr data-permission-template-id="{{$permission->id}}">
                        <td class="text-center"><strong>{{ $permission->id }}</strong></td>
                        <td class="text-left">{{ $permission->permission_group->name }}</td>
                        <td class="text-left">{{ $permission->name }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                @if (auth()->user()->can('Update Permission'))
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                       data-toggle="tooltip"
                                       title=""
                                       class="btn btn-default"
                                       data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                @endif
                                @if (auth()->user()->can('Delete Permission'))
                                    <a href="javascript:void(0)" data-toggle="tooltip"
                                       title=""
                                       class="btn btn-xs btn-danger delete-permission-btn"
                                       data-original-title="Delete"
                                       data-permission-id="{{ $permission->id }}"
                                       data-permission-route="{{ route('admin.permissions.delete', $permission->id) }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('extrascripts')
    <script type="text/javascript" src="{{ asset('public/js/libraries/permissions.js') }}"></script>
@endpush