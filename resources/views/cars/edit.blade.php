<h2>modifica {{ $car->manifacturer }} - {{ $car->engine }}</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cars.update', $car) }}" method="post">
    @csrf
    @method('PUT')

    <div>
        <label>marca</label>
        <input type="text" name="manifacturer" value="{{ $car->manifacturer }}">
    </div>

    <div>
        <label>anno</label>
        <input type="number" name="year" value="{{ $car->year }}">
    </div>

    <div>
        <label>cilindrata</label>
        <input type="number" name="engine" value="{{ $car->engine }}">
    </div>

    <div>
        <label>targa</label>
        <input type="text" name="plate" value="{{ $car->plate }}">
    </div>

    <div>
        <label>tipologia:</label>

        @foreach ($tags as $tag)
            <div>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ ($car->tags->contains($tag)) ? 'checked' : '' }}>
                <span>{{ $tag->name }}</span>
            </div>
        @endforeach

    </div>

    <div>
        <label>utente:</label>
        <select name="user_id">

            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->id }} - {{ $user->name }}
                </option>
            @endforeach

        </select>
    </div>

    <div>
        <input type="submit" value="modifica">
    </div>
</form>
