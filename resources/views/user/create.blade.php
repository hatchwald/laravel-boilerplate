<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert bg-red-100 rounded-lg py-5 px-6 mb-3 text-base text-red-700 inline-flex items-center w-full alert-dismissible fade show" role="alert">
                            <strong class="mr-1">{{$error}} </strong>
                            <button type="button" class="btn-close box-content w-4 h-4 p-1 ml-auto text-red-900 border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-red-900 hover:opacity-75 hover:no-underline" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/users">
                        @csrf
                            <div class="block mt-3">
                                <span class="text-gray-700">Name</span>
                                <input type="text" class="
                                    mt-0
                                    block
                                    w-full
                                    px-0.5
                                    border-0 border-b-2 border-gray-200
                                    focus:ring-0 focus:border-black
                                  " placeholder="Name User" name="name" id="name" value="{{old('name')}}" required>
                            </div>
                            <div class="block mt-3">
                                <span class="text-gray-700">Email address</span>
                                <input type="email" class="
                                    mt-0
                                    block
                                    w-full
                                    px-0.5
                                    border-0 border-b-2 border-gray-200
                                    focus:ring-0 focus:border-black
                                  " placeholder="john@example.com" name="email" id="email" value="{{old('email')}}" required>
                            </div>
                            <div class="block mt-3">
                                <span class="text-gray-700">Role</span>
                                <select name="role" aria-label="label for the select" class="block w-full mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" id="">
                                    <option value="" selected disabled>Select Role</option>
                                    @foreach ($roles as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="block mt-3 mb-4">
                                <span class="text-gray-700">Status User</span>
                                <select name="status" aria-label="label for the select" class="block w-full mt-0 px-0.5 border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black" id="">
                                    <option value="0">Disabled</option>
                                    <option value="1">Active</option>
                                    
                                </select>
                            </div>
                            
                        
                        
                        
                            <a href="/users" data-mdb-ripple="true" data-mdb-ripple-color="light" class="inline-block px-6 py-2.5 bg-gray-800 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
                            Cancel</a>
                        
                        <button type="submit" class="
                          px-6
                          py-2.5
                          bg-blue-600
                          text-white
                          font-medium
                          text-xs
                          leading-tight
                          uppercase
                          rounded
                          shadow-md
                          hover:bg-blue-700 hover:shadow-lg
                          focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                          active:bg-blue-800 active:shadow-lg
                          transition
                          duration-150
                          ease-in-out">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>