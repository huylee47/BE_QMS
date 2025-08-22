<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Quản lý người dùng
            [
                'name' => 'user.view',
                'description' => 'Xem danh sách người dùng',
                'status' => true,
            ],
            [
                'name' => 'user.create',
                'description' => 'Tạo người dùng mới',
                'status' => true,
            ],
            [
                'name' => 'user.edit',
                'description' => 'Chỉnh sửa thông tin người dùng',
                'status' => true,
            ],
            [
                'name' => 'user.delete',
                'description' => 'Xóa người dùng',
                'status' => true,
            ],

            // Quản lý vai trò
            [
                'name' => 'role.view',
                'description' => 'Xem danh sách vai trò',
                'status' => true,
            ],
            [
                'name' => 'role.create',
                'description' => 'Tạo vai trò mới',
                'status' => true,
            ],
            [
                'name' => 'role.edit',
                'description' => 'Chỉnh sửa vai trò',
                'status' => true,
            ],
            [
                'name' => 'role.delete',
                'description' => 'Xóa vai trò',
                'status' => true,
            ],

            // Quản lý phòng ban
            [
                'name' => 'department.view',
                'description' => 'Xem danh sách phòng ban',
                'status' => true,
            ],
            [
                'name' => 'department.create',
                'description' => 'Tạo phòng ban mới',
                'status' => true,
            ],
            [
                'name' => 'department.edit',
                'description' => 'Chỉnh sửa phòng ban',
                'status' => true,
            ],
            [
                'name' => 'department.delete',
                'description' => 'Xóa phòng ban',
                'status' => true,
            ],

            // Quản lý cấu hình kiểm tra
            [
                'name' => 'inspection_config.view',
                'description' => 'Xem cấu hình kiểm tra CPK',
                'status' => true,
            ],
            [
                'name' => 'inspection_config.create',
                'description' => 'Tạo cấu hình kiểm tra mới',
                'status' => true,
            ],
            [
                'name' => 'inspection_config.edit',
                'description' => 'Chỉnh sửa cấu hình kiểm tra',
                'status' => true,
            ],
            [
                'name' => 'inspection_config.delete',
                'description' => 'Xóa cấu hình kiểm tra',
                'status' => true,
            ],

            // Báo cáo và phân tích
            [
                'name' => 'report.cpk',
                'description' => 'Xem báo cáo CPK',
                'status' => true,
            ],
            [
                'name' => 'report.quality',
                'description' => 'Xem báo cáo chất lượng',
                'status' => true,
            ],
            [
                'name' => 'report.export',
                'description' => 'Xuất báo cáo',
                'status' => true,
            ],

            // Cài đặt hệ thống
            [
                'name' => 'system.settings',
                'description' => 'Cài đặt hệ thống',
                'status' => true,
            ],
            [
                'name' => 'system.backup',
                'description' => 'Sao lưu và khôi phục dữ liệu',
                'status' => true,
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $this->command->info('Đã tạo ' . count($permissions) . ' quyền hạn thành công!');
    }
}
