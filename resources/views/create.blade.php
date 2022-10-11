@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5 px-5">
        <div class="col-7">
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
                    @if (session('updateSuccess'))
                    <div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('updateSuccess') }}</strong>
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
                    <td class="col-1">{{ $student['id'] }}</td>
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

        <div class="col-5">
            <form action="{{ route('student#create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                <label for="">CNE</label>
                <input type="text" class="form-control @error('cne')
                    is-invalid
                @enderror" name="cne" placeholder="Enter CNE" value="{{ old('cne') }}">
                @error('cne')
                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Image</label>
                   <input type="file" name="image" class="form-control @error('image')
                       is-invalid
                   @enderror" id="">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>

                    @enderror
                    </div>
                <div class="form-group mb-3">
                    <label for="">First Name</label>
                    <input type="text" class="form-control @error('firstname')
                    is-invalid
                @enderror" name="firstname" placeholder="Enter first name" value="{{ old('firstname') }}">
                    @error('firstname')
                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Second Name</label>
                        <input type="text" class="form-control @error('secondname')
                        is-invalid
                    @enderror" name="secondname" placeholder="Enter second name" value="{{ old('secondname') }}">
                        @error('secondname')
                        <div class="invalid-feedback">{{ $message }}</div>

                    @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Age</label>
                            <input type="number" class="form-control @error('age')
                            is-invalid
                        @enderror" name="age" placeholder="Enter your age" value="{{ old('age') }}">
                            @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>

                        @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Speciality</label>
                                <input type="text" class="form-control @error('speciality')
                                    is-invalid
                                @enderror" name="speciality" placeholder="Enter speciality" value="{{ old('speciality') }}">
                                @error('speciality')
                                <div class="invalid-feedback">{{ $message }}</div>

                            @enderror
                                </div>
                                <div class="">
                                    <button class="btn btn-primary px-3">Save Info</button>

                                </div>
            </form>
        </div>
    </div>
</div>

@endsection
