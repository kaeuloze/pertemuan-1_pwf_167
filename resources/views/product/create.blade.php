<x-app-layout>
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl">
                <div class="p-8 text-black">

                    {{-- Header --}}
                    <div class="flex items-center gap-3 mb-6">
                        <a href="{{ route('product.index') }}"
                           class="p-2 rounded-md text-black hover:text-white hover:bg-indigo-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>

                        <div>
                            <h2 class="text-2xl font-bold">
                                Add Product
                            </h2>
                            <p class="text-sm text-gray-600">
                                Fill in the details to add a new product
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('product.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Product Name *
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Qty & Price --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">
                                    Quantity
                                </label>
                                <input type="number" name="qty" value="{{ old('qty') }}"
                                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                @error('qty')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold mb-1">
                                    Price (Rp)
                                </label>
                                <input type="number" name="price" value="{{ old('price') }}"
                                       class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                @error('price')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Owner --}}
                        <div>
                            <label class="block text-sm font-semibold mb-1">
                                Owner
                            </label>
                            <select name="user_id"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select Owner</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Actions --}}
                        <div class="flex justify-end gap-3 pt-4">
                            <a href="{{ route('product.index') }}"
                               class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-5 py-2 bg-indigo-600 text-black rounded-lg hover:bg-indigo-700 transition">
                                Save Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>