<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">4. Indent Part-II</h2>
        <button data-toggle="indent-part-2" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4 hidden" id="indent-part-2">
        <form method="POST" action="{{ route('procurement.indentTwo.store', $entry->id) }}" enctype="multipart/form-data">
            @csrf

            {{-- Cost Breakdown --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ([
                    'basic_cost' => 'Basic Cost',
                    'packing_forwarding' => 'Packing & Forwarding',
                    'custom_duty' => 'Custom Duty',
                    'gst_basic' => 'GST on Basic',
                    'transportation' => 'Transportation',
                    'installation' => 'Installation',
                    'training' => 'Training',
                    'gst_f_g' => 'GST on F&G',
                    'other_charges' => 'Other Charges'
                ] as $field => $label)
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                        <input type="number" step="0.01" name="{{ $field }}"
                            value="{{ old($field, optional($entry->indentPartTwo)->$field) }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Total Estimated Cost</label>
                <input type="number" step="0.01" name="total_estimated_cost"
                    value="{{ old('total_estimated_cost', optional($entry->indentPartTwo)->total_estimated_cost) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
            </div>

            {{-- Categories --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Item Category</label>
                    <input type="text" name="item_category"
                        value="{{ old('item_category', optional($entry->indentPartTwo)->item_category) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Technical Category</label>
                    <input type="text" name="technical_category"
                        value="{{ old('technical_category', optional($entry->indentPartTwo)->technical_category) }}"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                </div>
            </div>

            {{-- Checkboxes --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @foreach ([
                    'developmental_in_india' => 'Developmental in India?',
                    'gem_product_available' => 'GEM Product Available?',
                    'mse_reserved_list' => 'MSE Reserved?',
                    'gte_exempted_list' => 'GTE Exempted?',
                    'mii_reserved_list' => 'MII Reserved?',
                    'is_proprietary' => 'Proprietary Item?'
                ] as $field => $label)
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="{{ $field }}" value="1"
                            {{ old($field, optional($entry->indentPartTwo)->$field) ? 'checked' : '' }}>
                        <label class="text-sm text-gray-700 dark:text-gray-300">{{ $label }}</label>
                    </div>
                @endforeach
            </div>

            {{-- GEM Params --}}
            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">GEM Additional Parameters</label>
                <input type="text" name="gem_additional_parameters"
                    value="{{ old('gem_additional_parameters', optional($entry->indentPartTwo)->gem_additional_parameters) }}"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
            </div>

            {{-- GEM Report Upload --}}
            <div class="mt-4">
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Upload GEM Report</label>
                <input type="file" name="gem_report_upload"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                @if(optional($entry->indentPartTwo)->gem_report_upload)
                    <p class="text-sm text-green-600 mt-1">
                        Existing File:
                        <a href="{{ Storage::url($entry->indentPartTwo->gem_report_upload) }}" target="_blank" class="underline">View</a>
                    </p>
                @endif
            </div>

            {{-- Evaluation --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @foreach ([
                    'evaluation_basis' => 'Evaluation Basis',
                    'bidder_qualification_criteria' => 'Bidder Qualification Criteria',
                    'financial_criteria_approval' => 'Financial Criteria Approval',
                    'bid_evaluation_criteria' => 'Bid Evaluation Criteria',
                    'acceptance_criteria' => 'Acceptance Criteria'
                ] as $field => $label)
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                        <input type="text" name="{{ $field }}"
                            value="{{ old($field, optional($entry->indentPartTwo)->$field) }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                    </div>
                @endforeach
            </div>

            {{-- Warranty --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                @foreach ([
                    'is_warranty' => 'Warranty Applicable?',
                    'warranty_period' => 'Warranty Period',
                    'warranty_psd' => 'Warranty PSD'
                ] as $field => $label)
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                        @if ($field === 'is_warranty')
                            <input type="checkbox" name="{{ $field }}" value="1"
                                {{ old($field, optional($entry->indentPartTwo)->$field) ? 'checked' : '' }}>
                        @else
                            <input type="text" name="{{ $field }}"
                                value="{{ old($field, optional($entry->indentPartTwo)->$field) }}"
                                class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Training --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @foreach ([
                    'training_required' => 'Training Required?',
                    'training_place' => 'Training Place',
                    'training_personnel' => 'Training Personnel',
                    'training_days' => 'Training Days'
                ] as $field => $label)
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                        @if ($field === 'training_required')
                            <input type="checkbox" name="{{ $field }}" value="1"
                                {{ old($field, optional($entry->indentPartTwo)->$field) ? 'checked' : '' }}>
                        @else
                            <input type="text" name="{{ $field }}"
                                value="{{ old($field, optional($entry->indentPartTwo)->$field) }}"
                                class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Payment & Misc --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                @foreach ([
                    'mse_experience_exemption' => 'MSE Experience Exemption',
                    'mse_turnover_exemption' => 'MSE Turnover Exemption',
                    'payment_terms' => 'Payment Terms',
                    'advance_milestone_details' => 'Advance Milestone Details',
                    'pro_rata_details' => 'Pro Rata Details',
                    'is_for_rnd' => 'For R&D?',
                    'is_imported' => 'Is Imported?',
                    'local_content_percent' => 'Local Content %',
                    'project_validity' => 'Project Validity',
                    'site_visit_approval' => 'Site Visit Approval',
                    'evaluation_time' => 'Evaluation Time',
                    'indenting_officer' => 'Indenting Officer',
                    'indenting_unit' => 'Indenting Unit',
                    'indenting_phone' => 'Indenting Phone',
                    'indenting_email' => 'Indenting Email',
                    'approving_authority' => 'Approving Authority',
                    'approving_phone' => 'Approving Phone',
                    'approving_email' => 'Approving Email'
                ] as $field => $label)
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">{{ $label }}</label>
                        <input type="text" name="{{ $field }}"
                            value="{{ old($field, optional($entry->indentPartTwo)->$field) }}"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                    </div>
                @endforeach
            </div>

            {{-- Submit --}}
            <div class="mt-6 text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save Indent Part II
                </button>
            </div>
        </form>
    </div>
</div>
