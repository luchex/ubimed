@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4" x-data="doctorSearch()">
    <h1 class="text-3xl font-bold mb-4">Directorio de Doctores</h1>
    
    <div class="mb-4">
        <input
            type="text"
            x-model="search"
            @input="filterDoctors"
            placeholder="Buscar por nombre o especialidad"
            class="input-field"
        >
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <template x-for="doctor in filteredDoctors" :key="doctor.id">
            <div class="card">
                <p x-text="doctor.specialty" class="text-gray-600 mb-1"></p>
                <h2 x-text="doctor.name" class="text-xl font-bold mb-2"></h2>
                <a :href="`/doctors/${doctor.id}`" class="btn-primary mr-2">Ver Detalles</a>
                <a :href="`/doctors/${doctor.id}/edit`" class="btn-secondary">Editar</a>
            </div>
        </template>
    </div>
</div>

<script>
function doctorSearch() {
    return {
        search: '',
        doctors: @json($doctors),
        filteredDoctors: @json($doctors), // Inicializa con todos los doctores
        filterDoctors() {
            this.filteredDoctors = this.doctors.filter(doctor =>
                doctor.name.toLowerCase().includes(this.search.toLowerCase()) ||
                doctor.specialty.toLowerCase().includes(this.search.toLowerCase())
            );
        }
    }
}
</script>
@endsection