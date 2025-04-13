<div class="border border-gray-300 dark:border-zinc-700 rounded shadow bg-white dark:bg-zinc-900">
    <div class="p-4 border-b dark:border-zinc-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">6. PAC - Proprietary Article Certificate</h2>
        <button data-toggle="pac-form" class="text-blue-600 dark:text-blue-400 text-sm">Toggle</button>
    </div>

    <div class="p-4 space-y-4" id="pac-form">
        <form method="POST" action="#">
            @csrf

            {{-- Indent Details --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indent Number</label>
                    <input type="text" name="indent_no" value="HWP/TAL/INST/2023/"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
                <div>
                    <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Indent Date</label>
                    <input type="text" name="indent_date" value="__/06/2023"
                        class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                </div>
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Manufacturer / Firm</label>
                <input type="text" name="manufacturer" value="MAKE-SHARP"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Model</label>
                <input type="text" name="model" value="LM5Q32R"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            {{-- Justification --}}
            <div>
                <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Justification (Why no other
                    make/model is acceptable)</label>
                <textarea name="justification" rows="4"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">The indent item is a part of whole defective PID controller. No other make model will be compatible with the existing PID controller.</textarea>
            </div>

            {{-- Signature Section --}}
            <div class="border-t pt-6 mt-6">
                <h3 class="font-semibold text-gray-800 dark:text-white text-md mb-2">Indenting Officer Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Name & Designation</label>
                        <input type="text" name="indenting_officer" value="abcd"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                </div>
            </div>

            <div class="border-t pt-6 mt-6">
                <h3 class="font-semibold text-gray-800 dark:text-white text-md mb-2">Approving Authority</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-700 dark:text-gray-300 mb-1">Designation</label>
                        <input type="text" name="approving_designation" value="OSD, HWBF Talcher"
                            class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
                    Save PAC Section
                </button>
            </div>
        </form>
    </div>
</div>