<div>
    <div class="bg-white shadow">
        <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contacts') }}
            </h2>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Created at
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Email
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Source
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Zip code
                            </th>
                            <th scope="col" class="py-3 px-6 sr-only">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr class="bg-white border-b">
                                <td class="py-4 px-6">
                                    {{ Carbon\Carbon::parse($contact->created_at)->format("M d, Y") }}
                                </td>
                                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $contact->firstname . ' ' . $contact->lastname }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $contact->email }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $contact->lead_source }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $contact->zip }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end items-center space-x-4">
                                        {{-- Actions --}}
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
