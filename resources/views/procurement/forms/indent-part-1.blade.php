<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">3. Indent Part-I</h2>
        <button data-toggle="indent-part-1" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4 hidden" id="indent-part-1">
        <form method="POST" action="{{ route('procurement.indentOne.store', $entry->id) }}">
            @csrf

            {{-- Static Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">User Unit</label>
                    <input type="text" name="user_unit"
                        value="{{ old('user_unit', optional($entry->indentPartOne)->user_unit ?? '') }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indent Type</label>
                    <input type="text" name="indent_type"
                        value="{{ old('indent_type', optional($entry->indentPartOne)->indent_type) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Desired Delivery</label>
                <input type="text" name="desired_delivery"
                    value="{{ old('desired_delivery', optional($entry->indentPartOne)->desired_delivery) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Indenting Officer --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indenting Officer Name</label>
                    <input type="text" name="indenting_officer"
                        value="{{ old('indenting_officer', optional($entry->indentPartOne)->indenting_officer) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Designation</label>
                    <input type="text" name="designation"
                        value="{{ old('designation', optional($entry->indentPartOne)->designation) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Group / Division /
                        Section</label>
                    <input type="text" name="group_division_section"
                        value="{{ old('group_division_section', optional($entry->indentPartOne)->group_division_section) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Email & Contact No.</label>
                    <input type="text" name="contact"
                        value="{{ old('contact', optional($entry->indentPartOne)->contact) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Place of Delivery</label>
                <input type="text" name="place_of_delivery"
                    value="{{ old('place_of_delivery', optional($entry->indentPartOne)->place_of_delivery) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Approving Authority --}}
            <div class="mt-2 pt-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Approving Authority
                            Name</label>
                        <input type="text" name="approving_authority_name"
                            value="{{ old('approving_authority_name', optional($entry->indentPartOne)->approving_authority_name) }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Designation</label>
                        <input type="text" name="approving_authority_designation"
                            value="{{ old('approving_authority_designation', optional($entry->indentPartOne)->approving_authority_designation) }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                </div>
            </div>

            {{-- Items --}}
            @php
                $items = old('items', $entry->indentPartOne->items ?? [['description' => '', 'quantity' => '', 'unit' => '', 'estimated_cost' => '']]);
            @endphp

            <div x-data="{ specs: {!! Js::from($items) !!} }" class="space-y-4 mt-6">
                <h3 class="text-md font-semibold text-gray-700 dark:text-gray-200">Item Descriptions</h3>

                <template x-for="(item, index) in specs" :key="index">
                    <div
                        class="p-4 border rounded bg-gray-50 dark:bg-zinc-800 grid grid-cols-1 md:grid-cols-4 gap-4 relative">
                        <div class="col-span-full">
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Description</label>
                            <textarea :name="'items[' + index + '][description]'" x-model="item.description"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white"></textarea>
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Quantity</label>
                            <input type="text" :name="'items[' + index + '][quantity]'" x-model="item.quantity"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Unit</label>
                            <input type="text" :name="'items[' + index + '][unit]'" x-model="item.unit"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Estimated Cost (Rs)</label>
                            <input type="text" :name="'items[' + index + '][estimated_cost]'"
                                x-model="item.estimated_cost"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div class="col-span-full text-right">
                            <button type="button" @click="specs.splice(index, 1)" x-show="specs.length > 1"
                                class="text-red-600 text-sm hover:underline">Remove Item</button>
                        </div>
                    </div>
                </template>

                <button type="button" @click="specs.push({description: '', quantity: '', unit: '', estimated_cost: ''})"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Add Another Item</button>
            </div>

            {{-- Totals --}}
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Total Estimated Cost (in
                    words)</label>
                <input type="text" name="total_estimated_cost_words"
                    value="{{ old('total_estimated_cost_words', optional($entry->indentPartOne)->total_estimated_cost_words) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Classification</label>
                <input type="text" name="classification"
                    value="{{ old('classification', optional($entry->indentPartOne)->classification) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Previous Purchase Reference</label>
                <input type="text" name="previous_purchase_ref"
                    value="{{ old('previous_purchase_ref', optional($entry->indentPartOne)->previous_purchase_ref) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Financial Sanction No. & Date</label>
                <input type="text" name="financial_sanction"
                    value="{{ old('financial_sanction', optional($entry->indentPartOne)->financial_sanction) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Budget Head</label>
                <input type="text" name="budget_head"
                    value="{{ old('budget_head', optional($entry->indentPartOne)->budget_head) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Submit Button --}}
            <div class="mt-6 text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save Indent Part I
                </button>
            </div>
        </form>
    </div>
</div>