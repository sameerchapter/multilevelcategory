<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" >        
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


<!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
      <style>
        /*Contact sectiom*/
a {
    color: #fcc500;
    text-decoration: none;
}

select,input{
    margin: 0;
    font: inherit;
  color: black;
}

 table.dataTable tbody tr.selected {
    color: black;
    background-color: #eeeeee;
}
       
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
  height: 100%;
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
        <h1 class="section-header">All<span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Categories</span></h1>
      </div>
      <div class="contact-section">
      <div class="container">
        <div class="col-md-1"></div>
         <div class="col-md-10">
        <table id="example" class="table  table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($categories as $res)
            <tr>
                <td>{{$res->title}}</td>
                <td>{{$res->description}}</td>
                <td>Rs. {{get_price($res)}}</td>
                <td><img src="{{url('public').'/images/'.$res->image}}" style="width:150px"></td>
                <td><a href="{{url('category/edit/'.$res->id)}}"><i class="fa fa-edit fa-6" aria-hidden="true"></i></a> <a href="javascript:void(0)" class="delete" data-id="{{$res->id}}"><i class="fa fa-trash fa-6" aria-hidden="true"></i>
</a></td>
            </tr>
           @endforeach 
           </tbody>
           </table> 
        </div> 
        <div class="col-md-1"></div>
      </div>
    </section>
</body>
<script>
  $(document).ready(function() {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('#example').DataTable();
     
    $('.delete').click(function() {
     window.confirm("Delete this category ?")
     { 
   var ele=$(this);
     $.ajax({
            type:'post',
            url:'{{url("delete-cat")}}',
            data:{'id':$(this).data('id')},
            dataType: 'json',
            success: function (data) {
               ele.parents('tr').remove();
            }
        });
   }
});

});


</script>
</html>
