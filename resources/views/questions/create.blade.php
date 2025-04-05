@extends('layouts.master')

@section('content')
    <h2 style="font-size: 2em; margin: 10px; display: flex; align-items: center;">
        <a href="{{ route('questions.index') }}" style="font-size: 1em; color:rgb(3, 10, 13);display: flex; align-items: center; margin-right: 20px;">
            &lt;
        </a>
        Create Question
    </h2>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <label for="QuestionText">Question Text:</label>
        <input type="text" name="QuestionText" required><br>

        <label for="Category">Category:</label>
        <select name="Category" id="Category">
            <option value="Skin Type">Skin Type</option>
            <option value="Acne">Acne</option>
            <option value="Dark Spots">Dark Spots</option>
            <option value="Large Pores">Large Pores</option>
        </select><br>

        <div id="options-container">
            <label>Answer Options:</label><br>
            <div class="option">
                <input type="text" name="answeroptions[0][OptionText]" placeholder="Option Text" required>
                <select name="answeroptions[0][SkinTypeEffect]">
                    <option value="">-- Select Effect --</option>
                    <option value="Dry">Dry</option>
                    <option value="Oily">Oily</option>
                    <option value="Combination">Combination</option>
                    <option value="Normal">Normal</option>
                    <option value="Sensitive">Sensitive</option>
                    <option value="None">None</option>
                </select>
                <select name="answeroptions[0][SeverityEffect]">
                    <option value="">-- Select Effect --</option>
                    <option value="Severe">Severe</option>
                    <option value="Mild">Mild</option>
                    <option value="None">None</option>
                </select>
                <input type="number" name="answeroptions[0][Score]" placeholder="Score">
            </div>
        </div>
        <button type="button" onclick="addOption()">Add Option</button><br>

        <div class="modal-footer">
            <button type="reset"class="btn btn-secondary" data-dismiss="modal">Remove</button>
            <button class="btn btn-primary"imary"></i> Create</button>
        </div>
    </form>
<script>
    let optionCounter = 1;

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
