@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h2 style="font-size: 2em; margin-bottom: 20px; display: flex; align-items: center;">
            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary btn-sm mr-2">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            Create Question
        </h2>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="QuestionText">Question Text:</label>
                        <input type="text" name="QuestionText" id="QuestionText" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="Category">Category:</label>
                        <select name="Category" id="Category" class="form-control">
                            <option value="Skin Type">Skin Type</option>
                            <option value="Acne">Acne</option>
                            <option value="Dark Spots">Dark Spots</option>
                            <option value="Large Pores">Large Pores</option>
                        </select>
                    </div>

                    <div id="options-container" class="mt-3">
                        <label>Answer Options:</label>
                        <div class="option card mb-2 p-3">
                            <div class="form-row align-items-center">
                                <div class="col-md-4 mb-2">
                                    <input type="text" name="answeroptions[0][OptionText]" class="form-control" placeholder="Option Text" required>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <select name="answeroptions[0][SkinTypeEffect]" class="form-control">
                                        <option value="">-- Skin Type Effect --</option>
                                        <option value="Dry">Dry</option>
                                        <option value="Oily">Oily</option>
                                        <option value="Combination">Combination</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Sensitive">Sensitive</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <select name="answeroptions[0][SeverityEffect]" class="form-control">
                                        <option value="">-- Severity Effect --</option>
                                        <option value="Severe">Severe</option>
                                        <option value="Mild">Mild</option>
                                        <option value="None">None</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="number" name="answeroptions[0][Score]" class="form-control" placeholder="Score">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="addOption()" class="btn btn-success mt-2">
                        <i class="fa fa-plus"></i> Add Option
                    </button><br>

                    <div class="mt-3">
                        <button type="reset" class="btn btn-secondary">
                            <i class="fa fa-undo"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let optionCounter = 1;

        function addOption() {
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('option', 'card', 'mb-2', 'p-3');
            optionDiv.innerHTML = `
                <div class="form-row align-items-center">
                    <div class="col-md-4 mb-2">
                        <input type="text" name="answeroptions[${optionCounter}][OptionText]" class="form-control" placeholder="Option Text" required>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select name="answeroptions[${optionCounter}][SkinTypeEffect]" class="form-control">
                            <option value="">-- Skin Type Effect --</option>
                            <option value="Dry">Dry</option>
                            <option value="Oily">Oily</option>
                            <option value="Combination">Combination</option>
                            <option value="Normal">Normal</option>
                            <option value="Sensitive">Sensitive</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-2">
                        <select name="answeroptions[${optionCounter}][SeverityEffect]" class="form-control">
                            <option value="">-- Severity Effect --</option>
                            <option value="Severe">Severe</option>
                            <option value="Mild">Mild</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <div class="input-group">
                            <input type="number" name="answeroptions[${optionCounter}][Score]" class="form-control" placeholder="Score">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger remove-option-btn"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('options-container').appendChild(optionDiv);
            optionCounter++;

            // Add event listener for dynamically created remove button
            const removeButtons = document.querySelectorAll('.remove-option-btn');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.option').remove();
                });
            });
        }

        // Initial remove button functionality for the first option
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-option-btn')) {
                event.target.closest('.option').remove();
            }
        });
    </script>
@endsection
