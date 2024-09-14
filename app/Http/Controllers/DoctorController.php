<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('specialties')->get()->map(function ($doctor) {
            return [
                'id' => $doctor->id,
                'name' => $doctor->name,
                'specialty' => $doctor->specialties->pluck('name')->implode(', ')
            ];
        });
        return view('doctors.index', compact('doctors'));
    }
    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'specialties' => 'required|array',
            'specialties.*' => 'exists:specialties,id',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $doctor = Doctor::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
        ]);

        $doctor->specialties()->attach($validatedData['specialties']);

        return redirect()->route('doctors.index')->with('success', 'Doctor creado exitosamente.');;
    }

    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }
    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::all();
        return view('doctors.edit', compact('doctor', 'specialties'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty_id' => 'required|exists:specialties,id',
        ]);
        $doctor->update($validated);
        return redirect()->route('doctors.index')->with('success', 'Doctor actualizado exitosamente.');
    }
    public function destroy(Doctor $doctor)
    {
        $doctor->specialties()->detach();
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor eliminado con éxito.');
    }
}
