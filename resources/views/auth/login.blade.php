<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
      <style>
        /*Contact sectiom*/
.content-header{
  font-family: 'Oleo Script', cursive;
  color:#fcc500;
  font-size: 45px;
}

.section-content{
  text-align: center; 

}
#contact{
    
    font-family: 'Teko', sans-serif;
  padding-top: 60px;
  width: 100%;
  width: 100vw;
  height: 100vh;
  background: #3a6186; /* fallback for old browsers */
  background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color : #fff;    
}
.contact-section{
  padding-top: 40px;
}
.contact-section .col-md-6{
  width: 50%;
}

.form-line{
  border-right: 1px solid #B29999;
}

.form-group{
  margin-top: 10px;
}
label{
  font-size: 1.3em;
  line-height: 1em;
  font-weight: normal;
}
.form-control{
  font-size: 1.3em;
  color: #080808;
}
textarea.form-control {
    height: 135px;
   /* margin-top: px;*/
}

.submit{
  font-size: 1.1em;
  float: right;
  width: 150px;
  background-color: transparent;
  color: #fff;

}

      </style> 
    </head>
   <body>

<section id="contact">
      <div class="section-content">
        <h1 class="section-header">Login<span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Form</span></h1>
      </div>
      <div class="contact-section">
      <div class="container">
        <div class="col-md-3"></div>
         <div class="col-md-6">
             @if(session()->has('success'))
           
    <div class="alert alert-success">
        {{ session()->get('success') }}
    
  </div>
@endif
        <form action="{{ url('login') }}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
              <div class="form-group">
                <label for="email">Email:</label>
          
      <input  type="text" class="form-control" id="email" placeholder="Please Enter Email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
          
      <input  type="password" class="form-control" id="password" placeholder="Please Enter Password" name="password" required>
              </div>
              <button type="submit" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Login</button>           
        </form>
        </div> 
        <div class="col-md-3"></div>
      </div>
    </section>
</body>

</html>
