@extends('student.layout.layout')
@section('contant')
    <form action="{{ route('student.desider') }}" method="post">
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


        <div class="formbold-mb-3">
            <label for="seatnum" class="formbold-form-label">
                Seat Number
            </label>
            <input type="text" name="seatnum" id="seatnum" class="formbold-form-input" />
        </div>
        <br>


        <div class="formbold-input-flex">
            <div>
                <label for="grade" class="formbold-form-label"> Grade </label>
                <input type="number" name="grade" id="grade" class="formbold-form-input" />
            </div>
        </div>

        <br>
        <div>
            <label for="division" class="formbold-form-label"> Division </label>

            <select name="division" id="division" class="formbold-form-input">
                <option value="">Select Your Division</option>
                @foreach ($divisions as $division)
                    @if ($division['name'] === 'علمى علوم ورياضة')
                    @break
                @endif
                <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
            @endforeach
        </select>
    </div>
    <br>


    <button class="formbold-btn">To Desiders</button>
</form>
@endsection
