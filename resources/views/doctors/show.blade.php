@extends('layouts.app')

@section('title', 'Detalles del Doctor')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Detalles del Doctor</h2>
            
            <div class="mb-4">
                <p class="text-gray-700 font-bold">Nombre:</p>
                <p class="text-gray-600">{{ $doctor->name }}</p>
            </div>
            
            <div class="mb-4">
                <p class="text-gray-700 font-bold">Especialidad:</p>
                <p class="text-gray-600">{{ $doctor->specialty }}</p>
            </div>
            
            <div class="mb-4">
                <p class="text-gray-700 font-bold">Teléfono:</p>
                <p class="text-gray-600">{{ $doctor->phone }}</p>
            </div>
            
            <div class="mb-4">
                <p class="text-gray-700 font-bold">Email:</p>
                <p class="text-gray-600">{{ $doctor->email }}</p>
            </div>
            
            <div class="mt-6 flex justify-between">
                <a href="{{ route('doctors.edit', $doctor->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
                <a href="{{ route('doctors.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Volver al listado
                </a>
            </div>
        </div>
    </div>
@endsection