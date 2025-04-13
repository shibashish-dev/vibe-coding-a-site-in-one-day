<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">5. Indent Part-III</h2>
        <button data-toggle="indent-part-3" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4" id="indent-part-3">
        <form method="POST" action="#">
            @csrf

            @foreach([
                'split_quantity' => 'Is Splitting of quantity required? If yes, indicate the ratio',
                'prebid_meeting' => 'Is Pre-Bid Meeting Required? If Yes, specify mode (Virtual/Hybrid)',
                'sample_required' => 'Is Sample required after award of Contract before bulk supply?',
                'fim_involved' => 'Is FIM involved?',
                'fim_available' => 'FIM Availability / Date',
                'fim_description' => 'Description of the FIM',
                'fim_quantity' => 'Quantity of FIM',
                'fim_value' => 'Value of FIM',
                'fim_loss' => 'Permissible Process Loss / Wastage',
                'fim_rejection_deduction' => 'Deduction amount for excess rejection/wastage',
                'buy_back' => 'Is Buy Back involved? If yes, submit committee report in sealed cover',
                'post_supply_inspection' => 'Is post supply inspection permitted? Provide approval if yes.',
                'store_availability' => 'Is material available in stores? If yes, reason for procuring.',
                'request_to_dps' => 'Any specific request to DPS?',
            ] as $name => $label)
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                    <input type="text" name="{{ $name }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            @endforeach

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
                        <input type="text" name="indenting_phone" value="06760-262378, Ext-529"
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
                    Save Indent Part-III
                </button>
            </div>
        </form>
    </div>
</div>
