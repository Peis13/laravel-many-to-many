<h2>lista delle auto</h2>

<ul>
    @foreach ($cars as $car)
        <li>
            {{ $car->manifacturer }} - {{ $car->engine }}
            <a href="{{ route('cars.show', $car) }}">info</a>
            -
            <a href="{{ route('cars.edit', $car) }}">modifica</a>

            <form action="{{ route('cars.destroy', $car) }}" method="post">
                @csrf
                @method('DELETE')

                <input type="submit" value="elimina">
            </form>
        </li>
    @endforeach
</ul>

<a href="{{ route('cars.create') }}">inserisci auto</a>
