@extends('seller.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new Product</div>

                <div class="panel-body">
                    
                   @include('seller.photos')
                  <form class="form-horizontal" method="POST" action="{{ route('home.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}"  required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"  required >{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-3">
                                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}"  required > 

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Discount</label>

                            <div class="col-md-3">
                                <input id="discount" type="number" class="form-control" name="discount" value="{{ old('discount') }}" required > 

                                @if ($errors->has('discount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color" class="col-md-4 control-label">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="checkbox" name="colors[]" value="Red"> Red 
  								<input id="color" type="checkbox" name="colors[]" value="Green"> Green 
 							    <input id="color" type="checkbox" name="colors[]" value="Blue">  Blue
                                @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select id="category" name="category">
                                	<option>Laptops</option>
                                	<option>Smartphones</option>
                                	<option>Accessories</option>
                                    <option>Cameras</option>
                                </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Brand</label>

                            <div class="col-md-6">
                                <select id="brand" name="brand">
                                    <option>SAMSUNG</option>
                                    <option>SONY</option>
                                    <option>DELL</option>
                                </select>
                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                            <label for="details" class="col-md-4 control-label">Details</label>

                            <div class="col-md-6">
                               <textarea id="details" type="text" class="form-control" name="details"  required >{{ old('details') }}</textarea>

                                @if ($errors->has('details'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                      

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    POST
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
