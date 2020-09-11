<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Tag;
use App\User;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $users = User::all();

        return view('cars.create', compact('tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validazione
        $request->validate($this->validationData());
        $data_request = $request->all();

        // Nuova istanza Car
        $new_car = new Car();
        $new_car->manifacturer = $data_request['manifacturer'];
        $new_car->year = $data_request['year'];
        $new_car->engine = $data_request['engine'];
        $new_car->plate = $data_request['plate'];
        $new_car->user_id = $data_request['user_id'];

        $new_car->save();

        if (isset($data_request['tags'])) {
            $new_car->tags()->sync($data_request['tags']);
        }

        return redirect()->route('cars.show', $new_car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
      return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $tags = Tag::all();
        $users = User::all();
        return view('cars.edit', compact('car', 'tags', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        // Validazione
        $request->validate($this->validationData());
        $data_request = $request->all();

        if (isset($data_request['tags'])) {
            $car->tags()->sync($data_request['tags']);
        } else {
            $car->tags()->detach();
        }

        $car->update($data_request);

        return redirect()->route('cars.show', $car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->tags()->detach();
        $car->delete();
        
        return redirect()->route('cars.index');
    }

    public function validationData() {
        return [
            'manifacturer' => 'required|max:255',
            'year' => 'required|integer|min:1950|max:2020',
            'engine' => 'required|max:255',
            'plate' => 'required|max:7',
            'user_id' => 'required|integer',
        ];
    }
}
