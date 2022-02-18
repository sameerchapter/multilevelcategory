<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">   
<style>
    :root {
  --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
}

body {
  background: #111 !important;
}

.card {
  background: #222;
  border: 1px solid #dd2476;
  color: rgba(250, 250, 250, 0.8);
  margin-bottom: 2rem;
}

.btn {
  border: 5px solid;
  border-image-slice: 1;
  background: var(--gradient) !important;
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent !important;
  border-image-source:  var(--gradient) !important; 
  text-decoration: none;
  transition: all .4s ease;
}

.btn:hover, .btn:focus {
      background: var(--gradient) !important;
  -webkit-background-clip: none !important;
  -webkit-text-fill-color: #fff !important;
  border: 5px solid #fff !important; 
  box-shadow: #222 1px 0 10px;
  text-decoration: underline;
}
h1 {
  display: grid;
  grid-template-columns: 1fr auto 1fr;
  align-items: center;
  column-gap: 20px;
  margin: 10px 0;
  font-family: 'Merriweather', serif;
  font-size: 2.2rem;
  color: rgba(250, 250, 250, 0.8);
  line-height: 1.2;
  letter-spacing: .05em;
  text-transform: uppercase;
  text-align: center;
}

h1::before, h1::after {
  height: 1px;
  background: rgba(250, 250, 250, 0.8);
  content: '';
}
.card-img-top{
    height: 250px;
   }
  </style>    
    </head>
 <body>
 <div class="container">
  <h1>Shop Categories</h1> 
  </div>  

<div class="container mx-auto mt-4">
  <div class="row">
     @foreach($categories as $res)
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
  <img src="{{url('public/images/').'/'.$res->image}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$res->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">
          {{$res->description}}
        </h6>
                         @php
                         $price=get_price($res);
                        @endphp
    <p class="card-text">
      Rs. {{number_format($price,2)}} @php echo count($res->children)>0?"(".number_format($res->price,2)." + ".number_format($price-$res->price,2).")":'' @endphp
    </p>
    @if(count($res->children)>0)
       <a href="{{ url('/').'/category/'.$res->id }}" class="btn mr-2"><i class="fas fa-link"></i> Details</a>
     @endif  
    <a href="{{ url('/order').'/'.$res->id }}" class="btn "><i class="fas fa-shopping-cart"></i> Buy</a>
  </div>
  </div>
    </div>    
     @endforeach 
</div>
  </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  
</body>

</html>
