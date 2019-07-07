<div class="form-group">
	 
<div class="col-sm-12">
	
	<div id="photo">
		@if($images!=null)
		@foreach ($images as $image)
       <div style="float: left;border: 1px solid grey;margin: 5px;">
			<img src="/images/{{$image->url}} " width="150">
			<form method="post" class="delete_form" action="{{action('HomeController@destroy', $image['id'])}}">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="DELETE" />
      <button type="submit" class="btn btn-danger">X</button>
     </form>
			</div>
      @endforeach
      @endif
			
			 <div style=";float:left">
	<i  style="border:1px solid black;font-size:86px;cursor:pointer;margin: 30px 5px;" class="material-icons" onclick="document.getElementById('file1').click();">add_circle</i>
</div>
	</div>
<form id="uploadform" method="post" action="{{action('HomeController@upload')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
	 <input type="file" id="file1" name="file1" style="display: none;" />
	
	</form>
	
	</div>

</div>

 
