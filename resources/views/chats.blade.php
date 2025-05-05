<x-app-layout>
    <div class="py-12 flex flex-col">
        <div class="flex flex-row">
            <div> <!-- Lista de chats -->

            </div>

            <div class="flex flex-col"> <!-- Chat abierto -->
                <div> <!-- Imagen que se envio para el inicio del chat, nombre de paciente, y opciones (concluir chat, reportar, blah blah) -->

                </div>

                <div class="flex flex-col">
                    <div>
                        <div class="chat chat-start">
                            <div class="chat-image avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS chat bubble component" src="https://img.daisyui.com/images/profile/demo/kenobee@192.webp"/>
                                </div>
                            </div>
                            <div class="chat-header">
                                Persona
                                <time class="text-xs opacity-50">12:45</time>
                            </div>
                            <div class="chat-bubble">Mensaje</div>
                        </div>
                    </div>
                    <div> <!-- Aqui tengo que meter lo de para enviar mensajes - boton por meter, y por decidir si uso form o js o qué -->
                        <input type="text" placeholder="Type here" class="input" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de imágenes por resolver (para añadirlas como nuevos chats) -->
        <div class="carousel carousel-center bg-neutral rounded-box max-w-md space-x-4 p-4"> <!-- Tengo que ver exactamente qué clases pintan -->
            <div class="carousel-item"> <!-- Tengo que ver cómo insertar dinámicamente copias con livewire -->
                <img src="https://img.daisyui.com/images/stock/photo-1559703248-dcaaec9fab78.webp" class="rounded-box" />
            </div>
        </div>
    </div>
</x-app-layout>