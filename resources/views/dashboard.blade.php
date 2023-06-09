@extends('main')

@section('container')
    @if (Auth::user()->role == 'admin')
        <div class="dashboard-container">
            <div class="dashboard-options">
                <form action="{{ route('users') }}"><button class="btn">{{ __('Users') }}</button></form>
                <form action="{{ route('allTasks') }}"><button class="btn">{{ __('Tasks') }}</button></form>
            </div>
            @if ($users != null)
                <div class="task-list">
                    @foreach ($users as $user)
                        <div class="task-list-item">
                            <p class="task-list-item-left">{{ $user->name }}</p>
                            <div class="task-list-item-right">
                                <form method="post" action="{{ route('deleteUser', ['id' => $user->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if ($allTasks != null)
                <div class="task-list">
                    @foreach ($allTasks as $task)
                        <div class="task-list-item">
                            <p class="task-list-item-left">{{ $task->title }}</p>
                            <div class="task-list-item-right">
                                <form method="post" action="{{ route('deleteTask', ['id' => $task->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @if ($allTasks != null)
            {{ $allTasks->links('simple-pagination') }}
        @endif
    @else
        <h1>{{ __('Example') }}</h1>
        <div class="dashboard-container">
            <div class="dashboard-options">
                <form action="{{ route('byMe') }}"><button class="btn">{{ __('Created by me') }}</button></form>
                <form action="{{ route('toMe') }}"><button class="btn">{{ __('Assigned to me') }}</button></form>
                <form action="{{ route('allTasks') }}"><button class="btn">{{ __('All Tasks') }}</button></form>
            </div>

            @if ($tasksByMe != null)
                <div class="task-list-outer">
                    <form action="{{ route('addTask') }}">
                        <button class="btn" type="submit">{{ __('Add Task') }}</button>
                    </form>
                    <div class="task-list-inner">
                        @foreach ($tasksByMe as $task)
                            <div class="task-list-item">
                                <p class="task-list-item-left">{{ $task->title }}</p>
                                <div class="task-list-item-right">
                                    <p>{{ __('Assigned To:') . ' ' . $task->user->name }}</p>
                                    <form action="{{ route('editTask', ['id' => $task->id]) }}">
                                        <button type="submit"><i class="fas fa-pen"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($tasksToMe != null)
                <div class="task-list">
                    @foreach ($tasksToMe as $task)
                        <div class="task-list-item">
                            <p class="task-list-item-left">{{ $task->title }}</p>
                            <div class="task-list-item-right">
                                <form id="task-form-{{ $task->id }}"
                                    action="{{ route('complete', ['id' => $task->id]) }}" method="post">
                                    @csrf
                                    <input class="task-completed" type="checkbox" id="task-completed-{{ $task->id }}"
                                        name="task-completed-{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($allTasks != null)
                <div class="task-list">
                    @foreach ($allTasks as $task)
                        <div class="task-list-item">
                            <p class="task-list-item-left">{{ $task->title }}</p>
                            <div class="task-list-item-right">
                                <p>{{ __('Assigned To:') . ' ' . $task->user->name }}</p>
                                <input type="checkbox" id="task-completed-{{ $task->id }}"
                                    name="task-completed-{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}
                                    disabled>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        @if ($allTasks != null)
            {{ $allTasks->links('simple-pagination') }}
        @endif
    @endif
@endsection
