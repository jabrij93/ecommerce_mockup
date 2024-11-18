<x-app-layout>
    <x-setting heading="Staff Profile">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-32 w-32 rounded-full" src="/profilephoto_images/{{$info->images}}" alt="">
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="text-sm font-medium text-gray-500">
                                        Staff ID : {{$info -> staff_id}}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Name : {{$info -> name}}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Gender : {{$info -> gender}}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Address : {{$info-> address}}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Email : {{$info -> email}}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Phone Number : {{$info -> phonenumber }}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Department : {{$info -> Department->department ?? null}}
                                    </div>
                                    <div class="text-sm font-medium text-gray-500">
                                        Company : {{$info -> company_name }}
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="text-sm font-medium text-gray-500">
                                        Pay-per-hour
                                    </div>
                                </td>

                                <td rowspan="2" class="px-6 py-4 text-sm font-medium">
                                    <p class=" text-sm font-medium text-gray-500"></p>

                                    <p class=" text-sm font-medium text-gray-500"></p>
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="text-sm font-medium text-gray-500">
                                        Total-pay
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </x-setting>
</x-app-layout>