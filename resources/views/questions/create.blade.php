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
        <input type="text" name="Category"><br>

        <div id="options-container">
            <label>Answer Options:</label><br>
            <div class="option">
                <input type="text" name="answeroptions[0][OptionText]" placeholder="Option Text" required>
                <input type="text" name="answeroptions[0][SkinTypeEffect]" placeholder="Skin Type Effect">
                <input type="text" name="answeroptions[0][SeverityEffect]" placeholder="Severity Effect">
                <input type="number" name="answeroptions[0][Score]" placeholder="Score">
            </div>
        </div>
        <button type="button" onclick="addOption()">Add Option</button><br>

        <button type="submit">Create</button>
    </form>
<script>
    let optionCounter = 1;

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