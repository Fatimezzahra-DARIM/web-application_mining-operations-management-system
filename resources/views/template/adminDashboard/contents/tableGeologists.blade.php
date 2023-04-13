@extends('.template.adminDashboard.layout.index')

@section('title') Manage Geologist
    
@endsection


@section('content')
    
<style>

    /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }
        
        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }
        
        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
</style>




    
<!-- Modal toggle -->

<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!--Container-->
    <div class="container  px-2">

        <!--Title-->
        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            Manage Geologist
        </h1>
        {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add Geologist</button> --}}
        {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
  Add geologist
</button> --}}

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"> Geologist</h3>
                <form class="space-y-6" action="{{ route('updateRole') }}" method="POST">
                         @csrf
                         @method('PUT')
                    <input id="updatedRoleFormInput" type="text" name="user_id" value="">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Role</label>
                    <select id="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected >Choose a role</option>
                        <option value="1">role 1</option>
                        <option value="2">role 2</option>
                        <option value="3">role 3</option>
                        {{-- <option value="field_geologist" {{ $geologist->role == 'field_geologist' ? 'selected' : '' }} >Field Geologist</option>
                        <option value="lab_geologist" {{ $geologist->role == 'lab_geologist' ? 'selected' : '' }}>Laboratory Geologist</option>
                        <option value="geomatician" {{ $geologist->role == 'geomatician' ? 'selected' : '' }}>Geomatician</option> --}}
                    </select>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Account Geologist</button>
                    
                </form>
            </div>
        </div>
    </div>
</div> 


        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-zinc-700 dark:text-green-400" role="alert">
            {{ session('success') }}
            </div>
            
            @endif

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Select</th>
                        <th data-priority="2">Image</th>
                        <th data-priority="3">Name</th>
                        <th data-priority="4">Email</th>
                        <th data-priority="5">Role</th>
                        <th data-priority="6">Change Role</th>
                        <th data-priority="7">Delete Geologist</th>
                        
                    </tr>
                </thead>
                <tbody>
                    {{-- @dd($geologists) --}}
        @foreach ($geologists as $geologist)
        <tr>
            
            <td class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
            </td>
            {{-- @dd($geologist->profile_photo_path) --}}
            <td><img src="{{ asset('storage/'.$geologist->profile_photo_path) }}"></td>
            <td>{{ $geologist->name }}</td>
            <td>{{ $geologist->email }}</td>
            <td>{{ $geologist->role }}</td>
            <td class="text-center"><button onclick="prepareToUpdated({{ $geologist->id }})" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Change Role</button></td>
            <td class="text-center">
                <form action="{{ route('geologists.destroy', $geologist->id) }}" method="POST">
                 @csrf
                 @method('DELETE')
                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                </form>
            </td>

        </tr>
        @endforeach
                </tbody>

            </table>
          


            
        </div>
        <!--/Card-->
        

    </div>
    <!--/container-->
</div>




    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
       
        function prepareToUpdated(id){
            input = document.getElementById('updatedRoleFormInput');
            input.value = id;
            
        };
         $(document).ready(function () {

            var table = $('#example').DataTable({
                responsive: true
            })
            .columns.adjust()
                .responsive.recalc();
            });
    </script>

@endsection