@extends('layouts.app')

@section('title', 'Editar Doctor')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Editar Doctor</h2>
    <form action="{{ route('doctors.update', $doctor) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                Nombre
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ $doctor->name }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="specialty_id">
                Especialidad
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="specialty_id" name="specialty_id">
                @foreach($specialties as $specialty)
                <option value="{{ $specialty->id }}" {{ $doctor->specialties->contains($specialty->id) ? 'selected' : '' }}>
                    {{ $specialty->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                Teléfono
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" name="phone" value="{{ $doctor->phone }}" required>
        </div>
        
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Actualizar Doctor
            </button>
            <a href="{{ route('doctors.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection