@extends('master')
@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-lg-4 col-lg col-sm-offset-4">
            <form action="{{route('user.register')}}" method="POST" id="signupform">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name"  class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                    <span class="text-danger error-text name_error"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <span class="text-danger error-text email_error"></span>
                </div>

                <div class="form-group">

                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <span class="text-danger error-text password_error"></span>
                </div>

                <button type="submit" class="btn btn-primary" id="submit">SignUp</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){
         $('#signupform').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){ 
                    if(data.status == 0){
                        $.each(data.error,function(prefix,val){
                            $('span.'+prefix+'_error').text(val[0]); 
                        }); 
                        }
                    else{
                            $('#signupform')[0].reset();
                            alert(data.msg);
                        }
                        
                }
                
            });
        
    });
    });
    
</script>
@endsection

