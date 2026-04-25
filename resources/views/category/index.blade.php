<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Header & Add Button --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold">Category List</h2>
                        <p class="text-sm text-gray-500">Manage your category</p>
                    </div>
                    <x-add-product :url="route('category.create')" :name="'Category'" />
                </div>

                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left uppercase">Name</th>
                            <th class="px-6 py-3 text-left uppercase">Total Product</th>
                            <th class="px-6 py-3 text-center uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($categories as $category)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->products_count }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <x-edit-button :url="route('category.edit', $category->id)" />
                                    <x-delete-button :url="route('category.destroy', $category->id)" />
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>