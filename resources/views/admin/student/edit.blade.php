@extends('admin.layout.layout')
@section('contant')
    <div class="pagetitle">
        <h1>Edit Student</h1>
    </div><!-- End Page Title --><br><br>

    <section class="section dashboard">
        <div class="row">
            @if (session('message'))
                <h3 class="card-title bg-success">{{ session('message') }}</h3>
            @endif
            <form action="{{ route('student.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $student->id }}" id="id" />
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="name"
                            value="{{ $student->name }}" readonly>
                    </div>
                </div>
                <br>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Grade</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="email"
                            value="{{ $student->grade }}" readonly>
                    </div>
                </div>
                <br>
                @foreach ($student->faculity as $index => $desider)
                    <div class="row mb-3">
                        <label for="Desire{{ $index + 1 }}" class="col-sm-2 col-form-label">Desire
                            {{ $index + 1 }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="desire[{{ $index }}]"
                                value="{{ $desider->name }}" readonly>
                        </div>
                    </div>
                    <br>
                @endforeach

                <fieldset class="row mb-3">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Final Desider</label>
                        <div class="col-sm-10">

                            <select class="form-select" aria-label="Default select example" name="finaldesire_id">
                                <option value="" disabled {{ $student->final ? '' : 'selected' }}>Select
                                    Final
                                    Desider</option>
                                @foreach ($student->faculity as $desider)
                                    <option value="{{ $desider->id }}">{{ $desider->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form><!-- End Horizontal Form -->
        </div>
    </section>
@endsection
