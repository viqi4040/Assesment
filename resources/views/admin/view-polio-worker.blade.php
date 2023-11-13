<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                                    <li class="breadcrumb-item active">View Polio Workers</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
								
									
								<div class="bootstrap-data-table-panel">
									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="unionCouncilFilter">Filter by Union Council:</label>
											<select class="form-control" id="unionCouncilFilter" name="unionCouncilFilter">
												<option value="">All Union Councils</option>
												@foreach($allUnionCouncils as $unionCouncil)
													<option value="{{ $unionCouncil->name }}">{{ $unionCouncil->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Union Council</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											@foreach($polioWorkers as $worker);
                                                <tr>
                                                    <td>{{$worker->name}}</td>
                                                    <td>{{$worker->contact_number}}</td>
                                                    <td>{{$worker->email}}</td>
                                                    <td>{{$worker->unionCouncil->name}}</td>
                                                </tr>
                                            @endforeach    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
								    </div>
							</div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



	<script>
    document.addEventListener('DOMContentLoaded', function () {
        var unionCouncilFilter = document.getElementById('unionCouncilFilter');
        var dataTable = $('#bootstrap-data-table-export').DataTable();

        unionCouncilFilter.addEventListener('change', function () {
            var selectedUnionCouncil = unionCouncilFilter.value;

            // Clear existing search and apply new search
            dataTable.search('').columns().search('').draw();
            if (selectedUnionCouncil !== '') {
                dataTable.column(3).search(selectedUnionCouncil).draw();
            }
        });
    });
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