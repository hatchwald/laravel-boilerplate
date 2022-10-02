
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
            <div class="alert bg-green-100 rounded-lg py-5 px-6 mb-3 text-base text-green-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                <strong class="mr-1">Success ! </strong> {{$message}}.
                <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-green-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-green-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can("user-create")
                    <div class="flex space-x-2 justify-end">
                        <a href="/users/create" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                        Create User</a>
                    </div>
                    @endcan
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
                                                        <a href="/users/{{$users->id}}/edit"><i class='bx bx-pencil'></i> Update</a>
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