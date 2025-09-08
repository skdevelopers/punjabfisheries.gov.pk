<x-app-layout title="Hatchery Information" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <!-- Page Heading -->
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-50 lg:text-2xl">
                Hatchery Information Form
            </h2>
        </div>

        <!-- Hatchery Info Form -->
        <form action="{{ route('hatcheries.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Hatchery Information Section -->
            <div class="card p-6">
                <h3 class="text-lg font-semibold text-slate-700 dark:text-navy-100 mb-4">Hatchery Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-navy-200">Hatchery Name</label>
                        <input type="text" name="hatchery_name" value="{{ old('hatchery_name') }}"
                               class="form-input mt-1 w-full" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-navy-200">City</label>
                        <input type="text" name="city" value="{{ old('city') }}"
                               class="form-input mt-1 w-full" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-navy-200">District</label>
                        <input type="text" name="district" value="{{ old('district') }}"
                               class="form-input mt-1 w-full" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 dark:text-navy-200">Division</label>
                        <input type="text" name="division" value="{{ old('division') }}"
                               class="form-input mt-1 w-full" required>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-600 dark:text-navy-200">Contact Number</label>
                        <input type="text" name="contact_number" value="{{ old('contact_number') }}"
                               class="form-input mt-1 w-full" required>
                    </div>
                </div>
            </div>

            <!-- Fish Seed Production Section -->
            <div class="card p-6">
                <h3 class="text-lg font-semibold text-slate-700 dark:text-navy-100 mb-4">Fish Seed Production Details</h3>
                
                <table class="w-full border border-slate-300 dark:border-navy-600 text-sm">
                    <thead class="bg-slate-100 dark:bg-navy-700">
                        <tr>
                            <th class="border px-3 py-2 text-left">Species</th>
                            <th class="border px-3 py-2 text-left">Production (No. of Seed / Kg)</th>
                            <th class="border px-3 py-2 text-left">Average Size (Inches / Gram)</th>
                        </tr>
                    </thead>
                    <tbody id="seedRows">
                        <tr>
                            <td class="border px-3 py-2">
                                <input type="text" name="species[]" class="form-input w-full" placeholder="e.g. Rohu">
                            </td>
                            <td class="border px-3 py-2">
                                <input type="number" name="production[]" class="form-input w-full" placeholder="1000">
                            </td>
                            <td class="border px-3 py-2">
                                <input type="text" name="avg_size[]" class="form-input w-full" placeholder="2 inches / 10g">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Add Row Button -->
                <div class="mt-3">
                    <button type="button" onclick="addRow()"
                            class="px-3 py-2 bg-primary text-white rounded-md hover:bg-primary-focus">
                        + Add Species
                    </button>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                        class="px-4 py-2 bg-success text-white rounded-md hover:bg-success-focus">
                    Save Hatchery Information
                </button>
            </div>
        </form>
    </main>

    <!-- Script for adding new rows -->
    <script>
        function addRow() {
            let row = `
                <tr>
                    <td class="border px-3 py-2">
                        <input type="text" name="species[]" class="form-input w-full" placeholder="e.g. Catla">
                    </td>
                    <td class="border px-3 py-2">
                        <input type="number" name="production[]" class="form-input w-full" placeholder="500">
                    </td>
                    <td class="border px-3 py-2">
                        <input type="text" name="avg_size[]" class="form-input w-full" placeholder="1.5 inches / 8g">
                    </td>
                </tr>
            `;
            document.getElementById('seedRows').insertAdjacentHTML('beforeend', row);
        }
    </script>
</x-app-layout>
