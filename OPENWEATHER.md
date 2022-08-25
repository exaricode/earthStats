# Openweathermaps

- go to [Openweathermaps](https://openweathermap.org/)
- sign up or sign in.
- click on acount > my API keys
- Open the .env file and add:

```
OPENWEATHER_API_KEY="your-api-key"
OPENWEATHER_API_LANG="en"
OPENWEATHER_API_DATE_FORMAT="d/m/Y"
OPENWEATHER_API_TIME_FORMAT="h:i A"
OPENWEATHER_API_DAY_FORMAT="l"
```

- In the config folder create a new file `openweather.php` and add:

```
<?php

return [
    'api_key' 				=> env('OPENWEATHER_API_KEY'),
    'api_endpoint_current'  => 'https://api.openweathermap.org/data/2.5/weather?',
    'api_endpoint_forecast' => 'https://api.openweathermap.org/data/2.5/forecast?',
    'api_endpoint_onecall'  => 'https://api.openweathermap.org/data/2.5/onecall?',
    'api_endpoint_history'  => 'https://api.openweathermap.org/data/2.5/onecall/timemachine?',
    'api_endpoint_icons'    => 'https://openweathermap.org/img/w/',
    'api_endpoint_icons_ext' => 'png',
    'api_lang' 				=> env('OPENWEATHER_API_LANG', 'en'),
    'format_date'           => env('OPENWEATHER_API_DATE_FORMAT', 'm/d/Y'),
    'format_time'           => env('OPENWEATHER_API_TIME_FORMAT', 'h:i A'),
    'format_day'            => env('OPENWEATHER_API_DAY_FORMAT', 'l')
    ];
```

- In the folder **app\Providers** add a new file `OpenWeatherServiceProvider.php` and add:

```
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OpenWeatherServiceProvider extends ServiceProvider{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(){
        $this->publishes([
            __DIR__ . '/config/openweather.php' => config_path('openweather.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(){

    }
}
```