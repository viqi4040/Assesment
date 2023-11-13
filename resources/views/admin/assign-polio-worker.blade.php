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
						<form id="polioForm">
						 @csrf
							<div class="form-group">
                                <label>Select Province:</label>
                                <select class="form-control" id="province" name="province" onchange="populateDivisions()">
									<option value="punjab">Select Province</option>
									@foreach($allProvince as $province)
									<option value="{{$province->id}}">{{$province->name}}</option>
									@endforeach
								</select>
                            </div>
							<div class="form-group">
								<label for="division">Select Division:</label>
								<select id="division" name="division" onchange="populateDistricts()" class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							<div class="form-group">
								<label for="district">Select District:</label>
								<select id="district" name="district" onchange="populateTehsils()" class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							<div class="form-group">
								<label for="tehsil">Select Tehsil:</label>
								<select id="tehsil" name="tehsil" onchange="populateUc()" class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							<div class="form-group">
								<label for="unioncouncil">Select Union Council:</label>
								<select id="unioncouncil" name="unioncouncil" onchange="populateHousehold()" class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							<div class="form-group">
								<label for="household">Select Household:</label>
								<select id="household" name="household" onchange="populateHouseholdMember()" class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							<div class="form-group">
								<label for="householdmember">Select Household Member:</label>
								<select id="householdmember" name="householdmember"  class="form-control">
									<!-- Options will be populated dynamically using JavaScript -->
								</select>
							</div>
							

						

						
						
						</form>
					</div>
					
					
                </section>
            </div>
        </div>
    </div>



	<script>
function populateDivisions() {
    var province = document.getElementById('province').value;
    var divisionSelect = document.getElementById('division');

    // Make an Ajax request to fetch divisions based on the selected province
    // Adjust the URL and data based on your application's structure
    fetch('/get_divisions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ province_id: province }),
    })
    .then(response => response.json())
    .then(data => {
        // Clear existing options
        divisionSelect.innerHTML = '';

        // Populate new options
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
			console.log(optionElement);
            optionElement.value = option.id;
            optionElement.text = option.name;
            divisionSelect.appendChild(optionElement);
        });

        // Trigger the next level of population if needed
        populateDistricts();
    })
    .catch(error => {
        console.error('Error fetching divisions:', error);
    });
}

function populateDistricts() {
    var division = document.getElementById('division').value;
    var districtSelect = document.getElementById('district');

    // Make an Ajax request to fetch divisions based on the selected province
    // Adjust the URL and data based on your application's structure
    fetch('/get_districts', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ division_id: division }),
    })
    .then(response => response.json())
    .then(data => {
        // Clear existing options
        districtSelect.innerHTML = '';

        // Populate new options
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
			console.log(optionElement);
            optionElement.value = option.id;
            optionElement.text = option.name;
            districtSelect.appendChild(optionElement);
        });

        // Trigger the next level of population if needed
        populateTehsils();
    })
    .catch(error => {
        console.error('Error fetching divisions:', error);
    });
}
function populateTehsils() {
        var district = document.getElementById('district').value;
        var tehsilSelect = document.getElementById('tehsil');

        fetch('/get_tehsils', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ district_id: district }),
        })
        .then(response => response.json())
        .then(data => {
            tehsilSelect.innerHTML = '';
            data.forEach(function (option) {
                var optionElement = document.createElement('option');
                optionElement.value = option.id;
                optionElement.text = option.name;
                tehsilSelect.appendChild(optionElement);
            });

            populateUc();
        })
        .catch(error => {
            console.error('Error fetching tehsils:', error);
        });
    }
	function populateUc() {
    var tehsil = document.getElementById('tehsil').value;
    var ucSelect = document.getElementById('unioncouncil');

    fetch('/get_union_councils', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ tehsil_id: tehsil }),
    })
    .then(response => response.json())
    .then(data => {
        ucSelect.innerHTML = '';
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.text = option.name;
            ucSelect.appendChild(optionElement);
        });

        populateHousehold();
    })
    .catch(error => {
        console.error('Error fetching union councils:', error);
    });
}

function populateHousehold() {
    var unionCouncil = document.getElementById('unioncouncil').value;
    var householdSelect = document.getElementById('household');

    fetch('/get_households', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ union_council_id: unionCouncil }),
    })
    .then(response => response.json())
    .then(data => {
        householdSelect.innerHTML = '';
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.text = option.name;
            householdSelect.appendChild(optionElement);
        });

        populateHouseholdMember();
    })
    .catch(error => {
        console.error('Error fetching households:', error);
    });
}

function populateHouseholdMember() {
    var household = document.getElementById('household').value;
    var householdMemberSelect = document.getElementById('householdmember');

    fetch('/get_household_members', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ household_id: household }),
    })
    .then(response => response.json())
    .then(data => {
        householdMemberSelect.innerHTML = '';
        data.forEach(function (option) {
            var optionElement = document.createElement('option');
            optionElement.value = option.id;
            optionElement.text = option.name;
            householdMemberSelect.appendChild(optionElement);
        });
    })
    .catch(error => {
        console.error('Error fetching household members:', error);
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