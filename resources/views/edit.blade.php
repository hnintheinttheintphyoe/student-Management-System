@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mt-5 px-5">
        {{-- <div class="col-7">
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
                    <td>{{ $student['id'] }}</td>
                    <td>{{ $student['cne'] }}</td>
                    <td>{{ $student['first_name'] }}</td>
                    <td>{{ $student['second_name'] }}</td>
                    <td>{{ $student['age'] }}</td>
                    <td>{{ $student['speciality'] }}</td>
                    <td>{{ $student['created_at']->format('d-M-Y') }}</td>
                    <td>
                       <a href="{{ route('student#editPage') }}">
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
        </div> --}}

        <div class="col-5">
            <form action="{{ route('student#edit') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">

               <img src="{{ asset('storage/'.$data['image']) }}" alt="" class="img-thumbnail" style="width: 200px;">
                <input type="file" class="form-control @error('image')
                    is-invalid
                @enderror" name="image" >
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{old('id',$data['id'])  }}">
                <label for="">CNE</label>
                <input type="text" class="form-control @error('cne')
                    is-invalid
                @enderror" name="cne" placeholder="Enter CNE" value="{{ old('cne',$data['cne']) }}">
                @error('cne')
                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">First Name</label>
                    <input type="text" class="form-control @error('firstname')
                    is-invalid
                @enderror" name="firstname" placeholder="Enter first name" value="{{ old('firstname',$data['first_name']) }}">
                    @error('firstname')
                    <div class="invalid-feedback">{{ $message }}</div>

                @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Second Name</label>
                        <input type="text" class="form-control @error('secondname')
                        is-invalid
                    @enderror" name="secondname" placeholder="Enter second name" value="{{ old('secondname',$data['second_name']) }}">
                        @error('secondname')
                        <div class="invalid-feedback">{{ $message }}</div>

                    @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Age</label>
                            <input type="number" class="form-control @error('age')
                            is-invalid
                        @enderror" name="age" placeholder="Enter your age" value="{{ old('age',$data['age']) }}">
                            @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>

                        @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Speciality</label>
                                <input type="text" class="form-control @error('speciality')
                                    is-invalid
                                @enderror" name="speciality" placeholder="Enter speciality" value="{{ old('speciality',$data['speciality']) }}">
                                @error('speciality')
                                <div class="invalid-feedback">{{ $message }}</div>

                            @enderror
                                </div>
                                <div class="">
                                    <button class="btn btn-primary px-3">Update</button>

                                </div>
            </form>
        </div>
    </div>
</div>

@endsection
