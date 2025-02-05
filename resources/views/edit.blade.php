<x-frontend-layout>
    {{-- {{$company}} --}}
    <section>
        <div class="container m-auto">
            <h3 class="text-2xl text-center pb-5">Create Company</h3>
            <form action="/update-company/{{$company->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="name">Company Name</label>
                        <input type="text" name="name" id="name" class="w-full rounded-md border p-2" value="{{$company->name}}">
                        @error('name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="address">Company Address</label>
                        <input type="text" name="address" id="address" class="w-full rounded-md border p-2" value="{{$company->address}}">
                        @error('address')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="email">Company Email</label>
                        <input type="email" name="email" id="email" class="w-full rounded-md border p-2" value="{{$company->email}}">
                        @error('email')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="contact">Company Contact</label>
                        <input type="number" name="contact" id="contact" class="w-full rounded-md border p-2" value="{{$company->contact}}">
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
                            placeholder="Enter company website link" value="{{$company->link}}">
                    </div>
                    <div>
                        <label for="logo">Company Logo</label>
                        <input type="file" name="logo" id="logo" class="w-full px-6 py-3 rounded-md border">
                        @error('logo')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                        <img src="{{asset($company->logo)}}" width="200" alt="{{$company->name}}">
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
</x-frontend-layout>
