<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/estilosweb.css')}}">
    <style>
        /* Estilos personalizados para las cards */
        .card {
            border-radius: 20px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<!-- inicio de navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('img/logo.jpg') }}" alt="" width="60" height="54">
        </a>
        <a class="navbar-brand" href="{{ route('index') }}">FreeSpace</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('info') }}">Quienes Somos</a>
                </li>
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login')}}">Iniciar Sesión</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
<!--  final del navbar -->


<div class="container">
    <h1 class="mt-5">Información de la Startup FreeSpace</h1>
    <hr>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <!-- Datos Generales de la Startup -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datos Generales de la Startup</h5>
                    <p class="card-text">Nombre de la Startup: Sistema de Administración y Control de Espacios Libres (FreeSpace)</p>
                    <p class="card-text">Giro: Servicio Tecnológico</p>
                    <p class="card-text">Direcciones:
                        <ul>
                            <li>Naranjos 9, Delegación Santa María Totoltepec, 50246 Santa María Totoltepec, Méx. (Montalvo)</li>
                            <li>Mariano Matamoros 186, San Mateo, 52140 San Mateo-Barrio, Méx. (Kev)</li>
                        </ul>
                    </p>
                    <p class="card-text">Teléfonos:
                        <ul>
                            <li>7223522417 (Aldo)</li>
                            <li>7226278828 (Montalvo)</li>
                            <li>7223120186 (Kev)</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>

        <!-- Antecedentes de la Organización -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Antecedentes de la Organización</h5>
                    <p class="card-text">FreeSpace se estableció en el año 2021 como respuesta a la creciente demanda de espacios de trabajo flexibles y temporales en el mercado mexicano. Fundada por un equipo de emprendedores visionarios, nuestra empresa surgió con la misión de facilitar la búsqueda y reserva de espacios de trabajo adaptados a las necesidades cambiantes de profesionales nómadas, empresas flexibles e instituciones educativas.
                      Desde nuestros inicios, nos hemos destacado por nuestra pasión por la innovación y el compromiso con la excelencia en el servicio al cliente. Iniciamos nuestras operaciones con una plataforma en línea intuitiva y eficiente, diseñada para ofrecer a nuestros usuarios una experiencia de búsqueda y reserva de espacios de trabajo sin precedentes.
                      A lo largo de los años, hemos experimentado un crecimiento constante y hemos consolidado nuestra posición como líderes en el mercado de espacios de trabajo flexibles en México. Hemos establecido alianzas estratégicas con una amplia red de proveedores de espacios de trabajo de calidad en todo el país, lo que nos ha permitido ofrecer a nuestros usuarios una amplia variedad de opciones para elegir.
                      </p>
                </div>
            </div>
        </div>

        <!-- Misión, Visión y Objetivos de la Organización -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Misión, Visión y Objetivos de la Organización</h5>
                    <p class="card-text">Misión: Nuestra misión es proporcionar a profesionales nómadas, empresas flexibles e instituciones educativas una plataforma intuitiva y eficiente para buscar y reservar espacios de trabajo flexibles...</p>
                    <p class="card-text">Visión: Nos vemos como la principal plataforma en línea para la búsqueda y reserva de espacios de trabajo flexibles en América Latina...</p>
                    <p class="card-text">Objetivos:
                        <ul>
                            <li><strong>A Corto Plazo:</strong> Mejorar constantemente la experiencia del usuario en nuestra plataforma mediante actualizaciones de interfaz, mayor personalización y mejoras en la funcionalidad.</li>
                            <li><strong>A Mediano Plazo:</strong> Ampliar nuestra oferta de espacios de trabajo flexibles en ciudades clave de América Latina, estableciendo asociaciones estratégicas con proveedores de espacios de calidad.</li>
                            <li><strong>A Largo Plazo:</strong> Convertirnos en la plataforma líder a nivel mundial para la búsqueda y reserva de espacios de trabajo flexibles, expandiendo nuestra presencia a nuevos mercados internacionales y manteniendo nuestro compromiso con la excelencia en el servicio al cliente y la innovación tecnológica.</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Enlace al archivo JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
