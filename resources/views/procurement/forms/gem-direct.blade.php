<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">2. GEM Direct Purchase Form</h2>
        <button data-toggle="gem-form" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4" id="gem-form">
        <form method="POST" action="#">
            @csrf

            {{-- Basic Info --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Section</label>
                <input type="text" name="section" value="INSTRUMENTATION"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indent No.</label>
                    <input type="text" name="indent_no" value="HWBFT/TAL/INST/DP-GeM/2025/02"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Date</label>
                    <input type="text" name="date" value="24/03/2025"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indenting Officer</label>
                    <input type="text" name="officer_name" value="Ravi Kumar Yadav"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Designation</label>
                    <input type="text" name="designation" value="SO/E"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            {{-- Dynamic Items List --}}
            <div x-data="{ items: [Date.now()] }" class="space-y-4 mt-4">
                <h3 class="text-md font-semibold text-gray-700 dark:text-gray-200">List of Items</h3>

                <template x-for="(id, index) in items" :key="id">
                    <div
                        class="p-4 border rounded bg-gray-50 dark:bg-zinc-800 grid grid-cols-1 md:grid-cols-5 gap-4 relative">
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Item Description</label>
                            <input type="text" name="items[][description]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">GeM Product ID</label>
                            <input type="text" name="items[][gem_id]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Qty</label>
                            <input type="text" name="items[][quantity]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Unit</label>
                            <input type="text" name="items[][unit]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Amount (Rs.)</label>
                            <input type="text" name="items[][amount]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>

                        {{-- Remove Button --}}
                        <div class="col-span-full text-right">
                            <button type="button" @click="if(items.length > 1) items.splice(index, 1)"
                                x-show="items.length > 1" class="text-red-600 text-sm hover:underline">
                                Remove Item
                            </button>
                        </div>
                    </div>
                </template>

                <button type="button" @click="items.push(Date.now())"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Another Item
                </button>
            </div>

            {{-- Budget and Additional Info --}}
            <div class="mt-6">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Budget Head</label>
                <input type="text" name="budget_head" value="2852-09-204-01-06-29 (Repair & maintenance)"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">GeM Contract Date</label>
                    <input type="text" name="gem_contract_date"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Due Date of Delivery</label>
                    <input type="text" name="due_delivery_date"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Remarks on Inspection and
                    Acceptance</label>
                <input type="text" name="inspection_remark"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Any Other Remark</label>
                <input type="text" name="other_remark"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save GEM Section
                </button>
            </div>
        </form>
    </div>
</div>