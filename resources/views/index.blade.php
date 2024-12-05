<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donors') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <!-- Barra de búsqueda -->
        <form action="{{ route('donors.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input 
                    type="text" 
                    name="text" 
                    class="form-control" 
                    placeholder="Buscar donadores..." 
                    value="{{ request('text') }}"
                >
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Lista de donadores -->
        <div class="row">
            @forelse($donors as $donor)
            <div class="col-sm-3 mb-2">
                <div class="card text-center" style="width: 18rem;">
                    <img 
                        style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" 
                        class="card-img-top rounded-circle mx-auto d-block" 
                        src="{{ asset('images/'.$donor->avatar) }}" 
                        alt="{{ $donor->name }}"
                    >
                    <div class="card-body">
                        <h5 class="card-title">{{ $donor->name }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content</p>
                        <a href="/delete/{{ $donor->id }}" class="btn btn-danger">Eliminar</a>
                        <a href="/donors/{{ $donor->id }}" class="btn btn-secondary">Mostrar</a>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center col-12">No se encontraron donadores.</p>
            @endforelse
        </div>

        <!-- Botón para generar el PDF -->
        <div class="col-12 text-center my-4">
            <form action="{{ route('generate-pdf') }}" method="get">
                <button type="submit" class="btn btn-danger">Generar PDF</button>
            </form>
        </div>
    </div>

    <!-- Script para enviar el formulario al vaciar el campo de búsqueda -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.querySelector('input[name="text"]');
            const form = document.querySelector('form');

            searchInput.addEventListener('input', function () {
                if (!this.value.trim()) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>
