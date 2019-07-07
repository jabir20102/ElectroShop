<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>My Account</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"/>

 		<!-- Slick -->
 		<link href="{{ asset('/css/slick.css') }}" rel="stylesheet"/>
 		<link href="{{ asset('/css/slick-theme..css') }}" rel="stylesheet"/>

 		<!-- nouislider -->
 		<link href="{{ asset('/css/nouislider.css') }}" rel="stylesheet"/>

 		<!-- Font Awesome Icon -->
 		<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet"/>

 		<!-- Custom stlylesheet -->
 		<link href="{{ asset('/css/style.css') }}" rel="stylesheet"/>
 		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
	<body>
		@include('header')
    <div class="container">
@include('inc.flashMessages')
</div>
        @yield('content')
		

		@include('footer')

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.zoom.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <script type="text/javascript">
        	
$(document).on('ready', function(){
    $('#mycartlist').load("/shopping_cart/load");
    $('#mywishlist').load("/show/viewWishlist");
  $('#file1').on('change', function(){
    $('#uploadform').submit();
  });
  $('.offerCheckbox').click(function(){
    
  var product_id = $(this).data("id");
  var offer = $(this).data("offer");

            if($(this).prop("checked") == true && offer==''){
            	$.ajax({
    url:"{{ route('shopping_cart.setOffer')}}",
    method:"POST",
    data:{"_token": "{{ csrf_token() }}",id:product_id},
    success:function(data)
    {
        // alert(data);
     alert("Product Added into Offer ");
     location.reload(true);
    },
    error: function(data){
        alert("fail" + ' ' + this.data)
    }
   });
                

            }

            else if($(this).prop("checked") == false && offer!=''){
            		$.ajax({
    url:"{{ route('shopping_cart.removeOffer')}}",
    method:"POST",
    data:{"_token": "{{ csrf_token() }}",id:product_id},
    success:function(data)
    {
        // alert(data);
     alert("Product removed from Offer ");
     location.reload(true);
    },
    error: function(data){
        alert("fail" + ' ' + this.data)
    }
   });

            }
  

 });
});
 
        </script>

	</body>
</html>
