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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
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
