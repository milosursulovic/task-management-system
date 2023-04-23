@extends('main')

@section('container')
    @if (Auth::user()->role == 'admin')
    @else
        <h1>{{ __('Example') }}</h1>
        <div class="dashboard-container">
            <div class="dashboard-options">
                <button class="btn">{{ __('Created by me') }}</button>
                <button class="btn">{{ __('Assigned to me') }}</button>
                <button class="btn">{{ __('All Tasks') }}</button>
            </div>
            <div class="dashboard-list">
                <div class="dashboard-list-item">
                    <p class="dashboard-list-item-left">Item 1</p>
                    <div class="dashboard-list-item-right">
                        <p>Assigned To: Test 2</p>
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
                <div class="dashboard-list-item">
                    <p class="dashboard-list-item-left">Item 2</p>
                    <div class="dashboard-list-item-right">
                        <p>Assigned To: Test 3</p>
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
                <div class="dashboard-list-item">
                    <p class="dashboard-list-item-left">Item 3</p>
                    <div class="dashboard-list-item-right">
                        <p>Assigned To: Test 4</p>
                        <i class="fas fa-pen"></i>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
