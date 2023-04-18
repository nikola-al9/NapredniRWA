<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Customer CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('customers.create') }}"> Create Customer</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Customer title</th>
                    <th>Customer release date</th>
                    <th>Customer director</th>
                    <th>Customer genre</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $customers)
                    <tr>
                        <td>{{ $customers->id }}</td>
                        <td>{{ $customers->name }}</td>
                        <td>{{ $customers->LastName }}</td>
                        <td>{{ $customers->address }}</td>
                        <td>{{ $customers->dob }}</td>
                        <td>
                            <form action="{{ route('customers.destroy',$customers->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('customers.edit',$customers->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')  
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>