<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Procurement Preview - Entry #{{ $entry->id }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite('resources/css/app.css')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            .page-break {
                page-break-before: always;
            }
            body {
                background-color: #fff !important;
                color: #000 !important;
            }
            .border, table, th, td {
                border-color: #ddd !important;
            }
        }
    
        body {
            background-color: #f9fafb;
        }
    
        .form-section h2 {
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 0.25rem;
        }
    
        .label-col {
            font-weight: 600;
            color: #374151;
            width: 300px;
        }
    </style>
</head>

<body class="text-gray-800 bg-white dark:bg-zinc-900 dark:text-white text-sm leading-relaxed p-6">

    <div class="max-w-6xl mx-auto space-y-10">
        <div class="text-center border-b pb-6 mb-8">
            <h1 class="text-2xl font-bold">Procurement Preview</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">Entry ID: {{ $entry->id }}</p>
        </div>

        {{-- VEC Section --}}
        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">1. VEC Form</h2>
        
            <div class="space-y-6 text-sm text-gray-800 dark:text-gray-200">
        
                {{-- A & B --}}
                @foreach ([
                    'description' => 'General Description of Item',
                    'functional_requirement' => 'Functional Requirement / Services',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->vec?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- C - Indented Items --}}
                <div class="mt-6">
                    <h3 class="font-semibold mb-3 text-gray-800 dark:text-white">Description of Indented Material</h3>
        
                    @if($entry->vec && $entry->vec->items->count())
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border border-gray-300 dark:border-zinc-700">
                                <thead class="bg-gray-100 dark:bg-zinc-800 text-left">
                                    <tr>
                                        <th class="p-2 border">Description</th>
                                        <th class="p-2 border">Unit</th>
                                        <th class="p-2 border">Qty Installed</th>
                                        <th class="p-2 border">Consumption Rate</th>
                                        <th class="p-2 border">Stock Position</th>
                                        <th class="p-2 border">Qty Pipeline</th>
                                        <th class="p-2 border">Indented Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entry->vec->items as $item)
                                        <tr class="border-t border-gray-200 dark:border-zinc-700">
                                            <td class="p-2">{{ $item->description }}</td>
                                            <td class="p-2">{{ $item->unit }}</td>
                                            <td class="p-2">{{ $item->qty_installed }}</td>
                                            <td class="p-2">{{ $item->consumption_rate }}</td>
                                            <td class="p-2">{{ $item->stock_position }}</td>
                                            <td class="p-2">{{ $item->qty_pipeline }}</td>
                                            <td class="p-2">{{ $item->indented_qty }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="italic text-gray-500">No indented items listed.</p>
                    @endif
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
                    'indented_qty_and_efforts' => 'Indented quantity & efforts for indigenization.',
                    'expected_delivery' => 'Expected date of delivery',
                    'usage_period' => 'Expected usage period',
                    'prev_supplier' => 'Previous Supplier',
                    'prev_cost_year' => 'Year of Previous Purchase & Cost',
                    'prev_qty' => 'Previous Qty',
                    'supplier_suggestion' => 'Suggested Supplier',
                    'cost_justification' => 'Justification for cost estimate',
                    'budget_provision' => 'Budget Provision'
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->vec?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        
        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10 page-break">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">2. GEM Direct Purchase Form</h2>
        
            <div class="space-y-6 text-sm text-gray-800 dark:text-gray-200">
        
                {{-- Basic Info --}}
                @foreach ([
                    'section' => 'Section',
                    'indent_no' => 'Indent No.',
                    'date' => 'Date',
                    'officer_name' => 'Indenting Officer',
                    'designation' => 'Designation',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->gem?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Item List --}}
                <div class="mt-6">
                    <h3 class="font-semibold mb-3 text-gray-800 dark:text-white">List of Items</h3>
        
                    @if($entry->gem?->items && count($entry->gem->items))
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border border-gray-300 dark:border-zinc-700">
                                <thead class="bg-gray-100 dark:bg-zinc-800 text-left">
                                    <tr>
                                        <th class="p-2 border">Description</th>
                                        <th class="p-2 border">GeM ID</th>
                                        <th class="p-2 border">Qty</th>
                                        <th class="p-2 border">Unit</th>
                                        <th class="p-2 border">Amount (Rs.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entry->gem->items as $item)
                                        <tr class="border-t border-gray-200 dark:border-zinc-700">
                                            <td class="p-2">{{ $item['description'] }}</td>
                                            <td class="p-2">{{ $item['gem_id'] }}</td>
                                            <td class="p-2">{{ $item['quantity'] }}</td>
                                            <td class="p-2">{{ $item['unit'] }}</td>
                                            <td class="p-2">{{ $item['amount'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="italic text-gray-500">No items listed.</p>
                    @endif
                </div>
        
                {{-- Budget + Officials --}}
                @foreach ([
                    'budget_head' => 'Budget Head',
                    'indenting_officer' => 'Indenting Officer',
                    'section_head' => 'Section Head',
                    'manager' => 'Manager',
                    'OSD' => 'OSD',
                    'gem_approval' => 'Enclosure: Approval of GEM',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->gem?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Approval for Payment --}}
                <h3 class="text-lg font-semibold mt-8 mb-4 text-gray-800 dark:text-white">Approval for Payment</h3>
        
                @foreach ([
                    'gem_contract_date' => 'GeM Contract Date',
                    'due_delivery_date' => 'Due Date of Delivery',
                    'receipt_date' => 'Receipt Date',
                    'delivery_date_extension' => 'Delivery Date Extension',
                    'delivery_extension_justification' => 'Delivery Extension Justification',
                    'crac_date' => 'CRAC Date',
                    'inspection_remarks' => 'Inspection Remarks',
                    'other_remarks' => 'Other Remarks',
                    'pao_aao' => 'PAO/AAO',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->gem?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- LD Checkboxes --}}
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-1/3 font-semibold">With LD:</div>
                    <div class="md:w-2/3">
                        <input type="checkbox" disabled {{ $entry->gem?->with_ld ? 'checked' : '' }}>
                    </div>
                </div>
        
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-1/3 font-semibold">Without LD:</div>
                    <div class="md:w-2/3">
                        <input type="checkbox" disabled {{ $entry->gem?->without_ld ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10 page-break">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">3. Indent Part-I</h2>
        
            <div class="space-y-6 text-sm text-gray-800 dark:text-gray-200">
        
                {{-- Static Fields --}}
                @foreach ([
                    'user_unit' => 'User Unit',
                    'indent_type' => 'Indent Type',
                    'desired_delivery' => 'Desired Delivery',
                    'indenting_officer' => 'Indenting Officer Name',
                    'designation' => 'Designation',
                    'group_division_section' => 'Group / Division / Section',
                    'contact' => 'Email & Contact No.',
                    'place_of_delivery' => 'Place of Delivery',
                    'approving_authority_name' => 'Approving Authority Name',
                    'approving_authority_designation' => 'Approving Authority Designation',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->indentPartOne?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Items --}}
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-3 text-gray-800 dark:text-white">Item Descriptions</h3>
        
                    @if (!empty($entry->indentPartOne?->items))
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm border border-gray-300 dark:border-zinc-700">
                                <thead class="bg-gray-100 dark:bg-zinc-800 text-left">
                                    <tr>
                                        <th class="p-2 border">Description</th>
                                        <th class="p-2 border">Quantity</th>
                                        <th class="p-2 border">Unit</th>
                                        <th class="p-2 border">Estimated Cost (Rs)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entry->indentPartOne->items as $item)
                                        <tr class="border-t border-gray-200 dark:border-zinc-700">
                                            <td class="p-2">{{ $item['description'] }}</td>
                                            <td class="p-2">{{ $item['quantity'] }}</td>
                                            <td class="p-2">{{ $item['unit'] }}</td>
                                            <td class="p-2">{{ $item['estimated_cost'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="italic text-gray-500">No item descriptions available.</p>
                    @endif
                </div>
        
                {{-- Financial Section --}}
                @foreach ([
                    'total_estimated_cost_words' => 'Total Estimated Cost (in words)',
                    'classification' => 'Classification',
                    'previous_purchase_ref' => 'Previous Purchase Reference',
                    'financial_sanction' => 'Financial Sanction No. & Date',
                    'budget_head' => 'Budget Head',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->indentPartOne?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
            </div>
        </div>

        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10 page-break">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">4. Indent Part-II</h2>
        
            <div class="space-y-6 text-sm text-gray-800 dark:text-gray-200">
        
                {{-- Cost Breakdown --}}
                <div>
                    <h3 class="text-lg font-semibold mb-3">Cost Breakdown</h3>
                    @foreach([
                        'basic_cost' => 'Basic Cost',
                        'packing_forwarding' => 'Packing & Forwarding',
                        'custom_duty' => 'Custom Duty',
                        'gst_basic' => 'GST on Basic',
                        'transportation' => 'Transportation',
                        'installation' => 'Installation',
                        'training' => 'Training',
                        'gst_f_g' => 'GST on F&G',
                        'other_charges' => 'Other Charges',
                        'total_estimated_cost' => 'Total Estimated Cost'
                    ] as $field => $label)
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                            <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                {{ $entry->indentPartTwo?->$field ?? '—' }}
                            </div>
                        </div>
                    @endforeach
                </div>
        
                {{-- Categories --}}
                <div>
                    <h3 class="text-lg font-semibold mb-3">Category Information</h3>
                    @foreach([
                        'item_category' => 'Item Category',
                        'technical_category' => 'Technical Category',
                    ] as $field => $label)
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                            <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                {{ $entry->indentPartTwo?->$field ?? '—' }}
                            </div>
                        </div>
                    @endforeach
                </div>
        
                {{-- Checkboxes --}}
                <div>
                    <h3 class="text-lg font-semibold mb-3">Declarations</h3>
                    @foreach([
                        'developmental_in_india' => 'Developmental in India',
                        'gem_product_available' => 'GEM Product Available',
                        'mse_reserved_list' => 'MSE Reserved',
                        'gte_exempted_list' => 'GTE Exempted',
                        'mii_reserved_list' => 'MII Reserved',
                        'is_proprietary' => 'Proprietary Item',
                        'is_warranty' => 'Warranty Applicable',
                        'training_required' => 'Training Required',
                        'is_for_rnd' => 'For R&D',
                        'is_imported' => 'Is Imported',
                    ] as $field => $label)
                        <div class="flex items-center gap-2">
                            <input type="checkbox" disabled {{ $entry->indentPartTwo?->$field ? 'checked' : '' }}>
                            <label class="text-sm">{{ $label }}</label>
                        </div>
                    @endforeach
                </div>
        
                {{-- Warranty & Training --}}
                @foreach([
                    'warranty_period' => 'Warranty Period',
                    'warranty_psd' => 'Warranty PSD',
                    'training_place' => 'Training Place',
                    'training_personnel' => 'Training Personnel',
                    'training_days' => 'Training Days',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->indentPartTwo?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Evaluation Criteria --}}
                <div>
                    <h3 class="text-lg font-semibold mb-3">Evaluation & Procurement</h3>
                    @foreach([
                        'evaluation_basis' => 'Evaluation Basis',
                        'bidder_qualification_criteria' => 'Bidder Qualification Criteria',
                        'financial_criteria_approval' => 'Financial Criteria Approval',
                        'bid_evaluation_criteria' => 'Bid Evaluation Criteria',
                        'acceptance_criteria' => 'Acceptance Criteria',
                    ] as $field => $label)
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                            <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                {{ $entry->indentPartTwo?->$field ?? '—' }}
                            </div>
                        </div>
                    @endforeach
                </div>
        
                {{-- Other Inputs --}}
                @foreach([
                    'gem_additional_parameters' => 'GEM Additional Parameters',
                    'mse_experience_exemption' => 'MSE Experience Exemption',
                    'mse_turnover_exemption' => 'MSE Turnover Exemption',
                    'payment_terms' => 'Payment Terms',
                    'advance_milestone_details' => 'Advance Milestone Details',
                    'pro_rata_details' => 'Pro Rata Details',
                    'local_content_percent' => 'Local Content %',
                    'project_validity' => 'Project Validity',
                    'site_visit_approval' => 'Site Visit Approval',
                    'evaluation_time' => 'Evaluation Time',
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->indentPartTwo?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Indenting & Approval --}}
                <div>
                    <h3 class="text-lg font-semibold mt-6 mb-3">Officer Details</h3>
                    @foreach([
                        'indenting_officer' => 'Indenting Officer',
                        'indenting_unit' => 'Indenting Unit',
                        'indenting_phone' => 'Indenting Phone',
                        'indenting_email' => 'Indenting Email',
                        'approving_authority' => 'Approving Authority',
                        'approving_phone' => 'Approving Phone',
                        'approving_email' => 'Approving Email',
                    ] as $field => $label)
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                            <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                {{ $entry->indentPartTwo?->$field ?? '—' }}
                            </div>
                        </div>
                    @endforeach
                </div>
        
                {{-- GEM Report Link --}}
                @if($entry->indentPartTwo?->gem_report_upload)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">GEM Report Upload:</div>
                        <div class="md:w-2/3">
                            <a href="{{ Storage::url($entry->indentPartTwo->gem_report_upload) }}" target="_blank" class="text-blue-600 underline">
                                View Uploaded File
                            </a>
                        </div>
                    </div>
                @endif
        
            </div>
        </div>

        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10 page-break">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">5. Indent Part-III</h2>
        
            <div class="space-y-6 text-sm text-gray-800 dark:text-gray-200">
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
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->indentPartThree?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Indenting Officer Section --}}
                <div>
                    <h3 class="text-lg font-semibold mt-6 mb-3">Indenting Officer Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach([
                            'indenting_officer' => 'Name & Designation',
                            'indenting_unit' => 'Section/Division/Unit',
                            'indenting_phone' => 'Phone',
                            'indenting_email' => 'Email ID',
                        ] as $field => $label)
                            <div class="flex flex-col gap-2">
                                <div class="font-semibold">{{ $label }}:</div>
                                <div class="border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                    {{ $entry->indentPartThree?->$field ?? '—' }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        
                {{-- Approving Authority Section --}}
                <div>
                    <h3 class="text-lg font-semibold mt-6 mb-3">Approving Authority Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach([
                            'approving_authority' => 'Name & Designation',
                            'approving_phone' => 'Phone',
                            'approving_email' => 'Email',
                        ] as $field => $label)
                            <div class="flex flex-col gap-2">
                                <div class="font-semibold">{{ $label }}:</div>
                                <div class="border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                    {{ $entry->indentPartThree?->$field ?? '—' }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10 page-break">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">6. PAC - Proprietary Article Certificate</h2>
        
            <div class="space-y-6 text-sm text-gray-800 dark:text-gray-200">
                {{-- Indent Details --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach([
                        'indent_no' => 'Indent Number',
                        'indent_date' => 'Indent Date'
                    ] as $field => $label)
                        <div class="flex flex-col gap-2">
                            <div class="font-semibold">{{ $label }}:</div>
                            <div class="border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                {{ $entry->pac?->$field ?? '—' }}
                            </div>
                        </div>
                    @endforeach
                </div>
        
                {{-- Manufacturer Details --}}
                @foreach([
                    'manufacturer' => 'Manufacturer / Firm',
                    'model' => 'Model'
                ] as $field => $label)
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">{{ $label }}:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->pac?->$field ?? '—' }}
                        </div>
                    </div>
                @endforeach
        
                {{-- Justification --}}
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="md:w-1/3 font-semibold">Justification (Why no other make/model is acceptable):</div>
                    <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800 min-h-[100px]">
                        {{ $entry->pac?->justification ?? '—' }}
                    </div>
                </div>
        
                {{-- Indenting Officer Section --}}
                <div>
                    <h3 class="text-lg font-semibold mt-6 mb-3">Indenting Officer Details</h3>
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">Name & Designation:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->pac?->indenting_officer ?? '—' }}
                        </div>
                    </div>
                </div>
        
                {{-- Approving Authority Section --}}
                <div>
                    <h3 class="text-lg font-semibold mt-6 mb-3">Approving Authority</h3>
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="md:w-1/3 font-semibold">Designation:</div>
                        <div class="md:w-2/3 border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800">
                            {{ $entry->pac?->approving_designation ?? '—' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        {{-- Print Button --}}
        @if($entry->status != 'completed')
        <div class="flex justify-end pt-6 no-print">
            <button type="button" onclick="initiatePrintFlow()" 
                class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
                Save & Print
            </button>

            <form method="POST" action="{{ route('procurement.preview.submit', $entry->id) }}" id="submitForm">
                @csrf
            </form>
        </div>
        @endif
    </div>
    <script>
        function initiatePrintFlow() {
        window.print();
        
            window.addEventListener('afterprint', function() {
                Swal.fire({
                    title: 'Confirmation Required',
                    html: `Did you successfully print the form or save as PDF?<br><br>
                        <strong class="text-red-500">This action cannot be undone.</strong>`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, I have printed/saved',
                    cancelButtonText: 'No, let me print again',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('submitForm').submit();
                    }
                });
            }, {once: true}); 
        }
    </script>
</body>

</html>