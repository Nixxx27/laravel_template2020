@extends('admin.layouts.base')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
        <li><span href="javascript:void(0)">Edit Role</span></li>
    </ul>
    <div class="row">
        {{  Form::open([
            'method' => 'PUT',
            'id' => 'edit-role',
            'route' => ['admin.roles.update', $role->id],
            'class' => 'form-horizontal '
            ])
        }}
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>Edit Role "{{$role->name}}"</strong></h2>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="name">Name</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{  Request::old('name') ? : $role->name }}"
                               placeholder="Enter role name..">
                        @if($errors->has('name'))
                            <span class="help-block animation-slideDown">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @include('admin.pages.role.permission_group')
        </div>
        {{ Form::close() }}
    </div>
@endsection

@push('extrascripts')
    <script type="text/javascript" src="{{ asset('public/js/libraries/roles.js') }}"></script>
@endpush