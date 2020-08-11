@extends('admin.layouts.base')

@section('content')
    @if (auth()->user()->can('Create User'))
        <div class="row text-center">
            <div class="col-sm-12 col-lg-12">
                <a href="{{ route('admin.categories.create') }}" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background">
                        <h4 class="widget-content-light"><strong>Add New</strong> Category</h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 text-primary animation-expandOpen"><i
                                    class="fa fa-plus"></i></span></div>
                </a>
            </div>
        </div>
    @endif
    @if(Session::has('with_success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{ Session::get('with_success') }} <i class="fa fa-check"></i>
        </div>
    @endif


    <div class="block full">
       <div class="block-title">
           <h2><i class="fa fa-users sidebar-nav-icon"></i>&nbsp;<strong>Categories</strong></h2>
       </div>
       <div class="alert alert-info alert-dismissable user-empty {{$categories->count() == 0 ? '' : 'johnCena' }}">
           <i class="fa fa-info-circle"></i> No Category found.
       </div>
       <div class="table-responsive">
       <table id="category_table" class="table table-bordered table-striped table-vcenter " cellspacing="0" width="100%">            
              <thead>
                     <tr role="row">
                         <th class="text-left">
                             Title
                         </th>
                         <th></th>
                      </tr>
                     </thead>
   
           <tbody>
              @foreach ($categories as $category)
              <tr>
                     <td>{{ucwords($category->title)}}</td>
                    
                     <td class="text-center">
                         <div class="col-md-6">
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               data-toggle="tooltip"
                               title=""
                               class="btn btn-default btn-xs"
                               data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                      
                         </div>
                         <div class="col-md-6">
                            <form  class="form-horizontal"  action="{{route('admin.categories.destroy',['category'=> $category->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                 <button type="submit" style="font-weight: bold" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this Category?')"><i class="fa fa-times"></i></button>
                             </form>
                         </div>
                           
                        </td>
               </tr>
               @endforeach
   
           </tbody>
           
           
               
            
      
       </table>
   </div><!--table-responsive-->
    </div>
@endsection

@push('extrascripts')
<script>
    
       $(document).ready(function() {
         var table = $('#category_table').DataTable( {
            
            "pagingType": "full_numbers",
             "order": [ 0, "asc" ],
           
              orderCellsTop: true,
              fixedHeader: true,
            //   "bInfo" : false,
              "pageLength": 20,
              dom: 'Bfrtip',
              buttons: [
            {
                extend: 'excel',
         
            }
            
        ]
                 
      
      
          } );
      } );
   
   </script>

   
@endpush