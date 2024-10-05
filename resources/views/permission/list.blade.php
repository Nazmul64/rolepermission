<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('permission') }}
        </h2>
        <a href="{{route('permission.create')}}" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:ring focus:ring-slate-300">Create</a>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <x-message></x-message>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                         <th class="px-6 py-5 text-left">#</th>
                         <th  class="px-6 py-5 text-left">Name</th>
                         <th  class="px-6 py-5 text-left">Created</th>
                         <th  class="px-6 py-5 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($permissions->isNotEmpty())
                       @foreach ($permissions as $permission)
                            <tr class="border-b" >
                                <td class="px-6 py-5 text-left">{{$permission->id}}</td>
                                <td class="px-6 py-5 text-left">{{$permission->name}}</td>
                                <td class="px-6 py-5 text-left">{{\Carbon\Carbon::parse($permission->created_at)->format('d M, Y')}}</td>
                                <td class="px-6 py-5 text-center">
                                    <a href="{{route('permission.edit',$permission->id)}}" class="bg-slate-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:ring focus:ring-slate-300 hover-:bg-slate-600">Edit</a>
                                    <a  href="{{route('permission.delete',$permission->id)}}" class="bg-red-700 text-sm rounded-md px-5 py-3 text-white hover:bg-slate-600 focus:ring focus:ring-slate-300 hover-:bg-red-700">Delete</a>
                                </td>
                            </tr>
                       @endforeach
                    @endif

                </tbody>
            </table>
            {{$permissions->links()}}
        </div>
    </div>
</x-app-layout>
