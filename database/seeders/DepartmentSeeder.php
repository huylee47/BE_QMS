<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Phòng Kỹ thuật',
                'description' => 'Phòng kỹ thuật và phát triển sản phẩm',
                'status' => true,
            ],
            [
                'name' => 'Phòng Sản xuất',
                'description' => 'Phòng sản xuất và lắp ráp sản phẩm',
                'status' => true,
            ],
            [
                'name' => 'Phòng Kiểm soát Chất lượng',
                'description' => 'Phòng QC kiểm tra chất lượng sản phẩm',
                'status' => true,
            ],
            [
                'name' => 'Phòng Vật liệu',
                'description' => 'Phòng quản lý nguyên vật liệu và kho',
                'status' => true,
            ],
            [
                'name' => 'Phòng Nhân sự',
                'description' => 'Phòng quản lý nhân sự và hành chính',
                'status' => true,
            ],
            [
                'name' => 'Phòng Kế toán',
                'description' => 'Phòng tài chính và kế toán',
                'status' => true,
            ],
            [
                'name' => 'Phòng IT',
                'description' => 'Phòng công nghệ thông tin và hệ thống',
                'status' => true,
            ],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        $this->command->info('Đã tạo ' . count($departments) . ' phòng ban thành công!');
    }
}
