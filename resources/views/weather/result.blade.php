<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Results - {{ $weatherData['location']['name'] ?? 'Unknown Location' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .weather-container {
            max-width: 700px;
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
        .weather-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            display: block;
        }
        .weather-temp {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
        }
        .weather-desc {
            text-align: center;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .weather-details {
            margin-top: 30px;
        }
        .weather-detail-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="weather-container">
            <div class="weather-header">
                <h1 class="mb-3">Weather Results</h1>
                <h2>{{ $weatherData['location']['name'] ?? 'Unknown' }}, {{ $weatherData['location']['country'] ?? '' }}</h2>
                <p class="text-muted">{{ $weatherData['location']['localtime'] ?? 'Unknown time' }}</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if(isset($weatherData['current']['weather_icons'][0]))
                        <img src="{{ $weatherData['current']['weather_icons'][0] }}" alt="Weather Icon" class="weather-icon">
                    @endif
                    
                    <div class="weather-temp">
                        {{ $weatherData['current']['temperature'] ?? 'N/A' }}°C
                    </div>
                    
                    <div class="weather-desc">
                        {{ $weatherData['current']['weather_descriptions'][0] ?? 'No description available' }}
                    </div>
                    
                    <div class="weather-details">
                        <div class="row weather-detail-item">
                            <div class="col-6">Feels Like</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['feelslike'] ?? 'N/A' }}°C</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">Humidity</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['humidity'] ?? 'N/A' }}%</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">Wind Speed</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['wind_speed'] ?? 'N/A' }} km/h</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">Wind Direction</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['wind_dir'] ?? 'N/A' }}</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">Pressure</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['pressure'] ?? 'N/A' }} mb</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">Precipitation</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['precip'] ?? 'N/A' }} mm</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">Visibility</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['visibility'] ?? 'N/A' }} km</div>
                        </div>
                        <div class="row weather-detail-item">
                            <div class="col-6">UV Index</div>
                            <div class="col-6 text-end">{{ $weatherData['current']['uv_index'] ?? 'N/A' }}</div>
                        </div>
                    </div>
                    
                    <div class="d-grid back-button">
                        <a href="{{ url('/') }}" class="btn btn-primary">Search Another Location</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>