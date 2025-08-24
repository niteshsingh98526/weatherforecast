<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .weather-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .weather-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .weather-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>