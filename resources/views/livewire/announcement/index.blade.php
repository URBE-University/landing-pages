<div>
    <div class="bg-white shadow">
        <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Start Dates') }}
                </h2>
                @livewire('announcement.create')
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-md">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Start Date
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Semester
                            </th>
                            <th scope="col" class="py-3 px-6 sr-only">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($startDates as $start)
                            <tr class="bg-white border-b">
                                <td class="py-4 px-6">
                                    {{ Carbon\Carbon::parse($start->starts_at)->format('M d, Y') }}
                                </td>
                                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $start->semester }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end items-center space-x-4">
                                        @livewire('announcement.delete', ['start'=> $start], key('delete-' . $start->id))
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                {{-- {{ $contacts->links() }} --}}
            </div>
        </div>
    </div>
</div>
