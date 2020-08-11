@extends('admin.layouts.base')

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('admin.products.index') }}">Product</a></li>
        <li><span href="javascript:void(0)">Edit {{$product->title}}</span></li>
    </ul>
    <div class="row">
        {{  Form::open([
            'method' => 'PUT',
            'id' => 'edit-product',
            'route' => ['admin.products.update', $product->id],
            'class' => 'form-horizontal ',
            'files' => TRUE,
            ])
        }}
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                <h2><i class="fa fa-pencil"></i> <strong>Edit Product : {{$product->title}}</strong></h2>
                    @if(Session::has('with_success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ Session::get('with_success') }} <i class="fa fa-check"></i>
                    </div>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="title">Title</label>

                    <div class="col-md-9">
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="Enter Title" value="{{$product->title}}">
                        @if($errors->has('title'))
                            <span class="help-block animation-slideDown">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
               


                <div class="form-group{{ $errors->has('attach') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="file">Image</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <label class="input-group-btn">
                        <span class="btn btn-primary">
                            Choose File <input type="file" class="form-control" name="attach[]" style="display: none;">
                            <input type="hidden" class="fld" name="attach[]">
                        </span>
                            </label>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @if($errors->has('attach'))
                            <span class="help-block animation-slideDown">{{ $errors->first('attach') }}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="content">Content</label>

                    <div class="col-md-9">
                            <textarea id="content" name="content" rows="9"
                                      class="form-control ckeditor"
                                      placeholder="Enter content.."> {!! $product->content !!}</textarea>
                        @if($errors->has('content'))
                            <span class="help-block animation-slideDown">{{ $errors->first('content') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label" for="category_id">Category</label>

                    <div class="col-md-9">
                        <select name="category_id" id="category_id"
                                class="page-type-select"
                                data-placeholder="Choose Category">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    @if( old('category_id') )
                                        {{ old('category_id') == $category->id ? 'selected' : ''}}
                                    @else
                                        {{ $product->categories->category->id == $category->id ? 'selected' : ''}}
                                    @endif >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <span class="help-block animation-slideDown">{{ $errors->first('category_id') }}</span>
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

@push('extrascripts')
<script type="text/javascript" src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/libraries/pages.js') }}"></script>
@endpush