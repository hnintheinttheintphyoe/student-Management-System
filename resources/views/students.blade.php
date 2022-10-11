@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <div class="row mb-2">
                <div class="col-1 offset-8">
                    <p class="shadow-sm p-1 bg-danger text-white fs-5 text-center"><i class="fa-solid fa-database me-2"></i>{{ $students->total() }}</p>
                </div>
                <div class="col-3 ">

                    <form action="{{ route('students#home') }}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search student information" aria-label="Recipient's username" aria-describedby="button-addon2" name="key" value="{{ request('key') }}">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass text-primary"></i></button>
                          </div>
                    </form>
                </div>
            </div>

            <div class="row">

                <div class="col-5 offset-7">
                    @if (session('deleteSuccess'))
                    <div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('deleteSuccess') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>

                    @endif
                </div>
            </div>
            <table class="table">
                <thead class="table-success">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NCE</th>
                    <th scope="col">Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Second Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Speciality</th>
                    <th scope="col">Created</th>
                    <th scope="col">Operations</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  @foreach ($students as $student)
                  <tr>
                    <td class="">{{ $student['id'] }}</td>
                    <td class="col-1">{{ $student['cne'] }}</td>
                    <td class="col-1">
                        <img src="{{ asset('storage/'.$student['image']) }}" class="img-thumbnail">
                    </td>
                    <td class="col-1">{{ $student['first_name'] }}</td>
                    <td class="col-1">{{ $student['second_name'] }}</td>
                    <td class="col-1">{{ $student['age'] }}</td>
                    <td class="col-2">{{ $student['speciality'] }}</td>
                    <td class="col-2">{{ $student['created_at']->format('d-M-Y') }}</td>
                    <td class="col-2">
                       <a href="{{ route('student#editPage',$student['id']) }}">
                        <button class="btn btn-warning btn-sm px-2">Edit</button>
                       </a>
                        <a href="{{ route('student#delete',$student['id']) }}">
                            <button class="btn btn-danger btn-sm ">Delete</button>
                        </a>
                    </td>
                  </tr>


                  @endforeach
                </tbody>
              </table>
              {{ $students->links() }}
        </div>
    </div>
</div>

@endsection
