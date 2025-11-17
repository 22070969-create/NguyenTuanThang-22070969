-- BÀI TẬP 4: Bảng permissions (quyền)
CREATE TABLE `permissions` (
  `permission_id` INT AUTO_INCREMENT PRIMARY KEY,
  `permission_name` VARCHAR(100) NOT NULL UNIQUE COMMENT 'Tên quyền, ví dụ: delete_user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- BÀI TẬP 4 & 8: Bảng roles (vai trò)
-- Thêm 'parent_role_id' cho Bài tập 8 (kế thừa)
CREATE TABLE `roles` (
  `role_id` INT AUTO_INCREMENT PRIMARY KEY,
  `role_name` VARCHAR(100) NOT NULL UNIQUE,
  `parent_role_id` INT NULL COMMENT 'ID của vai trò cha (để kế thừa)',
  FOREIGN KEY (`parent_role_id`) REFERENCES `roles`(`role_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- BÀI TẬP 4: Bảng users (người dùng)
CREATE TABLE `users` (
  `user_id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL,
  `role_id` INT NOT NULL,
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- BÀI TẬP 4: Bảng role_permissions (liên kết vai trò-quyền)
CREATE TABLE `role_permissions` (
  `role_id` INT NOT NULL,
  `permission_id` INT NOT NULL,
  PRIMARY KEY (`role_id`, `permission_id`),
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`) ON DELETE CASCADE,
  FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`permission_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --- THÊM DỮ LIỆU MẪU ---

-- 1. Thêm các quyền (Permissions)
INSERT INTO `permissions` (`permission_name`) VALUES
('view_user'),         -- Thấy danh sách người dùng
('edit_own_profile'),  -- Sửa hồ sơ của mình
('create_user'),       -- Tạo người dùng mới
('edit_user'),         -- Sửa người dùng bất kỳ
('delete_user'),       -- Xóa người dùng
('manage_roles');      -- Quản lý vai trò (cho Bài 9)

-- 2. Thêm các vai trò (Roles) - (Bài 8: Phân cấp)
-- guest (không kế thừa ai)
INSERT INTO `roles` (`role_id`, `role_name`, `parent_role_id`) VALUES
(1, 'guest', NULL);

-- user (kế thừa từ guest)
INSERT INTO `roles` (`role_id`, `role_name`, `parent_role_id`) VALUES
(2, 'user', 1); 

-- admin (kế thừa từ user)
INSERT INTO `roles` (`role_id`, `role_name`, `parent_role_id`) VALUES
(3, 'admin', 2);

-- 3. Thêm liên kết Quyền cho Vai trò (Role_Permissions)
-- QUAN TRỌNG: Chỉ thêm quyền *riêng* của vai trò đó. Quyền kế thừa sẽ được PHP xử lý.

-- guest CÓ QUYỀN: 'view_user'
INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(1, (SELECT permission_id FROM permissions WHERE permission_name = 'view_user'));

-- user CÓ THÊM QUYỀN: 'edit_own_profile'
INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(2, (SELECT permission_id FROM permissions WHERE permission_name = 'edit_own_profile'));
-- admin CÓ THÊM QUYỀN: 'create_user', 'edit_user', 'delete_user', 'manage_roles'
INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(3, (SELECT permission_id FROM permissions WHERE permission_name = 'create_user')),
(3, (SELECT permission_id FROM permissions WHERE permission_name = 'edit_user')),
(3, (SELECT permission_id FROM permissions WHERE permission_name = 'delete_user')),
(3, (SELECT permission_id FROM permissions WHERE permission_name = 'manage_roles'));

-- 4. Thêm người dùng (Users)
INSERT INTO `users` (`username`, `role_id`) VALUES
('Alice (Admin)', 3), -- user_id = 1
('Bob (User)', 2),    -- user_id = 2
('Charlie (Guest)', 1); -- user_id = 3db_setup
