@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4">Search</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('student.result') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="search" class="form-control form-control-lg" name="national_id"
                                    placeholder="Enter The student's National ID">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if (isset($students) && count($students) > 0)
                <div class="row mt-4">
                    <div class="col-md-12">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->grade }}</td>
                                        <td>
                                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <p>No results found for the National ID.</p>
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection
