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


                <form action="/addcontact" method="post" class="m-3 " enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="Contact No">Contact No</label>
                        <input type="text" class="form-control" id="Contact No" name="tp">
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <input type="submit" class="btn btn-primary" value="    Add    ">
                    &nbsp;
                    <input type="reset" class="btn btn-warning" value="    Clear    ">
                </form>
            </div>
        </div>
        <div class="row mt-3 text-center">
            <table class="table table-dark table-striped">
                <th>Photo</th>
                <th>Name</th>
                <th>Contact No</th>
                <th>Address</th>
                <th>Action</th>

                @foreach ($tabledata as $contactdata)
                        
                    <tr>
                        <td class="align-middle"><img src="uploads/photos/{{$contactdata->photo}}" style="width: 60px; height:60px; border-radius:50%"></td>
                        <td class="align-middle">{{$contactdata->Name}}</td>
                        <td class="align-middle">{{$contactdata->Tp}}</td>
                        <td class="align-middle">{{$contactdata->Address}}</td>
                        <td class="align-middle">
                            <a href="/updatecontactview/{{$contactdata->id}}" class="btn btn-success">Update</a>
                            &nbsp;
                            <a href="/deletecontact/{{$contactdata->id}}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </td>

                    </tr>
                @endforeach
                
            </table>
        </div>
                    
               



    </div>
    
</body>
</html>