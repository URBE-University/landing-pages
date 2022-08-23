<div>
    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold">Page information</h3>
            <div class="mt-2 bg-white rounded-lg p-8 shadow">
                <div>
                    <x-jet-label for="template" value="Select a template"/>
                    <select id="template" wire:model="template" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block w-full mt-1">
                        <option></option>
                        <option value="classic">Classic</option>
                        <option value="classic-es">Classic - Spanish</option>
                    </select>
                    <x-jet-input-error for="template" class="mt-1"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="title" value="Page title"/>
                    <x-jet-input type="text" wire:model="title" class="block w-full mt-1"/>
                    <x-jet-input-error for="title" class="mt-1"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="slug" value="Slug"/>
                    <x-jet-input type="text" wire:model="slug" placeholder="{{str($title)->slug()}}" class="block w-full mt-1"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="about" value="About this page/program"/>
                    <textarea id="about" wire:model="about" cols="30" rows="6" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full mt-1"></textarea>
                </div>
                <div class="mt-6">
                    <x-jet-label for="source" value="Source"/>
                    <x-jet-input type="text" wire:model="source" class="block w-full mt-1"/>
                    <x-jet-input-error for="source" class="mt-1"/>
                    <small class="text-slate-500">This value will be used by the lead catchers to distinguish where are leads are coming from. For example: <i>mba-landing</i></small>
                </div>
                <div class="mt-6">
                    <x-jet-label for="alt_phone" value="Alternate phone number"/>
                    <x-jet-input type="text" wire:model="alt_phone" class="block w-full mt-1"/>
                    <x-jet-input-error for="alt_phone" class="mt-1"/>
                    <small class="text-slate-500">You can add a phone number to this landing page. By default all landing pages use +1.844.744.8723</small>
                </div>
                <div class="mt-6">
                    <x-jet-label for="cover" value="Cover image"/>
                    <input type="file" id="cover" wire:model="cover" accept=".webp,.png,.jpg,.jpeg" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 mt-1 outline-none border-none">
                    <x-jet-input-error for="cover" class="mt-1"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="document_en_url" value="PDF Brochure - English"/>
                    <input type="file" id="document_en_url" wire:model="document_en_url" accept=".pdf" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 mt-1 outline-none border-none">
                    <x-jet-input-error for="document_en_url" class="mt-1"/>
                </div>
                <div class="mt-6">
                    <x-jet-label for="document_es_url" value="PDF Brochure - Spanish"/>
                    <input type="file" id="document_es_url" wire:model="document_es_url" accept=".pdf" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 mt-1 outline-none border-none">
                    <x-jet-input-error for="document_es_url" class="mt-1"/>
                </div>

                <div class="mt-6 border-t"></div>
                <div class="mt-6">
                    <label for="is_program" class="flex items-center space-x-2">
                        <x-jet-input type="checkbox" id="is_program" wire:model="is_program"/>
                        <span class="block font-medium text-sm text-gray-700">Is this page for a program?</span>
                    </label>
                </div>
                <div class="mt-6">
                    <label for="status" class="flex items-center space-x-2">
                        <x-jet-input type="checkbox" id="status" wire:model="status"/>
                        <span class="block font-medium text-sm text-gray-700">Publish page</span>
                    </label>
                </div>
                <div class="mt-6">
                    <label for="lock_docs" class="flex items-center space-x-2">
                        <x-jet-input type="checkbox" id="lock_docs" wire:model="lock_docs"/>
                        <span class="block font-medium text-sm text-gray-700">Lock documents upon form submission.</span>
                    </label>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.page.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">Cancel</a>
                <x-jet-button wire:click="save">Create page</x-jet-button>
            </div>
        </div>
    </div>
</div>
