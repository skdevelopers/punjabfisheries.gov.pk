<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tender;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenders = [
            [
                'title' => 'Shrimp Seed PL-10 Procurement',
                'description' => 'Procurement of Shrimp Seed PL-10 Panaeus monodon (Tiger Prawn) for aquaculture development project.',
                'tender_number' => 'TENDER-001-2025',
                'deadline' => '2025-01-15',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-001-notice.pdf',
                'pdf_path_2' => 'tenders/tender-001-bidding-doc.pdf',
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 45
            ],
            [
                'title' => 'Pre-Qualification for Shrimp Seed Supply',
                'description' => 'Pre-Qualification of suppliers/firms for supply of shrimp seed (PL-10) Litopenaenus Vannamei to shrimp farmers.',
                'tender_number' => 'TENDER-002-2025',
                'deadline' => '2025-04-18',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-002-notice.pdf',
                'pdf_path_2' => null,
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 32
            ],
            [
                'title' => 'Aquaculture Development Project',
                'description' => 'Tender Notice for the Procurement of Various Items under development project "Aquaculture: Shrimp Farming in Punjab".',
                'tender_number' => 'TENDER-003-2025',
                'deadline' => '2025-03-11',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-003-notice.pdf',
                'pdf_path_2' => 'tenders/tender-003-bidding-doc.pdf',
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 67
            ],
            [
                'title' => 'Various Items Procurement',
                'description' => 'Tender Notice for the Procurement of Various Items for fisheries development and infrastructure improvement.',
                'tender_number' => 'TENDER-004-2025',
                'deadline' => '2025-02-28',
                'status' => 'closed',
                'pdf_path' => 'tenders/tender-004-notice.pdf',
                'pdf_path_2' => null,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'view_count' => 89
            ],
            [
                'title' => 'Pangasius Project Items',
                'description' => 'Tender Notice for the Procurement of Various Items for Pangasius farming and aquaculture development.',
                'tender_number' => 'TENDER-005-2025',
                'deadline' => '2025-03-25',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-005-notice.pdf',
                'pdf_path_2' => 'tenders/tender-005-bidding-doc.pdf',
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 23
            ],
            [
                'title' => 'Shrimp Farming Equipment',
                'description' => 'Tender Notice for the Procurement of Various Items for shrimp farming equipment and technology.',
                'tender_number' => 'TENDER-006-2025',
                'deadline' => '2025-04-05',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-006-notice.pdf',
                'pdf_path_2' => null,
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 56
            ],
            [
                'title' => 'Fish Feed Supply Contract',
                'description' => 'Tender for supply of high-quality fish feed for government hatcheries and aquaculture projects.',
                'tender_number' => 'TENDER-007-2025',
                'deadline' => '2025-02-15',
                'status' => 'cancelled',
                'pdf_path' => 'tenders/tender-007-notice.pdf',
                'pdf_path_2' => null,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'view_count' => 34
            ],
            [
                'title' => 'Water Quality Testing Services',
                'description' => 'Tender for water quality testing and analysis services for aquaculture facilities.',
                'tender_number' => 'TENDER-008-2025',
                'deadline' => '2025-03-20',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-008-notice.pdf',
                'pdf_path_2' => 'tenders/tender-008-bidding-doc.pdf',
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 78
            ],
            [
                'title' => 'Hatchery Equipment Maintenance',
                'description' => 'Tender for maintenance and repair services of hatchery equipment and machinery.',
                'tender_number' => 'TENDER-009-2025',
                'deadline' => '2025-04-10',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-009-notice.pdf',
                'pdf_path_2' => null,
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 41
            ],
            [
                'title' => 'Aquaculture Training Program',
                'description' => 'Tender for conducting training programs for fish farmers and aquaculture professionals.',
                'tender_number' => 'TENDER-010-2025',
                'deadline' => '2025-05-01',
                'status' => 'active',
                'pdf_path' => 'tenders/tender-010-notice.pdf',
                'pdf_path_2' => 'tenders/tender-010-bidding-doc.pdf',
                'is_published' => true,
                'published_at' => now(),
                'view_count' => 92
            ]
        ];

        foreach ($tenders as $tenderData) {
            Tender::create($tenderData);
        }
    }
}