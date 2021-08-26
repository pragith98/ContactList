<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacl List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
</head>
<body>
    <div class="container">
        <div class="row text-center mt-3">
            <h1>My Contact List</h1>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-11 col-sm-12 col-md-5 col-lg-4 border border-1">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
                    
                @endforeach


                <form action="/updatecontact" method="post" class="m-3 " enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$contactdata->Name}}">
                    </div>
                    <div class="mb-3">
                        <label for="tp">Contact No</label>
                        <input type="text" class="form-control" id="tp" name="tp" value="{{$contactdata->Tp}}">
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$contactdata->Address}}">
                    </div>
                    <div class="mb-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <input type="submit" class="btn btn-success" value="    Save    ">
                    &nbsp;
                    <a href="/contactview" class="btn btn-danger">Cancel</a>

                    <input type="hidden" name="id" value="{{$contactdata->id}}">
                </form>
            </div>
        </div>
        
                    
               



    </div>
    
</body>
</html>