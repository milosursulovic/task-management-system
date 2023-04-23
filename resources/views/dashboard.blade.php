@extends('main')

@section('container')
    @if (Auth::user()->role == 'admin')
    @else
        <h1>{{ __('Example') }}</h1>
        <div class="dashboard-container">
            <div class="dashboard-options">
                <form action="{{ route('byme') }}"><button
                        class="btn">{{ __('Created by me') }}</button></form>
                <form action="{{ route('tome') }}"><button
                        class="btn">{{ __('Assigned to me') }}</button></form>
                <form action="{{ route('alltasks') }}"><button class="btn">{{ __('All Tasks') }}</button></form>
            </div>
            @if ($tasksByMe != null)
                <div class="task-list">
                    @foreach ($tasksByMe as $task)
                        <div class="task-list-item">
                            <p class="task-list-item-left">{{ $task->name }}</p>
                            <div class="task-list-item-right">
                                <p>Assigned To: {{ $task->user->name }}</p>
                                <i class="fas fa-pen"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($tasksToMe != null)
            @endif

            @if ($allTasks != null)
            @endif
        </div>
    @endif
@endsection
