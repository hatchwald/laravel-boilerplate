
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                          <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">No</th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Email</th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Role</th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Status</th>
                                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $users)
                                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$loop->iteration}}</td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$users->name}}</td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{$users->email}}</td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        {{$users->roles[0]->name}}
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        @if ($users->status)
                                                            <span class="text-md inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-green-500 text-white rounded-full">Active</span>
                                                        @else
                                                            <span class="text-xs inline-block py-1 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-gray-200 text-gray-700 rounded-full">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        @can('user-edit')
                                                        <a href="#"><i class='bx bx-pencil'></i> Update</a>
                                                        @endcan
                                                        @can('user-delete')
                                                        <a href="#"><i class='bx bxs-trash' ></i> Delete</a>
                                                        @endcan
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
            </div>
        </div>
    </div>
</x-app-layout>