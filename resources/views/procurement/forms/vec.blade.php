<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">1. VEC Form</h2>
        <button data-toggle="vec-form" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4" id="vec-form">
        <form method="POST" action="#">
            @csrf

            {{-- A --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">General
                    Description of Item</label>
                <input type="text" name="description" id="description"
                    value="Supply of Black Original LaserJet Toner Cartridge, Product Class-OEM, Make-HP, Model- CB436AC"
                    class="w-full border border-gray-300 dark:border-zinc-700 rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- B --}}
            <div>
                <label for="functional_requirement"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Functional Requirement /
                    Services</label>
                <input type="text" name="functional_requirement" id="functional_requirement" value="Printing of Paper"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- C - Repeating Entries --}}
            <div x-data="{ rows: [Date.now()] }" class="space-y-4">
                <template x-for="(id, index) in rows" :key="id">
                    <div
                        class="p-4 border rounded bg-gray-50 dark:bg-zinc-800 grid grid-cols-1 md:grid-cols-3 gap-4 relative">
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Description</label>
                            <input type="text" name="items[][description]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Unit</label>
                            <input type="text" name="items[][unit]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Qty Installed</label>
                            <input type="text" name="items[][qty_installed]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Consumption Rate</label>
                            <input type="text" name="items[][consumption_rate]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Stock Position</label>
                            <input type="text" name="items[][stock_position]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Qty in Pipeline</label>
                            <input type="text" name="items[][qty_pipeline]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300">Indented Qty</label>
                            <input type="text" name="items[][indented_qty]"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>

                        {{-- Remove Button --}}
                        <div class="col-span-full text-right">
                            <button type="button" @click="if(rows.length > 1) rows.splice(index, 1)"
                                x-show="rows.length > 1" class="text-red-600 text-sm hover:underline">
                                Remove Item
                            </button>
                        </div>
                    </div>
                </template>

                <button type="button" @click="rows.push(Date.now())"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Another Item
                </button>
            </div>


            {{-- D–M (Plain Text Inputs) --}}
            @foreach (['equipment_cost' => 'Cost of Main Equipment and Year of Purchase', 'nature_item_maintenance' => 'Nature: Capital / Maintenance', 'nature_item_consumables' => 'Nature: Consumables / Spares', 'nature_item_origin' => 'Nature: Indigenous / Imported / Proprietary', 'additional_info' => 'Any Other Additional Information', 'quantity_other_hwps' => 'Qty Available in Other HWPs', 'min_max_stock' => 'Min/Max Qty to be Kept in Stock', 'indented_qty_and_efforts' => 'Indented Qty & Indigenization Efforts', 'expected_delivery' => 'Expected Date of Delivery', 'usage_period' => 'Expected Usage Period', 'prev_supplier' => 'Previous Supplier', 'prev_cost_year' => 'Year of Purchase & Cost', 'prev_qty' => 'Previous Qty', 'supplier_suggestion' => 'Suggested Supplier for this Indent', 'cost_justification' => 'Justification for Cost Estimate', 'budget_provision' => 'Budget Provision',] as $name => $label)
                <div>
                    <label for="{{ $name }}"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                    <input type="text" name="{{ $name }}" id="{{ $name }}"
                        class="w-full border border-gray-300 dark:border-zinc-700 rounded px-3 py-2 dark:bg-zinc-800 dark:text-white"
                        value="{{ old($name) }}" />
                </div>
            @endforeach

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save VEC Section
                </button>
            </div>
        </form>
    </div>
</div>