@extends('seller.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                 
                   <a class="btn btn-primary" href="{{route('home.addProduct')}}">Add new Product</a>
                    <table class="table table-bordered table-striped">
   <tr>
    <th>Title</th>
    <th>Category</th>
    <th>Thumbnail</th>
    <th>Offer</th>
    <th>Delete</th>
   </tr>
   @foreach($products as $product)
   <tr>
     <td>
      <a href="{{route('view', $product['id'])}}" >{{$product['title']}}</a>
       </td>
    <td>{{$product['category']}}</td>
    <td>
      <img src="{{asset('/images/'.$product->images->first()->url)}}" alt="" width="100">
       </td>
       <td>
        @if($product->offer=='')
           <input class="offerCheckbox" data-id="{{$product->id}}" type="checkbox"  data-offer="{{$product->offer}}" >
        @else
    <input class="offerCheckbox" data-id="{{$product->id}}" type="checkbox"  data-offer="{{$product->offer}}" checked >
        @endif
       </td>
    <td>
     <form method="get" class="delete_form" action="{{action('MyController@removeProduct', $product['id'])}}">
      
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endforeach
  </table>
  <span class=""></span>
 {{ $products->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
