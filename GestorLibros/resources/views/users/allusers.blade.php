<x-app-layout>

    <div class="d-flex justify-content-center mt-5">

        <div class="card" style="width: 40%;">
            <div>
                <div class="d-flex justify-content-center align-items-center w-100">
                    <h1 class="mt-4 mb-4 display-6">Usuarios</h1>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column">
                <table class="table w-75">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col"></th>
                            <th class="text-center" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usersList as $user)
                        <tr>
                            <th class="text-center" scope="row">{{$user->id}}</th>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <td class="text-center">
                                <form action="{{ route('usuario.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button><i class="bi bi-trash" style="color: red;"></i></button>
                                </form>
                            </td>
                            <td class="text-center">
                                <a href="{{route('usuario.edit', $user->id)}}"><i class="bi bi-pencil"></i></button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center mb-4">
                <a class="btn" style="background-color: rgb(34 197 94);color: white;" href="{{route('usuario.create')}}">Añadir Usuario</a>
            </div>
        </div>

    </div>


</x-app-layout>