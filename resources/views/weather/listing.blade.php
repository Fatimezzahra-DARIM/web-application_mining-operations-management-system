{{-- @extends('.template.adminDashboard.layout.index')

@section('title') Weather

@endsection


@section('content') --}}
{{-- <h1 class="mb-100">Weather Data for Morocco</h1>

<ul>
    <li>Temperature: {{ $data['main']['temp'] }} K</li>
    <li>Humidity: {{ $data['main']['humidity'] }} %</li>
    <li>Wind Speed: {{ $data['wind']['speed'] }} m/s</li>
    <li>Weather Description: {{ $data['weather'][0]['description'] }}</li>
</ul> --}}
<h1>Weather Listing</h1>
{{--
@foreach ($weatherData as $city => $data)
    <h2>{{ $city }}</h2>
    @foreach ($data->list as $day)
        @if ($loop->index % 8 == 0)
            <h3>{{ date('l, F jS', strtotime($day->dt_txt)) }}</h3>
            <p>Temperature: {{ $day->main->temp }} &deg;C</p>
            <p>Description: {{ $day->weather[0]->description }}</p>
        @endif
    @endforeach
@endforeach --}}
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN flowbite -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Document</title>
</head>
<h2>Weather Listing in 2M cities</h2>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
           hii
            <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p> -->
        </caption>

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    city
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Temperatur
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>

            </tr>
        </thead>

        <tbody>
            @foreach ($weatherData as $city => $data)
            @foreach ($data->list as $day)
            @if ($loop->index % 8 == 0)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ $city }} &deg;C
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ date('l, F jS', strtotime($day->dt_txt)) }}
                </th>
                <td class="px-6 py-4">
                    {{ $day->main->temp }} &deg;C
                </td>
                <td class="px-6 py-4">
                    {{ $day->weather[0]->description }}
                </td>

                @endif
@endforeach
@endforeach
            </tr>
        </tbody>

    </table>

</div>


