<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Styles -->
       
    </head>
  <body>
 <div class="container">
  <h2>All Categories</h2>
  </div>  
  <div class="py-5">
    <div class="container">
      <div class="row">
      @php $i=0 @endphp
      @foreach($categories as $res)
         @if($i%3==0 && $i!=0)
       </div><div class="row"><br>
        @endif
          <div class="col-md-4">
          <div class="card">
            <div class="card-block">
              <h4 class="card-title">{{$res->title}}</h4>
              <h6 class="card-subtitle text-muted">{{$res->description}}</h6>
               @php
                   $price=get_price($res);
                @endphp
              <p class="card-text p-y-1">Rs. {{number_format($price,2)}}</p>
              @if(count($res->children)>0)
              <a href="{{ url('/').'/'.$res->id }}" class="card-link ml-2">Childs</a>
              @endif
              <a href="{{ url('/order').'/'.$res->id }}"  class="card-link">Purchase</a>
            </div>
          </div>
        </div>
        @php $i++ @endphp
      @endforeach
      </div>
        
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
</body>

</html>
