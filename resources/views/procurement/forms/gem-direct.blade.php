<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">2. GEM Direct Purchase Form</h2>
        <button data-toggle="gem-form" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4 hidden" id="gem-form">
        <form method="POST" action="{{ route('procurement.gem.store', $entry->id) }}">
            @csrf

            <!-- Basic Info -->
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Section</label>
                <input type="text" name="section" value="{{ old('section', $entry->gem->section ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indent No.</label>
                    <input type="text" name="indent_no" value="{{ old('indent_no', $entry->gem->indent_no ?? '') }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Date</label>
                    <input type="text" name="date" value="{{ old('date', $entry->gem->date ?? '') }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indenting Officer</label>
                    <input type="text" name="officer_name"
                        value="{{ old('officer_name', $entry->gem->officer_name ?? '') }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Designation</label>
                    <input type="text" name="designation"
                        value="{{ old('designation', $entry->gem->designation ?? '') }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <!-- Dynamic Items List -->
            <div x-data="{ items: {!! Js::from(old('items', $entry->gem->items ?? [])) !!} }" class="space-y-4 mt-4">
                <h3 class="text-md font-semibold text-gray-700 dark:text-gray-200">List of Items</h3>

                <template x-for="(item, index) in items" :key="index">
                    <div
                        class="p-4 border rounded bg-gray-50 dark:bg-zinc-800 grid grid-cols-1 md:grid-cols-5 gap-4 relative">
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Detailed Description</label>
                            <input type="text" :name="'items[' + index + '][description]'" x-model="item.description"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Product GeM ID</label>
                            <input type="text" :name="'items[' + index + '][gem_id]'" x-model="item.gem_id"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Qty</label>
                            <input type="text" :name="'items[' + index + '][quantity]'" x-model="item.quantity"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Unit</label>
                            <input type="text" :name="'items[' + index + '][unit]'" x-model="item.unit"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Amount (Rs.)</label>
                            <input type="text" :name="'items[' + index + '][amount]'" x-model="item.amount"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div class="col-span-full text-right">
                            <button type="button" @click="items.splice(index, 1)" x-show="items.length > 1"
                                class="text-red-600 text-sm hover:underline">Remove Item</button>
                        </div>
                    </div>
                </template>

                <button type="button"
                    @click="items.push({ description: '', gem_id: '', quantity: '', unit: '', amount: '' })"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Another Item</button>
            </div>

            <!-- Budget & Officials -->
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Budget Head</label>
                <input type="text" name="budget_head" value="{{ old('budget_head', $entry->gem->budget_head ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indenting Officer</label>
                <input type="text" name="indenting_officer"
                    value="{{ old('indenting_officer', $entry->gem->indenting_officer ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Section Head</label>
                <input type="text" name="section_head"
                    value="{{ old('section_head', $entry->gem->section_head ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Manager</label>
                <input type="text" name="manager" value="{{ old('manager', $entry->gem->manager ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">OSD</label>
                <input type="text" name="OSD" value="{{ old('OSD', $entry->gem->OSD ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Enclosure: Approval of GEM</label>
                <input type="text" name="gem_approval"
                    value="{{ old('gem_approval', $entry->gem->gem_approval ?? '') }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <!-- Approval for Payment -->
            <div class="payment-approval-section mt-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Approval for Payment</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">GeM Contract Date</label>
                        <input type="text" name="gem_contract_date"
                            value="{{ old('gem_contract_date', $entry->gem->gem_contract_date ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Due Date of Delivery</label>
                        <input type="text" name="due_delivery_date"
                            value="{{ old('due_delivery_date', $entry->gem->due_delivery_date ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Receipt Date</label>
                        <input type="text" name="receipt_date"
                            value="{{ old('receipt_date', $entry->gem->receipt_date ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Delivery Date
                            Extension</label>
                        <input type="text" name="delivery_date_extension"
                            value="{{ old('delivery_date_extension', $entry->gem->delivery_date_extension ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">With LD</label>
                        <input type="checkbox" name="with_ld" value="1" {{ old('with_ld', $entry->gem->with_ld ?? false) ? 'checked' : '' }} />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Without LD</label>
                        <input type="checkbox" name="without_ld" value="1" {{ old('without_ld', $entry->gem->without_ld ?? false) ? 'checked' : '' }} />
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Delivery Extension
                            Justification</label>
                        <textarea name="delivery_extension_justification"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">{{ old('delivery_extension_justification', $entry->gem->delivery_extension_justification ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">CRAC Date</label>
                        <input type="text" name="crac_date" value="{{ old('crac_date', $entry->gem->crac_date ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Inspection Remarks</label>
                        <input type="text" name="inspection_remarks"
                            value="{{ old('inspection_remarks', $entry->gem->inspection_remarks ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Other Remarks</label>
                        <input type="text" name="other_remarks"
                            value="{{ old('other_remarks', $entry->gem->other_remarks ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">PAO/AAO</label>
                        <input type="text" name="pao_aao" value="{{ old('pao_aao', $entry->gem->pao_aao ?? '') }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                </div>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save GEM Direct
                </button>
            </div>
        </form>
    </div>
</div>