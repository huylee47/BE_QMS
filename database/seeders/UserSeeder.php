<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo admin user
        $admin = User::create([
            'id' => 'USR001',
            'name' => 'Nguyễn Văn Admin',
            'username' => 'admin',
            'email' => 'admin@company.com',
            'mobile' => '0901000001',
            'password' => bcrypt('123456'),
            'address' => '123 Đường Nguyễn Huệ, Quận 1, TP.HCM',
        ]);

        // Tạo các user khác
        $users = [
            [
                'id' => 'USR002',
                'name' => 'Trần Thị Lan',
                'username' => 'lan.tran',
                'email' => 'lan.tran@company.com',
                'mobile' => '0901000002',
                'password' => bcrypt('123456'),
                'address' => '456 Đường Lê Lợi, Quận 3, TP.HCM',
            ],
            [
                'id' => 'USR003',
                'name' => 'Lê Minh Tuấn',
                'username' => 'tuan.le',
                'email' => 'tuan.le@company.com',
                'mobile' => '0901000003',
                'password' => bcrypt('123456'),
                'address' => '789 Đường Cách Mạng Tháng 8, Quận 10, TP.HCM',
            ],
            [
                'id' => 'USR004',
                'name' => 'Phạm Thị Mai',
                'username' => 'mai.pham',
                'email' => 'mai.pham@company.com',
                'mobile' => '0901000004',
                'password' => bcrypt('123456'),
                'address' => '321 Đường Điện Biên Phủ, Quận Bình Thạnh, TP.HCM',
            ],
            [
                'id' => 'USR005',
                'name' => 'Hoàng Văn Nam',
                'username' => 'nam.hoang',
                'email' => 'nam.hoang@company.com',
                'mobile' => '0901000005',
                'password' => bcrypt('123456'),
                'address' => '654 Đường 3/2, Quận 10, TP.HCM',
            ],
            [
                'id' => 'USR006',
                'name' => 'Đỗ Thị Hương',
                'username' => 'huong.do',
                'email' => 'huong.do@company.com',
                'mobile' => '0901000006',
                'password' => bcrypt('123456'),
                'address' => '987 Đường Nguyễn Văn Cừ, Quận 5, TP.HCM',
            ],
            [
                'id' => 'USR007',
                'name' => 'Bùi Văn Hùng',
                'username' => 'hung.bui',
                'email' => 'hung.bui@company.com',
                'mobile' => '0901000007',
                'password' => bcrypt('123456'),
                'address' => '147 Đường CMT8, Quận 3, TP.HCM',
            ],
            [
                'id' => 'USR008',
                'name' => 'Vũ Thị Linh',
                'username' => 'linh.vu',
                'email' => 'linh.vu@company.com',
                'mobile' => '0901000008',
                'password' => bcrypt('123456'),
                'address' => '258 Đường Sư Vạn Hạnh, Quận 10, TP.HCM',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        // Gán roles và departments cho users
        $this->assignRolesAndDepartments();

        $this->command->info('Đã tạo ' . (count($users) + 1) . ' người dùng thành công!');
    }

    /**
     * Gán roles và departments cho users
     */
    private function assignRolesAndDepartments(): void
    {
        // Lấy các roles và departments
        $adminRole = Role::where('name', 'Quản trị viên')->first();
        $qualityManagerRole = Role::where('name', 'Quản lý chất lượng')->first();
        $qcTechnicianRole = Role::where('name', 'Kỹ thuật viên QC')->first();
        $productionStaffRole = Role::where('name', 'Nhân viên sản xuất')->first();
        $departmentManagerRole = Role::where('name', 'Quản lý phòng ban')->first();

        $productionDept = Department::where('name', 'Phòng Sản xuất')->first();
        $qcDept = Department::where('name', 'Phòng Kiểm soát Chất lượng')->first();
        $engineeringDept = Department::where('name', 'Phòng Kỹ thuật')->first();
        $hrDept = Department::where('name', 'Phòng Nhân sự')->first();

        // Gán admin
        if ($adminRole) {
            DB::table('user_roles')->insert([
                'user_id' => 'USR001',
                'role_id' => $adminRole->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Gán roles và departments cho các users khác
        $userAssignments = [
            'USR002' => ['role' => $qualityManagerRole, 'dept' => $qcDept],
            'USR003' => ['role' => $qcTechnicianRole, 'dept' => $qcDept],
            'USR004' => ['role' => $productionStaffRole, 'dept' => $productionDept],
            'USR005' => ['role' => $departmentManagerRole, 'dept' => $engineeringDept],
            'USR006' => ['role' => $qcTechnicianRole, 'dept' => $qcDept],
            'USR007' => ['role' => $productionStaffRole, 'dept' => $productionDept],
            'USR008' => ['role' => $qualityManagerRole, 'dept' => $qcDept],
        ];

        foreach ($userAssignments as $userId => $assignment) {
            if ($assignment['role']) {
                DB::table('user_roles')->insert([
                    'user_id' => $userId,
                    'role_id' => $assignment['role']->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if ($assignment['dept']) {
                DB::table('user_departments')->insert([
                    'user_id' => $userId,
                    'department_id' => $assignment['dept']->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Đã gán roles và departments cho users thành công!');
    }
}
