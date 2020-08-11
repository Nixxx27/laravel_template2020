@extends('admin.layouts.base')

@section('content')
    @if (auth()->user()->can('Create User'))
        <div class="row text-center">
            <div class="col-sm-12 col-lg-12">
                <a href="{{ route('admin.products.create') }}" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background">
                        <h4 class="widget-content-light"><strong>Add New</strong> Product</h4>
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
           <h2><i class="fa fa-users sidebar-nav-icon"></i>&nbsp;<strong>Products</strong></h2>
       </div>
       <div class="alert alert-info alert-dismissable user-empty {{$products->count() == 0 ? '' : 'johnCena' }}">
           <i class="fa fa-info-circle"></i> No Products found.
       </div>
       <div class="table-responsive">
       <table id="products_table" class="table table-bordered table-striped table-vcenter " cellspacing="0" width="100%">            
              <thead>
                     <tr role="row">
                         <th class="text-left">
                             Title
                         </th>
                         <th class="text-left">
                             Content
                         </th>
                         <th class="text-left">
                             Image
                         </th>
                         <th class="text-left">
                             Category
                         </th>
                         <th class="text-center">
                             Action
                         </th>
                     </tr>
                     </thead>
   
           <tbody>
              @foreach ($products as $product)
              <tr>
                     <td>{{ucwords($product->title)}}</td>
                     <td>{!! $product->content !!}</td>
                     <td style="text-align: center">
                            @if($product->image)
                            <img style="height: 80px; width: auto" 
                            src="{{asset('public/storage/products/images')}}/{{$product->image}}" 
                            alt="{{$product->image}}">
                            @endif       
                     </td>
                     <td>
                            @if($product->categories)
                            {{ucwords($product->categories->category->title)}} 
                            @endif
                     </td>
                     <td class="text-center">
                         <div class="col-md-6">
                            @if (auth()->user()->can('Update Product'))
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               data-toggle="tooltip"
                               title=""
                               class="btn btn-default btn-xs"
                               data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                        @endif
                         </div>
                         <div class="col-md-6">
                            @if (auth()->user()->can('Delete Product'))
                            <form  class="form-horizontal"  action="{{route('admin.products.destroy',['product'=> $product->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                 <button type="submit" style="font-weight: bold" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this Product?')"><i class="fa fa-times"></i></button>
                             </form>
                                
                            @endif
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
         var table = $('#products_table').DataTable( {
            
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