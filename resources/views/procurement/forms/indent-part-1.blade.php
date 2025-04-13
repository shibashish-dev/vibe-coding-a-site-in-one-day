<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">3. Indent Part-I</h2>
        <button data-toggle="indent-part-1" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4" id="indent-part-1">
        <form method="POST" action="#">
            @csrf

            {{-- Static Info --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">User Unit</label>
                    <input type="text" name="user_unit" value="HWBF TALCHER"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indent Type</label>
                    <input type="text" name="indent_type" value="MOST URGENT (Breakdown)"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Desired Delivery
                    (Days/Months/Year)</label>
                <input type="text" name="desired_delivery" value="20 days"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Repeating Group --}}
            <div x-data="{ specs: [Date.now()] }" class="space-y-4 mt-6">
                <h3 class="text-md font-semibold text-gray-700 dark:text-gray-200">Item Descriptions</h3>

                <template x-for="(id, index) in specs" :key="id">
                    <div
                        class="p-4 border rounded bg-gray-50 dark:bg-zinc-800 grid grid-cols-1 md:grid-cols-4 gap-4 relative">
                        <div class="col-span-full">
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Description with detailed
                                specification</label>
                            <textarea name="items[][description]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white"></textarea>
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Quantity</label>
                            <input type="text" name="items[][quantity]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Unit</label>
                            <input type="text" name="items[][unit]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Estimated Cost (Rs)</label>
                            <input type="text" name="items[][estimated_cost]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>

                        {{-- Remove Button --}}
                        <div class="col-span-full text-right">
                            <button type="button" @click="if(specs.length > 1) specs.splice(index, 1)"
                                x-show="specs.length > 1" class="text-red-600 text-sm hover:underline">
                                Remove Item
                            </button>
                        </div>
                    </div>
                </template>

                <button type="button" @click="specs.push(Date.now())"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Another Item
                </button>
            </div>

            {{-- Total Estimated Cost --}}
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Total Estimated Cost (in
                    words)</label>
                <input type="text" name="total_estimated_cost_words"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Classification --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Classification
                    (CAPITAL/CONSUMABLE/NON-CONSUMABLE)</label>
                <input type="text" name="classification"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Previous Purchase Reference --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Previous Purchase Reference</label>
                <input type="text" name="previous_purchase_ref" value="NA"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Budget Details --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Financial Sanction No. & Date</label>
                <input type="text" name="financial_sanction" value="HWB/Accts/Budget/2024/3554, Dated: 04.09.2024"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Budget Head</label>
                <input type="text" name="budget_head" value="2852-09-204-01-06-29 (Repair & maintenance)"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Any other info --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Any other relevant
                    information</label>
                <input type="text" name="other_info"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Vendors --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Proposed Vendors (if any)</label>
                <input type="text" name="proposed_vendors" value="NA"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save Indent Part-I
                </button>
            </div>
        </form>
    </div>
</div>