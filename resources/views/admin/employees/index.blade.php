@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Employee') }}
                        <a class="btn btn-success btn-sm" href="{{ route('employees.create') }}"> Create New Employee</a>
                    </div>

                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm" href="{{ route('employees.show',$employee->id) }}">Show</a>

                                            <a class="btn btn-primary btn-sm" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this employee?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $employees->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
