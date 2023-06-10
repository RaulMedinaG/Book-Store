<x-app-layout>
    <div class="d-flex justify-content-center mt-5">
        <div class="card" style="width: 25%;">
            <form action="{{route('usuario.store')}}" class="m-5" method="post">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button class="btn w-25" style="background-color: rgb(34 197 94);color: white;">Añadir</button>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex justify-center">
        <a href="{{route('usuario.index')}}"><button class="btn m-3" style="background-color: rgb(34 197 94);color: white;">Volver</button></a>
    </div>
</x-app-layout>