@extends('layouts.app')

@section('title', 'Weather Forecast')

@section('styles')
<style>
    .weather-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .weather-form {
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
<div class="weather-container">
            <div class="weather-header">
                <h1 class="mb-4">Weather Forecast</h1>
                <p class="text-muted">Enter a location to get the current weather information</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="weather-form">
                <form action="{{ route('weather.get') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="query" class="form-label">Location</label>
                        <input type="text" class="form-control @error('query') is-invalid @enderror" 
                            id="query" name="query" placeholder="Enter city name, zip code, or coordinates" 
                            value="{{ old('query') }}" required>
                        @error('query')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Get Weather</button>
                    </div>
                </form>
            </div>
        </div>
@endsection