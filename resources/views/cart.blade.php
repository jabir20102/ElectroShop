@extends('seller.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Cart</div>

                <div class="panel-body">
<table class="table table-bordered table-striped">
  <th>Thumbnail</th><th>Title</th><th>Quantity</th><th>Price</th><th>Delete</th>
  @foreach($cartItems as $item)

  <tr>
    <td>image</td>
    
    <td>{{$item->name}}</td>
    <td>{{$item->qty}}</td>
    <td>{{$item->price}}</td>
    <td>
      <form method="get" class="delete_form" action="{{action('MyController@remove', $item->rowId)}}">
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="delete remove_inventory"><i class="fa fa-close"></i></button>
     </form>
    </td>
  </tr>
  @endforeach
  <tr>
    <td>Total</td>
    <td>{{Cart::subtotal()}}</td>
  </tr>
</table>

 </div>
            </div>
        </div>
    </div>
</div>
@endsection
