<x-app-layout>

    <div class="row mt-5" style="margin: 0;">
        @foreach ($data as $libro)
            <div class="col-sm-4 col-md-4 col-lg-4 d-flex justify-content-end">
                <img src="{{$libro->portada}}" style="width: 250px; height: 370px;">
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 border-end">
                <p class="h3"><b>{{$libro->titulo}}</b></p>
                <p class="mt-3 me-5" style="font-size: 18px;"><b>Autor:</b> {{$libro->autor}}</p>
                <p class="mt-3 me-5" style="font-size: 18px;"><b>Género/s:</b> {{$libro->genero}}</p>
                <p class="mt-3 me-5" style="font-size: 18px;"><b>Fecha de publicación:</b> {{$libro->fecha_publicacion}}</p>
                @if(auth()->user()->admin != 'S')
                    @if(count($estado) != 0)
                        @if(count($usuarios) != 0)
                            @foreach ($usuarios as $usuario)
                                @if(!isset($usuario->id_usuario))
                                    <p class="mt-3 me-5" style="font-size: 18px;"><b>Prestar a:</b></p>
                                    <form action="{{ route('libro.prestar', $libro->id) }}" method="POST">
                                        @method("PATCH")
                                        @csrf
                                        <select class="form-select w-25" name="prestar" id="prestar">
                                        
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>
                                        
                                        </select>
                                        <button class="btn mt-3" style="background-color: rgb(34 197 94);color: white;">Prestar</button>
                                    </form>
                                @endif
                            @endforeach
                        @endif
                    @endif
                    @if(count($prestado) != 0)
                        @foreach ($prestado as $presta)
                            <p class="mt-3 me-5" style="font-size: 18px;"><b>Prestado por: </b>{{$presta->name}}</p>
                        @endforeach
                    @endif
                @endif
            </div>
        
        <div class="col-sm-3 col-md-3 col-lg-3 d-flex justify-content-start flex-column">
            @if(auth()->user()->admin == 'S')
                <div>
                    <a href="{{route('libro.edit',$libro->id)}}"><button class="btn mt-3 mb-3" style="background-color: rgb(34 197 94);color: white;">Editar</button></a>
                    <form action="{{ route('libro.destroy', $libro->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn btn-danger">Eliminar</button>
                    </form>
                </div>
            @endif
            @if(auth()->user()->admin != 'S')
                @if(count($estado) != 0)
                    @foreach ($estado as $est)
                        @if($est->leido == 'S')
                            <p class="mt-3 me-5" style="font-size: 18px;"><b>Estado:</b> {{$est->estado}}</p>
                        @endif
                    @endforeach
                @endif
            
                @if(count($estado) == 0)
                    <div>
                        <p class="h3"><b>{{$libro->precio}}</b></p>
                    </div>
                    <div>
                        <a href="{{route('libro.comprar',$libro->id)}}"><button class="btn mt-3" style="width: 200px; background-color: rgb(34 197 94);color: white;">Comprar</button></a>
                    </div>
                @endif
                @foreach ($estado as $est)
                    @if($est->leido == 'N')
                    <p class="mt-3 me-5" style="font-size: 18px;"><b>Estado:</b> {{$est->estado}}</p>
                    <div>
                        <a href="{{route('libro.updateEstado', $libro->id)}}"><button class="btn mt-3" style="background-color: rgb(34 197 94);color: white;">Marcar como leído</button></a>
                    </div>
                    @endif
                @endforeach
                @if(count($estado) != 0)
                <form class="mt-3" action="{{route('libro.comentar', $libro->id)}}" method="POST">
                    @method("PATCH")    
                    @csrf
                    <textarea class="form-control w-75" name="comentario" id="comentario" rows="3"></textarea>
                    <br>
                    <button class="btn" style="background-color: rgb(34 197 94);color: white;">Añadir Comentario</button>
                </form>
                <p class="mt-3 me-5" style="font-size: 18px;">
                    <b>Valorar:</b>
                    @if($est->valoracion == 0)
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 1])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 2])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 3])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 4])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 5])}}"><i class="bi bi-star"></i></a>
                    @endif
                    @if($est->valoracion == 1)
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 1])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 2])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 3])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 4])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 5])}}"><i class="bi bi-star"></i></a>
                    @endif
                    @if($est->valoracion == 2)
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 1])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 2])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 3])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 4])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 5])}}"><i class="bi bi-star"></i></a>
                    @endif
                    @if($est->valoracion == 3)
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 1])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 2])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 3])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 4])}}"><i class="bi bi-star"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 5])}}"><i class="bi bi-star"></i></a>
                    @endif
                    @if($est->valoracion == 4)
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 1])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 2])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 3])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 4])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 5])}}"><i class="bi bi-star"></i></a>
                    @endif
                    @if($est->valoracion == 5)
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 1])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 2])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 3])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 4])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    <a href="{{route('libro.updateValoracion', ['libro' => $libro->id , 'valor' => 5])}}"><i class="bi bi-star-fill text-warning"></i></a>
                    @endif
                </p>
                @endif
            @endif
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center align-items-center flex-column">

        <div class="mt-5 mb-5 w-75">
            <p class="mt-2 h5"><b>Sinopsis:</b></p>
            <p class=" me-5" style="font-size: 18px; text-align: justify"> {{$libro->sinopsis}}</p>
            <div class="d-flex justify-center">
                <a href="{{route('libro.index')}}"><button class="btn m-3" style="background-color: rgb(34 197 94);color: white;">Volver</button></a>
            </div>
        </div>

    </div>
</x-app-layout>