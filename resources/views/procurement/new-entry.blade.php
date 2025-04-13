<x-layouts.procurement-dashboard>
    <x-slot:title>New Procurement</x-slot:title>
    <x-slot:subtitle>Fill initial procurement information</x-slot:subtitle>

    <form action="{{ route('procurement.new.store') }}" method="POST" class="space-y-6 max-w-5xl mx-auto mt-10">
        @csrf

        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            <div>
                <label class="block mb-1 text-gray-700 dark:text-white">Section</label>
                <select name="section_id" class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 text-gray-700 dark:text-white">Procurement Type</label>
                <select name="procurement_type_id"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                    @foreach($procurementTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 text-gray-700 dark:text-white">Name</label>
                <select name="user_id" id="user_id"
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white">
                    <option value="">Select user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 text-gray-700 dark:text-white">Email ID</label>
                <input type="email" id="email" name="email" readonly
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>

            <div>
                <label class="block mb-1 text-gray-700 dark:text-white">Telephone</label>
                <input type="text" id="telephone" name="telephone" readonly
                    class="w-full border rounded px-3 py-2 dark:bg-zinc-800 dark:text-white" />
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                Submit
            </button>
        </div>
    </form>

    <script>
        document.getElementById('user_id').addEventListener('change', function () {
            const userId = this.value;
            if (!userId) return;

            fetch(`{{ url('/procurement/user-details') }}/${userId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('email').value = data.email || '';
                    document.getElementById('telephone').value = data.telephone || '';
                })
                .catch(error => {
                    console.error('Error fetching user details:', error);
                });
        });
    </script>
</x-layouts.procurement-dashboard>