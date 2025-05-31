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

        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center">
                मूल्य अभियंत्रिकी समिति प्रपत्र / Value Engineering Committee Form
            </h2>

            <div class="text-sm text-gray-800 dark:text-gray-200">
                <table class="w-full border border-gray-300 dark:border-zinc-700">
                    <tbody>
                        {{-- A & B --}}
                        @foreach ([
                            'description' => 'सामान्य विवरण / General Description of Item',
                            'functional_requirement' => 'कार्यात्मक आवश्यकता/सेवाएँ / Functional Requirement / Services',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700">
                                <td class="p-2 w-1/3 font-semibold border-r border-gray-300 dark:border-zinc-700">{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                        {{ $entry->vec?->$field ?? '—' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- C - Indented Items --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-semibold border-r border-gray-300 dark:border-zinc-700">
                                मांगित सामग्री का विवरण / Description of Indented Material:
                            </td>
                            <td class="p-2">
                                @if($entry->vec && $entry->vec->items->count())
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-300 dark:border-zinc-700">
                                            <thead class="bg-gray-100 dark:bg-zinc-800 text-left">
                                                <tr>
                                                    <th class="p-2 border">विवरण / Description</th>
                                                    <th class="p-2 border">इकाई / Unit</th>
                                                    <th class="p-2 border">स्थापित मात्रा / Qty Installed</th>
                                                    <th class="p-2 border">उपभोग दर / Consumption Rate</th>
                                                    <th class="p-2 border">स्टॉक स्थिति / Stock Position</th>
                                                    <th class="p-2 border">पाइपलाइन मात्रा / Qty in Pipeline</th>
                                                    <th class="p-2 border">मांगित मात्रा / Indented Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($entry->vec->items as $item)
                                                    <tr class="border-t border-gray-200 dark:border-zinc-700">
                                                        <td class="p-2 border">{{ $item->description }}</td>
                                                        <td class="p-2 border">{{ $item->unit }}</td>
                                                        <td class="p-2 border">{{ $item->qty_installed }}</td>
                                                        <td class="p-2 border">{{ $item->consumption_rate }}</td>
                                                        <td class="p-2 border">{{ $item->stock_position }}</td>
                                                        <td class="p-2 border">{{ $item->qty_pipeline }}</td>
                                                        <td class="p-2 border">{{ $item->indented_qty }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-zinc-800 italic text-gray-500">
                                        कोई मांगित वस्तुएँ सूचीबद्ध नहीं / No indented items listed.
                                    </div>
                                @endif
                            </td>
                        </tr>

                        {{-- D–M --}}
                        @foreach ([
                            'equipment_cost' => 'मुख्य उपकरण की लागत और खरीद का वर्ष / Cost of main equipment and year of purchase',
                            'nature_item_maintenance' => 'प्रकृति: पूंजी/रखरखाव / Nature: Capital / Maintenance',
                            'nature_item_consumables' => 'प्रकृति: उपभोग्य/स्पेयर / Nature: Consumables / Spares',
                            'nature_item_origin' => 'प्रकृति: स्वदेशी/आयातित/स्वामित्व / Nature: Indigenous / Imported / Proprietary',
                            'additional_info' => 'कोई अन्य अतिरिक्त जानकारी / Any Other Additional Information',
                            'quantity_other_hwps' => 'अन्य HWP में उपलब्ध वस्तु की मात्रा / Quantity of item available in other HWPs',
                            'min_max_stock' => 'न्यूनतम और अधिकतम स्टॉक मात्रा प्रस्तावित / Minimum and Maximum quantity proposed to be kept in stock',
                            'indented_qty_and_efforts' => 'मांगित मात्रा और स्वदेशीकरण के प्रयास / Indented quantity & efforts for indigenization',
                            'expected_delivery' => 'अपेक्षित वितरण तिथि / Expected date of delivery',
                            'usage_period' => 'अपेक्षित उपयोग अवधि / Expected usage period',
                            'prev_supplier' => 'पिछला आपूर्तिकर्ता / Previous Supplier',
                            'prev_cost_year' => 'पिछली खरीद का वर्ष और लागत / Year of Previous Purchase & Cost',
                            'prev_qty' => 'पिछली मात्रा / Previous Qty',
                            'supplier_suggestion' => 'सुझाया गया आपूर्तिकर्ता / Suggested Supplier',
                            'cost_justification' => 'लागत अनुमान का औचित्य / Justification for cost estimate',
                            'budget_provision' => 'बजट प्रावधान / Budget Provision'
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700">
                                <td class="p-2 w-1/3 font-semibold border-r border-gray-300 dark:border-zinc-700">{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-zinc-800">
                                        {{ $entry->vec?->$field ?? '—' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900 p-8 mb-10" style="font-family: 'Times New Roman', serif;">
            <div class="text-sm text-black dark:text-black mb-6">
                <p class="text-center t-bold">Document No. HWBF(Tal)/01 Rev: 01</p>
                <p class="text-center font-bold">
                    भारी पानी बोर्ड सुविधाएं (तालचेर) / Heavy Water Board Facilities (Talcher)
                </p>
            </div>

            <h2 class="text-2xl font-bold mb-6 text-black dark:text-black text-center">
                GeM से सीधी खरीद के लिए माँगपत्र प्रारूप (रूपए 25000/- तक) / Indent Format for Direct Purchase through GeM (Upto Rs. 25,000/-)
            </h2>

            <div class="space-y-6 text-sm text-black dark:text-black">
                <table class="w-full border border-gray-300 dark:border-zinc-700 " style="border-collapse: collapse;">
                    <tbody>
                        {{-- Basic Info --}}
                        @foreach ([
                            'section' => 'अनुभाग / Section',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700">
                                <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                        {{ $entry->gem?->$field ?? '-----' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >
                                मांगपत्र संख्या / Indent No.:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                    {{ $entry->gem?->indent_no ?? '-----' }}
                                    <span class="ml-1 font-bold">दिनांक / Date:</span>
                                    <span class="font-normal"> {{ $entry->gem?->date ?? '-----' }}</span>
                                </div>
                            </td>
                        </tr>

                        @foreach ([
                            'officer_name' => 'मांगपत्र अधिकारी / Indenting Officer',
                            'designation' => 'पदनाम / Designation',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                                <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                        {{ $entry->gem?->$field ?? '-----' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Item List --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700" >
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >
                                वस्तु की सूची / List of Items:
                            </td>
                            <td class="p-2">
                                @if($entry->gem?->items && count($entry->gem->items))
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-300 dark:border-zinc-700 " style="border-collapse: collapse; border: 1pt solid black;">
                                            <thead class="bg-gray-100 dark:bg-gray-100 text-left">
                                                <tr>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700  font-bold" >वस्तु संख्या / Item No.</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700  font-bold" >वस्तुओं का विस्तृत विवरण / Detailed description of items</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700  font-bold" >वस्तु की GeM आई.डी. / Product GeM I.D.</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700  font-bold" >मात्रा / Quantity</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700  font-bold" >इकाई / Unit</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700  font-bold" >राशि (रु.) / Amount (Rs.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($entry->gem->items as $index => $item)
                                                    <tr class="border-t border-gray-300 dark:border-zinc-700 " >
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >{{ $index + 1 }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >{{ $item['description'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >{{ $item['gem_id'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >{{ $item['quantity'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >{{ $item['unit'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >{{ $item['amount'] }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr class="border-t border-gray-300 dark:border-zinc-700  font-bold" >
                                                    <td class="p-2 border border-gray-300 dark:border-zinc-700 "  colspan="5">कुल / Total (Rs.):</td>
                                                    <td class="p-2 border border-gray-300 dark:border-zinc-700  font-normal" >
                                                        Rs. {{
                                                            collect($entry->gem->items)->reduce(function ($carry, $item) {
                                                                return is_numeric($item->amount)
                                                                    ? (is_numeric($carry) ? $carry + $item->amount : $item->amount)
                                                                    : (is_numeric($carry) ? $carry : ($carry ? $carry . ', ' : '') . $item->amount);
                                                            }, 0)
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="border border-gray-300 dark:border-zinc-700  rounded px-4 py-2 bg-white dark:bg-white italic text-gray-500 dark:text-gray-500 font-normal" >
                                        कोई वस्तु सूचीबद्ध नहीं / No items listed.
                                    </div>
                                @endif
                            </td>
                        </tr>

                        {{-- Budget + Officials --}}
                        @foreach ([
                            'budget_head' => 'बजट शीर्ष / Budget Head',
                            'indenting_officer' => 'मांगपत्र अधिकारी / Indenting Officer',
                            'section_head' => 'अनुभाग प्रमुख / Section Head',
                            'manager' => 'प्रबंधक / Manager',
                            'OSD' => 'विशेष कार्य अधिकारी / OSD',
                            'gem_approval' => 'संलग्न: वी.ई.सी. का अनुमोदन / Enclosure: Approval of VEC',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                                <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                        {{ $entry->gem?->$field ?? '-----' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Approval for Payment --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 "  colspan="2">
                                <h3 class="text-lg font-bold text-black dark:text-black">
                                    भुगतान की स्वीकृति / Approval for Payment
                                </h3>
                            </td>
                        </tr>

                        @foreach ([
                            'gem_contract_date' => 'GeM क्रय आदेश की तिथी / Date of GeM Contract',
                            'due_delivery_date' => 'वितरण की नियत तिथी / Due Date of Delivery',
                            'receipt_date' => 'सामान मिलने की तिथी / Date of Receipt of Material',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                                <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                        {{ $entry->gem?->$field ?? '-----' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >
                                सामान मिलने की तिथी / Delivery Date extension if any:
                            </td>
                            <td class="p-2">
                                <div class="border border-gray-300 dark:border-zinc-700  rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                    <span class="font-bold">तिथी तक / Upto Date:</span>
                                    <span class="font-normal"> {{ $entry->gem->delivery_date_extension ?? '………………..' }}</span>
                                    <div class="flex items-center gap-4">
                                        <div class="flex items-center">
                                            <span class="mr-2">⃞</span>
                                            <span class="font-normal">एलडी के साथ / With LD</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="mr-2">⃞</span>
                                            <span class="font-normal">एलडी के बिना / Without LD</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @foreach ([
                            'delivery_extension_justification' => 'वितरण की तिथि बढ़ाने का औचित्य / Justification for extension of Delivery Date',
                            'crac_date' => 'सी.आर.ए.सी. बनाने की तिथी / Date of CRAC generation',
                            'inspection_remarks' => 'सामग्री के निरीक्षण और स्वीकृति पर टिप्पणी / Remark on Inspection and Acceptance of material',
                            'other_remarks' => 'कोई अन्य टिप्पणी / Any other remark',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                                <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="  rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                        {{ $entry->gem?->$field ?? '-----' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- PAO/AAO --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >
                                वेतन एवं लेखा अधिकारी / PAO/AAO (भुगतान हेतु / For Payment):
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                    {{ $entry->gem?->pao_aao ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Signatures/Approvals Section --}}
                        @foreach ([
                            'indenting_officer_approval' => 'मांगपत्र अधिकारी / Indenting Officer',
                            'section_head_approval' => 'अनुभाग प्रमुख / Section Head',
                            'manager_approval' => 'प्रबंधक / Manager',
                            'osd_approval' => 'विशेष कार्य अधिकारी / OSD',
                        ] as $field => $label)
                            <tr class="border-b border-gray-300 dark:border-zinc-700 " >
                                <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700 " >{{ $label }}:</td>
                                <td class="p-2">
                                    <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal" >
                                        {{ $entry->gem?->$field ?? '-----' }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-white p-8 mb-10 page-break" style="font-family: 'Times New Roman', serif;">
            <div class="text-sm text-black dark:text-black mb-6">
                <div class="flex justify-between">
                    <p class="font-bold">प्रपत्र संख्या / FORM No. DPS/ST/01</p>
                    <p class="font-bold">मांगपत्र भाग- I / INDENT PART-I</p>
                    <p class="font-bold">बिशेष प्राथमिकता, यदि है / SPECIAL PRIORITY, IF ANY: MOST URGENT (Breakdown)</p>
                </div>
                <p class="text-center font-bold mt-4">
                    भारत सरकार / Government of India<br/>
                    परमाणु ऊर्जा विभाग / Department of Atomic Energy<br/>
                    क्रय एवं भंडार निदेशालय / Directorate of Purchase & Stores
                </p>
                <p class="mt-4">
                    <strong>सेवा में / To:</strong><br/>
                    क्रय एवं भंडार निदेशालय / Directorate of Purchase and Stores<br/>
                    केंद्रीय क्षेत्रीय क्रय एकक, कोलकाता / Central Regional Purchase Unit, Kolkata
                </p>
            </div>

            <div class="space-y-6 text-sm text-black dark:text-black">
                <table class="w-full border border-gray-300 dark:border-zinc-700" style="border-collapse: collapse;">
                    <tbody>
                        {{-- User Unit and Indent Type --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                उपयोगकर्ता इकाई का नाम / Name of User Unit:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->user_unit ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                मांगपत्र का (साधारण/क्वरिंग/पुन:आदेश/पी आर आदे) / Indent Type (Normal/Covering/Repeat/PR order):
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->indent_type ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Indent No. and Date --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                मांगपत्र सं. / Indent No.:
                            </td>
                            <td class="p-2">
                                <div class="flex justify-between px-4 py-2 bg-white dark:bg-white font-normal">
                                    <span> {{ $entry->indentPartOne?->indent_no ?? 'HWBF/TAL/INST/2025/-----' }} </span>
                                    <span class="ml-1 font-bold">दिनांक / Date:
                                    <span class="font-normal"> {{ $entry->indentPartOne?->date ?? '-----/03/2025' }}</span> </span>
                                </div>
                            </td>
                        </tr>

                        {{-- Division and Section --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                प्रभाग / Division:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->division ?? 'HWBF TALCHER' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                अनुभाग / Section:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->section ?? 'INSTRUMENTATION' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Desired Delivery --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                वंछित सपुर्दगी सारणी / Desired Delivery (after placement of order) (दिन/महीने/वर्ष) (DAYS/MONTHS/YEAR):
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->desired_delivery ?? '20 days' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Indenting Officer Details --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                माल मांगने वाले अधिकारी का नाम / Name of Indenting Officer:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->indenting_officer ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                पदनाम / Designation:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->designation ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                समूह/प्रभाग/अनुभाग / Group/Division/Section:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->group_division_section ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                ईमेल आईडी और दूरभाष सं. / Email ID & Contact No.:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->contact ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Place of Delivery --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                माल सुपुर्दगी का स्थान / Place of Delivery:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->place_of_delivery ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Approving Authority Declaration --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700" colspan="2">
                                <h3 class="text-lg font-bold text-black dark:text-black">
                                    अनुमोदन करने वाले अधिकारी की घोषणा / DECLARATION BY THE APPROVING AUTHORITY
                                </h3>
                                <p class="font-normal mt-2">
                                    मैं प्रमाणित करता हूं कि सामान खरीदने/सेवाओं की व्यवस्था करने के लिए मांगपत्र में निर्दिष्ट मदों की सीमा तक मांगपत्र अनुमोदित करने की शक्तियां मुझे CE, HWB, Mumbai द्वारा प्रत्यायोजित आदेश संख्या HWB/Accts/Budget/2024/3554, तारीख 04.09.2024 के तहत प्रत्यायोजित की गई हैं।<br/>
                                    I hereby certify that I have been delegated powers to approve Indent for the purchase of stores to be arranged to the extent of the estimated cost of the item indicated in the indent vide Delegation Order No.: HWB/Accts/Budget/2024/3554, Dated: 04.09.2024 issued by CE, HWB, Mumbai.
                                </p>
                            </td>
                        </tr>

                        {{-- Approving Authority Details --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                अनुमोदन करने वाले अधिकारी का नाम / Name of Indent Approving Authority:
                            </td>
                            <td class="p-2">
                                <div class="rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->approving_authority_name ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                पदनाम / Designation:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->approving_authority_designation ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                समूह/प्रभाग/अनुभाग / Group/Division/Section:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->approving_authority_group_division_section ?? 'HWBF TALCHER' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                ईमेल आईडी और दूरभाष सं. / Email ID & Contact No.:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->approving_authority_contact ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Items Table --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                विस्तृत विवरण / Item Descriptions:
                            </td>
                            <td class="p-2">
                                @if (!empty($entry->indentPartOne?->items))
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm border border-gray-300 dark:border-zinc-700" style="border-collapse: collapse;">
                                            <thead class="bg-gray-100 dark:bg-gray-100 text-left">
                                                <tr>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">क्र.सं. / Sl. No.</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">विशिष्टताओं सहित मदों का विस्तृत विवरण / Description of items with detailed specification</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">मात्रा / Quantity</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">एकक / Unit</th>
                                                    <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">अनुमानित लागत (रु.) / Estimated Cost (Rs)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($entry->indentPartOne->items as $index => $item)
                                                    <tr class="border-t border-gray-300 dark:border-zinc-700">
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">{{ $index + 1 }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">{{ $item['description'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">{{ $item['quantity'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">{{ $item['unit'] }}</td>
                                                        <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">{{ $item['estimated_cost'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="border border-gray-300 dark:border-zinc-700 rounded px-4 py-2 bg-white dark:bg-white italic text-gray-500 dark:text-gray-500 font-normal">
                                        कोई वस्तु सूचीबद्ध नहीं / No items listed.
                                    </div>
                                @endif
                            </td>
                        </tr>

                        {{-- Financial Section --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                कुल अनुमानित लागत (कर और अन्य शुल्कों को मिलाकर) / Total Estimated Cost (inclusive of Taxes and other charges):
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->total_estimated_cost ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                कुल अनुमानित लागत (शब्दों में) / Total Estimated Cost (in words):
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->total_estimated_cost_words ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                वर्गीकरण / Classification:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->classification ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                पूर्व क्रय संदर्भ यदि ज्ञात हो तो / Previous Purchase Reference if known:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->previous_purchase_ref ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                वित्तीय स्वीकृति सं. एवं तारीख / Financial Sanction No. & Date:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->financial_sanction ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                क्या चालू वित्त वर्ष के बजट में विदेशी मुद्रा प्रावधान सहित प्रावधान किया है यदि है तो मुख्य और गौण शीर्ष दें / Whether Budget provision including provision for foreign exchange during the current financial year exists and if so, Major and minor Head of Accounts:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->budget_head ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                बजट प्रावधान में उपलब्ध राशि / Amount of Budget:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->budget_amount ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Additional Information --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                अन्य संबंधित सूचनाएं / Any other relevant information:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->relevant_information ?? '-----' }}
                                </div>
                            </td>
                        </tr>

                        {{-- Proposed Vendors --}}
                        <tr class="border-b border-gray-300 dark:border-zinc-700">
                            <td class="p-2 w-1/3 font-bold border-r border-gray-300 dark:border-zinc-700">
                                प्रस्तावित विक्रेता, यदि कोई हो / Proposed Vendors, if any:
                            </td>
                            <td class="p-2">
                                <div class=" rounded px-4 py-2 bg-white dark:bg-white font-normal">
                                    {{ $entry->indentPartOne?->proposed_vendors ?? '-----' }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- Annexure I: Technical Specifications of Online PH Probe --}}
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-black dark:text-black">Annexure-I: Technical Specifications of Online PH Probe</h3>
                    <table class="w-full text-sm border border-gray-300 dark:border-zinc-700" style="border-collapse: collapse;">
                        <thead class="bg-gray-100 dark:bg-gray-100 text-left">
                            <tr>
                                <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">Sl. No.</th>
                                <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">Indent Specifications</th>
                                <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">01</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">PH Range</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">0 to 14</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">02</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Flow rate</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-----</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">03</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-----</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">CPVC or Ryton</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">04</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Transmission Distance</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">3000 ft. (900 m)</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">05</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Sensitivity</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">0.001 pH</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">06</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Stability</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">0.03 pH per day, non-cumulative</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">07</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Temperature Compensation</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Should be available</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">08</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Pressure Limit</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">100 psig at 65°C maximum</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">09</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Temperature Limits</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-5 to 95°C (23 to 203°F)</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">10</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Probe Cable</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">5 Conductor plus shield, 15 ft. (4.6m)</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-317 dark:border-zinc-700 font-normal">11</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Process connection</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">1-1/2” NPT threaded body</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt-2 italic">Note: The supplier should submit the manual & technical data sheet along with applicable test certificates.</p>
                </div>

                {{-- Annexure II: Technical Specifications of PH Analyzer --}}
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-black dark:text-black">Annexure-II: Technical Specifications of PH Analyzer/controller</h3>
                    <table class="w-full text-sm border border-gray-300 dark:border-zinc-700" style="border-collapse: collapse;">
                        <thead class="bg-gray-100 dark:bg-gray-100 text-left">
                            <tr>
                                <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">Sl. No.</th>
                                <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">Indent Specifications</th>
                                <th class="p-2 border border-gray-300 dark:border-zinc-700 font-bold">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-bold" colspan="3">Probe parameters</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">01</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Probe</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-----</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">02</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-----</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">100, 1000 Ω RTD 300, 3000 Ω NTC</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">03</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Sensor Input</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-600 to +600 mV</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">04</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Measurement Range</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">0 to 14 pH 0 to 100 °C</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">05</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Temperature Compensation</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Automatic -20 to 150 °C</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">06</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Calibration modes</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">pH: Automatic or Manual Temp: Manual</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-bold" colspan="3">Outputs</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">07</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Analog</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">2 x 4-20 mA, 1-Process, 2-Process/Temp. Optically isolated</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">08</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Digital</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">RS485 for diagnostic use only</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">09</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Relays</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">3 x 5 A@ 120/240 VAC or 28 VDC NO or NC</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">10</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Relay Modes</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Rising/Falling. Cycle On/Off Options: Relay Delay, Overfeed Timer, Override</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-bold" colspan="3">Ratings</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">11</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Ingress Protection</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">NEMA 4X</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">12</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Electrical</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">ul, cUL, and CE compliant</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">13</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Max. Power Input</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">0.2 A @ 115 VAC or 15 W</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">14</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Temperature</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">-20 to 70 °C</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">15</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Humidity</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">0 to 90% Relative Humidity</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-bold" colspan="3">Physical</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">16</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Mounting</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Wall mount, panel mount with kit provided</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">17</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Power</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">240VAC/50Hz</td>
                            </tr>
                            <tr class="border-t border-gray-300 dark:border-zinc-700">
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">18</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Approx Dimensions</td>
                                <td class="p-2 border border-gray-300 dark:border-zinc-700 font-normal">Front cover: 5.5”x5.5” (14 cm x 14 cm). Dimension may vary slightly (+/-5cm)</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="mt-2 italic">Note: The supplier should submit the manual & technical data sheet along with applicable test certificates.</p>
                </div>

                {{-- Guidelines/Instructions --}}
                <div class="mt-6">
                    <h3 class="text-lg font-bold text-black dark:text-black">मांग पत्र जारी करने हेतु दिशानिर्देश / निर्देश / GUIDELINES/INSTRUCTIONS FOR RAISING INDENTS</h3>
                    <ol class="list-decimal pl-5 space-y-2">
                        <li>
                            मांगपत्र को अनुमोदित करने वाले अधिकारी यह सुनिश्चित करेंगे कि उनके पास मांगपत्र में दिखाए गए मदों के अनुमानित मूल्य की सीमा तक मांगपत्र स्वीकार करने और संबंधित प्रत्यायोजन आदेश संख्या और तारीख का उल्लेख करते हुए घोषणा पर हस्ताक्षर करने का अधिकार होगा।<br/>
                            Officers approving the indents shall ensure that he has the authority to approve indents to the extent of estimated value of the item shown in the indents and sign the declaration quoting the relevant delegation order number and date.
                        </li>
                        <li>
                            मांगपत्र अनुमोदित करने वाले अधिकारी मांगपत्र जारी करते समय प्रत्येक मद के संबंध में उनकी आवश्यकताओं के अनुसार अधिकतम संभव समेकन सुनिश्चित करेंगे।<br/>
                            Officer approving the indents shall ensure maximum possible consolidation of their requirements against each item while raising indents.
                        </li>
                        <li>
                            क्रेता के कुल मूल्य के संदर्भ में उच्च प्राधिकारी की मंजूरी/अनुमोदन प्राप्त करने की आवश्यकता से बचने के लिए मांगपत्रों को विभाजित नहीं किया जाएगा।<br/>
                            Indents shall not be split-up to avoid the necessity for obtaining sanction/approval of the higher authority with reference to the total value of the purchaser.
                        </li>
                        <li>
                            जहां भंडार सामग्री को किसी वित्तीय वर्ष विशेष के लिए आपूर्ति और भुगतान किया जाना आवश्यक है, वहां मांगपत्र पर्याप्त समय पूर्व, अग्रिम तौर पर भेजा जाएगा ताकि आपूर्ति की व्यवस्था की जा सके और भुगतान वित्तीय वर्ष के भीतर ही किया जा सके।<br/>
                            Where stores are required to be supplied and paid for in a particular financial year, indents shall be sent out well in advance so that supply could be arranged and payment made within the financial year itself.
                        </li>
                        <li>
                            प्रत्येक प्रकार के उपकरण/सामग्री के लिए अलग-अलग मांग पत्र जारी किए जाने होंगे, अर्थात केवल समान प्रकृति की वस्तुओं को एक साथ और एक मांगपत्र में शामिल किया जाना चाहिए।<br/>
                            Separate indents will have to be raised for each type of equipment/material required or in other words, only items of similar nature should be grouped together and included in one indent.
                        </li>
                        <li>
                            मालिकाना प्रकृति के उपकरण और भंडार सामग्री, अर्थात जब समतुल्य एवं समान प्रकृति की वस्तुएं एक से अधिक स्रोतों से उपलब्ध होती हैं, तो मालिकाना मेक के चयन के समर्थ में पर्याप्त तकनीकी कारण दिए जाने चाहिए। ऐसे मांगपत्र को केवल उन अधिकारियों द्वारा अनुमोदित किया जाना चाहिए, जिन्हें इसके लिए विशिष्ट शक्तियां प्रत्यायोजित हैं। ऐसे मामले में जहां मालिकाना भंडार सामग्री के लिए एक मांगपत्र का अनुमानित मूल्य 6 करोड़ रुपये से अधिक है, ऐसे मांगपत्र के प्रस्ताव को परियोजना/इकाई के सक्षम प्राधिकारी द्वारा संसाधित किया जाना चाहिए और वित्त सदस्य का अनुमोदन लिया जाना चाहिए। ऐसे मामलों में, परियोजनाएँ/इकाइयों द्वारा मांगपत्र में दिए गए कॉलम में विशेष मंजूरी/अनुमोदन का विवरण प्रस्तुत करेंगे।<br/>
                            Indents for items of equipment and stores of proprietary nature, i.e. when item of similar nature of near equivalent are available from more than one sources should be supported with sufficient technical reasons for choice of the proprietary make. Such indents should be approved by only those officers who are delegated specific powers for the purpose. In cases where the estimated value of an indent for proprietary stores exceeds Rs. 6.00 crore, proposal for raising such indents shall be processed through competent authority in the project/unit and got approved by the member for finance. In such cases, the projects/units shall furnish the specific sanction/approval details in the column provided in the indent.
                        </li>
                        <li>
                            सुपुर्दगी सारणी प्रस्तुत करते समय, सामग्री की प्रकृति को ध्यान में रखते हुए एक वास्तविक समय निर्धारित किया जाता है, इसका उल्लेख मांगपत्र में किया जाना चाहिए।<br/>
                            While furnishing the delivery schedule, a realistic schedule taking into account consideration the nature of the item indented is desired, this aspect is to be mentioned in the indent.
                        </li>
                        <li>
                            जब मांगी गयी सामग्री अतिरिक्त पुर्जों/उपसाधनों से संबंधित होती हैं, तो उपस्कर का नाम, मेक और मॉडल का (निर्माता के नाम और पते के साथ) जिसके लिए पुर्जों/सहायक उपकरण की आवश्यकता होती है, से संबंधित संक्षिप्त विवरण प्रस्तुत किया जाना चाहिए।<br/>
                            When items are for spare parts/accessories, a brief description, make and model of the equipment (with name and address of the manufacturer) for which spares/accessories are required, should be furnished.
                        </li>
                        <li>
                            सामग्री की प्रकृति के अनुसार, वांछित पैकिंग के प्रकार, प्रेषण का विशेष माध्यम, भंडारण निर्देश आदि से संबंधित आवश्यक विशेष निर्देशों का उल्लेख किया जाना चाहिए।<br/>
                            Special instructions where necessary concerning the type of packing desired, the special mode of despatch required, storage instructions, etc. considering the nature of the item should be furnished.
                        </li>
                        <li>
                            लेखा शीर्ष, जिसके नामे खर्च को डालना है, के आधार पर कैप्शन "कैपिटल बजट/रेवेन्यू बजट" का उल्लेख मांगपत्र में उपयुक्त स्थान पर किया जाए।<br/>
                            The caption “Capital Budget/Revenue Budget’ depending upon the Head of Account to which expenditure is to be debited may be indicated at the appropriate place in the indent form.
                        </li>
                        <li>
                            यदि अनुमानित लागत इकाई प्रमुख की वित्तीय शक्ति से अधिक है, तो सक्षम प्राधिकारी का अनुमोदन संलग्न किया जाए।<br/>
                            If estimated cost exceeds the power of Unit head, approval of competent authority may be enclosed.
                        </li>
                        <li>
                            वाणिज्यिक शर्तें, यदि कोई हों, तो क्रय एवं भंडार निदेशालय को एक अलग टिप्पणी के रूप में भेजा जाना चाहिए तथा ये शर्तें तकनीकी विनिर्देश का हिस्सा नहीं होनी चाहिए।<br/>
                            Commercial terms, if any, should be sent to DPS as a separate note and should not be part of the Technical Specification.
                        </li>
                    </ol>
                </div>
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
        @elseif(Auth::user()->role == 'procurement_admin')
        <div class="flex justify-end pt-6 no-print">
            <button type="button" onclick="printPage()"
                class="bg-green-700 text-white px-6 py-2 rounded hover:bg-green-800">
                Print
            </button>
        </div>
        @endif
    </div>
    <script>

        function printPage() {
            window.print();
        }

        function initiatePrintFlow() {
        // Add the listener before printing
        window.addEventListener('afterprint', function handleAfterPrint() {
            // Remove the listener immediately so it doesn't fire multiple times
            window.removeEventListener('afterprint', handleAfterPrint);

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
        });

        // Trigger the print after setting up the listener
        window.print();
    }
    </script>
</body>

</html>
