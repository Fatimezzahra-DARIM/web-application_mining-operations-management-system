@extends('.template.adminDashboard.layout.index')
@section('title')  Task File
@endsection
@section('content')

<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
    File Task
</h1>


<!--Card-->
<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
            <tr>
                <th data-priority="1">Title</th>
                <th data-priority="2">Description</th>
                <th data-priority="3">Assign To</th>
                <th data-priority="4">Add File</th>
                <th data-priority="5">Status</th>
                <th data-priority="6">Update File</th>
                <th data-priority="7">Delete File</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->task_name }}</td>
                <td>{{ $task->task_description }}</td>
                <td>
                    @foreach ($task->users as $user)
                        <div>{{$user->name}}</div>

                    @endforeach
                </td>
                <td> <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add File</button></td>
                <td><button type="" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Task doing</button></td>
                <td class="px-5 py-5 border-b border-gray-200  text-sm">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900"><button onclick="" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update File</button></a>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                    <a href="#" class="text-red-600 hover:text-red-900"><form action="" method="POST">

                       <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete File</button>
                       </form></a>
                </td>
            </tr>
             @endforeach

        </tbody>

    </table>


</div>
<!--/Card-->








<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
$(document).ready(function() {

    var table = $('#example').DataTable({
            responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
});
</script>

@endsection
