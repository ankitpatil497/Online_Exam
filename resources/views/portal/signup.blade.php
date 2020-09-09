<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .signUp-contriner{
            width: 50%;
            height: 520px;
            border: 1px solid;
            border-radius: 35px;
            padding: 21px;
            margin-left: 25%;
            margin-top: 120px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="signUp-contriner">
            <div class="signUp_title">
                <h3 class="text-center">Portal Sign Up</h3>
                <hr>
            </div>
            <form action="{{route('portal.store.signup')}}"  class="database_operation"  >
                @csrf
                <div class="signUp_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Enter Name</label>
                                <input type="text" required="required" id="name" class="form-control" name="name" placeholder="Enter Name">
                            </div>
                        </div>                
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Enter E-mail</label>
                                <input type="text" required="required" id="email" class="form-control" name="email" placeholder="Enter Email">
                            </div>
                        </div>                
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mobile_no">Enter Mobile-no</label>
                                <input type="number" required="required" id="mobile_no" class="form-control" name="mobile_no" placeholder="Enter Mobile No">
                            </div>
                        </div>                
                    </div>
                      
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Enter Password</label>
                                <input type="password" required="required" id="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                        </div>                
                    </div>
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" >
                                <button type="submit" class="btn btn-info">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center">have an account? <a href="{{route('portal.login')}}">Login</a></p>
                        </div>
                    </div>
                   
                </div>
            </form>
           
        </div>
    </div>
</body>
<script>
    $(document).on('submit','.database_operation',function(){
        var url=$(this).attr('action');
        var data=$(this).serialize();
    
        $.post(url,data,function(res){
            var res=$.parseJSON(res);
            if(res.status=='true'){
                alert(res.msg);
                window.location.href=res.reload;
            }
            else{
                alert(res.msg);
            }
        })
        return false;
    });
</script>
</html>