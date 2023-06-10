<x-app-layout>
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 25%;">
            <form action="{{route('libro.store')}}" class="m-5" method="post">
                @csrf

                <p>Título: </p>
                <input class="form-control mb-2 rounded" type="text" name="titulo" required placeholder="Título">

                <p>Autor: </p>
                <input class="form-control mb-2 rounded" type="text" name="autor" required placeholder="Autor">

                <p>Sinopsis: </p>
                <input class="form-control mb-2 rounded" type="text" name="sinopsis" required placeholder="Sinopsis">

                <p>Portada: </p>
                <input class="form-control mb-2 rounded" type="text" name="portada" required placeholder="Portada">

                <p>Fecha de publicación: </p>
                <input class="form-control mb-2 rounded" type="date" name="fecha_publicacion" required>

                <p>Género: </p>
                <input class="form-control mb-2 rounded" type="text" name="genero" required placeholder="Género">

                <p>Precio: </p>
                <input class="form-control mb-2 rounded" type="text" name="precio" required placeholder="Precio">

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn w-25" style="background-color: rgb(34 197 94);color: white;">Añadir</button>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-center">
        <a href="{{route('libro.index')}}"><button class="btn m-3" style="background-color: rgb(34 197 94);color: white;">Volver</button></a>
    </div>
</x-app-layout>