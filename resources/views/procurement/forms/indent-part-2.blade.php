<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">4. Indent Part-II</h2>
        <button data-toggle="indent-part-2" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4" id="indent-part-2">
        <form method="POST" action="#">
            @csrf

            {{-- 1. Estimated Cost --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Total Estimated Cost</label>
                <input type="text" name="total_estimated_cost" value="Rs. 47070/-"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 1(a) to 1(i) Basic breakups --}}
            @foreach([
                'basic_cost' => 'Basic Cost (Base year)',
                'packing_forwarding' => 'Packing and Forwarding (incl. GST)',
                'custom_duty' => 'Custom Duty',
                'gst_basic' => 'GST on Basic (rate)',
                'transportation' => 'Transportation (incl. GST)',
                'installation' => 'Installation & Commissioning',
                'training' => 'Training Charges',
                'gst_f_g' => 'GST on (f) & (g)',
                'other_charges' => 'Any Other Charges'
            ] as $name => $label)
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                    <input type="text" name="{{ $name }}" class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            @endforeach

            {{-- 2. Category --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Category of Item</label>
                <input type="text" name="item_category" value="Spare"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Technical Category</label>
                <input type="text" name="technical_category" value="Electronics"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 3. GeM ID --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Is GeM Product ID available?</label>
                <input type="text" name="gem_product_available" value="NO"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 5. Proprietary --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Is item proprietary?</label>
                <input type="text" name="is_proprietary" value="Yes"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 6. Evaluation --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Basis of Evaluation</label>
                <input type="text" name="evaluation_basis" value="Overall"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 7. Warranty --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Is warranty required?</label>
                    <input type="text" name="is_warranty" value="Yes"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Warranty Period</label>
                    <input type="text" name="warranty_period" value="01 Year"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            {{-- 8. PDI --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Is Pre-Despatch Inspection (PDI) required?</label>
                <input type="text" name="is_pdi" value="No"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 9. Installation Responsibility --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Installation & Commissioning Responsibility</label>
                <input type="text" name="installation_scope" value="Department"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- 13. Payment Terms --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Payment Terms</label>
                <input type="text" name="payment_terms" value="NA"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Signature Section --}}
            <div class="border-t pt-6 mt-6">
                <h3 class="font-semibold text-gray-800 dark:text-white text-md mb-2">Indenting Officer Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Name & Designation</label>
                        <input type="text" name="indenting_officer" value="Jit Basak, TO-C"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Section/Division/Unit</label>
                        <input type="text" name="indenting_unit" value="Instrumentation / HWBF Talcher"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                        <input type="text" name="indenting_phone" value="06760-262380, Ext-529"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Email ID</label>
                        <input type="email" name="indenting_email" value="jit@tal.hwb.gov.in"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                </div>
            </div>

            <div class="border-t pt-6 mt-6">
                <h3 class="font-semibold text-gray-800 dark:text-white text-md mb-2">Approving Authority Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Name & Designation</label>
                        <input type="text" name="approving_authority" value="Jaitul Haque (OSD)"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                        <input type="text" name="approving_phone" value="06760-262371"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" name="approving_email" value="gm@tal.hwb.gov.in"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save Indent Part-II
                </button>
            </div>
        </form>
    </div>
</div>
