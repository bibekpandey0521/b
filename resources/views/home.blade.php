<x-frontend-layout>
    <section>
        <div class="container m-auto">
            <h3 class="text-2xl text-center pb-5">Create Company</h3>
            <form action="/store-company" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="name">Company Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded-md border p-2">
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="address">Company Address</label>
                        <input type="text" name="address" id="address" class="w-full rounded-md border p-2">
                        @error('address')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="email">Company Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded-md border p-2">
                        @error('email')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="contact">Company Contact</label>
                        <input type="number" name="contact" id="contact" class="w-full rounded-md border p-2">
                        @error('contact')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="status">Company Status</label><br>
                        <select id="status" name="status" class="my-2 px-2 py-3 w-full rounded-md border">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="link">Company Website</label>
                        <input type="url" name="link" id="link" class="w-full rounded-md border p-2"
                            placeholder="Enter company website link">
                    </div>
                    <div>
                        <label for="logo">Company Logo</label>
                        <input type="file" name="logo" id="logo" class="w-full px-6 py-3 rounded-md border">
                        @error('logo')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- Displaying Company Data --}}
    <section class="py-10 bg-gray-100">
        <div class="container">
            <h1 class="text-2xl text-center font-semibold pb-5">Company List</h1>
            {{-- {{$companies}} --}}
            <table class="w-full text-center border-2 border-gray-700">
                <thead>
                    <tr>
                        <th class="border border-gray-500 p-2">SN</th>
                        <th class="border border-gray-500 p-2">Image</th>
                        <th class="border border-gray-500 p-2">Name</th>
                        <th class="border border-gray-500 p-2">Address</th>
                        <th class="border border-gray-500 p-2">Email</th>
                        <th class="border border-gray-500 p-2">Contact</th>
                        <th class="border border-gray-500 p-2">Status</th>
                        <th class="border border-gray-500 p-2">Website</th>
                        <th class="border border-gray-500 p-2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $index => $company)
                        <tr>
                            <td class="border border-gray-500 p-2">{{$index + 1}}</td>
                            <td class="border border-gray-500 p-2">
                                @if ($company->logo)
                                    <img src="{{ asset($company->logo)}}" alt="Company Logo" class="w-16 h-16 object-cover" >
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="border border-gray-500 p-2">{{$company->name}}</td>
                            <td class="border border-gray-500 p-2">{{$company->address}}</td>
                            <td class="border border-gray-500 p-2">{{$company->email}}</td>
                            <td class="border border-gray-500 p-2">{{$company->contact}}</td>
                            <td class="border border-gray-500 p-2">{{$company->status}}</td>
                            <td class="border border-gray-500 p-2">{{$company->link}}</td>
                            <td class="border border-gray-500 p-2">
                                <a href="/edit/{{$company->id}}">Edit</a>
                                <form action="/delete-course/{{ $company->id}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
</x-frontend-layout>
