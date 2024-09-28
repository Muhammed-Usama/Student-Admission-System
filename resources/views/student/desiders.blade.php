@extends('student.layout.layout')
@section('contant')
    <div class="content">

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Education Information</h3>
                        </div>
                        @if (session('education_info'))
                            <ul>
                                <li>seta num: {{ session('education_info.seatnum') }}</li>
                                <li>grade: {{ session('education_info.grade') }}</li>
                                <li>Division: {{ session('education_info.division') }}</li>
                            </ul>
                        @else
                            <p>No student information found in session.</p>
                        @endif
                        <form action="{{ route('student.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="desider1">Desider 1</label>
                                    <select name="desider1" class="form-control" id="desider1" onchange="toggleOptions(1)">
                                        <option>Select Your Desider</option>
                                        @foreach ($faculties as $faculity)
                                            <option value="{{ $faculity['id'] }}">{{ $faculity['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desider2">Desider 2</label>
                                    <select name="desider2" class="form-control" id="desider2" onchange="toggleOptions(2)">
                                        <option>Select Your Desider</option>
                                        @foreach ($faculties as $faculity)
                                            <option value="{{ $faculity['id'] }}">{{ $faculity['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desider3">Desider 3</label>
                                    <select name="desider3" class="form-control" id="desider3" onchange="toggleOptions(3)">
                                        <option>Select Your Desider</option>
                                        @foreach ($faculties as $faculity)
                                            <option value="{{ $faculity['id'] }}">{{ $faculity['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
