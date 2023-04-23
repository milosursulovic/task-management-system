@extends('main')

@section('container')
    <form method="post" action="{{ $task != null ? route('saveEditedTask', ['id' => $task->id]) : route('saveTask') }}"
        id="task-form">
        @csrf
        @if ($task != null)
            @method('PATCH')
        @endif
        <h2>{{ $title }}</h2>
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input type="title" id="title" name="title" value="{{ $task != null ? $task->title : old('title') }}"
                required>
        </div>
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <input type="description" id="description" name="description"
                value="{{ $task != null ? $task->description : old('description') }}" required>
        </div>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-group">
            <label for="due_date">{{ __('Due Date') }}</label>
            <input type="datetime-local" id="due_date" name="due_date"
                value="{{ $task != null ? date('Y-m-d\TH:i', strtotime($task->due_date)) : old('due_date') }}" required>
        </div>
        @error('due_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-group">
            <label for="assigned_to">{{ __('Assign To') }}</label>
            <select id="assigned_to" name="assigned_to" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        @error('assigned_to')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="submit" class="btn">{{ __('Save Task') }}</button>
    </form>
@endsection
