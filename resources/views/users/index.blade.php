@php
$role = Auth::user()-> role ?? null
@endphp

<x-app-layout>
    <div class="flex flex-col mt-6 ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="flex flex-col items-start shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                    <div class="mb-6 mx-24">
                        <button type="submit" class="bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 hover:bg-gray-600"> Category </button>
                    </div>

                    <table class="min-w-0 mx-24 mb-14 divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Profile
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                            $no = 1
                            @endphp
                            @foreach ($user as $row)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $no++ }} </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $row->name }} </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> {{ $row->email }} </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> <a href="users/profile/{{ $row->id }}"> View profile </a></td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <a href="users/profile/edit/{{ $row->id }}" class="flex items-center" title="Edit">
                                            <i class="fas fa-edit mr-2"></i>
                                        </a>
                                        <a href="users/profile/delete/{{ $row->id }}" class="flex items-center ml-4" title="Delete" onclick="return confirm('Confirm to delete {{ $row->name }}?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>