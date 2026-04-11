<x-app-layout>
    <div class="py-12 bg-gray-200 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl">
                <div class="p-6 !text-black">

                    {{-- Header --}}
                    <div class="flex items-center gap-3 mb-6">
                        <a href="{{ route('product.index') }}"
                           class="p-2 rounded-md !text-black hover:!text-white hover:bg-indigo-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>

                        <div>
                            <h2 class="text-2xl font-bold !text-black">
                                Add Product
                            </h2>
                            <p class="text-sm !text-gray-700">
                                Fill in the details to add a new product
                            </p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('product.store') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <label class="block text-sm font-semibold !text-black mb-1">
                                Product Name *
                            </label>
                            <input type="text" name="name"
                                   class="w-full px-4 py-2.5 rounded-lg border border-gray-400 bg-white !text-black focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                        </div>

                        {{-- Qty & Price --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold !text-black mb-1">
                                    Quantity
                                </label>
                                <input type="number" name="qty"
                                       class="w-full px-4 py-2.5 rounded-lg border border-gray-400 bg-white !text-black focus:ring-2 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold !text-black mb-1">
                                    Price (Rp)
                                </label>
                                <input type="number" name="price"
                                       class="w-full px-4 py-2.5 rounded-lg border border-gray-400 bg-white !text-black focus:ring-2 focus:ring-indigo-500">
                            </div>
                        </div>

                        {{-- Owner --}}
                        <div>
                            <label class="block text-sm font-semibold !text-black mb-1">
                                Owner
                            </label>
                            <select name="user_id"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-400 bg-white !text-black focus:ring-2 focus:ring-indigo-500">
                                <option value="">Select Owner</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Actions --}}
                        <div class="flex justify-end gap-3 mt-4">
                            <a href="{{ route('product.index') }}"
                               class="px-4 py-2 rounded-lg bg-gray-300 !text-black hover:bg-gray-400">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-5 py-2 bg-indigo-600 text-black rounded-lg hover:bg-indigo-700">
                                Save Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>