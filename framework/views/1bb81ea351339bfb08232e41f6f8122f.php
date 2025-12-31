<?php $__env->startSection('title', $member->name . ' - 编辑信息'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-xl border-0">
                <div class="card-header bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-t-xl border-0">
                    <h2 class="text-xl font-bold text-white">编辑 <?php echo e($member->name); ?> 的信息</h2>
                </div>
                
                <div class="card-body p-6">
                    <form method="POST" action="<?php echo e(route('members.update', $member->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">姓名</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(old('name', $member->name)); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">邮箱</label>
                            <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(old('email', $member->email)); ?>" required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 font-medium mb-2">电话</label>
                            <input type="text" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(old('phone', $member->phone)); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="membership_start_date" class="block text-gray-700 font-medium mb-2">会员开始日期</label>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <input type="date" name="membership_start_date" id="membership_start_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(old('membership_start_date', $member->membership_start_date)); ?>" required>
                            <?php else: ?>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" value="<?php echo e($member->membership_start_date ? \Carbon\Carbon::parse($member->membership_start_date)->format('Y-m-d') : 'N/A'); ?>" readonly>
                                <input type="hidden" name="membership_start_date" value="<?php echo e($member->membership_start_date); ?>">
                            <?php endif; ?>
                            <?php $__errorArgs = ['membership_start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="membership_end_date" class="block text-gray-700 font-medium mb-2">会员到期日期</label>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <input type="date" name="membership_end_date" id="membership_end_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo e(old('membership_end_date', $member->membership_end_date)); ?>" required>
                            <?php else: ?>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" value="<?php echo e($member->membership_end_date ? \Carbon\Carbon::parse($member->membership_end_date)->format('Y-m-d') : 'N/A'); ?>" readonly>
                                <input type="hidden" name="membership_end_date" value="<?php echo e($member->membership_end_date); ?>">
                            <?php endif; ?>
                            <?php $__errorArgs = ['membership_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="mb-4">
                            <label for="member_type" class="block text-gray-700 font-medium mb-2">会员类型</label>
                            <?php if(auth()->user()->isAdmin()): ?>
                                <select name="member_type" id="member_type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="年卡会员" <?php echo e(old('member_type', $member->member_type) === '年卡会员' ? 'selected' : ''); ?>>年卡会员</option>
                                    <option value="季卡会员" <?php echo e(old('member_type', $member->member_type) === '季卡会员' ? 'selected' : ''); ?>>季卡会员</option>
                                    <option value="月卡会员" <?php echo e(old('member_type', $member->member_type) === '月卡会员' ? 'selected' : ''); ?>>月卡会员</option>
                                    <option value="次卡会员" <?php echo e(old('member_type', $member->member_type) === '次卡会员' ? 'selected' : ''); ?>>次卡会员</option>
                                </select>
                            <?php else: ?>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" value="<?php echo e($member->member_type); ?>" readonly>
                                <input type="hidden" name="member_type" value="<?php echo e($member->member_type); ?>">
                            <?php endif; ?>
                            <?php $__errorArgs = ['member_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <?php if(auth()->user()->isAdmin()): ?>
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 font-medium mb-2">关联用户</label>
                            <select name="user_id" id="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">无关联用户</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id', $member->user_id) == $user->id ? 'selected' : ''); ?>>
                                        <?php echo e($user->name); ?> (<?php echo e($user->email); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-red-500 text-sm mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex items-center justify-between">
                            <a href="<?php echo e(route('members.index')); ?>" class="text-gray-600 hover:text-gray-800 font-medium">取消</a>
                            
                            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-200 font-medium">
                                更新信息
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\WampServer\www\laravel11.37.0\resources\views/members/edit.blade.php ENDPATH**/ ?>