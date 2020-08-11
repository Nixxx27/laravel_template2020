@extends('admin.layouts.base')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('admin.categories.index') }}">Category</a></li>
        <li><span href="javascript:void(0)">Edit {{$category->title}}</span></li>
    </ul>
    <div class="row">
        {{  Form::open([
            'method' => 'PUT',
            'id' => 'edit-product',
            'route' => ['admin.categories.update', $category->id],
            'class' => 'form-horizontal ',
            ])
        }}
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                <h2><i class="fa fa-pencil"></i> <strong>Edit Category : {{$category->title}}</strong></h2>
                    @if(Session::has('with_success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('with_success') }} <i class="fa fa-check"></i>
                    </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="title">Category Title</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="Enter Title" value="{{$category->title}}">
                        @if($errors->has('title'))
                            <span class="help-block animation-slideDown">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
               
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
      
        {{ Form::close() }}
    </div>
@endsection
