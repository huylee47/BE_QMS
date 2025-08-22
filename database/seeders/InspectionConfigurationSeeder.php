<?php

namespace Database\Seeders;

use App\Models\Inspection_configuration;
use Illuminate\Database\Seeder;

class InspectionConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configurations = [
            // Kích thước sản phẩm
            [
                'no' => 'DIM001',
                'measuring_tool' => 'Caliper kỹ thuật số',
                'specification' => 'Đường kính lỗ',
                'tolerance_upper' => '10.05',
                'tolerance_lower' => '9.95',
                'upper_limit' => '10.10',
                'lower_limit' => '9.90',
                'center' => '10.00',
            ],
            [
                'no' => 'DIM002',
                'measuring_tool' => 'Thước lá',
                'specification' => 'Chiều dài sản phẩm',
                'tolerance_upper' => '150.2',
                'tolerance_lower' => '149.8',
                'upper_limit' => '150.5',
                'lower_limit' => '149.5',
                'center' => '150.0',
            ],
            [
                'no' => 'DIM003',
                'measuring_tool' => 'Micrometer',
                'specification' => 'Độ dày vật liệu',
                'tolerance_upper' => '5.02',
                'tolerance_lower' => '4.98',
                'upper_limit' => '5.05',
                'lower_limit' => '4.95',
                'center' => '5.00',
            ],
            [
                'no' => 'DIM004',
                'measuring_tool' => 'Gauges lỗ',
                'specification' => 'Đường kính trục',
                'tolerance_upper' => '20.03',
                'tolerance_lower' => '19.97',
                'upper_limit' => '20.05',
                'lower_limit' => '19.95',
                'center' => '20.00',
            ],
            [
                'no' => 'DIM005',
                'measuring_tool' => 'Caliper',
                'specification' => 'Chiều rộng bề mặt',
                'tolerance_upper' => '100.15',
                'tolerance_lower' => '99.85',
                'upper_limit' => '100.25',
                'lower_limit' => '99.75',
                'center' => '100.00',
            ],

            // Chất lượng bề mặt
            [
                'no' => 'SUR001',
                'measuring_tool' => 'Máy đo độ nhám',
                'specification' => 'Độ nhám bề mặt Ra',
                'tolerance_upper' => '0.8',
                'tolerance_lower' => '0.2',
                'upper_limit' => '1.0',
                'lower_limit' => '0.1',
                'center' => '0.5',
            ],
            [
                'no' => 'SUR002',
                'measuring_tool' => 'Máy đo độ bóng',
                'specification' => 'Độ bóng bề mặt',
                'tolerance_upper' => '85',
                'tolerance_lower' => '75',
                'upper_limit' => '90',
                'lower_limit' => '70',
                'center' => '80',
            ],

            // Độ chính xác
            [
                'no' => 'ACC001',
                'measuring_tool' => 'Máy đo tọa độ CMM',
                'specification' => 'Độ chính xác vị trí',
                'tolerance_upper' => '0.05',
                'tolerance_lower' => '-0.05',
                'upper_limit' => '0.08',
                'lower_limit' => '-0.08',
                'center' => '0.00',
            ],
            [
                'no' => 'ACC002',
                'measuring_tool' => 'Máy đo góc',
                'specification' => 'Độ chính xác góc',
                'tolerance_upper' => '0.5',
                'tolerance_lower' => '-0.5',
                'upper_limit' => '0.8',
                'lower_limit' => '-0.8',
                'center' => '0.0',
            ],

            // Trọng lượng sản phẩm
            [
                'no' => 'WGT001',
                'measuring_tool' => 'Cân điện tử',
                'specification' => 'Trọng lượng sản phẩm',
                'tolerance_upper' => '1050',
                'tolerance_lower' => '950',
                'upper_limit' => '1100',
                'lower_limit' => '900',
                'center' => '1000',
            ],

            // Độ cứng vật liệu
            [
                'no' => 'HRD001',
                'measuring_tool' => 'Máy đo độ cứng Rockwell',
                'specification' => 'Độ cứng HRC',
                'tolerance_upper' => '45',
                'tolerance_lower' => '35',
                'upper_limit' => '48',
                'lower_limit' => '32',
                'center' => '40',
            ],

            // Điện trở bề mặt
            [
                'no' => 'RES001',
                'measuring_tool' => 'Máy đo điện trở bề mặt',
                'specification' => 'Điện trở bề mặt (Ω)',
                'tolerance_upper' => '0.001',
                'tolerance_lower' => '0.0005',
                'upper_limit' => '0.0015',
                'lower_limit' => '0.0003',
                'center' => '0.0008',
            ],

            // Độ ẩm
            [
                'no' => 'HUM001',
                'measuring_tool' => 'Máy đo độ ẩm',
                'specification' => 'Độ ẩm vật liệu (%)',
                'tolerance_upper' => '8.5',
                'tolerance_lower' => '6.5',
                'upper_limit' => '9.0',
                'lower_limit' => '6.0',
                'center' => '7.5',
            ],

            // Nhiệt độ
            [
                'no' => 'TMP001',
                'measuring_tool' => 'Nhiệt kế hồng ngoại',
                'specification' => 'Nhiệt độ bề mặt (°C)',
                'tolerance_upper' => '85',
                'tolerance_lower' => '75',
                'upper_limit' => '90',
                'lower_limit' => '70',
                'center' => '80',
            ],

            // Áp suất
            [
                'no' => 'PRS001',
                'measuring_tool' => 'Máy đo áp suất',
                'specification' => 'Áp suất hệ thống (bar)',
                'tolerance_upper' => '8.5',
                'tolerance_lower' => '7.5',
                'upper_limit' => '9.0',
                'lower_limit' => '7.0',
                'center' => '8.0',
            ],
        ];

        foreach ($configurations as $config) {
            Inspection_configuration::create($config);
        }

        $this->command->info('Đã tạo ' . count($configurations) . ' cấu hình kiểm tra CPK thành công!');
    }
}
