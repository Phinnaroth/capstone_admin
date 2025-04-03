@extends('layouts.master')

@section('content')
    <h2 style="font-size: 2em; margin: 10px; display: flex; align-items: center;">
            <a href="{{ route('questions.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
                &lt;
            </a>
            Edit Question
    </h2>

    <form action="{{ route('questions.update', $question->QuestionID) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="QuestionText">Question Text:</label>
        <input type="text" name="QuestionText" value="{{ $question->QuestionText }}" required><br>

        <label for="Category">Category:</label>
        <input type="text" name="Category" value="{{ $question->Category }}"><br>

        <div id="options-container">
            <label>Answer Options:</label><br>
            @foreach($question->answeroptions as $option)
                <div class="option">
                    <input type="hidden" name="answeroptions[{{ $loop->index }}][OptionID]" value="{{ $option->OptionID }}">
                    <input type="text" name="answeroptions[{{ $loop->index }}][OptionText]" value="{{ $option->OptionText }}" required>
                    <input type="text" name="answeroptions[{{ $loop->index }}][SkinTypeEffect]" value="{{ $option->SkinTypeEffect }}">
                    <input type="text" name="answeroptions[{{ $loop->index }}][SeverityEffect]" value="{{ $option->SeverityEffect }}">
                    <input type="number" name="answeroptions[{{ $loop->index }}][Score]" value="{{ $option->Score }}">
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addOption()">Add Option</button><br>

        <button type="submit">Update</button>
    </form>
<script>
        let optionCounter = {{ $question->answeroptions->count() }};

    function addOption() {
        const optionDiv = document.createElement('div');
        optionDiv.classList.add('option');
        optionDiv.innerHTML = `
            <input type="text" name="answeroptions[${optionCounter}][OptionText]" placeholder="Option Text" required>
            <input type="text" name="answeroptions[${optionCounter}][SkinTypeEffect]" placeholder="Skin Type Effect">
            <input type="text" name="answeroptions[${optionCounter}][SeverityEffect]" placeholder="Severity Effect">
            <input type="number" name="answeroptions[${optionCounter}][Score]" placeholder="Score">
        `;
        document.getElementById('options-container').appendChild(optionDiv);
        optionCounter++;
    }
</script>
@endsection