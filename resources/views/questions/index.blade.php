@extends('layouts.master')

@section('title', 'Questions')

@section('breadcrumb')
    @parent
    <li class="active">Questions</li>
    <li>
        <a href="{{ route('questions.create') }}" class="btn btn-primary">Add New Question</a>
    </li>
@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Question List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Question Text</th>
                    <th>Category</th>
                    <th>Options</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->QuestionID }}</td>
                        <td>{{ $question->QuestionText }}</td>
                        <td>{{ $question->Category }}</td>
                        <td>
                            @if($question->answeroptions->isNotEmpty())
                                <ul>
                                    @foreach($question->answeroptions as $option)
                                        <li>
                                            {{ $option->OptionText }}
                                            @if($option->SkinTypeEffect) - Skin: {{ $option->SkinTypeEffect }} @endif
                                            @if($option->SeverityEffect) - Severity: {{ $option->SeverityEffect }} @endif
                                            @if($option->Score) - Score: {{ $option->Score }} @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                No Options
                            @endif
                        </td>
                        <td>
                            <div style="display: flex; flex-direction: row; gap: 5px;">
                                <a href="{{ route('questions.edit', $question->QuestionID) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('questions.destroy', $question->QuestionID) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection