@extends('.template.adminDashboard.layout.index')
@section('title')  About Us

@endsection
@section('content')
  <div class="flex flex-col md:flex-row">
    <div class="w-full md:w-1/2">
        <p class="ml-4 md:ml-16 mb-3 text-gray-500 dark:text-gray-400 first-line:uppercase first-line:tracking-widest first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 dark:first-letter:text-gray-100 first-letter:mr-3 first-letter:float-left">About us</p>
        <p class="text-gray-500 dark:text-gray-400 ml-4 md:ml-16">"Mining in Morocco" is a Moroccan company specialized in the mining sector. Founded several years ago, this company has experienced rapid growth thanks to its expertise in the exploration and exploitation of mineral resources in Morocco. With a team of experienced geologists, engineers, and highly qualified technicians, Mining in Morocco uses cutting-edge technologies to discover and extract minerals such as gold, silver, copper, zinc, and lead, among others. The company is committed to ensuring the sustainability of its mining operations by adhering to the strictest environmental and social standards and contributing to the economic development of the region by creating local jobs and supporting neighboring communities. With a strong reputation in the Moroccan mining industry, Mining in Morocco continues to invest in research and innovation to maintain its position as a market leader.</p>

        <blockquote class="border-l-4 border-gray-400 italic my-8 pl-4 ml-4 md:ml-16 md:mr-4 md:mt-16">
            <p class="mb-4">"Extracting value, preserving nature - Together we mine for a better future"</p>
            <cite class="text-gray-500">- Fatimezzahra DARIM</cite>
        </blockquote>
    </div>
    <div class="w-full md:w-1/2 flex justify-center items-center">
        <img src="{{asset('images/me.jpg')}}" alt="your-image-alt" class="max-w-full max-h-96 md:mr-16 mt-2 rounded">
    </div>
</div>




@endsection
