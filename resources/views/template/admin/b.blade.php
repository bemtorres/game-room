<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="bemtorres.win">
	{{-- <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>GAMES</title>
	<link href="{{ asset('vendor/admin/css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link href="{{ asset('vendor/iziToast/css/iziToast.min.css') }}" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .items-green {
      background-color: #A2E49B;
    }

    .letra-green {
      color:   #3CC810;
    }

    .items-click:hover{
    outline: 2px solid #333;
    text-shadow: -1px 0 black, 0 .5px black, .5px 0 black, 0 -.5px black;
    /* color: #fff; */
    cursor: pointer;
    background-color: rgba(206, 206, 206, 0.367);
    transition: background .7s;
  }

  </style>
</head>

<body class="text-sm">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">GameRoom 🎮 🕹️</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="index.html">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.html">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-sign-in.html">
              <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
            </a>
					</li>
        </ul>
			</div>
		</nav>

		<div class="main">
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      {{-- <main class="content"> --}}
				<div class="container-fluid">
					<h1 class="h3 mb-3"><strong>Loto</strong></h1>
          <div class="row">
						<div class="col-md-12">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">
                      <input id="colorpicker" type="color" class="form-control" name="config_color" onkeyup="changeColor" />
                    </div>
                  </div>
									{{-- <h5 class="card-title">Latest Projects</h5> --}}
								</div>
                <div class="table-responsive">
                  <table class="table table-bordered" border="2">
                    <tbody>
                      @foreach ($boleto as $key => $value)
                      <tr class="align-items-center">
                        @for ($n=0; $n < 9; $n++)
                        <td id="modulo" data-check="false" class="text-center align-middle {{ $value[$n] == 0 ? 'items-green' : 'items-click ' }}" style="width: 11.1111%;">
                          <h2 class="circulo">
                            <strong class="">
                              {{ $value[$n] != 0 ? $value[$n] : '' }}
                            </strong>
                          </h2>
                        </td>
                        @endfor
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
							</div>
						</div>
            <div class="col-md-12">
							<div class="card">
								<div class="card-header">

									{{-- <h5 class="card-title mb-0">Monthly Sales</h5> --}}
								</div>
								<div class="card-body">
                  <button class="btn btn-primary btn-lg px-4 me-sm-3">BINGO</button>
									{{-- <div class="align-self-center chart chart-lg"> --}}
										{{-- <canvas id="chartjs-dashboard-bar"></canvas> --}}
									{{-- </div> --}}
                  {{ $code }}
                  <div id="text-few"></div>
								</div>
							</div>
						</div>
					</div>


				{{-- </div> --}}
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://bemtorres.win/" target="_blank"><strong>bemtorres.win</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

  <div class="modal fade" id="winModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body">
          <div class="row">
            <img src="https://i.giphy.com/media/fxsqOYnIMEefC/source.gif" width="100%" alt="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Reclamar premio</button>
        </div>
      </div>
    </div>
  </div>

	<script src="{{ asset('vendor/admin/js/app.js') }}"></script>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('vendor/iziToast/js/iziToast.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>

    $(function () {
      var text_few = document.getElementById('text-few');
      var winModal = new bootstrap.Modal(document.getElementById('winModal'), {
        keyboard: false
      });


      function changeColor(color){
        const demoClasses = document.querySelectorAll('.items-green');
        demoClasses.forEach(element => {
          element.style.backgroundColor = color;
        });
      }

      $("#colorpicker").spectrum({
        color: currentColor,
        type: "color",
        togglePaletteOnly: true,
        showInput: true,
        showInitial: true,
        showButtons: false,
        move: function(tinycolor) {
          changeColor(tinycolor.toHexString());
          saveStorage(tinycolor.toHexString());
        },
      });


      if(!localStorage.getItem('bgcolor')) {
        changeColor("#A2E49B");
      } else {
        var currentColor = localStorage.getItem('bgcolor');
        changeColor(currentColor);

        $("#colorpicker").spectrum({
          color: currentColor,
          type: "color",
          togglePaletteOnly: true,
          showInput: true,
          showInitial: true,
          showButtons: false,
          move: function(tinycolor) {
            changeColor(tinycolor.toHexString());
            saveStorage(tinycolor.toHexString());
          },
        });
      }

      function saveStorage(color) {
        localStorage.setItem('bgcolor',color);
      }

      let contador_game = 0;
      $( ".items-click" ).click(function() {
        var status = $(this).data("check");
        $(this).data("check",!status);
        $(this).css("background-color","rgba(51, 51, 51, 0.367)");
        if (status) { $(this).css("background-color",""); }
        if(status) { contador_game--; } else { contador_game++; }
        if (contador_game == 15) {
          winModal.toggle();
        }
        $("#text-few").html(contador_game);
      });

    });

    //
    //  ----------------------------
    //
    //      || |||| ||||| |||| |
    //      || |||| ||||| |||| |
    //      ||    BEMTORRES    |
    //      || |||| ||||| |||| |
    //      || |||| ||||| |||| |
    //
    //  ----------------------------


  </script>
</body>
</html>
