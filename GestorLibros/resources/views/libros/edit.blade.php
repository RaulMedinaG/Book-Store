<x-app-layout>
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 25%;">
            <form action="{{route('libro.update',$libro->id)}}" class="m-5" method="post">
                @method("PATCH")
                @csrf
                <p>Título: </p>
                <input class="form-control mb-2 rounded" type="text" name="titulo" value="{{ $libro->titulo ?? '' }}" placeholder="Título">

                <p>Autor: </p>
                <input class="form-control mb-2 rounded" type="text" name="autor" value="{{ $libro->autor ?? '' }}" placeholder="Autor">

                <p>Sinopsis: </p>
                <input class="form-control mb-2 rounded" type="text" name="sinopsis" value="{{ $libro->sinopsis ?? '' }}" placeholder="Sinopsis">

                <p>Portada: </p>
                <input class="form-control mb-2 rounded" type="text" name="portada" value="{{ $libro->portada ?? '' }}" placeholder="Portada">

                <p>Fecha de publicación: </p>
                <input class="form-control mb-2 rounded" type="date" name="fecha_publicacion" value="{{ $libro->fecha_publicacion ?? '' }}" placeholder="Fecha de publicación">

                <p>Género: </p>
                <input class="form-control mb-2 rounded" type="text" name="genero" value="{{ $libro->genero ?? '' }}" placeholder="Género">

                <p>Precio: </p>
                <input class="form-control mb-2 rounded" type="text" name="precio" value="{{ $libro->precio ?? '' }}" placeholder="Precio">

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-primary ">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-center">
        <a href="{{route('libro.show',$libro->id)}}"><button class="btn m-3" style="background-color: rgb(34 197 94);color: white;">Volver</button></a>
    </div>
</x-app-layout>