@extends('.template.adminDashboard.layout.index')

@section('title')
    Dashboard
@endsection

@section('content')

        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            Statistics
        </h1>


<div class="flex justify-around flex-wrap ">
    <a href="#" class="block max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200">Geologists</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>

    <a href="#" class="block max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200">Field Geologists</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>

    <a href="#" class="block max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200">Laboratory Geologists</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>

    <a href="#" class="block max-w-sm mt-4 p-6 bg-white border border-zinc-200 rounded-lg shadow hover:bg-zinc-100 dark:bg-zinc-600 dark:border-zinc-700 dark:hover:bg-zinc-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-orange-200">Office Geologists</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>
</div>

@endsection
