<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('theme/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/lib/data-table/buttons.bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('theme/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{ asset('theme/css/style.css')}}" rel="stylesheet">
</head>

<body>

      @include('layouts.admin.sidebar');

@include('layouts.admin.navbar');



    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Assign Polio Workers</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="basic-form col-md-6">
						<form id="polioForm" action="{{ route('submitUsers') }}">
						 @csrf
							<div class="form-group">
                                <label>Select Union Council:</label>
                                <select class="form-control" id="uc" name="uc" onchange="populateUsers()">
									<option value="">Select Union Council</option>
									@foreach($allUcs as $uc)
									<option value="{{$uc->id}}">{{$uc->name}}</option>
									@endforeach
								</select>
                            </div>
							<div class="form-group">
								<label for="users">Select Users:</label>
								<select multiple id="users" name="users[]"  class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							
							<button type="submit" class="btn btn-default">Submit</button>

						

						
						
						</form>
					</div>
					
					
                </section>
            </div>
        </div>
    </div>



	<script>
function populateUsers() {
    var uc = document.getElementById('uc').value;
    var userSelect = document.getElementById('users');

    fetch('/get_users', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ uc_id: uc }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Clear existing options
        userSelect.innerHTML = '';

        // Populate new options
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.text = option.name;
            userSelect.appendChild(optionElement);
        });
    })
    .catch(error => {
        console.error('Error fetching users:', error);
    });
}




</script>



    
    <!-- jquery vendor -->
    <script src="{{ asset('theme/js/lib/jquery.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('theme/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{ asset('theme/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->
    
    <!-- bootstrap -->

    <script src="{{ asset('theme/js/lib/bootstrap.min.js')}}"></script><script src="{{ asset('theme/js/scripts.js')}}"></script>
    <!-- scripit init-->
    <script src="{{ asset('theme/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{ asset('theme/js/lib/data-table/datatables-init.js')}}"></script>










</body>

</html>