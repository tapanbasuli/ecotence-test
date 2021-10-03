@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Companies') }}
                        <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}"> Create New Company</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td><img src="{{ asset('storage/'.$company->logo) }}" class="img-responsive" alt="Logo" style="width:100%"></td>
                                    <td>{{ $company->website }}</td>
                                    <td>
                                        <form action="{{ route('companies.destroy',$company->id) }}" method="POST">

                                            <a class="btn btn-info btn-sm" href="{{ route('companies.show',$company->id) }}">Show</a>

                                            <a class="btn btn-primary btn-sm" href="{{ route('companies.edit',$company->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm" onclick="confirm('Are you sure you want to delete this company?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $companies->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
