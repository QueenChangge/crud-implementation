@extends('dashboard2.main')

@section('content')
<div class="w-full h-fit-content flex gap-10">
    <div class="w-3/4 h-fit-content flex flex-col gap-4">
        <div class="flex justify-start">
            <p class="text-4xl ">Students</p>
        </div>
        <div class="flex justify-between">
            <form class="flex gap-4" action="{{ route('dashboard.search') }}" method="GET">
                <div class="border-2 border-disabled xl:w-170 md:w-120 xs:w-90 h-12 rounded-2xl flex items-center px-2 gap-2 py-4 xl:flex md:flex xs:hidden">
                    <div class="w-6 h-6 bg-purple rounded-full"></div>
                    <input type="text" name="search" placeholder="Search user" class="border border-none w-full focus:outline-none">
                </div>
                <button type="submit" class="bg-purple w-auto h-full rounded-2xl flex items-center px-3 gap-2 md:hidden xl:flex xs:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="35" viewBox="0 0 31 35" fill="#ffffff">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.625 0.166664C11.4789 0.166847 9.36404 0.680241 7.45674 1.66401C5.54945 2.64778 3.90507 4.07341 2.66079 5.82194C1.41652 7.57047 0.608437 9.59121 0.303959 11.7156C-0.000518016 13.8399 0.207441 16.0063 0.910487 18.0339C1.61353 20.0616 2.79128 21.8917 4.34546 23.3716C5.89965 24.8515 7.7852 25.9382 9.84482 26.5412C11.9044 27.1442 14.0784 27.2459 16.1853 26.8378C18.2922 26.4297 20.271 25.5237 21.9565 24.1953L27.7388 29.9777C28.0375 30.2661 28.4374 30.4257 28.8526 30.4221C29.2677 30.4185 29.6648 30.2519 29.9584 29.9584C30.2519 29.6648 30.4185 29.2677 30.4221 28.8525C30.4257 28.4374 30.2661 28.0374 29.9777 27.7388L24.1953 21.9565C25.7597 19.972 26.7337 17.5871 27.0059 15.0749C27.2781 12.5627 26.8376 10.0245 25.7347 7.75098C24.6318 5.47743 22.9111 3.56031 20.7695 2.21903C18.6279 0.877749 16.1519 0.166494 13.625 0.166664ZM3.33334 13.625C3.33334 10.8955 4.41764 8.27775 6.3477 6.34769C8.27776 4.41763 10.8955 3.33333 13.625 3.33333C16.3545 3.33333 18.9722 4.41763 20.9023 6.34769C22.8324 8.27775 23.9167 10.8955 23.9167 13.625C23.9167 16.3545 22.8324 18.9722 20.9023 20.9023C18.9722 22.8324 16.3545 23.9167 13.625 23.9167C10.8955 23.9167 8.27776 22.8324 6.3477 20.9023C4.41764 18.9722 3.33334 16.3545 3.33334 13.625Z" fill="#ffffff"/>
                      </svg>
                </button>
            </form>
            <button type="submit" class="bg-purple w-fit-content h-12 rounded-4xl flex items-center px-8 gap-2  md:hidden xl:flex xs:hidden">
                <p class="text-lg text-white">Filter</p>
            </button>
        </div>
        <!-- table -->
        <div class="w-full">
            <table class="table-auto w-full  py-4 px-4 border border-disabled mb-4">
                <thead class="border-b border-disabled">
                    <tr>
                        <th class="text-xl font-medium text-start p-4">Photo</th>
                        <th class="text-xl font-medium text-start p-4">Fullname</th>
                        <th class="text-xl font-medium text-start p-4">Phone Number</th>
                        <th class="text-xl font-medium text-start p-4">Class</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="pt-4 pb-6 px-4">
                            <div class="w-8 h-8 bg-purple rounded-full"></div>
                        </td>
                        <td class="text-lg pt-4 pb-6 px-4">{{ $user->fullname }}</td>
                        <td class="text-lg pt-4 pb-6 px-4 flex gap-2">
                            {{ $user->phone }}
                        </td>
                        <td class="text-lg pt-4 pb-6 px-4">{{ $user->grade->name }}</td>
                    </tr>
                    @endforeach
            </table>
            {{ $users->links('pagination::simple-tailwind') }}
        </div>
    
        
    </div>
    <div class="w-1/4 h-full flex flex-col gap-4">
        <p class="text-4xl ">Recently</p>
        <div class="h-fit-content border-2 border-disabled rounded-xl py-4 px-6">
            {{-- Row List --}}
            @foreach ($recentUsers as $recent)
            <div class="w-full h-fit-content flex justify-between items-center py-3">
                <div class="flex gap-4 items-center">
                    <div class="w-8 h-8 bg-purple rounded-full"></div>
                    <p>{{ $recent->fullname }}</p>
                </div>
                <p class="text-gray-500">{{ $recent->grade->name ?? '-' }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>



@endsection