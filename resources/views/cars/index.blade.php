<h2>lista delle auto</h2>

<ul>
    @foreach ($cars as $car)
        <li>
            {{ $car->manifacturer }} - {{ $car->engine }}
            <a href="{{ route('cars.show', $car) }}">info</a>
            -
            <a href="{{ route('cars.edit', $car) }}">modifica</a>
        </li>
    @endforeach
</ul>

<a href="{{ route('cars.create') }}">inserisci auto</a>
