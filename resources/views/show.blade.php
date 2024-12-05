<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donor Details') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="text-center">
            <img 
                style="height: 100px; width: 100px; background-color: #EFEFEF; margin: 20px;" 
                class="card-img-top rounded-circle mx-auto d-block"
                src="../images/{{$donor->avatar}}" 
                alt="{{ $donor->name }}"
            >
            <h5>{{ $donor->name }}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            <div class="d-flex justify-content-center">
                <a href="/delete/{{$donor->id}}" class="btn btn-danger me-2">Delete</a>
                <a href="/donors/{{$donor->id}}/edit" class="btn btn-secondary">Edit</a>
            </div>
        </div>
    </div>
</x-app-layout>
