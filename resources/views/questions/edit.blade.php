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
        <select name="Category" id="Category">
            <option value="">-- Select Category --</option>
            <option value="Skin Type" {{ $question->Category == 'Skin Type' ? 'selected' : '' }}>Skin Type</option>
            <option value="Acne" {{ $question->Category == 'Acne' ? 'selected' : '' }}>Acne</option>
            <option value="Dark Spots" {{ $question->Category == 'Dark Spots' ? 'selected' : '' }}>Dark Spots</option>
            <option value="Large Pores" {{ $question->Category == 'Large Pores' ? 'selected' : '' }}>Large Pores</option>
        </select><br>

        <div id="options-container">
            <label>Answer Options:</label><br>
            @foreach($question->answeroptions as $option)
                <div class="option">
                    <input type="hidden" name="answeroptions[{{ $loop->index }}][OptionID]" value="{{ $option->OptionID }}">
                    <input type="text" name="answeroptions[{{ $loop->index }}][OptionText]" value="{{ $option->OptionText }}" required>
                    <select name="answeroptions[{{ $loop->index }}][SkinTypeEffect]">
                        <option value="">-- Select Effect --</option>
                        <option value="Dry" {{ $option->SkinTypeEffect == 'Dry' ? 'selected' : '' }}>Dry</option>
                        <option value="Oily" {{ $option->SkinTypeEffect == 'Oily' ? 'selected' : '' }}>Oily</option>
                        <option value="Combination" {{ $option->SkinTypeEffect == 'Combination' ? 'selected' : '' }}>Combination</option>
                        <option value="Normal" {{ $option->SkinTypeEffect == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Sensitive" {{ $option->SkinTypeEffect == 'Sensitive' ? 'selected' : '' }}>Sensitive</option>
                        <option value="None" {{ $option->SkinTypeEffect == 'None' ? 'selected' : '' }}>None</option>
                    </select>
                    <select name="answeroptions[{{ $loop->index }}][SeverityEffect]">
                        <option value="">-- Select Effect --</option>
                        <option value="Severe" {{ $option->SeverityEffect == 'Severe' ? 'selected' : '' }}>Severe</option>
                        <option value="Mild" {{ $option->SeverityEffect == 'Mild' ? 'selected' : '' }}>Mild</option>
                        <option value="None" {{ $option->SeverityEffect == 'None' ? 'selected' : '' }}>None</option>
                    </select>
                    <input type="number" name="answeroptions[{{ $loop->index }}][Score]" value="{{ $option->Score }}">
                </div>
            @endforeach
        </div>
        <button type="button" onclick="addOption()">Add Option</button><br>
        <div class="modal-footer">
            <button type="reset"class="btn btn-secondary" data-dismiss="modal">Remove</button>
            <button class="btn btn-primary"imary"></i> Edit</button>
        </div>
    </form>
<script>
    let optionCounter = {{ $question->answeroptions->count() }};

    function addOption() {
        const optionDiv = document.createElement('div');
        optionDiv.classList.add('option');
        optionDiv.innerHTML = `
            <input type="text" name="answeroptions[${optionCounter}][OptionText]" placeholder="Option Text" required>
            <select name="answeroptions[${optionCounter}][SkinTypeEffect]">
                <option value="">-- Select Effect --</option>
                <option value="Dry">Dry</option>
                <option value="Oily">Oily</option>
                <option value="Combination">Combination</option>
                <option value="Normal">Normal</option>
                <option value="Sensitive">Sensitive</option>
                <option value="None">None</option>
            </select>
            <select name="answeroptions[${optionCounter}][SeverityEffect]">
                <option value="">-- Select Effect --</option>
                <option value="Severe">Severe</option>
                <option value="Mild">Mild</option>
                <option value="None">None</option>
            </select>
            <input type="number" name="answeroptions[${optionCounter}][Score]" placeholder="Score">
        `;
        document.getElementById('options-container').appendChild(optionDiv);
        optionCounter++;
    }
</script>
@endsection
