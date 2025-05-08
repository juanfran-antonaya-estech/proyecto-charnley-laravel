<div class="flex flex-col"> <!-- Chat abierto -->
    <div class="flex flex-row"> <!-- Imagen que se envió para el inicio del chat, nombre de paciente, y opciones (concluir chat, reportar, blah blah) -->
        {{-- <div class="" style="background-image: url('{{$sala->imagen()->imagenOriginal()}}')"> --}} <!-- Imagen por la que se abrió el chat, podría cambiarla por un img o lo que sea -->
        <div class="" style="background-image: url('https://img.daisyui.com/images/profile/demo/kenobee@192.webp')"> <!-- placeholder hasta tener imágenes -->

        </div>
        <div>
            <div> <!-- Nombre de usuario y edad -->
                {{--<h2>{{$sala->paciente()->name}}</h2>--}}
            </div>
            <div> <!-- Botones - debería tener concluír chat y reportar, pero qué más? -->

            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div>
            {{--@foreach ($sala->mensajes() as $mensaje)
                <div class="chat chat-start">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <!-- <img alt="Tailwind CSS chat bubble component" src="{{$mensaje->sender()}}"/> --> <!-- Los usuarios no tienen imágenes, pero interesaría -->
                            <img alt="Tailwind CSS chat bubble component" src="https://img.daisyui.com/images/profile/demo/kenobee@192.webp"/> <!-- placeholder -->
                        </div>
                    </div>
                    <div class="chat-header">
                        {{$mensaje->sender()->name}}
                        <time class="text-xs opacity-50">{{$mensaje->created_at}}</time>
                    </div>
                    <div class="chat-bubble">{{$mensaje->content}}</div>
                </div>
            @endforeach--}}
            <div class="chat chat-start"> <!-- Placeholder -->
                <div class="chat-image avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS chat bubble component" src="https://img.daisyui.com/images/profile/demo/kenobee@192.webp"/>
                    </div>
                </div>
                <div class="chat-header">
                    Nombre
                    <time class="text-xs opacity-50">12:50</time>
                </div>
                <div class="chat-bubble">Holiwis :3</div>
            </div>
        </div>
        <div> <!-- Aqui tengo que meter lo de para enviar mensajes - boton por meter, y por decidir si uso form o js o qué -->
            @livewire('envio-chat', ['id_sala' => "$id_sala"])
        </div>
    </div>
</div>