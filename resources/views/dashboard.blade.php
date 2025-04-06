<x-layouts.app :title="__('Dashboard')">
    <div class="p-6 space-y-6">

        {{-- Top Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-4 shadow-sm">
                <h3 class="text-sm text-zinc-500 dark:text-zinc-400 mb-2">Total Circulars</h3>
                <p class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">{{ $totalCirculars }}</p>
            </div>

            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-4 shadow-sm">
                <h3 class="text-sm text-zinc-500 dark:text-zinc-400 mb-2">Quick Info Links</h3>
                <p class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">{{ $totalQuickInfos }}</p>
            </div>

            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-4 shadow-sm">
                <h3 class="text-sm text-zinc-500 dark:text-zinc-400 mb-2">What's New</h3>
                <p class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">{{ $totalWhatsNew }}</p>
            </div>

            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-4 shadow-sm">
                <h3 class="text-sm text-zinc-500 dark:text-zinc-400 mb-2">Form PDFs</h3>
                <p class="text-2xl font-bold text-zinc-800 dark:text-zinc-100">{{ $totalFormPdfs }}</p>
            </div>
        </div>

        {{-- Grid with recent activity or content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Recent Circulars --}}
            <div
                class="col-span-2 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-6">
                <h2 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Recent Circulars</h2>
                <ul class="space-y-4">
                    @forelse($recentCirculars as $circular)
                        <li class="flex justify-between items-center">
                            <span class="text-sm text-zinc-700 dark:text-zinc-300">{{ $circular->title }}</span>
                            <span
                                class="text-xs text-zinc-500 dark:text-zinc-400">{{ $circular->created_at->format('M d, Y') }}</span>
                        </li>
                    @empty
                        <li class="text-sm text-zinc-500 dark:text-zinc-400">No circulars found.</li>
                    @endforelse
                </ul>
            </div>

            {{-- Quick Info --}}
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-6">
                <h2 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Quick Info</h2>
                <ul class="space-y-3">
                    @forelse($quickLinks as $link)
                        <li>
                            <a href="{{ $link->link ?? '#' }}"
                                class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                                {{ $link->title }}
                            </a>
                        </li>
                    @empty
                        <li class="text-sm text-zinc-500 dark:text-zinc-400">No quick info links.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        {{-- Chart Section --}}
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-xl p-6">
            <h2 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Form PDFs Over Time</h2>
            <canvas id="formPdfsChart" height="100"></canvas>
        </div>
    </div>
</x-layouts.app>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('formPdfsChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Uploaded PDFs',
                    data: {!! json_encode($chartData) !!},
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--tw-text-opacity') ? 'white' : '#4B5563'
                        },
                        grid: {
                            color: 'rgba(107,114,128,0.1)'
                        }
                    },
                    x: {
                        ticks: {
                            color: getComputedStyle(document.documentElement).getPropertyValue('--tw-text-opacity') ? 'white' : '#4B5563'
                        },
                        grid: {
                            color: 'rgba(107,114,128,0.05)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });
    });
</script>