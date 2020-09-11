<h2>inserisci auto</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cars.store') }}" method="post">
    @csrf
    @method('POST')

    <div>
        <label>marca</label>
        <input type="text" name="manifacturer" value="{{ old('manifacturer') }}">
    </div>

    <div>
        <label>anno</label>
        <input type="number" name="year" value="{{ old('year') }}">
    </div>

    <div>
        <label>cilindrata</label>
        <input type="number" name="engine" value="{{ old('engine') }}">
    </div>

    <div>
        <label>targa</label>
        <input type="text" name="plate" value="{{ old('plate') }}">
    </div>

    <div>
        <label>tipologia:</label>

        @foreach ($tags as $tag)
            <div>
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
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
        <input type="submit" value="salva">
    </div>
</form>
