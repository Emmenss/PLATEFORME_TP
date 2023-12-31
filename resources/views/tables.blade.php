<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-o3FUJFUqRLc92OhbLzICZCXsDO/kK7dgJauuF1Da1pG5G3IOMkI7Ae98f3EVTM" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHkruoeODDE6Zl5IoO8oH8= crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-mQ92jPf1zwyUc95YXD9haL1xY47fdn5PG8J9OqE5MIStLbe8d1pg6CtKXI6IYx0j" crossorigin="anonymous"></script>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
          <div class="container-fluid py-1 px-2">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                      <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Tableau de bord</a></li> -->
                      <!-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> -->
                      <h6 class="font-weight-bold mb-0">Formations</h6>
                  </ol>
              </nav>
          </div>
        </nav>    
    <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                        <div class="full-background"
                            style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                        <div class="card-body text-start p-4 w-100">
                            <h3 class="text-white mb-2">Cours essentiellement gratuits 🔥</h3>
                            <p class="mb-4 font-weight-semibold">
                                Regardez la video introductive ci-dessous.
                            </p>
                            <button type="button"
                                class="btn btn-outline-white btn-blur btn-icon d-flex align-items-center mb-0">
                                <span class="btn-inner--icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="d-block me-2">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM6.61036 4.52196C6.34186 4.34296 5.99664 4.32627 5.71212 4.47854C5.42761 4.63081 5.25 4.92731 5.25 5.25V8.75C5.25 9.0727 5.42761 9.36924 5.71212 9.52149C5.99664 9.67374 6.34186 9.65703 6.61036 9.47809L9.23536 7.72809C9.47879 7.56577 9.625 7.2926 9.625 7C9.625 6.70744 9.47879 6.43424 9.23536 6.27196L6.61036 4.52196Z" />
                                    </svg>
                                </span>
                                <span class="btn-inner--text">Regardez moi</span>
                            </button>
                            <img src="../assets/img/3d-cube.png" alt="3d-cube"
                                class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-0">

           
             <!-- <iframe width="100%" height="400px" src="https://us05web.zoom.us/j/5855105605?pwd=IEf1Ba92hTAvweuERkOref18jEjnbd.1"> </iframe>
         -->

<!-- 
            <iframe width="100%" height="400px" src="https://www.jdoodle.com/plugin/v0/6b3b9923569332515399504c00fed667/52cd1ff122064fe4fa896f1450b24313"> </iframe>
          -->
<!-- 
          <iframe src="https://trinket.io/embed/python/2ae88754a3?start=result&showInstructions=true"
                 width="100%" height="600" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
           -->

<!-- Ajoutez ceci dans la section head de votre fichier HTML -->



          @if(auth()->user() && (auth()->user()->profil === 'enseignant' || auth()->user()->profil === 'admin'))
<button id="show-meeting-form" class="btn btn-success">Ajouter Meeting</button>
@endif

<div class="row">
    <div class="col-6">

        <!-- @if (session('message'))
        <p>{{ session('message') }}</p>
        @endif -->

        <div id="meeting-form" style="display: none;"class="mx-auto">
            <h3>Creer Meeting</h3>
            <form id="meeting-send" action="{{ route('meeting.store') }}" method="post" style="margin: 0 auto; max-width: 500px;">
                @csrf
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" required><br>

                <label for="participants">Number of Participants:</label>
                <input type="number" class="form-control" name="participants" required><br>

                <label for="description">Description:</label>
                <textarea class="form-control" name="description"></textarea><br>

                <label for="start_date">Start Date:</label>
                <input type="datetime-local" class="form-control" name="start_date" required><br>

                <button type="submit" class="btn btn-success">Create Meeting</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
     document.getElementById("show-meeting-form").addEventListener("click", function() {
        document.getElementById("meeting-form").style.display = "block";
    });

    document.getElementById("meeting-send").addEventListener("submit", function(e) {
        setTimeout(function() {
            // Afficher la SweetAlert pour le succès
            Swal.fire({
                icon: 'success',
                title: 'Meeting créé avec succès!',
                showConfirmButton: false,
                timer: 1500
            });

            // Réinitialiser le formulaire ou rediriger l'utilisateur, etc., selon vos besoins
            document.getElementById("meeting-form").reset(); // Réinitialisation du formulaire, à titre d'exemple
        }, 2000);
    });
</script>
        <div class="mt-2">
        <br/><br/><br/><br/>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-4">
                        <div class="mb-md-0 mb-3">
                        <div class="d-flex align-items-center mb-4">
                        <h3 class="mb-1 font-weight-bold">
                           Planning des Reuinions
                        </h3>
                    </div>
                            <h5 class="font-weight-semibold mb-1">Vérifier toutes les reuinions disponibles</h5>
                        </div>
                        <button type="button"
                            class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0 ms-md-auto">
                            <span class="btn-inner--icon">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <hr class="horizontal mb-4 dark">
<!-- tables.blade.php -->

<!-- ... (autres balises head) ... -->

<!-- Inclure les fichiers CSS de DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- Inclure jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Inclure les fichiers JavaScript de DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

<div class="container mt-5">
    <table id="myTable" class="table thead-dark table-responsive">
        <thead >
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Participants</th>
                <th scope="col">Description</th>
                <th scope="col">Date_début</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script>
    $(function () {
        var table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('meeting.datatables') }}",
            columns: [
                {data: 'title', name: 'title'},
                {data: 'participants', name: 'participants'},
                {data: 'description', name: 'description'},
                {data: 'start_date', name: 'start_date'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $('#myTable tbody').on('click', 'a.btn-primary', function () {
            // Récupérer l'URL du lien
            var url = $(this).attr('href');
            
            // Rediriger vers l'URL
            window.location.href = url;

            // Empêcher le comportement par défaut du lien
            return false;
        });

        $(document).ready(function () {
        $('#myTable').on('click', '.delete-meeting', function (e) {
            e.preventDefault();
            
            var url = $(this).attr('href');

            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas revenir en arrière!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
    });
</script>



                






                

        <x-app.footer />
    </main> 
    
</x-app-layout>
