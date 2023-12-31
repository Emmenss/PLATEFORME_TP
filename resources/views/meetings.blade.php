<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Meeting') }}
        </h2>
    </x-slot>

    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-6 offset-2">
                <!-- Contenu de la page -->

                <!-- Conteneur pour la réunion Jitsi Meet -->
                <div id="jitsi-meeting-container" style="width: 1200px; height: 700px;"></div>

                <!-- Script Jitsi Meet -->
                <script src="https://meet.jit.si/external_api.js"></script>
                <script>
                    const domain = 'meet.jit.si';
                    const options = {
                        roomName: '{{ $meeting->title }}',
                        width: 1200,
                        height: 700,
                        parentNode: document.querySelector('#jitsi-meeting-container'),
                        lang: 'fr'
                    };

                    const api = new JitsiMeetExternalAPI(domain, options);

                    // Fonction appelée lorsqu'une connexion à la réunion est établie
                    function onConnectionSuccess() {
                        console.log('Connected to Jitsi Meet');
                    }

                    // Fonction appelée en cas d'échec de la connexion
                    function onConnectionFailed() {
                        console.error('Connection to Jitsi Meet failed');
                    }

                    // Fonction appelée lors de la déconnexion de la réunion
                    function onDisconnect() {
                        console.log('Disconnecting from Jitsi Meet');
                        // Redirection vers le dashboard après la déconnexion
                        window.location.href = '{{ route("dashboard") }}';
                    }

                    // Écouteur d'événement prêt à fermer la réunion
                    api.addEventListener('readyToClose', onDisconnect);

                    // Ajout d'événements de connexion
                    api.addEventListener('videoConferenceJoined', onConnectionSuccess);
                    api.addEventListener('videoConferenceDisconnect', onDisconnect);
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
