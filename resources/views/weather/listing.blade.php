
@extends('.template.adminDashboard.layout.index')

@section('title','Weather');



@section('content')

<h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-6 text-xl md:text-2xl">
    Weather Listing in 2M cities
</h1>
<div class="p-8">
 <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button" class=" text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Add Task</button>
</div>

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
                 <form class="space-y-6" action="{{ route('tasks.store') }}" method="POST">
                           @csrf

                          <div>
                             <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                             <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                         </div>
                         <div>


                                     {{-- @method('PUT') --}}
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a Role</label>
                                <select id="role"   name="role_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected >Choose a role</option>
                                    <option value="3">Field Geologist</option>
                                    <option value="4">Laboratory Geologist</option>
                                    <option value="5">Geomatician</option>
                                </select>


                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assign To</label>
                            <select class="form-control" id="assignTo" name="user_ids[]" multiple="multiple" style="width: 100%">
                               {{-- @foreach ($users as $user)
                               <option value="{{ $user->id }}">{{ $user->name }}</option>
                               @endforeach --}}
                           </select>
                        </div>
                          <div class="py-6" id="pargraphForms">
                             <div id="row1">
                                 <label for="small-input" class="block mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="description" class="w-full block rounded-lg h-56 overflow-x-hidden overflow-y-auto border border-gray-300 bg-gray-50">
                                 </textarea>
                             </div>
                         </div>
                         {{-- <div class="flex items-center gap-2">
                             <label class="font-medium text-sm text-gray-900 dark:text-white">Add paragraph</label>
                             <button class="flex rounded-lg  text-black items-center justify-center addParagr"
                             type="button" onclick="add_parag()">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                   </svg>
                         </button> --}}
                         {{-- </div> --}}
                         {{-- <button type="submit">okgdfg</button> --}}
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

{{-- my data fetched table --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-8 mt-6 lg:mt-0 rounded bg-white" >
    @foreach ($weatherData as $city => $data)
    <table style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <caption class="p-5 text-lg font-semibold text-center text-gray-900 bg-white dark:text-gray-900 dark:bg-neutral-100">
            {{ $city }}
            <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p> -->
        </caption>

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-neutral-500 dark:text-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Temperatur
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>

            </tr>
        </thead>

        <tbody>

            @foreach ($data->list as $day)
            @if ($loop->index % 8 == 0)
            <tr class="bg-white border-b dark:bg-neutral-300 dark:border-gray-700">

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-900">
                    {{ date('l, F jS', strtotime($day->dt_txt)) }}
                </th>
                <td class="px-6 py-4 dark:text-gray-800">
                    {{ $day->main->temp }} &deg;C
                </td>
                <td class="px-6 py-4 dark:text-gray-800">
                    {{ $day->weather[0]->description }}
                </td>


            </tr>
            @endif
            @endforeach
        </tbody>

    </table>
    @endforeach

</div>
@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>  $("#assignTo").select2({
      tags: false,
      tokenSeparators: [',']
  })
//   function add_parag(){
//     $inp=$('#pargraphForms div').length;
//     $inp++;
//     $lastInput=$('#pargraphForms div:last')

//     $sectionParagraph=`<div id="row`+$inp+`">
//         <u class="flex justify-between items-center py-4 no-underline font-medium text-gray-900"
//          <span for="small-input" class=" mb-3 mt-2 text-sm font-medium text-gray-900 dark:text-white">pargaraph `
//          +$inp+`</span>
//         <button type="button" class="flex rounded-lg text-black  items-center justify-center deleteparg w-7 h-7"
//         onclick="delete_parag('row`+$inp+`')">
//           <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="" stroke="currentColor" class="w-4 h-4">
//            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
//             </svg>
//          </button></u>
//         <textarea name="paragraph[]" class="paragraphs w-full block rounded-lg h-56 overflow-x-hidden
//          overflow-y-auto order border-gray-300 bg-gray-50"></textarea>`

//     $lastInput.after($sectionParagraph)
//   }
//   function delete_parag(idPragraph){
//         $('#'+idPragraph).remove();
//   }
  ////Ajax
  $('#role').on('change', function() {
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

  </script>

@endpush










