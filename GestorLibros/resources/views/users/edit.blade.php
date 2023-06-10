<x-app-layout>
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 25%;">
            <form action="{{route('usuario.update',$user->id)}}" class="m-4" method="post">
                @method("PATCH")
                @csrf
                <p>Nombre: </p>
                <input class="form-control mb-2 rounded" type="text" name="name" value="{{ $user->name ?? '' }}" placeholder="Nombre">

                <p>Email: </p>
                <input class="form-control mb-2 rounded" type="text" name="email" value="{{ $user->email ?? '' }}" placeholder="Email">

                <p>Contraseña: </p>
                <input class="form-control mb-2 rounded" type="password" name="password" value="" placeholder="Contraseña">

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-primary w-25">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-center">
        <a href="{{route('usuario.index')}}"><button class="btn m-3" style="background-color: rgb(34 197 94);color: white;">Volver</button></a>
    </div>
</x-app-layout>