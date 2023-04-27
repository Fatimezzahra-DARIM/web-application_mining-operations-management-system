@extends('.template.adminDashboard.layout.index')
@section('title')  Task File
@endsection
@section('content')

<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
    File Task
</h1>
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
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white"> Add File Task</h3>
                <form class="space-y-6" action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="text" name="task_id" id="task_id" >
                          <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2 dark:text-white" for="description">
                              Description
                            </label>
                            <textarea
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none  focus:shadow-outline"
                              id="description"
                              name="description"
                              placeholder="Enter a description..."
                              rows="4"
                            ></textarea>
                          </div>
                          <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2 dark:text-white" for="pdf">
                              Upload PDF
                            </label>
                            <input
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:text-white"
                              id="pdf"
                              name="pdf"
                              type="file"
                            />
                          </div>

                        <div class="flex justify-center">
                        <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                      >
                        Submit
                      </button>
                      </div>

                </form>
            </div>
        </div>
    </div>
</div>


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
                <td> <button onclick="generateTaskId({{$task->id}})" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add File</button></td>
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

function generateTaskId(id){
    let input = document.getElementById('task_id');
    input.value=id;
}
</script>

@endsection
