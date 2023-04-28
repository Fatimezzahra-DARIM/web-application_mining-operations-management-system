@extends('.template.adminDashboard.layout.index')

@section('title')
    Dashboard
@endsection

@section('content')

        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            Statistics
        </h1>
{{-- @dd($Ogeologist[0]) --}}
<div class="flex justify-around flex-wrap">
    <a href="#" class="block gap-2 max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700 aspect-w-1 aspect-h-1"
    style="width: 250px;height:156px">
        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-orange-200">Geologists</h5>
        <p class="font-normal  text-center font-bold text-gray-700 dark:text-gray-400">{{ $geologists[0]->Geologists }}</p>
    </a>

    <a href="#" class="block gap-2 max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700 aspect-w-1 aspect-h-1"
    style="width: 250px;height:156px">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200 text-center">Field Geologists</h5>
        <p class="font-normal text-center  font-boldtext-gray-700 dark:text-gray-400">{{$Fgeologist[0]->Field_Geologist}}</p>
    </a>

    <a href="#" class="block gap-2 max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700 aspect-w-1 aspect-h-1"
    style="width: 250px;height:156px">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200 text-center">Laboratory Geologists</h5>
        <p class="font-normal text-center font-bold text-gray-700 dark:text-gray-400">{{$Lgeologist[0]->Laboratory_Geologist}}</p>
    </a>

    <a href="#" class="block gap-2 max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700 aspect-w-1 aspect-h-1"
    style="width: 250px;height:156px">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200 text-center">Office Geologists</h5>
        <p class="font-normal text-center font-bold text-gray-700 dark:text-gray-400">{{$Ogeologist[0]->Office_Geologist}}</p>
    </a>
</div>



@endsection
