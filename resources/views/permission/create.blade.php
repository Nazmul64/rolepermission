<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
        <a href="{{route('permission.index')}}" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:ring focus:ring-slate-300">Back</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('permission.store')}}" method="POST">
                        @csrf
                        <div>
                            <label for="name" class="text-lg font-medium">Name:</label>
                            <div class="my-3">
                                <input id="name" value="{{old('name')}}" type="text" name="name" class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Enter Your Name" >
                                @error('name')
                                    <p class="text-red-400 font-medium">{{$message}}</p>
                                @enderror
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:ring focus:ring-slate-300" type="submit" name="submit">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
