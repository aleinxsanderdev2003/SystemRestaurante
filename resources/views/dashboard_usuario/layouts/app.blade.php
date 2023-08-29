<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark p-3 bg-danger" id="headerNav">
        <div class="container-fluid">
          <a class="navbar-brand d-block d-lg-none" href="#">
            <img src="/static_files/images/logos/logo_2_white.png" height="80" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto ">
              <li class="nav-item">
                <a class="nav-link mx-2 active" aria-current="page" href="#">INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#">PEDIDOS</a>
              </li>
              <li class="nav-item d-none">
                <a class="nav-link mx-2" href="#">
                    <img src="img/logos/logo.png" style="width:10px" class="w-75" alt="ERROR AL CARGAR">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#">RECLAMOS</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  MÁS
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Blog</a></li>
                  <li><a class="dropdown-item" href="#">About Us</a></li>
                  <li><a class="dropdown-item" href="#">CONTACTAR</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <style>
        @media screen and (min-width:992px){
      .nav-item {
      line-height:80px;
      }
    }
      </style>
</body>
</html>
