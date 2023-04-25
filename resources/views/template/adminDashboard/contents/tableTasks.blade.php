@extends('.template.adminDashboard.layout.index')

@section('title') Manage Tasks

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
{{-- update task --}}
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"> Tasks</h3>
                <form class="space-y-6"  method="POST" id="formUpdatetasks">
                    @csrf
                    @method('PUT')
                    {{-- <input id="updatedTaskFormInput" type="text" name="task_id" value=""> --}}
                         <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                        </div>
                        <div>
                               <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Role</label>
                               <select id="role_id"   name="role_id"
                               class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                   <option  >Choose a role</option>
                                   <option value="3">Field Geologist</option>
                                   <option value="4">Laboratory Geologist</option>
                                   <option value="5">Geomatician</option>
                               </select>

                       </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign To</label>
                            <select class="form-control" id="assignTo" name="user_ids[]" multiple="multiple" style="width: 100%">
                                <option value=""></option>
                           </select>
                        </div>
                         <div class="py-6" id="pargraphForms">
                            <div id="row1">
                                <label for="small-input" class="block mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                               <textarea name="description" id="description" class="w-full block rounded-lg h-56 overflow-x-hidden overflow-y-auto border border-gray-300 bg-gray-50">
                                </textarea>
                            </div>
                        </div>

                        {{-- <button type="submit">okgdfg</button> --}}
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Task</button>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- update task --}}

<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal">
    <!--Container-->
    <div class="container  px-2">
        <!--Title-->
        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            Manage Tasks
        </h1>
        <!--Table-->
        {{-- <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-zinc-700 dark:text-green-400" role="alert">
            {{ session('success') }}
            </div>
             @endif

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Title</th>
                        <th data-priority="2">Description</th>
                        <th data-priority="3">Admin Name</th>
                        <th data-priority="4">Status</th>
                        <th data-priority="5">Update Task</th>
                        <th data-priority="6">Delete Task</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->task_description }}</td>
                    <td>{{ $task->admin->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td class="text-center"><button onclick="prepareToUpdated({{ $task->id}},`{{$task->task_name }}`,`{{$task->task_description }}`,{{$task->users[0]->roles()->first()->id}},{{$task->users}})" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update Task</button></td>
                    <td class="text-center">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                        </form>
                    </td>
                </tr>
                    @endforeach
                </tbody>

            </table>




        </div> --}}
        <!--/Card-->
        <div class="p-6">
            <div class="flex justify-end mb-4">
                <input type="text" name="search" id="search" class="w-full border-gray-400 focus:border-indigo-500 focus:outline-none rounded-md p-2" placeholder="Search...">
            </div>
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Admin Name</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Update Task</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Delete Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $task->task_name }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $task->task_description }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $task->admin->name }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs">Active,{{ $task->status }}</span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><button onclick="prepareToUpdated({{ $task->id}},`{{$task->task_name }}`,`{{$task->task_description }}`,{{$task->users[0]->roles()->first()->id}},{{$task->users}})" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update Task</button></a>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="#" class="text-red-600 hover:text-red-900"><form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                       <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                                       </form></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>


    </div>
    <!--/container-->
</div>





    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('#assignTo').select2({
        tags: false,
        tokenSeparators: [',']
    });
});
</script>

    <script>
        $(document).ready(function() {
  $('#role_id').on('change', function() { $('#assignTo').val(null).trigger('change');
            var roleId = $(this).val();

            $.ajax({
                url: '/get-users-by-role/' + roleId,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var options = '';

                    $.each(response, function(index, user) {
                        options += '<option value="' + user.id + '">' + user.name + '</option>';
                    });

                    $('#assignTo').html(options);
                },
                error: function() {
                    console.log('Error retrieving users');
                }
            });
  });

});

 function prepareToUpdated(id,title,description,role_id,users){

            // input = document.getElementById('updatedTaskFormInput');
            inputTitle = document.getElementById('title');
            selectRole = document.getElementById('role_id');
            inputDescription = document.getElementById('description');
            // input.value = id;
            inputTitle.value = title;
            selectRole.value = role_id;
            var url=window.location.origin+"/tasks/"+id;
    $('#formUpdatetasks').attr('action',url)

              var user=[];
            for (let i = 0; i < users.length; i++) {
                user.push(users[i].id);
                }
            $.ajax({
                url: '/get-users-by-role/' + role_id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                var options = '';
                $.each(response, function(index, user) {
                    options += '<option value="' + user.id + '">' + user.name + '</option>';
                });
                $('#assignTo').html(options).val(user).trigger('change');
                },
                error: function() {
                console.log('Error retrieving users');
                }
            });

           inputDescription.value = description;


        };

        // function populateSelect2(data) {
        //     $('#assignTo').empty();
        //     console.log($('#assignTo'));
        //     $.each(data, function(index, value) {
        //         var option = new Option(value.name, value.id);
        //         console.log(option)
        //         $('#assignTo').val(value.id);
        //     });
            // $('#assignTo').val(data)
        // }

    </script>



@endsection
