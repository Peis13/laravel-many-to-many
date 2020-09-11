<h2>dettagli: {{ $car->manifacturer }}</h2>

<div>
    <span>tipologia:</span>

    @if (!$car->tags->isEmpty())

        @foreach ($car->tags as $tag)
                {{ $tag->name }}
        @endforeach

    @else
        {{ 'nessuna tipologia specificata' }}
    @endif
</div>

<ul>
    <li>anno: {{ $car->year }}</li>
    <li>cilindrata: {{ $car->engine }}</li>
    <li>targa: {{ $car->plate }}</li>
    <li>proprietario: {{ $car->user->name }}</li>
    <li>email: {{ $car->user->email }}</li>
</ul>

<a href="{{ route('cars.edit', $car) }}">modifica</a>
-
<a href="{{ route('cars.index') }}">torna all'indice</a>
