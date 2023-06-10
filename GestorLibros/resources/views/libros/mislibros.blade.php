<x-app-layout>

    <div>
        <div class="d-flex justify-content-center align-items-center w-100">
            <h1 class="mt-5 mb-4 display-6">Mis libros</h1>
        </div>

        <div class="d-flex justify-content-center align-items-center flex-wrap mt-5 mb-5" style="margin-left: 10%; margin-right: 10%;">
            @foreach ($librosList as $libro)

            <div class="d-flex flex-column justify-content-center align-items-center ms-3 me-3">
                <a class="m-3" href="{{route('libro.show',$libro->id)}}"><img src="{{$libro->portada}}" style="width: 200px; height: 300px;" alt=""></a>
                <p class="text-center" style="font-size: 16px; width: 230px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><b>{{$libro->titulo}}</b></p>
                <p class="text-center" style="font-size: 14px; width: 230px; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{$libro->autor}}</p>
            </div>

            @endforeach
        </div>

        @if(auth()->user()->admin == 'S')
        <div class="d-flex flex-column justify-content-center align-items-center mb-4">
            <a class="btn" style="background-color: rgb(34 197 94);color: white;" href="{{route('libro.create')}}">Añadir Libro</a>
        </div>
        @endif

    </div>
</x-app-layout>