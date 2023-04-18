<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Customer Form - Laravel 9 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Customer</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('customers.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('customers.update',$customer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer name:</strong>
                        <input type="text" name="name" value="{{ $customer->name }}" class="form-control"
                            placeholder="Customer name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer LastName:</strong>
                        <input type="text" name="LastName" class="form-control" placeholder="Customer LastName"
                            value="{{ $customer->LastName }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer address:</strong>
                        <input type="text" name="address" value="{{ $customer->address }}" class="form-control"
                            placeholder="Customer address">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Customer dob:</strong>
                        <input type="date" name="dob" value="{{ $customer->dob }}" class="form-control"
                            placeholder="dob">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>  
        </form>
    </div>
</body>

</html>