<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header --}}
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-tight">
                                Product List
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Manage your product inventory
                            </p>
                        </div>

                        {{-- Tombol Add Product --}}
                        @auth
                            <a href="{{ route('product.create') }}"
                               style="background-color: black !important; color: white !important;"
                               class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent
                                      rounded-lg text-sm font-semibold
                                      hover:bg-gray-800
                                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600
                                      transition duration-150 ease-in-out shadow-md"
                               onmouseover="this.style.backgroundColor='#1f2937'"
                               onmouseout="this.style.backgroundColor='black'">

                                <svg class="w-4 h-4 mr-2" style="color: white !important;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>

                                Add Product
                            </a>
                        @endauth
                    </div>

                    {{-- Alert --}}
                    @if(session('success'))
                        <div x-data="{ show: true }"
                             x-show="show"
                             x-transition
                             class="mb-6 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-sm flex items-center justify-between">

                            <div class="flex items-center gap-2">
                                <span>✅</span>
                                <span>{{ session('success') }}</span>
                            </div>

                            <button @click="show = false"
                                    class="text-green-700 hover:text-green-900 font-bold px-2">
                                OK
                            </button>
                        </div>
                    @endif

                    {{-- Table --}}
                    <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">

                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Owner</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">

                                        {{-- No --}}
                                        <td class="px-6 py-4 text-gray-500 dark:text-gray-400">
                                            {{ $loop->iteration }}
                                        </td>

                                        {{-- Name --}}
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $product->name }}
                                        </td>

                                        {{-- Category --}}
                                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                                bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300">
                                                {{ $product->category->name ?? '-' }}
                                            </span>
                                        </td>

                                        {{-- Quantity --}}
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                                {{ $product->qty > 0
                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300'
                                                    : 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300' }}">
                                                {{ $product->qty }}
                                            </span>
                                        </td>

                                        {{-- Price --}}
                                        <td class="px-6 py-4 font-mono text-gray-700 dark:text-gray-300">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        {{-- Owner --}}
                                        <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                            {{ $product->user->name ?? '-' }}
                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">

                                                {{-- View --}}
                                                <a href="{{ route('product.show', $product->id) }}"
                                                   class="w-9 h-9 flex items-center justify-center rounded-lg
                                                          bg-indigo-100 text-indigo-600
                                                          hover:bg-indigo-600 hover:text-white
                                                          transition shadow-sm"
                                                   title="View">
                                                    👁️
                                                </a>

                                                {{-- Edit --}}
                                                @can('update', $product)
                                                    <a href="{{ route('product.edit', $product) }}"
                                                       class="w-9 h-9 flex items-center justify-center rounded-lg
                                                              bg-amber-100 text-amber-600
                                                              hover:bg-amber-500 hover:text-white
                                                              transition shadow-sm"
                                                       title="Edit">
                                                        ✏️
                                                    </a>
                                                @endcan

                                                {{-- Delete --}}
                                                @can('delete', $product)
                                                    <form action="{{ route('product.destroy', $product->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Delete this product?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                class="w-9 h-9 flex items-center justify-center rounded-lg
                                                                       bg-red-100 text-red-600
                                                                       hover:bg-red-600 hover:text-white
                                                                       transition shadow-sm"
                                                                title="Delete">
                                                            🗑️
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                            <div class="flex flex-col items-center gap-2">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                    </path>
                                                </svg>

                                                <span>No products found.</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if ($products->hasPages())
                        <div class="mt-6">
                            {{ $products->links() }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>