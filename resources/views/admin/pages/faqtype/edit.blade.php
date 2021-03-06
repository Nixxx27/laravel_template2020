@extends('admin.layouts.base')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('admin.faq_types.index') }}">FAQ's</a></li>
        <li><span href="javascript:void(0)">Edit Type</span></li>
    </ul>
    <div class="row">
        {{  Form::open([
            'method' => 'PUT',
            'id' => 'edit-faq-type',
            'route' => ['admin.faq_types.update', $faq_type->FAQTypeID],
            'class' => 'form-horizontal ',
            'files' => TRUE
            ])
        }}
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> <strong>Edit FAQ "{{$faq_type->FAQTypeName}}"</strong></h2>
                </div>

                <div class="form-group{{ $errors->has('FAQTypeName') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="FAQTypeName">Name</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="FAQTypeName" name="FAQTypeName"
                               value="{{  Request::old('FAQTypeName') ? : $faq_type->FAQTypeName }}"
                               placeholder="Enter Faq FAQTypeName..">
                        @if($errors->has('FAQTypeName'))
                            <span class="help-block animation-slideDown">{{ $errors->first('FAQTypeName') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Is Enabled?</label>

                    <div class="col-md-9">
                        <label class="switch switch-primary">
                            <input type="checkbox" id="FAQTypeEnabled" name="FAQTypeEnabled"
                                   value="1" {{ Request::old('FAQTypeEnabled') ? : ($faq_type->FAQTypeEnabled ? 'checked' : '') }}>
                            <span></span>
                        </label>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <a href="{{ route('admin.faq_types.index') }}" class="btn btn-sm btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection

@push('extrascripts')
    <script type="text/javascript" src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/libraries/faq_types.js') }}"></script>
@endpush