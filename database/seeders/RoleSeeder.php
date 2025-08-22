<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Quản trị viên',
                'description' => 'Quản trị viên hệ thống với quyền truy cập đầy đủ',
                'status' => true,
            ],
            [
                'name' => 'Quản lý chất lượng',
                'description' => 'Quản lý các hoạt động kiểm soát chất lượng và CPK',
                'status' => true,
            ],
            [
                'name' => 'Kỹ thuật viên QC',
                'description' => 'Kỹ thuật viên kiểm soát chất lượng thực hiện các bài kiểm tra',
                'status' => true,
            ],
            [
                'name' => 'Nhân viên sản xuất',
                'description' => 'Nhân viên sản xuất và vận hành máy móc',
                'status' => true,
            ],
            [
                'name' => 'Quản lý phòng ban',
                'description' => 'Quản lý các phòng ban và báo cáo',
                'status' => true,
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $this->command->info('Đã tạo ' . count($roles) . ' vai trò người dùng thành công!');
    }
}
