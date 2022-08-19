<div>
    <div class="bg-white shadow">
        <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Pages') }}
                </h2>
                <a href="{{ route('admin.page.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition -my-2">New page</a>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Page title
                            </th>
                            <th scope="col" class="py-3 px-6 sr-only">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $page)
                            <tr class="bg-white border-b">
                                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $page->title }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end items-center space-x-4">
                                        <a href="{{ route('page.show', ['page' => $page->slug]) }}" target="_blank" class="text-slate-600 hover:text-blue-500 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.page.edit', ['page' => $page->id]) }}" class="text-slate-600 hover:text-blue-500 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        @livewire('page.delete', ['page' => $page->id])
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
