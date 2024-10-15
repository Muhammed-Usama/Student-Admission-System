@extends('student.layout.layout')
@section('contant')
    <form action="{{ route('student.store') }}" method="post">
        @csrf
        <div class="formbold-form-title">
            <center>
                <h2 style="font-size: 300%;" class="">Student Admission</h2>
                <br>

                <p>
                    Education Information
                </p>
            </center>
        </div>



        <br>
        <div>
            <label for="desider1" class="formbold-form-label"> Desider 1 </label>

            <select name="desider1" id="desider1" class="formbold-form-input" onchange="toggleOptions(1)">
                <option>Select Your Desider</option>
                @foreach ($faculties as $faculity)
                    <option value="{{ $faculity['id'] }}">{{ $faculity['name'] }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="desider2" class="formbold-form-label"> Desider 2 </label>

            <select name="desider2" id="desider2" class="formbold-form-input" onchange="toggleOptions(2)">
                <option>Select Your Desider</option>
                @foreach ($faculties as $faculity)
                    <option value="{{ $faculity['id'] }}">{{ $faculity['name'] }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label for="desider3" class="formbold-form-label"> Desider 3 </label>

            <select name="desider3" id="desider3" class="formbold-form-input" onchange="toggleOptions(3)">
                <option>Select Your Desider</option>
                @foreach ($faculties as $faculity)
                    <option value="{{ $faculity['id'] }}">{{ $faculity['name'] }}</option>
                @endforeach
            </select>
        </div>
        <br>


        <button class="formbold-btn">Send</button>
    </form>
@endsection
