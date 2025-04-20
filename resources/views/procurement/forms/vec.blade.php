<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">1. VEC Form</h2>
        <button data-toggle="vec-form" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-6 hidden" id="vec-form">
        <form method="POST" action="{{ route('procurement.vec.store', $entry->id) }}">
            @csrf

            {{-- A --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    General Description of Item
                </label>
                <input type="text" name="description" id="description"
                    value="{{ old('description', $entry->vec->description ?? '') }}"
                    class="w-full border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- B --}}
            <div>
                <label for="functional_requirement" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Functional Requirement / Services
                </label>
                <input type="text" name="functional_requirement" id="functional_requirement"
                    value="{{ old('functional_requirement', $entry->vec->functional_requirement ?? '') }}"
                    class="w-full border rounded px-4 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- C - Repeating Entries --}}
            <div 
                x-data="{
                    rows: {!! Js::from(old('items') ?: ($entry->vec?->items->map(function ($item) {
                        return [
                            'description' => $item->description,
                            'unit' => $item->unit,
                            'qty_installed' => $item->qty_installed,
                            'consumption_rate' => $item->consumption_rate,
                            'stock_position' => $item->stock_position,
                            'qty_pipeline' => $item->qty_pipeline,
                            'indented_qty' => $item->indented_qty,
                        ];
                    })?->values() ?? [['description' => '', 'unit' => '', 'qty_installed' => '', 'consumption_rate' => '', 'stock_position' => '', 'qty_pipeline' => '', 'indented_qty' => '']])) !!}
                }"
                class="space-y-6"
            >
                <h3 class="text-md font-semibold text-gray-700 dark:text-gray-200">Description of indented material</h3>

                <template x-for="(row, index) in rows" :key="index">
                    <div class="p-4 border rounded bg-gray-50 dark:bg-zinc-800 grid grid-cols-1 md:grid-cols-3 gap-4 relative">
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Description of indented material:</label>
                            <input type="text" :name="'items[' + index + '][description]'" x-model="row.description"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Unit</label>
                            <input type="text" :name="'items[' + index + '][unit]'" x-model="row.unit"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Qty installed in the plant</label>
                            <input type="text" :name="'items[' + index + '][qty_installed]'" x-model="row.qty_installed"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Consumption rate per year (based on last 5 year)</label>
                            <input type="text" :name="'items[' + index + '][consumption_rate]'" x-model="row.consumption_rate"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Present stock position</label>
                            <input type="text" :name="'items[' + index + '][stock_position]'" x-model="row.stock_position"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Qty in pipeline</label>
                            <input type="text" :name="'items[' + index + '][qty_pipeline]'" x-model="row.qty_pipeline"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>
                        <div>
                            <label class="text-sm block text-gray-700 dark:text-gray-300 mb-1">Indented qty</label>
                            <input type="text" :name="'items[' + index + '][indented_qty]'" x-model="row.indented_qty"
                                class="w-full border rounded px-2 py-1 dark:bg-zinc-800 dark:text-white" />
                        </div>

                        {{-- Remove Button --}}
                        <div class="col-span-full text-right">
                            <button type="button" @click="if (rows.length > 1) rows.splice(index, 1)"
                                x-show="rows.length > 1"
                                class="text-red-600 text-sm hover:underline">
                                Remove Item
                            </button>
                        </div>
                    </div>
                </template>

                <button type="button" @click="rows.push({ description: '', unit: '', qty_installed: '', consumption_rate: '', stock_position: '', qty_pipeline: '', indented_qty: '' })"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Add Another Item
                </button>
            </div>

            {{-- D–M --}}
            @foreach ([ 
                'equipment_cost' => 'Cost of main equipment and year of purchase.',
                'nature_item_maintenance' => 'Nature: Capital / Maintenance',
                'nature_item_consumables' => 'Nature: Consumables / Spares',
                'nature_item_origin' => 'Nature: Indigenous / Imported / Proprietary',
                'additional_info' => 'Any Other Additional Information',
                'quantity_other_hwps' => 'Quantity of item available in other HWPs',
                'min_max_stock' => 'Minimum and Maximum quantity proposed to be kept in stock.',
                'indented_qty_and_efforts' => 'Quantity of item now indented and details of efforts made for indigenization for imported items.',
                'expected_delivery' => 'Expected date of delivery against this indent.',
                'usage_period' => 'Period when the material is expected to be used (Based on whether the material is required for Normal operation/ Preventive maintenance/ Annual maintenance.)',
                'prev_supplier' => 'Previous Supplier',
                'prev_cost_year' => 'Year of Previous Purchase & Cost',
                'prev_qty' => 'Previous Qty',
                'supplier_suggestion' => 'Suggestion about possible supplier against this indent',
                'cost_justification' => 'Justification for cost estimate (item-wise)',
                'budget_provision' => 'Budget Provision'
            ] as $name => $label)
                <div>
                    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        {{ $label }}
                    </label>
                    <input type="text" name="{{ $name }}" id="{{ $name }}"
                        value="{{ old($name, $entry->vec?->{$name} ?? '') }}"
                        class="w-full border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            @endforeach

            <div class="flex justify-end mt-8">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save VEC Section
                </button>
            </div>
        </form>
    </div>
</div>
