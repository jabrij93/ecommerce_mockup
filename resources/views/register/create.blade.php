<x-app-layout>
    <x-setting2 heading="Register New User">
        <div class="flex flex-col">
            <form method="post" action="/register" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="images">
                        Profile photo
                    </label>
                    <input type="file" name="images">
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="staff_id">
                        Staff ID
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="staff_id" id="staff_id" value="{{ old('staff_id') }}" required>

                    @error('staff_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{ old('name') }}" required>

                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- GENDER -->
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="gender">
                        Gender
                    </label>

                    <!-- <input class="border border-gray-400 p-2 w-full" type="text" name="gender" id="gender" value="{{ old('gender') }}" required> -->
                    <select name="gender" id="gender">
                        <option value=""> Select Gender </option>
                        @foreach (App\Models\Gender::get() as $data)
                        <option value="{{ $data->id }}" {{ old('department') == $data->id ? 'selected' : '' }}>
                            {{ $data->gender }}
                        </option>
                        <!-- <option value="{{ $data->id }}">
                            {{ $data->department }}
                        </option> -->
                        @endforeach
                    </select>

                    @error('gender')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="address">
                        Address
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full" name="address" id="address">{{ old('address') }}</textarea>

                    @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required>

                    @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="password">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" value="{{ old('password') }}" required>

                    @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="phonenumber">
                        Phone Number :
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="integer" name="phonenumber" id="phonenumber" value="{{ old('phonenumber') }}" required>

                    @error('phonenumber')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-sm text-gray-700" for="department">
                        Department
                    </label>

                    <select name="department" id="department">
                        <option value=""> Select Department </option>
                        @foreach (App\Models\Department::get() as $data)
                        <option value="{{ $data->id }}" {{ old('department') == $data->id ? 'selected' : '' }}>
                            {{ $data->department }}
                        </option>
                        <!-- <option value="{{ $data->id }}">
                            {{ $data->department }}
                        </option> -->
                        @endforeach
                    </select>

                    @error('department')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"> Register </button>
                </div>
            </form>
    </x-setting2>
</x-app-layout>