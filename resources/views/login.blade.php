<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nada Aqui, Nada Alla</title>
  
  <link rel="icon" type="image/png" sizes="16x16" href="/plantilla/assets/images/icono.png">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/login/css/style.css">
  <link rel="stylesheet" href="/login/css/loginStyles.css"> 
  
</head>
<body>
  <div class="container-blur">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center mb-3 pt-3"> <!-- Ancho de columna aumentado -->
        <h2 class="heading-section company-name">Academia de Natación "NADA AQUI, NADA ALLA"</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6"> <!-- Ancho de columna aumentado -->
        <div class="login-wrap p-3"> <!-- Padding interior reducido -->
          <h3 class="mb-3 text-center">Ingresar al sistema</h3> <!-- Espaciado inferior reducido -->
          <form method="post" action="{{ route ('identificacion') }}" class="signin-form">
            @csrf
            <div class="form-group">
              <input type="text @error('name') is-invalid @enderror" class="form-control" placeholder="Username" value="{{old('name')}}" id="name" name="name" required >
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input id="password-field @error('password') is-invalid @enderror" type="password" class="form-control" placeholder="Password" id="password" name="password" required>
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <button class="form-control btn btn-primary submit">Ingresar</button> <!-- Espaciado interior del botón reducido -->
            </div>
            <div class="form-group d-md-flex">
              <div class="">
                <label class="checkbox-wrap checkbox-primary">Recordarme siempre
                  <input type="checkbox" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="/login/js/jquery.min.js"></script>
  <script src="/login/js/popper.js"></script>
  <script src="/login/js/bootstrap.min.js"></script>
  <script src="/login/js/main.js"></script>
</body>
</html>
