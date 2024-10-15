@extends('admin.layout.layout')
@section('contant')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Student</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if (session('message'))
                            <h3 class="card-title bg-success">{{ session('message') }}</h3>
                        @endif
                        <form action="{{ route('student.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $student->id }}"
                                id="id" />

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="StudentName">Student Name</label>
                                    <input type="text" name="name" class="form-control" id="StudentName"
                                        placeholder="Enter Student Name" value="{{ $student->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="StudentName">Grade</label>
                                    <input type="text" name="name" class="form-control" id="StudentName"
                                        placeholder="Enter Student Name" value="{{ $student->grade }}" readonly>
                                </div>
                                @foreach ($student->faculity as $desider)
                                    <div class="form-group">
                                        <label for="StudentName">Desire 1</label>
                                        <input type="text" name="name" class="form-control" id="StudentName"
                                            placeholder="Enter Student Name" value="{{ $desider->name }}" readonly>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="final">Final Desider</label>
                                    <select class="form-control" name="finaldesire_id" id="final">
                                        <option value="" disabled {{ $student->final ? '' : 'selected' }}>Select Final
                                            Desider</option>
                                        @foreach ($student->faculity as $desider)
                                            <option value="{{ $desider->id }}">{{ $desider->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
